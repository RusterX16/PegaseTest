DROP DATABASE IF EXISTS pegasemarket;

CREATE DATABASE pegasemarket;

DROP TABLE IF EXISTS users;

CREATE TABLE IF NOT EXISTS users
(
    lastname VARCHAR(32),
    firstname VARCHAR(32),
    email VARCHAR(64),
    phone VARCHAR(10),
    timeslot DATETIME,
    reminder DATE,
    CONSTRAINT pk_users PRIMARY KEY (email),
    CONSTRAINT invalid_timeslot CHECK (timeslot >= CURRENT_TIMESTAMP),
    CONSTRAINT invalid_reminder CHECK (reminder >= CURRENT_DATE)
);

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