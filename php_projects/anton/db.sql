CREATE DATABASE register_db;
USE register_db;

CREATE TABLE users (
    userID int not null PRIMARY KEY,
    firstName varchar(100),
    lastName varchar(100),
    email varchar(100) not null,
    password varchar(100) not null,
    profileImage varchar(100),
    registerDate datetime
);

CREATE TABLE posts (
    postID int not null PRIMARY KEY,
    userID int not null,
    title varchar(100),
    description varchar(300),
    image varchar(100),
    postDate datetime,

    FOREIGN KEY userID REFERENCES users(userID)
);