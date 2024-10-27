-- Create the flight_booking database
CREATE DATABASE IF NOT EXISTS flight_booking;

-- Use the flight_booking database
USE flight_booking;

-- Create the Flights table
CREATE TABLE IF NOT EXISTS Flights (
    flight_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    flight_number VARCHAR(20) NOT NULL,
    airline VARCHAR(20) NOT NULL,
    departure_airport VARCHAR(50) NOT NULL,
    arrival_airport VARCHAR(50) NOT NULL,
    departure_time DATETIME NOT NULL,
    arrival_time DATETIME NOT NULL,
    duration INT NOT NULL,
    total_seats INT NOT NULL,
    available_seats INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);

-- Create the Classes table
CREATE TABLE IF NOT EXISTS Classes (
    class_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    class_type VARCHAR(20) NOT NULL
);

-- Insert class types
INSERT INTO `Classes` (`class_id`, `class_type`) VALUES (NULL, 'Economy'), (NULL, 'Business'), (NULL, 'First class');

-- Create the Customers table
CREATE TABLE IF NOT EXISTS Customers (
    user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(25) NOT NULL,
    phone_number VARCHAR(15) NOT NULL,
    first_name VARCHAR(25) NOT NULL,
    last_name VARCHAR(10) NOT NULL,
    password VARCHAR(25) NOT NULL
);

INSERT INTO Customers (username, phone_number, first_name, last_name, password) 
VALUES ('Pjadeja', '8758410477', 'Pushprajsinh', 'Jadeja', 'jadeja@123');

INSERT INTO Customers (username, phone_number, first_name, last_name, password) 
VALUES ('Varunrajsinh', '7777756985', 'Varunrajsinh', 'Jadeja', 'vjadeja');

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
    luggage_weight INT,
    status VARCHAR(20) DEFAULT 'approved',
    FOREIGN KEY (user_id) REFERENCES Customers(user_id),
    FOREIGN KEY (flight_id) REFERENCES Flights(flight_id),
    FOREIGN KEY (class_id) REFERENCES Classes(class_id)
);
