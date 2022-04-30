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