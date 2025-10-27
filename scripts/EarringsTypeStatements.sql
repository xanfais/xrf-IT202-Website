/*
Xander Faison
10/26/2025
IT-202-005
Phase 2 Assignment: CRUD Categories and Items
xrf@njit.edu
*/
CREATE TABLE EarringTypes (
EarringTypeID       INT(11)        NOT NULL,
EarringTypeCode     VARCHAR(255)   NOT NULL   UNIQUE,
EarringTypeName     VARCHAR(255)   NOT NULL,
EarringStockNumber  TEXT           NOT NULL,
DateTimeCreated     TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
DateTimeUpdated     TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY ( EarringTypeID )
);