DROP TYPE IF EXISTS state CASCADE;
CREATE TYPE state AS ENUM ('pending', 'accepted', 'rejected');

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
        ON DELETE CASCADE,
    CONSTRAINT movie_key FOREIGN KEY (movie)
        REFERENCES public.movie (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

DROP TABLE IF EXISTS signed_user CASCADE;
CREATE TABLE signed_user
(
    id serial NOT NULL,
    photo text ,
    username text NOT NULL,
    name text NOT NULL,
    date_of_birth date,
    email text NOT NULL,
    password text NOT NULL,
    admin boolean NOT NULL DEFAULT false,
    CONSTRAINT signed_user_pkey PRIMARY KEY (id),
    CONSTRAINT email_unique UNIQUE (email),
    CONSTRAINT username_unique UNIQUE (username)
);

DROP TABLE IF EXISTS friend CASCADE;
CREATE TABLE friend --trigger
(
    signed_user_id1 integer NOT NULL,
    signed_user_id2 integer NOT NULL,
    friendship_state state NOT NULL DEFAULT 'pending',
    CONSTRAINT friend_pkey PRIMARY KEY (signed_user_id1, signed_user_id2),
    CONSTRAINT friend_id1_fkey FOREIGN KEY (signed_user_id1)
        REFERENCES public.signed_user (id) MATCH SIMPLE
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT friend_id2_fkey FOREIGN KEY (signed_user_id2)
        REFERENCES public.signed_user (id) MATCH SIMPLE
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT diferent_user_check CHECK (signed_user_id1 <> signed_user_id2)
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
        REFERENCES public.signed_user (id) MATCH SIMPLE
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

DROP TABLE IF EXISTS "group_member" CASCADE;
CREATE TABLE group_member
(
    "group_id" integer NOT NULL,
    "user_id" integer NOT NULL,
    membership_state state NOT NULL DEFAULT 'pending',
    CONSTRAINT group_member_pkey PRIMARY KEY ("group_id", "user_id"),
    CONSTRAINT group_member_group_fkey FOREIGN KEY ("group_id")
        REFERENCES public."group" (id) MATCH SIMPLE
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT group_member_user_fkey FOREIGN KEY ("user_id")
        REFERENCES public.signed_user (id) MATCH SIMPLE
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

DROP TABLE IF EXISTS review CASCADE;
CREATE TABLE review
(
    id serial NOT NULL ,
    title text  NOT NULL,
    text text NOT NULL,
    date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    "group" integer,
    movie integer NOT NULL,
    author integer NOT NULL,
    CONSTRAINT review_pkey PRIMARY KEY (id),
    CONSTRAINT review_group_movie_author_key UNIQUE ("group", movie, author),
    CONSTRAINT review_author_fkey FOREIGN KEY (author)
        REFERENCES public.signed_user (id) MATCH SIMPLE
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT review_group_fkey FOREIGN KEY ("group")
        REFERENCES public."group" (id) MATCH SIMPLE
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT review_movie_fkey FOREIGN KEY (movie)
        REFERENCES public.movie (id) MATCH SIMPLE
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
        REFERENCES public.review (id) MATCH SIMPLE
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT like_user_fkey FOREIGN KEY ("user")
        REFERENCES public.signed_user (id) MATCH SIMPLE
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
    date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT comment_pkey PRIMARY KEY (id),
    CONSTRAINT comment_author_fkey FOREIGN KEY (author)
        REFERENCES public.signed_user (id) MATCH SIMPLE
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT comment_review_fkey FOREIGN KEY (review)
        REFERENCES public.review (id) MATCH SIMPLE
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
        REFERENCES public.movie (id) MATCH SIMPLE
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT rating_user_fkey FOREIGN KEY ("user")
        REFERENCES public.signed_user (id) MATCH SIMPLE
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT rating_rating_check CHECK (rating > 0 AND rating <= 10)
);

DROP TABLE IF EXISTS notifications CASCADE;
CREATE TABLE notifications
(
    id serial NOT NULL,
    date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    recipient integer NOT NULL,
    group_invite integer,
    friend_invite integer,
    reported_review integer,
    CONSTRAINT notifications_pkey PRIMARY KEY (id),
    CONSTRAINT notifications_friend_invite_fkey FOREIGN KEY (friend_invite)
        REFERENCES public.signed_user (id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT notifications_group_invite_fkey FOREIGN KEY (group_invite)
        REFERENCES public."group" (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT notifications_recipient_fkey FOREIGN KEY (recipient)
        REFERENCES public.signed_user (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT notifications_reported_review_fkey FOREIGN KEY (reported_review)
        REFERENCES public.review (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT notifications_check CHECK (group_invite IS NULL AND friend_invite IS NULL AND reported_review IS NOT NULL OR group_invite IS NULL AND friend_invite IS NOT NULL AND reported_review IS NULL OR group_invite IS NOT NULL AND friend_invite IS NULL AND reported_review IS NULL) NOT VALID
);
