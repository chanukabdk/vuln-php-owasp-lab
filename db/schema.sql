-- Create database
CREATE DATABASE IF NOT EXISTS vuln_app;

-- Use the database
USE vuln_app;

-- Users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(100),
    role VARCHAR(20),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Posts table
CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    title VARCHAR(255),
    content TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Insert test users
INSERT INTO users (username, password, role) VALUES 
('admin', 'admin123', 'admin'),
('user', 'user123', 'user');

-- Insert test posts
INSERT INTO posts (user_id, title, content) VALUES
(1, 'Welcome', 'Welcome to the vulnerable PHP lab'),
(2, 'Hello', '<script>alert("XSS")</script>');