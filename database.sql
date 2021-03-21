DROP TABLE IF EXISTS movie CASCADE;
CREATE TABLE movie
(
    id serial NOT NULL,
    title text  NOT NULL,
    year integer NOT NULL,
    photo text ,
    CONSTRAINT movie_pkey PRIMARY KEY (id),
    CONSTRAINT year_contraint CHECK (year > 1800)
);

DROP TABLE IF EXISTS genre CASCADE;
CREATE TABLE genre
(
    id serial NOT NULL ,
    genre text NOT NULL,
    CONSTRAINT genre_pkey PRIMARY KEY (id),
    CONSTRAINT genre_genre_key UNIQUE (genre)
);

DROP TABLE IF EXISTS movie_genre CASCADE;
CREATE TABLE movie_genre
(
    genre integer NOT NULL,
    movie integer NOT NULL,
    CONSTRAINT movie_genre_pkey PRIMARY KEY (genre, movie),
    CONSTRAINT genre_key FOREIGN KEY (genre)
        REFERENCES genre (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE
        NOT VALID,
    CONSTRAINT movie_key FOREIGN KEY (movie)
        REFERENCES movie (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE
        NOT VALID
);

DROP TABLE IF EXISTS signed_user CASCADE;
CREATE TABLE signed_user
(
    id serial NOT NULL,
    photo text ,
    username text NOT NULL,
    name text NOT NULL,
    age integer,
    email text NOT NULL,
    admin boolean NOT NULL DEFAULT false,
    CONSTRAINT signed_user_pkey PRIMARY KEY (id),
    CONSTRAINT email_unique UNIQUE (email),
    CONSTRAINT username_unique UNIQUE (username),
    CONSTRAINT age_constraint CHECK (age > 13)
);

DROP TABLE IF EXISTS friend CASCADE;
CREATE TABLE friend
(
    id1 integer NOT NULL,
    id2 integer NOT NULL,
    CONSTRAINT friend_pkey PRIMARY KEY (id1, id2),
    CONSTRAINT friend_id1_fkey FOREIGN KEY (id1)
        REFERENCES signed_user (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT friend_id2_fkey FOREIGN KEY (id2)
        REFERENCES signed_user (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT diferent_user_check CHECK (id1 <> id2)
);

DROP TABLE IF EXISTS "group" CASCADE;
CREATE TABLE "group"
(
    id serial NOT NULL ,
    title text  NOT NULL,
    description text NOT NULL,
    photo text,
    admin integer NOT NULL,
    CONSTRAINT group_pkey PRIMARY KEY (id),
    CONSTRAINT admin_key FOREIGN KEY (id)
        REFERENCES signed_user (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

DROP TABLE IF EXISTS group_member CASCADE;
CREATE TABLE group_member
(
    "group" integer NOT NULL,
    "user" integer NOT NULL,
    CONSTRAINT group_member_pkey PRIMARY KEY ("group", "user"),
    CONSTRAINT group_member_group_fkey FOREIGN KEY ("group")
        REFERENCES "group" (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE
        NOT VALID,
    CONSTRAINT group_member_user_fkey FOREIGN KEY ("user")
        REFERENCES signed_user (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE
        NOT VALID
);

DROP TABLE IF EXISTS review CASCADE;
CREATE TABLE review
(
    id serial NOT NULL ,
    title text  NOT NULL,
    text text NOT NULL,
    date date NOT NULL DEFAULT now(),
    "group" integer,
    movie integer NOT NULL,
    author integer NOT NULL,
    CONSTRAINT review_pkey PRIMARY KEY (id),
    CONSTRAINT review_group_movie_author_key UNIQUE ("group", movie, author),
    CONSTRAINT review_author_fkey FOREIGN KEY (author)
        REFERENCES signed_user (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT review_group_fkey FOREIGN KEY ("group")
        REFERENCES "group" (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT review_movie_fkey FOREIGN KEY (movie)
        REFERENCES movie (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

DROP TABLE IF EXISTS "like" CASCADE;
CREATE TABLE "like"
(
    "user" integer NOT NULL,
    review integer NOT NULL,
    CONSTRAINT like_pkey PRIMARY KEY ("user", review),
    CONSTRAINT like_review_fkey FOREIGN KEY (review)
        REFERENCES review (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT like_user_fkey FOREIGN KEY ("user")
        REFERENCES signed_user (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

DROP TABLE IF EXISTS comment CASCADE;
CREATE TABLE comment
(
    id serial NOT NULL ,
    text text NOT NULL,
    author integer NOT NULL,
    review integer NOT NULL,
    CONSTRAINT comment_pkey PRIMARY KEY (id),
    CONSTRAINT comment_author_fkey FOREIGN KEY (author)
        REFERENCES signed_user (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT comment_review_fkey FOREIGN KEY (review)
        REFERENCES review (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

DROP TABLE IF EXISTS rating CASCADE;
CREATE TABLE rating
(
    id serial NOT NULL ,
    rating integer NOT NULL,
    movie integer NOT NULL,
    "user" integer NOT NULL,
    CONSTRAINT rating_pkey PRIMARY KEY (id),
    CONSTRAINT rating_user_movie_key UNIQUE ("user", movie),
    CONSTRAINT rating_movie_fkey FOREIGN KEY (movie)
        REFERENCES movie (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT rating_user_fkey FOREIGN KEY ("user")
        REFERENCES signed_user (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT rating_rating_check CHECK (rating > 0 AND rating <= 10)
);

DROP TABLE IF EXISTS notifications CASCADE;
CREATE TABLE notifications
(
    id serial NOT NULL,
    date date NOT NULL DEFAULT now(),
    recipient integer NOT NULL,
    CONSTRAINT notifications_pkey PRIMARY KEY (id),
    CONSTRAINT notifications_recipient_fkey FOREIGN KEY (recipient)
        REFERENCES signed_user (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

DROP TABLE IF EXISTS friend_invite CASCADE;
CREATE TABLE friend_invite
(
    id1 integer NOT NULL,
    "from" integer NOT NULL,
    CONSTRAINT friend_invite_pkey PRIMARY KEY (id1),
    CONSTRAINT friend_invite_from_fkey FOREIGN KEY ("from")
        REFERENCES signed_user (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT friend_invite_id1_fkey FOREIGN KEY (id1)
        REFERENCES notifications (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

DROP TABLE IF EXISTS group_invite CASCADE;
CREATE TABLE group_invite
(
    id1 integer NOT NULL,
    "from" integer NOT NULL,
    CONSTRAINT group_invite_pkey PRIMARY KEY (id1),
    CONSTRAINT group_invite_from_fkey FOREIGN KEY ("from")
        REFERENCES "group" (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT group_invite_id1_fkey FOREIGN KEY (id1)
        REFERENCES notifications (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

DROP TABLE IF EXISTS review_report CASCADE;
CREATE TABLE review_report
(
    id1 integer NOT NULL,
    "from" integer NOT NULL,
    CONSTRAINT review_report_pkey PRIMARY KEY (id1),
    CONSTRAINT review_report_from_fkey FOREIGN KEY ("from")
        REFERENCES review (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT review_report_id1_fkey FOREIGN KEY (id1)
        REFERENCES notifications (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE
);
