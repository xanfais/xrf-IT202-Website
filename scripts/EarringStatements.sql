/*
Xander Faison
10/26/2025
IT-202-005
Phase 2 Assignment: CRUD Categories and Items
xrf@njit.edu
*/
CREATE TABLE Earring (
EarringID               INT(11)        NOT NULL,
EarringCode             VARCHAR(10)    NOT NULL   UNIQUE,
EarringName             VARCHAR(255)   NOT NULL,
EarringDescription      TEXT           NOT NULL,
Material                TEXT           NOT NULL,
Diameter                INT(10)        NOT NULL,
EarringTypeID           INT(11)        NOT NULL,
EarringWholesalePrice   DECIMAL(10,2)  NOT NULL,
EarringListPrice        DECIMAL(10,2)  NOT NULL,
DateTimeCreated     TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
DateTimeUpdated     TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY ( EarringID )
);