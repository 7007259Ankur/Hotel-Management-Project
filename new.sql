CREATE DATABASE IF NOT EXISTS HeavensParadise;
USE HeavensParadise;

-- Drop the user if it exists and create a new one
DROP USER IF EXISTS 'bluebird_user'@'%';
CREATE USER IF NOT EXISTS 'bluebird_user'@'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON HeavensParadise.* TO 'bluebird_user'@'%';

-- Create the emp_login table
CREATE TABLE IF NOT EXISTS emp_login (
  empid INT PRIMARY KEY AUTO_INCREMENT,
  Emp_Email VARCHAR(50) NOT NULL,
  Emp_Password VARCHAR(50) NOT NULL
);

-- Insert data into emp_login table
INSERT INTO emp_login (empid, Emp_Email, Emp_Password) 
VALUES (1, 'Admin@gmail.com', '1234')
ON DUPLICATE KEY UPDATE 
    Emp_Email = VALUES(Emp_Email),
    Emp_Password = VALUES(Emp_Password);

-- Create the signup table
CREATE TABLE IF NOT EXISTS signup (
  UserID INT PRIMARY KEY AUTO_INCREMENT,
  Username VARCHAR(50) NOT NULL,
  Email VARCHAR(50) NOT NULL,
  Password VARCHAR(50) NOT NULL
);

-- Insert data into signup table
INSERT INTO signup (UserID, Username, Email, Password) 
VALUES (1, 'Tushar Pankhaniya', 'tusharpankhaniya2202@gmail.com', '123')
ON DUPLICATE KEY UPDATE 
    Username = VALUES(Username),
    Email = VALUES(Email),
    Password = VALUES(Password);

-- Create the roombook table
CREATE TABLE IF NOT EXISTS roombook (
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
  FOREIGN KEY (UserID) REFERENCES signup(UserID),
  FOREIGN KEY (RoomID) REFERENCES room(RoomId)  -- Corrected foreign key reference
);

-- Create the room table
CREATE TABLE IF NOT EXISTS room (
  RoomId INT PRIMARY KEY AUTO_INCREMENT,
  Roomtype  VARCHAR(50) NOT NULL,
  bedding VARCHAR(50) NOT NULL,
  price DECIMAL(8,2)
);

-- Insert data into roombook table
INSERT INTO roombook (RoomID, Name, Email, Country, Phone, RoomType, Bed, Meal, NoofRoom, cin, cout, nodays, stat) 
VALUES (27, 'Tushar pankhaniya', 'pankhaniyatushar9@gmail.com', 'India', '9313346569', 'Single Room', 'Single', 'Room only', '1', '2022-11-09', '2022-11-10', 1, 'Confirm')
ON DUPLICATE KEY UPDATE 
    Name = VALUES(Name),
    Email = VALUES(Email),
    Country = VALUES(Country),
    Phone = VALUES(Phone),
    RoomType = VALUES(RoomType),
    Bed = VALUES(Bed),
    Meal = VALUES(Meal),
    NoofRoom = VALUES(NoofRoom),
    cin = VALUES(cin),
    cout = VALUES(cout),
    nodays = VALUES(nodays),
    stat = VALUES(stat);



-- Insert data into room table
INSERT INTO room (RoomId, bedding, Roomtype, price) 
VALUES 
(4, 'Superior Room', 'Single',1000),
(6, 'Superior Room', 'Triple',5000),
(7, 'Superior Room', 'Quad',2500),
(8, 'Deluxe Room', 'Single',3000),
(9, 'Deluxe Room', 'Double',3000),
(10, 'Deluxe Room', 'Triple',3000),
(11, 'Guest House', 'Single',2000),
(12, 'Guest House', 'Double',5000),
(13, 'Guest House', 'Triple',60000),
(14, 'Guest House', 'Quad',25000),
(16, 'Superior Room', 'Double',12500),
(20, 'Single Room', 'Single',11000),
(22, 'Superior Room', 'Single',23000),
(23, 'Deluxe Room', 'Single',39000),
(24, 'Deluxe Room', 'Triple',33000),
(27, 'Guest House', 'Double',26500),
(30, 'Deluxe Room', 'Single',27000)
ON DUPLICATE KEY UPDATE 
    bedding = VALUES(bedding),
    Roomtype = VALUES(Roomtype),
    price = VALUES(price);

-- Create the payment table
CREATE TABLE IF NOT EXISTS payment (
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

-- Insert data into payment table
INSERT INTO payment (id, Name, Email, RoomType, Bed, NoofRoom, cin, cout, noofdays, roomtotal, bedtotal, meal, mealtotal, finaltotal) 
VALUES 
(27, 'Tushar pankhaniya', 'pankhaniyatushar9@gmail.com', 'Single Room', 'Single', 1, '2022-11-09', '2022-11-10', 1, 1000.00, 10.00, 'Room only', 0.00, 1010.00)
ON DUPLICATE KEY UPDATE 
    Name = VALUES(Name),
    Email = VALUES(Email),
    RoomType = VALUES(RoomType),
    Bed = VALUES(Bed),
    NoofRoom = VALUES(NoofRoom),
    cin = VALUES(cin),
    cout = VALUES(cout),
    noofdays = VALUES(noofdays),
    roomtotal = VALUES(roomtotal),
    bedtotal = VALUES(bedtotal),
    meal = VALUES(meal),
    mealtotal = VALUES(mealtotal),
    finaltotal = VALUES(finaltotal);

-- Create the Service table
CREATE TABLE IF NOT EXISTS Service (
    ServiceID INT PRIMARY KEY,
    ServiceType VARCHAR(50)  
);

-- Drop the RoomService table if it exists
DROP TABLE IF EXISTS RoomService;

-- Create the RoomService table
CREATE TABLE IF NOT EXISTS RoomService (
    RoomId INT,
    ServiceID INT,
    FOREIGN KEY (RoomId) REFERENCES room(RoomId),
    FOREIGN KEY (ServiceID) REFERENCES Service(ServiceID),
    PRIMARY KEY (RoomId, ServiceID)
);

-- Insert data into Service table
INSERT INTO Service (ServiceID, ServiceType) 
VALUES 
(1, 'Room Cleaning'),
(2, 'Laundry'),
(3, 'Room Service'),
(4, 'Wi-Fi'),
(5, 'Shuttle Service'),
(6, 'Spa'),
(7, 'Restaurant'),
(8, 'Gym'),
(9, 'Concierge'),
(10, 'Business Center')
ON DUPLICATE KEY UPDATE 
    ServiceType = VALUES(ServiceType);

-- Insert data into RoomService table
INSERT INTO RoomService (RoomId, ServiceID) VALUES
(4, 1),   -- Assuming RoomId 4 exists in the room table
(6, 2),   -- Assuming RoomId 6 exists in the room table
(7, 3),   -- Assuming RoomId 7 exists in the room table
(8, 4),   -- Assuming RoomId 8 exists in the room table
(9, 5),   -- Assuming RoomId 9 exists in the room table
(10, 6),  -- Assuming RoomId 10 exists in the room table
(11, 7),  -- Assuming RoomId 11 exists in the room table
(12, 8),  -- Assuming RoomId 12 exists in the room table
(13, 9),  -- Assuming RoomId 13 exists in the room table
(14, 10); -- Assuming RoomId 14 exists in the room table

-- Show the list of tables in the database
SHOW TABLES;
