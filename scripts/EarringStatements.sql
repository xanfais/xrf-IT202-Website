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

INSERT INTO Earring (EarringID, EarringCode, EarringName, EarringDescription, Material, Diameter, EarringTypeID, EarringWholesalePrice, EarringListPrice)
VALUES
(1, 'E001', 'Classic Hoop', 'A timeless classic hoop earring.', 'Gold', 30, 1, 50.00, 100.00),
(2, 'E002', 'Diamond Stud', 'Elegant diamond stud earrings.', 'Silver', 5, 2, 150.00, 300.00),
(3, 'E003', 'Pearl Drop', 'Sophisticated pearl drop earrings.', 'Pearl', 15, 3, 80.00, 160.00),
(4, 'E004', 'Crystal Chandelier', 'Sparkling crystal chandelier earrings.', 'Crystal', 40, 4, 120.00, 240.00),
(5, 'E005', 'Vintage Clip-On', 'Retro style clip-on earrings.', 'Brass', 25, 5, 30.00, 60.00);

SELECT * FROM Earring;