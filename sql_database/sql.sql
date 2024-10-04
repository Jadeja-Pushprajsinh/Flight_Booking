-- Create the flight_booking database
CREATE DATABASE IF NOT EXISTS flight_booking;

-- Use the flight_booking database
USE flight_booking;

-- Create the Flights table
CREATE TABLE IF NOT EXISTS Flights (
    flight_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    flight_number VARCHAR(20) NOT NULL,
    airline VARCHAR(50) NOT NULL,
    departure_airport VARCHAR(50) NOT NULL,
    arrival_airport VARCHAR(50) NOT NULL,
    departure_time DATETIME NOT NULL,
    arrival_time DATETIME NOT NULL,
    duration INT NOT NULL,
    total_seats INT NOT NULL,
    available_seats INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);
INSERT INTO `flights` (`flight_id`, `flight_number`, `airline`, `departure_airport`, `arrival_airport`, `departure_time`, `arrival_time`, `duration`, `total_seats`, `available_seats`, `price`) 
VALUES (NULL, 'F101', 'Indigo', 'Jamnagar', 'Mumbai', '2024-09-25 08:00:00', '2024-09-25 10:30:00', '150', '180', '120', '6000.00'),
(NULL, 'F102', 'Indigo', 'Mumbai', 'Delhi', '2024-09-25 08:00:00', '2024-09-25 10:30:00', '150', '180', '120', '6000.00'),
(NULL, 'F103', 'SpiceJet', 'Bangalore', 'Kolkata', '2024-09-26 14:00:00', '2024-09-26 17:00:00', '180', '200', '150', '7000.00'),
(NULL, 'F104', 'Air India', 'Jamnagar', 'Hyderabad', '2024-09-28 16:30:00', '2024-09-28 19:15:00', '165', '150', '100', '5500.00'),
(NULL, 'F105', 'GoAir', 'Chennai', 'Mumbai', '2024-10-01 18:00:00', '2024-10-01 20:30:00', '150', '180', '140', '6500.00'),
(NULL, 'F106', 'Vistara', 'Delhi', 'Pune', '2024-10-03 09:00:00', '2024-10-03 11:45:00', '165', '160', '120', '7500.00'),
(NULL, 'F107', 'Indigo', 'Jamnagar', 'Delhi', '2024-10-05 12:45:00', '2024-10-05 14:30:00', '105', '150', '120', '5000.00'),
(NULL, 'F108', 'SpiceJet', 'Hyderabad', 'Bangalore', '2024-10-08 06:00:00', '2024-10-08 07:30:00', '90', '200', '180', '4500.00'),
(NULL, 'F109', 'Air India', 'Mumbai', 'Kolkata', '2024-10-10 13:00:00', '2024-10-10 16:00:00', '180', '180', '150', '8000.00'),
(NULL, 'F110', 'GoAir', 'Jamnagar', 'Chennai', '2024-10-12 17:00:00', '2024-10-12 20:30:00', '210', '160', '140', '9000.00'),
(NULL, 'F111', 'Vistara', 'Bangalore', 'Delhi', '2024-10-15 11:00:00', '2024-10-15 13:30:00', '150', '180', '150', '7000.00'),
(NULL, 'F112', 'Indigo', 'Pune', 'Hyderabad', '2024-10-17 07:00:00', '2024-10-17 08:30:00', '90', '200', '180', '5500.00'),
(NULL, 'F113', 'SpiceJet', 'Delhi', 'Mumbai', '2024-10-20 20:00:00', '2024-10-20 22:30:00', '150', '180', '160', '8000.00'),
(NULL, 'F114', 'Air India', 'Jamnagar', 'Bangalore', '2024-10-23 09:30:00', '2024-10-23 12:00:00', '150', '150', '120', '6000.00'),
(NULL, 'F115', 'GoAir', 'Kolkata', 'Delhi', '2024-10-25 16:00:00', '2024-10-25 19:00:00', '180', '180', '130', '7500.00'),
(NULL, 'F116', 'Vistara', 'Mumbai', 'Chennai', '2024-10-28 12:30:00', '2024-10-28 14:45:00', '135', '160', '140', '6500.00'),
(NULL, 'F117', 'Indigo', 'Jamnagar', 'Kolkata', '2024-10-30 10:00:00', '2024-10-30 13:30:00', '210', '200', '150', '8500.00'),
(NULL, 'F118', 'SpiceJet', 'Hyderabad', 'Delhi', '2024-11-02 06:00:00', '2024-11-02 08:30:00', '150', '180', '160', '6500.00'),
(NULL, 'F119', 'Air India', 'Bangalore', 'Mumbai', '2024-11-05 15:00:00', '2024-11-05 17:30:00', '150', '200', '180', '7500.00'),
(NULL, 'F120', 'GoAir', 'Jamnagar', 'Pune', '2024-11-07 19:00:00', '2024-11-07 21:30:00', '150', '160', '140', '6800.00'),
(NULL, 'F121', 'Vistara', 'Chennai', 'Delhi', '2024-11-10 18:30:00', '2024-11-10 21:00:00', '150', '180', '150', '8200.00'),
(NULL, 'F122', 'Indigo', 'Mumbai', 'Bangalore', '2024-11-12 08:00:00', '2024-11-12 10:30:00', '150', '180', '120', '6000.00'),
(NULL, 'F123', 'SpiceJet', 'Jamnagar', 'Hyderabad', '2024-11-15 14:30:00', '2024-11-15 17:15:00', '165', '150', '100', '5900.00'),
(NULL, 'F124', 'Air India', 'Delhi', 'Pune', '2024-11-18 10:00:00', '2024-11-18 12:30:00', '150', '180', '150', '7100.00'),
(NULL, 'F125', 'GoAir', 'Bangalore', 'Chennai', '2024-11-20 09:00:00', '2024-11-20 10:30:00', '90', '160', '140', '4300.00'),
(NULL, 'F126', 'Vistara', 'Kolkata', 'Hyderabad', '2024-11-23 12:00:00', '2024-11-23 15:00:00', '180', '180', '150', '7000.00'),
(NULL, 'F127', 'Indigo', 'Jamnagar', 'Mumbai', '2024-11-26 11:00:00', '2024-11-26 12:15:00', '75', '120', '90', '7900.00'),
(NULL, 'F128', 'SpiceJet', 'Delhi', 'Chennai', '2024-11-28 20:00:00', '2024-11-28 22:30:00', '150', '180', '160', '8300.00'),
(NULL, 'F129', 'Air India', 'Mumbai', 'Delhi', '2024-09-25 10:00:00', '2024-09-25 12:30:00', '180', '180', '120', '6100.00'),
(NULL, 'F130', 'GoAir', 'Mumbai', 'Delhi', '2024-09-25 16:00:00', '2024-09-25 18:30:00', '150', '180', '130', '6200.00'),
(NULL, 'F131', 'Indigo', 'Bangalore', 'Kolkata', '2024-09-26 16:00:00', '2024-09-26 19:00:00', '120', '200', '150', '7200.00'),
(NULL, 'F132', 'SpiceJet', 'Bangalore', 'Kolkata', '2024-09-26 18:00:00', '2024-09-26 21:00:00', '180', '180', '140', '7100.00'),
(NULL, 'F133', 'Air India', 'Jamnagar', 'Hyderabad', '2024-09-28 18:00:00', '2024-09-28 20:45:00', '165', '150', '120', '5800.00'),
(NULL, 'F134', 'GoAir', 'Chennai', 'Mumbai', '2024-10-01 19:00:00', '2024-10-01 21:15:00', '135', '160', '140', '6700.00'),
(NULL, 'F135', 'Vistara', 'Delhi', 'Pune', '2024-10-03 06:00:00', '2024-10-03 08:30:00', '150', '180', '120', '7900.00'),
(NULL, 'F136', 'Indigo', 'Jamnagar', 'Delhi', '2024-10-05 10:30:00', '2024-10-05 12:00:00', '90', '150', '120', '5200.00'),
(NULL, 'F137', 'SpiceJet', 'Hyderabad', 'Bangalore', '2024-10-08 18:00:00', '2024-10-08 20:30:00', '150', '180', '140', '4600.00'),
(NULL, 'F138', 'Air India', 'Mumbai', 'Kolkata', '2024-10-10 14:00:00', '2024-10-10 16:30:00', '150', '160', '140', '8200.00'),
(NULL, 'F139', 'GoAir', 'Delhi', 'Jamnagar', '2024-10-12 12:00:00', '2024-10-12 14:15:00', '135', '160', '140', '5900.00'),
(NULL, 'F140', 'Vistara', 'Bangalore', 'Delhi', '2024-10-15 16:00:00', '2024-10-15 18:30:00', '150', '180', '120', '7900.00'),
(NULL, 'F141', 'Indigo', 'Pune', 'Hyderabad', '2024-10-17 07:00:00', '2024-10-17 08:30:00', '90', '200', '180', '5400.00'),
(NULL, 'F142', 'SpiceJet', 'Delhi', 'Mumbai', '2024-10-20 16:30:00', '2024-10-20 19:00:00', '150', '180', '160', '8100.00'),
(NULL, 'F143', 'Air India', 'Jamnagar', 'Bangalore', '2024-10-23 10:30:00', '2024-10-23 12:00:00', '90', '150', '120', '5800.00'),
(NULL, 'F144', 'GoAir', 'Kolkata', 'Delhi', '2024-10-25 18:00:00', '2024-10-25 20:00:00', '120', '180', '140', '7800.00'),
(NULL, 'F145', 'Vistara', 'Mumbai', 'Chennai', '2024-10-28 14:30:00', '2024-10-28 16:45:00', '135', '160', '140', '6500.00'),
(NULL, 'F146', 'Indigo', 'Jamnagar', 'Kolkata', '2024-10-30 09:00:00', '2024-10-30 11:15:00', '135', '200', '180', '8100.00'),
(NULL, 'F147', 'SpiceJet', 'Hyderabad', 'Delhi', '2024-11-02 18:00:00', '2024-11-02 20:00:00', '120', '180', '140', '6700.00'),
(NULL, 'F148', 'Air India', 'Bangalore', 'Mumbai', '2024-11-05 12:00:00', '2024-11-05 14:30:00', '150', '200', '160', '7500.00'),
(NULL, 'F149', 'GoAir', 'Jamnagar', 'Pune', '2024-11-07 11:30:00', '2024-11-07 13:30:00', '120', '150', '100', '6000.00'),
(NULL, 'F150', 'Vistara', 'Chennai', 'Delhi', '2024-11-10 20:00:00', '2024-11-10 22:30:00', '150', '180', '150', '8000.00'),
(NULL, 'F151', 'Indigo', 'Mumbai', 'Bangalore', '2024-11-12 08:30:00', '2024-11-12 10:30:00', '120', '160', '140', '6200.00'),
(NULL, 'F152', 'SpiceJet', 'Jamnagar', 'Hyderabad', '2024-11-15 17:00:00', '2024-11-15 19:30:00', '150', '150', '110', '5800.00'),
(NULL, 'F153', 'Air India', 'Delhi', 'Pune', '2024-11-18 09:00:00', '2024-11-18 11:30:00', '150', '180', '150', '7100.00'),
(NULL, 'F154', 'GoAir', 'Bangalore', 'Chennai', '2024-11-20 07:00:00', '2024-11-20 09:00:00', '120', '160', '130', '4600.00'),
(NULL, 'F155', 'Vistara', 'Kolkata', 'Hyderabad', '2024-11-23 16:30:00', '2024-11-23 19:00:00', '150', '180', '150', '7000.00'),
(NULL, 'F156', 'Indigo', 'Jamnagar', 'Mumbai', '2024-11-26 10:00:00', '2024-11-26 12:15:00', '135', '120', '90', '7900.00'),
INSERT INTO flights VALUES (NULL, 'F102', 'Indigo', 'Mumbai', 'Delhi', '2024-10-10 08:00:00', '2024-10-10 10:30:00', '150', '180', '120', '6000.00');
INSERT INTO flights VALUES (NULL, 'F103', 'Indigo', 'Mumbai', 'Delhi', '2024-10-12 09:00:00', '2024-10-12 11:30:00', '150', '180', '120', '5800.00');
INSERT INTO flights VALUES (NULL, 'F104', 'SpiceJet', 'Mumbai', 'Delhi', '2024-10-15 07:00:00', '2024-10-15 09:30:00', '150', '180', '120', '6200.00');
INSERT INTO flights VALUES (NULL, 'F105', 'Air India', 'Mumbai', 'Delhi', '2024-10-20 08:30:00', '2024-10-20 11:00:00', '150', '180', '120', '6400.00');
INSERT INTO flights VALUES (NULL, 'F106', 'Vistara', 'Mumbai', 'Delhi', '2024-10-25 06:30:00', '2024-10-25 09:00:00', '150', '180', '120', '6500.00');
INSERT INTO flights VALUES (NULL, 'F301', 'Indigo', 'Jamnagar', 'Delhi', '2024-10-11 09:00:00', '2024-10-11 11:30:00', '150', '180', '160', '7000.00');
INSERT INTO flights VALUES (NULL, 'F302', 'SpiceJet', 'Jamnagar', 'Delhi', '2024-10-14 10:00:00', '2024-10-14 12:30:00', '150', '180', '160', '7100.00');
INSERT INTO flights VALUES (NULL, 'F303', 'Air India', 'Jamnagar', 'Delhi', '2024-10-17 11:00:00', '2024-10-17 13:30:00', '150', '180', '160', '7200.00');
INSERT INTO flights VALUES (NULL, 'F304', 'Vistara', 'Jamnagar', 'Delhi', '2024-10-20 12:00:00', '2024-10-20 14:30:00', '150', '180', '160', '7300.00');
INSERT INTO flights VALUES (NULL, 'F305', 'Indigo', 'Jamnagar', 'Delhi', '2024-10-25 13:00:00', '2024-10-25 15:30:00', '150', '180', '160', '7500.00');
INSERT INTO flights VALUES (NULL, 'F201', 'Indigo', 'Jamnagar', 'Mumbai', '2024-10-10 12:00:00', '2024-10-10 13:30:00', '90', '150', '140', '3000.00');
INSERT INTO flights VALUES (NULL, 'F202', 'SpiceJet', 'Jamnagar', 'Mumbai', '2024-10-13 13:00:00', '2024-10-13 14:30:00', '90', '150', '140', '3100.00');
INSERT INTO flights VALUES (NULL, 'F203', 'Air India', 'Jamnagar', 'Mumbai', '2024-10-18 14:00:00', '2024-10-18 15:30:00', '90', '150', '140', '3200.00');
INSERT INTO flights VALUES (NULL, 'F204', 'Vistara', 'Jamnagar', 'Mumbai', '2024-10-22 15:30:00', '2024-10-22 17:00:00', '90', '150', '140', '3300.00');
INSERT INTO flights VALUES (NULL, 'F205', 'Indigo', 'Jamnagar', 'Mumbai', '2024-10-28 16:00:00', '2024-10-28 17:30:00', '90', '150', '140', '3500.00');


-- Create the Classes table
CREATE TABLE IF NOT EXISTS Classes (
    class_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    class_type VARCHAR(20) NOT NULL
);

INSERT INTO `classes` (`class_id`, `class_type`) VALUES (NULL, 'economy'), (NULL, 'bussiness'), (NULL, 'first class');

-- Create the Customers table
CREATE TABLE IF NOT EXISTS Customers (
    user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    phone_number VARCHAR(15) NOT NULL,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    password VARCHAR(25) NOT NULL,
    plane_id VARCHAR(20),
    class_id INT(6) UNSIGNED,
    FOREIGN KEY (class_id) REFERENCES Classes(class_id)
);

-- Create the Bookings table
CREATE TABLE IF NOT EXISTS Bookings (
    booking_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    flight_id INT(6) UNSIGNED,
    class_id INT(6) UNSIGNED,
    booking_date DATETIME NOT NULL,
    total_price DECIMAL(10, 2) NOT NULL,
    payment_method VARCHAR(50) NOT NULL,
    quantity INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES Customers(user_id),
    FOREIGN KEY (flight_id) REFERENCES Flights(flight_id),
    FOREIGN KEY (class_id) REFERENCES Classes(class_id)
);

-- Create the Luggage table
CREATE TABLE IF NOT EXISTS Luggage (
    luggage_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    booking_id INT(6) UNSIGNED,
    weight DECIMAL(5, 2) NOT NULL,
    FOREIGN KEY (booking_id) REFERENCES Bookings(booking_id)
);
