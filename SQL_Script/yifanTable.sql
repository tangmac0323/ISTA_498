DROP DATABASE ISTA498;
CREATE DATABASE ISTA498;
USE ISTA498;

CREATE TABLE Customer (
	userName 	VARCHAR(50) 		NOT NULL,
	userID		INT AUTO_INCREMENT 	NOT NULL,
	hashpw		VARCHAR(80) 		NOT NULL,
	fullName 	VARCHAR(40) DEFAULT 'N/A',
	email		VARCHAR(30) DEFAULT 'N/A',
	address		VARCHAR(50) DEFAULT 'N/A',
	telNo		VARCHAR(10) DEFAULT 'N/A',	
	stateName	VARCHAR(20)	DEFAULT 'N/A',
	PRIMARY KEY (userID, userName, hashpw)
);

CREATE TABLE Admininster (
	userName	VARCHAR(50) NOT NULL,
	hashpw		VARCHAR(80) NOT NULL,
	PRIMARY KEY	(userName, hashpw)
);

CREATE TABLE CustOrder (
	orderID		INT AUTO_INCREMENT NOT NULL,
	userName	VARCHAR(50) NOT NULL,
	orderDate	DATE,	
	PRIMARY KEY (orderID)
);

CREATE TABLE ItemSold (
	itemID		VARCHAR(40) NOT NULL,
	orderID		VARCHAR(40) NOT NULL,
	quantity	INT DEFAULT 0,	
	PRIMARY KEY	(itemID, orderID)
);

CREATE TABLE ItemTagDescription (
	itemTagName		VARCHAR(40) NOT NULL,
	itemDescription	VARCHAR(200) DEFAULT 'N/A',	
	category		VARCHAR(40) NOT NULL,
	itemPrice		FLOAT(10,2),		
	posterPath		VARCHAR(100) NOT NULL,
	PRIMARY KEY (itemTagName)
);

CREATE TABLE ItemInfo (
	itemID		INT AUTO_INCREMENT NOT NULL,	
	itemColor	VARCHAR(20) DEFAULT 'N/A',
	itemSize	VARCHAR(10) DEFAULT 'N/A',
	itemTagName	VARCHAR(40),	
	PRIMARY KEY (itemID),
	FOREIGN KEY (itemTagName) REFERENCES ItemTagDescription(itemTagName)
);


CREATE TABLE ShoppingCart (
	userName	VARCHAR(50) NOT NULL,
	itemID		INT NOT NULL,
	quantity	INT,
	PRIMARY KEY(userName)
);


CREATE TRIGGER SetOrderTimeStamp BEFORE INSERT ON CustOrder 
FOR EACH ROW
SET NEW.orderDate = NOW();