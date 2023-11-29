-- Create Database
CREATE DATABASE IF NOT EXISTS appointment;
USE appointment;

-- Create Table
CREATE TABLE IF NOT EXISTS appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(100) NOT NULL,
    date DATE NOT NULL
);