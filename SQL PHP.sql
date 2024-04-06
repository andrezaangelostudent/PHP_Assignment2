-- Set the environment
SET SQL_MODE = "STRICT_ALL_TABLES";
SET SQL_SAFE_UPDATES=0;

-- Drop existing database, if any, before creating it and then using it

DROP DATABASE IF EXISTS profile;
CREATE DATABASE profile;
USE profile;

-- Drop table by same name, if any exists, before creating it

DROP TABLE IF EXISTS candidates;

USE profile;
-- create the table and fields with the specifications
CREATE TABLE candidates (
name VARCHAR(60) NOT NULL ,
city VARCHAR(60) NOT NULL ,
work_field VARCHAR(60) NOT NULL ,
telephone VARCHAR(60) NOT NULL ,
email VARCHAR(60) NOT NULL ,
photo BLOB,
resume BLOB);

use profile;
SELECT * FROM candidates;



