CREATE DATABASE IF NOT EXISTS Dartu_student_registration;

USE Dartu_student_registration;

CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    gender VARCHAR(20) NOT NULL,
    course VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL
);