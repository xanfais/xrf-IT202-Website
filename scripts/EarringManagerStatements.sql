/*
Xander Faison
10/12/2025
IT-202-005
Phase 1 Assignment: Login and Logout
xrf@njit.edu
*/
CREATE TABLE EarringManagers (
 EarringManagerID  INT(11)        NOT NULL   AUTO_INCREMENT,
 emailAddress        VARCHAR(255)   NOT NULL   UNIQUE,
 password            VARCHAR(64)    NOT NULL,
 pronouns            VARCHAR(60)    NOT NULL,
 firstName           VARCHAR(60)    NOT NULL,
 lastName            VARCHAR(60)    NOT NULL,
 DateTimeCreated     TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 DateTimeUpdated     TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 PRIMARY KEY (EarringManagerID)
);
INSERT INTO EarringManagers
(emailAddress, password, pronouns, firstName, lastName)
VALUES
('hudson@earringshop.com', SHA2('Siz3Tw3lv3', 256), 'He/Him', 'Hudson', 'Brown');
SELECT * FROM EarringManagers;

INSERT INTO EarringManagers
(emailAddress, password, pronouns, firstName, lastName)
VALUES
('darla@earringshop.com', SHA2('iluv34rrings', 256), 'She/Her', 'Darla', 'Thompson');
SELECT * FROM EarringManagers;

INSERT INTO EarringManagers
(emailAddress, password, pronouns, firstName, lastName)
VALUES
('michael@earringshop.com', SHA2('h00psorStuds', 256), 'He/Him', 'Michael', 'Johnson');
SELECT * FROM EarringManagers;





