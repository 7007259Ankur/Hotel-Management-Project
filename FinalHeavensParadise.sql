CREATE DATABASE IF NOT EXISTS TheHeavenParadise;

DROP USER IF EXISTS 'bluebird_user'@'%';
CREATE USER IF NOT EXISTS 'bluebird_user'@'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON TheHeavenParadise.* TO 'bluebird_user'@'%';

USE TheHeavenParadise;


-- DROP TABLE ROOM;
CREATE TABLE IF NOT EXISTS room (
  RoomId INT PRIMARY KEY AUTO_INCREMENT,
  Roomtype VARCHAR(50) NOT NULL,
  bedding VARCHAR(50) NOT NULL,
  price DECIMAL(8,2)
);

INSERT INTO room (Roomtype, bedding, price) VALUES
('Superior Room', 'Single', 1000.00),
('Superior Room', 'Triple', 5000.00),
('Superior Room', 'Quad', 2500.00),
('Deluxe Room', 'Single', 3000.00),
('Deluxe Room', 'Double', 3000.00),
('Deluxe Room', 'Triple', 3000.00),
('Guest House', 'Single', 2000.00),
('Guest House', 'Double', 5000.00),
('Guest House', 'Triple', 60000.00),
('Guest House', 'Quad', 25000.00),
('Superior Room', 'Double', 12500.00),
('Single Room', 'Single', 11000.00),
('Superior Room', 'Single', 23000.00),
('Deluxe Room', 'Single', 39000.00),
('Deluxe Room', 'Triple', 33000.00),
('Guest House', 'Double', 26500.00),
('Deluxe Room', 'Single', 27000.00);

CREATE TABLE IF NOT EXISTS emp_login (
  empid INT PRIMARY KEY AUTO_INCREMENT,
  Emp_Email VARCHAR(50) NOT NULL,
  Emp_Password VARCHAR(50) NOT NULL
);



INSERT INTO emp_login (empid, Emp_Email, Emp_Password) VALUES
(1, 'Admin@gmail.com', '1234');

CREATE TABLE IF NOT EXISTS signup (
  UserID INT PRIMARY KEY AUTO_INCREMENT,
  Username VARCHAR(50) NOT NULL,
  Email VARCHAR(50) NOT NULL,
  Password VARCHAR(50) NOT NULL
);

INSERT INTO signup (UserID, Username, Email, Password) VALUES
(1, 'Tushar Pankhaniya', 'tusharpankhaniya2202@gmail.com', '123');

-- DROP TABLE roombook;
-- DROP TABLE signup;
CREATE TABLE  roombook (
  RoomID INT PRIMARY KEY AUTO_INCREMENT,
  Name VARCHAR(50) NOT NULL,
  Email VARCHAR(50) NOT NULL,
  City VARCHAR(30) NOT NULL,
  Phone VARCHAR(30) NOT NULL,
  RoomType VARCHAR(30) NOT NULL,
  Bed VARCHAR(30) NOT NULL,
  Meal VARCHAR(30) NOT NULL,
  NoofRoom VARCHAR(30) NOT NULL,
  Roomservice VARCHAR(30) NOT NULL,
  cin DATE NOT NULL,
  cout DATE NOT NULL,
  nodays INT NOT NULL,
  stat VARCHAR(30) NOT NULL,
  UserID INT,
  FOREIGN KEY (UserID) REFERENCES signup(UserID),
  FOREIGN KEY (RoomID) REFERENCES room(RoomId)
);

INSERT INTO roombook (RoomID, Name, Email, City, Phone, RoomType, Bed, Meal, NoofRoom, Roomservice, cin, cout, nodays, stat ,UserId) VALUES
(1, 'Amit', 'Amit9@gmail.com', 'MUmbai', '9313346569', 'Single Room', 'Single', 'Room only', '1', '	Laundry', '2022-11-09', '2022-11-10', 1, 'Confirm',1);



-- DROP TABLE payment;
 
CREATE TABLE IF NOT EXISTS payment (
  RoomID INT PRIMARY KEY,
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
  FOREIGN KEY (RoomID) REFERENCES roombook(RoomID)
);

INSERT INTO payment (RoomID, Name, Email, RoomType, Bed, NoofRoom, cin, cout, noofdays, roomtotal, bedtotal, meal, mealtotal, finaltotal) VALUES
(1, 'Tushar pankhaniya', 'pankhaniyatushar9@gmail.com', 'Single Room', 'Single', 1, '2022-11-09', '2022-11-10', 1, 1000.00, 10.00, 'Room only', 0.00, 1010.00);

CREATE TABLE IF NOT EXISTS Service (
    ServiceID INT PRIMARY KEY,
    ServiceType VARCHAR(50)  
);
-- DROP TABLE RoomService;
CREATE TABLE IF NOT EXISTS RoomService (
    RoomId INT,
    ServiceID INT,
    FOREIGN KEY (RoomId) REFERENCES room(RoomId),
    FOREIGN KEY (ServiceID) REFERENCES Service(ServiceID),
    PRIMARY KEY (RoomId, ServiceID)
);

INSERT INTO Service (ServiceID, ServiceType) VALUES
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
(1, 1);

