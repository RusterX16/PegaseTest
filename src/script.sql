DROP DATABASE IF EXISTS pegasemarket;

CREATE DATABASE pegasemarket;

DROP TABLE IF EXISTS requests;

CREATE TABLE IF NOT EXISTS requests
(
    email        VARCHAR(64),
    creationdate DATETIME DEFAULT NOW(),
    forname    VARCHAR(32) NOT NULL,
    lastname     VARCHAR(32) NOT NULL,
    phone        VARCHAR(10) NOT NULL,
    timeslot     DATETIME    NOT NULL,
    reminder     DATE        NOT NULL,
    CONSTRAINT pk_request PRIMARY KEY (email, creationdate),
    CONSTRAINT pk_valid_timeslot CHECK (timeslot >= CURRENT_DATE),
    CONSTRAINT pk_valid_reminder CHECK (reminder >= CURRENT_DATE)
);

DROP TABLE IF EXISTS timeslot;

CREATE TABLE IF NOT EXISTS timeslot
(
    start     TIME,
    end       TIME,
    label     VARCHAR(32) NOT NULL,
    activated BOOL        NOT NULL DEFAULT TRUE,
    CONSTRAINT pk_timeslot PRIMARY KEY (start, end)
);

INSERT INTO timeslot VALUES ('09:00:00', '11:00:00', 'Matin', TRUE);
INSERT INTO timeslot VALUES ('14:00:00', '16:00:00', 'Après-midi', TRUE);