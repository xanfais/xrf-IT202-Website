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

INSERT INTO EarringTypes (EarringTypeID, EarringTypeCode, EarringTypeName, EarringStockNumber)
VALUES
(1, 'HT001', 'Hoop Earrings', 'HSN1001'),
(2, 'ST002', 'Stud Earrings', 'SSN2002'),
(3, 'DR003', 'Drop Earrings', 'DSN3003'),
(4, 'CH004', 'Chandelier Earrings', 'CSN4004'),
(5, 'CL005', 'Clip-On Earrings', 'CLSN5005');

SELECT * FROM EarringTypes;
SELECT * FROM EarringTypes JOIN Earring ON Earring.EarringTypeID = EarringTypes.EarringTypeID;