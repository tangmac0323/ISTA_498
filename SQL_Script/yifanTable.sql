DROP DATABASE ISTA498;
CREATE DATABASE ISTA498;
USE ISTA498;

CREATE TABLE Customer (
	userName 	VARCHAR(50) 		NOT NULL,
	userID		INT AUTO_INCREMENT 	NOT NULL,
	hashpw		VARCHAR(80) 		NOT NULL,
	fullName 	VARCHAR(40) DEFAULT 'NA',
	email		VARCHAR(30) DEFAULT 'NA',
	address		VARCHAR(50) DEFAULT 'NA',
	telNo		INT(10) 	DEFAULT 0,	
	country		VARCHAR(20)	DEFAULT 'NA',
	PRIMARY KEY (userID, userName, hashpw)
);

CREATE TABLE Admininster (
	userName	VARCHAR(50) NOT NULL,
	hashpw		VARCHAR(80) NOT NULL,
	PRIMARY KEY	(userName, hashpw)
);

CREATE TABLE CustOrder (
	orderID		INT AUTO_INCREMENT NOT NULL,
	userID		INT,
	orderDate	DATE,	
	PRIMARY KEY (orderID),
	FOREIGN KEY (userID) REFERENCES Customer(userID)
);

CREATE TABLE ItemSold (
	itemID		VARCHAR(40) NOT NULL,
	orderID		VARCHAR(40) NOT NULL,
	quantity	INT DEFAULT 0,	
	PRIMARY KEY	(itemID, orderID)
);

CREATE TABLE ItemTagDescription (
	itemTag			VARCHAR(20) NOT NULL,
	itemDescription	VARCHAR(200) DEFAULT 'NA',	
	PRIMARY KEY (itemTag)
);

CREATE TABLE ItemInfo (
	itemID		INT AUTO_INCREMENT NOT NULL,
	category	VARCHAR(20),	
	itemColor	VARCHAR(20) DEFAULT 'NA',
	itemSize	VARCHAR(10) DEFAULT 'NA',
	itemPrice	FLOAT(10,4),	
	itemTag		VARCHAR(20),	
	PRIMARY KEY (itemID),
	FOREIGN KEY (itemTag) REFERENCES ItemTagDescription(itemTag)
);


CREATE TRIGGER SetOrderTimeStamp BEFORE INSERT ON CustOrder 
FOR EACH ROW
SET NEW.orderDate = NOW();