-----------------------------------------
-- TYPES
-----------------------------------------
DROP TYPE IF EXISTS state CASCADE;
CREATE TYPE state AS ENUM ('pending', 'accepted', 'rejected');

-----------------------------------------
-- TABLES
-----------------------------------------

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
    user_id integer NOT NULL,
    CONSTRAINT review_pkey PRIMARY KEY (id),
    CONSTRAINT review_group_movie_user_id_key UNIQUE ("group", movie, user_id),
    CONSTRAINT review_user_id_fkey FOREIGN KEY (user_id)
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
    user_id integer NOT NULL,
    review_id integer NOT NULL,
    date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT comment_pkey PRIMARY KEY (id),
    CONSTRAINT comment_user_id_fkey FOREIGN KEY (user_id)
        REFERENCES public.signed_user (id) MATCH SIMPLE
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT comment_review_fkey FOREIGN KEY (review_id)
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
    date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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

-----------------------------------------
-- TRIGGERS
-----------------------------------------

DROP FUNCTION IF EXISTS  check_review_date  CASCADE;
CREATE FUNCTION check_review_date() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT * FROM (SELECT * FROM review 
        INNER JOIN movie ON movie.id = review.movie
        WHERE NEW.movie = movie.id ) TMP where EXTRACT(YEAR FROM NEW.date) < year  ) THEN
            RAISE EXCEPTION 'A Review cannot be published before the movie official debut';
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;
 
 
CREATE TRIGGER review_date
    BEFORE INSERT OR UPDATE ON review
    FOR EACH ROW
    EXECUTE PROCEDURE check_review_date(); 

DROP FUNCTION IF EXISTS  check_rating_date  CASCADE;
CREATE FUNCTION check_rating_date() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT * FROM (SELECT * FROM rating 
        INNER JOIN movie ON movie.id = rating.movie
        WHERE NEW.movie = movie.id ) TMP where EXTRACT(YEAR FROM New.date) < year  ) THEN
            RAISE EXCEPTION 'A Movie cannot be rated before its official debut';
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;
 
 
CREATE TRIGGER rating_date
    BEFORE INSERT OR UPDATE ON rating
    FOR EACH ROW
    EXECUTE PROCEDURE check_rating_date();

DROP FUNCTION IF EXISTS  add_auto_notification_friend  CASCADE;
CREATE FUNCTION add_auto_notification_friend() RETURNS TRIGGER AS
$BODY$
BEGIN
    INSERT INTO "notifications" (recipient,friend_invite) VALUES (NEW.signed_user_id1,NEW.signed_user_id2);
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;
 
 
CREATE TRIGGER auto_notification_friend
    AFTER INSERT OR UPDATE ON friend
    FOR EACH ROW
    EXECUTE PROCEDURE add_auto_notification_friend(); 



DROP FUNCTION IF EXISTS  add_auto_notification_group CASCADE;
CREATE FUNCTION add_auto_notification_group() RETURNS TRIGGER AS
$BODY$
BEGIN
    INSERT INTO "notifications" (recipient,group_invite) VALUES (NEW.user_id,NEW.group_id);
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;
 
 
CREATE TRIGGER auto_notification_group
    AFTER INSERT OR UPDATE ON group_member
    FOR EACH ROW
    EXECUTE PROCEDURE add_auto_notification_group(); 

DROP FUNCTION IF EXISTS  check_friend  CASCADE;
CREATE FUNCTION check_friend() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT * FROM friend where friend.signed_user_id1 = NEW.signed_user_id2 and friend.signed_user_id2 = NEW.signed_user_id1) THEN
            RAISE EXCEPTION 'A Relationship already exists between these users';
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;
 
 
CREATE TRIGGER friend_relation
    BEFORE INSERT OR UPDATE ON friend
    FOR EACH ROW
    EXECUTE PROCEDURE check_friend();  

 DROP FUNCTION IF EXISTS  check_if_admin CASCADE;
CREATE FUNCTION check_if_admin() RETURNS TRIGGER AS
$BODY$
BEGIN
	IF NEW.reported_review IS NOT NULL AND EXISTS (SELECT * FROM signed_user WHERE NEW.recipient = signed_user.id AND signed_user.admin = false) THEN
            RAISE EXCEPTION 'Only Admin user can receive reported reviews notifications';
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;
 
 
CREATE TRIGGER is_admin
    BEFORE INSERT OR UPDATE ON notifications
    FOR EACH ROW
    EXECUTE PROCEDURE check_if_admin();

-----------------------------------------
-- INDEXES
-----------------------------------------

CREATE INDEX friend_right ON "friend" USING btree (signed_user_id2);

CREATE INDEX friend_left ON "friend" USING btree (signed_user_id1);

CREATE INDEX review_date ON "review" USING btree ("date");

CREATE INDEX search_user ON signed_user USING GIN (to_tsvector('english', name));

CREATE INDEX search_movie ON movie USING GIN (to_tsvector('english', title ));

CREATE INDEX search_group ON "group" USING GIN (to_tsvector('english', title));

