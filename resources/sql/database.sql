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
    description text,
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
    genre_id integer NOT NULL,
    movie_id integer NOT NULL,
    CONSTRAINT movie_genre_pkey PRIMARY KEY (genre_id, movie_id),
    CONSTRAINT genre_key FOREIGN KEY (genre_id)
        REFERENCES genre (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT movie_key FOREIGN KEY (movie_id)
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
    banned boolean NOT NULL DEFAULT false,
    CONSTRAINT signed_user_pkey PRIMARY KEY (id),
    CONSTRAINT email_unique UNIQUE (email),
    CONSTRAINT username_unique UNIQUE (username)
);

DROP TABLE IF EXISTS friend CASCADE;
CREATE TABLE friend --trigger
(   
    id serial NOT NULL,
    signed_user_id1 integer NOT NULL,
    signed_user_id2 integer NOT NULL,
    friendship_state state NOT NULL DEFAULT 'pending',
    CONSTRAINT friend_pkey PRIMARY KEY (id),
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
    id serial NOT NULL ,
    group_id integer NOT NULL,
    user_id integer NOT NULL,
    membership_state state NOT NULL DEFAULT 'pending',
    CONSTRAINT group_member_pkey PRIMARY KEY (id),
    CONSTRAINT group_member_group_fkey FOREIGN KEY (group_id)
        REFERENCES public."group" (id) MATCH SIMPLE
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT group_member_user_fkey FOREIGN KEY (user_id)
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
    group_id integer,
    movie_id integer NOT NULL,
    user_id integer NOT NULL,
    CONSTRAINT review_pkey PRIMARY KEY (id),
    CONSTRAINT review_group_movie_user_id_key UNIQUE (group_id, movie_id, user_id),
    CONSTRAINT review_user_id_fkey FOREIGN KEY (user_id)
        REFERENCES public.signed_user (id) MATCH SIMPLE
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT review_group_fkey FOREIGN KEY (group_id)
        REFERENCES public."group" (id) MATCH SIMPLE
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT review_movie_fkey FOREIGN KEY (movie_id)
        REFERENCES public.movie (id) MATCH SIMPLE
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

DROP TABLE IF EXISTS "like" CASCADE;
CREATE TABLE "like"
(
    user_id integer NOT NULL,
    review_id integer NOT NULL,
    CONSTRAINT like_pkey PRIMARY KEY (user_id, review_id),
    CONSTRAINT like_review_fkey FOREIGN KEY (review_id)
        REFERENCES public.review (id) MATCH SIMPLE
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT like_user_fkey FOREIGN KEY (user_id)
        REFERENCES public.signed_user (id) MATCH SIMPLE
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

DROP TABLE IF EXISTS comment CASCADE;
CREATE TABLE comment
(
    id serial NOT NULL ,
    text text NOT NULL,
    signed_user_id integer NOT NULL,
    review_id integer NOT NULL,
    date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT comment_pkey PRIMARY KEY (id),
    CONSTRAINT comment_user_id_fkey FOREIGN KEY (signed_user_id)
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
    movie_id integer NOT NULL,
    user_id integer NOT NULL,
    date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT rating_pkey PRIMARY KEY (id),
    CONSTRAINT rating_user_movie_key UNIQUE (user_id, movie_id),
    CONSTRAINT rating_movie_fkey FOREIGN KEY (movie_id)
        REFERENCES public.movie (id) MATCH SIMPLE
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT rating_user_fkey FOREIGN KEY (user_id)
        REFERENCES public.signed_user (id) MATCH SIMPLE
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT rating_rating_check CHECK (rating > 0 AND rating <= 10)
);

DROP TABLE IF EXISTS notification CASCADE;
CREATE TABLE notification
(
    id serial NOT NULL,
    date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    signed_user_id integer NOT NULL,
    group_id integer,
    friend_id integer,
    review_id integer,
    CONSTRAINT notification_pkey PRIMARY KEY (id),
    CONSTRAINT notification_friend_id_fkey FOREIGN KEY (friend_id)
        REFERENCES public.signed_user (id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT notification_group_id_fkey FOREIGN KEY (group_id)
        REFERENCES public."group" (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT notification_signed_user_id_fkey FOREIGN KEY (signed_user_id)
        REFERENCES public.signed_user (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT notification_review_id_fkey FOREIGN KEY (review_id)
        REFERENCES public.review (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT notification_check CHECK (group_id IS NULL AND friend_id IS NULL AND review_id IS NOT NULL OR group_id IS NULL AND friend_id IS NOT NULL AND review_id IS NULL OR group_id IS NOT NULL AND friend_id IS NULL AND review_id IS NULL) NOT VALID
);

DROP TABLE IF EXISTS report CASCADE;
CREATE TABLE report
(
    id serial NOT NULL,
    signed_user_id integer NOT NULL,
    review_id integer,
    CONSTRAINT report_pkey PRIMARY KEY (id),

    CONSTRAINT report_signed_user_id_fkey FOREIGN KEY (signed_user_id)
        REFERENCES public.signed_user (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT report_review_id_fkey FOREIGN KEY (review_id)
        REFERENCES public.review (id) 
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

-----------------------------------------
-- TRIGGERS
-----------------------------------------

DROP FUNCTION IF EXISTS  check_review_date  CASCADE;
CREATE FUNCTION check_review_date() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT * FROM (SELECT * FROM review 
        INNER JOIN movie ON movie.id = review.movie_id
        WHERE NEW.movie_id = movie.id ) TMP where EXTRACT(YEAR FROM NEW.date) < year  ) THEN
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
        INNER JOIN movie ON movie.id = rating.movie_id
        WHERE NEW.movie_id = movie.id ) TMP where EXTRACT(YEAR FROM New.date) < year  ) THEN
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
    INSERT INTO "notification" (signed_user_id,friend_id) VALUES (NEW.signed_user_id2,NEW.signed_user_id1);
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
    INSERT INTO "notification" (signed_user_id,group_id) VALUES (NEW.user_id,NEW.group_id);
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


-- CREATE FUNCTION check_if_admin() RETURNS TRIGGER AS
-- $BODY$
-- BEGIN
-- 	IF NEW.review_id IS NOT NULL AND EXISTS (SELECT * FROM signed_user WHERE NEW.signed_user_id = signed_user.id AND signed_user.admin = false) THEN
--             RAISE EXCEPTION 'Only Admin user can receive reported reviews notification';
--     END IF;
--     RETURN NEW;
-- END
-- $BODY$
-- LANGUAGE plpgsql;
 
 
-- CREATE TRIGGER is_admin
--     BEFORE INSERT OR UPDATE ON notification
--     FOR EACH ROW
--     EXECUTE PROCEDURE check_if_admin();

-----------------------------------------
-- INDEXES
-----------------------------------------

CREATE INDEX friend_right ON "friend" USING btree (signed_user_id2);

CREATE INDEX friend_left ON "friend" USING btree (signed_user_id1);

CREATE INDEX review_date ON "review" USING btree ("date");

CREATE INDEX search_user ON signed_user USING GIN (to_tsvector('english', name));

CREATE INDEX search_movie ON movie USING GIN (to_tsvector('english', title ));

CREATE INDEX search_group ON "group" USING GIN (to_tsvector('english', title));

