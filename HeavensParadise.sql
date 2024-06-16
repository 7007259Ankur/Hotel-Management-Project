CREATE DATABASE IF NOT EXISTS HeavenParadise;
USE HeavenParadise;

DROP USER IF EXISTS 'bluebird_user'@'%';
CREATE USER IF NOT EXISTS 'bluebird_user'@'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON blueebirdhotel.* TO 'bluebird_user'@'%';

CREATE TABLE emp_login (
  empid INT PRIMARY KEY AUTO_INCREMENT,
  Emp_Email VARCHAR(50) NOT NULL,
  Emp_Password VARCHAR(50) NOT NULL
);

INSERT INTO emp_login (empid, Emp_Email, Emp_Password) VALUES
(1, 'Admin@gmail.com', '1234');


CREATE TABLE room (
  RoomId INT PRIMARY KEY AUTO_INCREMENT,
  type VARCHAR(50) NOT NULL,
  bedding VARCHAR(50) NOT NULL,
  price DECIMAL(8,2),
  FOREIGN KEY (RoomID) REFERENCES roombook(RoomID)
);

INSERT INTO room (id, type, bedding, price) VALUES
(4, 'Superior Room', 'Single'),
(6, 'Superior Room', 'Triple'),
(7, 'Superior Room', 'Quad'),
(8, 'Deluxe Room', 'Single'),
(9, 'Deluxe Room', 'Double'),
(10, 'Deluxe Room', 'Triple'),
(11, 'Guest House', 'Single'),
(12, 'Guest House', 'Double'),
(13, 'Guest House', 'Triple'),
(14, 'Guest House', 'Quad'),
(16, 'Superior Room', 'Double'),
(20, 'Single Room', 'Single'),
(22, 'Superior Room', 'Single'),
(23, 'Deluxe Room', 'Single'),
(24, 'Deluxe Room', 'Triple'),
(27, 'Guest House', 'Double'),
(30, 'Deluxe Room', 'Single');

CREATE TABLE roombook (
  RoomID INT PRIMARY KEY AUTO_INCREMENT,
  Name VARCHAR(50) NOT NULL,
  Email VARCHAR(50) NOT NULL,
  Country VARCHAR(30) NOT NULL,
  Phone VARCHAR(30) NOT NULL,
  RoomType VARCHAR(30) NOT NULL,
  Bed VARCHAR(30) NOT NULL,
  Meal VARCHAR(30) NOT NULL,
  NoofRoom VARCHAR(30) NOT NULL,
  cin DATE NOT NULL,
  cout DATE NOT NULL,
  nodays INT NOT NULL,
  stat VARCHAR(30) NOT NULL,
  UserID INT,
  FOREIGN KEY (UserID) REFERENCES signup(UserID)
);


INSERT INTO roombook (RoomID, Name, Email, Country, Phone, RoomType, Bed, Meal, NoofRoom, cin, cout, nodays, stat) VALUES
(41, 'Tushar pankhaniya', 'pankhaniyatushar9@gmail.com', 'India', '9313346569', 'Single Room', 'Single', 'Room only', '1', '2022-11-09', '2022-11-10', 1, 'Confirm');


CREATE TABLE signup (
  UserID INT PRIMARY KEY AUTO_INCREMENT,
  Username VARCHAR(50) NOT NULL,
  Email VARCHAR(50) NOT NULL,
  Password VARCHAR(50) NOT NULL
);

INSERT INTO signup (UserID, Username, Email, Password) VALUES
(1, 'Tushar Pankhaniya', 'tusharpankhaniya2202@gmail.com', '123');

DROP TABLE PAYMENT;
CREATE TABLE payment (
  id INT PRIMARY KEY AUTO_INCREMENT,
  Name VARCHAR(30) NOT NULL,
  Email VARCHAR(30) NOT NULL,
  RoomType VARCHAR(30) NOT NULL,
  Bed VARCHAR(30) NOT NULL,
  NoofRoom INT NOT NULL,
  cin DATE NOT NULL,
  cout DATE NOT NULL,
  noofdays INT NOT NULL,
  roomtotal DECIMAL(8,2) NOT NULL,
  bedtotal DECIMAL(8,2) NOT NULL,
  meal VARCHAR(30) NOT NULL,
  mealtotal DECIMAL(8,2) NOT NULL,
  finaltotal DECIMAL(8,2) NOT NULL,
  FOREIGN KEY (id) REFERENCES roombook(RoomID)
);

INSERT INTO payment (id, Name, Email, RoomType, Bed, NoofRoom, cin, cout, noofdays, roomtotal, bedtotal, meal, mealtotal, finaltotal) VALUES
(41, 'Tushar pankhaniya', 'pankhaniyatushar9@gmail.com', 'Single Room', 'Single', 1, '2022-11-09', '2022-11-10', 1, 1000.00, 10.00, 'Room only', 0.00, 1010.00);

CREATE TABLE Service (
    ServiceID INT  PRIMARY KEY,
    Type VARCHAR(50)  
);

CREATE TABLE RoomService (
    RoomId INT,
    ServiceID INT,
    FOREIGN KEY (RoomId) REFERENCES room(RoomId),
    FOREIGN KEY (ServiceID) REFERENCES Service(ServiceID),
    PRIMARY KEY (RoomId, ServiceID)
);
INSERT INTO Service (ServiceID, Type) VALUES
(1, 'Room Cleaning'),
(2, 'Laundry'),
(3, 'Room Service'),
(4, 'Wi-Fi'),
(5, 'Shuttle Service'),
(6, 'Spa'),
(7, 'Restaurant'),
(8, 'Gym'),
(9, 'Concierge'),
(10, 'Business Center');


INSERT INTO RoomService (RoomId, ServiceID) VALUES
(101, 1),
(102, 2),
(103, 3),
(201, 4),
(202, 5),
(203, 6),
(301, 7),
(302, 8),
(303, 9),
(401, 10);

