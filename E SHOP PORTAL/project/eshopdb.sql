-- E-Shop Portal Database Schema
-- Database Name: eshopdb

-- Create Database
CREATE DATABASE IF NOT EXISTS eshopdb;
USE eshopdb;

-- ============================================
-- Table: usermaster
-- Stores user information
-- ============================================
DROP TABLE IF EXISTS usermaster;
CREATE TABLE usermaster (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(100) NOT NULL,
    user_email VARCHAR(100) NOT NULL UNIQUE,
    user_pwd VARCHAR(100) NOT NULL,
    user_gender VARCHAR(10),
    user_mobile VARCHAR(20),
    user_dob DATE,
    role VARCHAR(20) DEFAULT 'client',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ============================================
-- Table: productmaster
-- Stores product information
-- ============================================
DROP TABLE IF EXISTS productmaster;
CREATE TABLE productmaster (
    pid INT PRIMARY KEY AUTO_INCREMENT,
    pname VARCHAR(100) NOT NULL,
    pprice DECIMAL(10,2) NOT NULL,
    ptype VARCHAR(50) NOT NULL,
    pimage VARCHAR(200),
    pdescription TEXT,
    pbrand VARCHAR(50),
    pstock INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ============================================
-- Table: ordermaster
-- Stores order information
-- ============================================
DROP TABLE IF EXISTS ordermaster;
CREATE TABLE ordermaster (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    order_date DATE NOT NULL,
    total_amount DECIMAL(10,2) NOT NULL,
    shipping_address TEXT,
    order_status VARCHAR(50) DEFAULT 'pending',
    payment_method VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES usermaster(user_id)
);

-- ============================================
-- Table: orderdetails
-- Stores order item details
-- ============================================
DROP TABLE IF EXISTS orderdetails;
CREATE TABLE orderdetails (
    order_detail_id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT NOT NULL,
    pid INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES ordermaster(order_id),
    FOREIGN KEY (pid) REFERENCES productmaster(pid)
);

-- ============================================
-- Table: querymaster
-- Stores customer queries and feedback
-- ============================================
DROP TABLE IF EXISTS querymaster;
CREATE TABLE querymaster (
    query_id INT PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(100),
    user_email VARCHAR(100),
    query_text TEXT NOT NULL,
    query_subject VARCHAR(100),
    query_date DATE,
    status VARCHAR(20) DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ============================================
-- Table: category
-- Stores product categories
-- ============================================
DROP TABLE IF EXISTS category;
CREATE TABLE category (
    category_id INT PRIMARY KEY AUTO_INCREMENT,
    category_name VARCHAR(50) NOT NULL,
    category_description VARCHAR(200),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ============================================
-- Sample Data: Categories
-- ============================================
INSERT INTO category (category_name, category_description) VALUES
('Mobile', 'Mobile phones and smartphones'),
('TV', 'Television and smart TVs'),
('Laptop', 'Laptops and notebooks'),
('Accessories', 'Electronic accessories');

-- ============================================
-- Sample Data: Users (Admin & Client)
-- ============================================
INSERT INTO usermaster (user_name, user_email, user_pwd, user_gender, user_mobile, user_dob, role) VALUES
('Admin User', 'admin@eshop.com', 'admin123', 'Male', '9876543210', '1990-01-01', 'Admin'),
('John Doe', 'john@example.com', 'john123', 'Male', '9876543211', '1995-05-15', 'client'),
('Jane Smith', 'jane@example.com', 'jane123', 'Female', '9876543212', '1998-08-20', 'client'),
('Bob Wilson', 'bob@example.com', 'bob123', 'Male', '9876543213', '1992-12-10', 'client');

-- ============================================
-- Sample Data: Products
-- ============================================
INSERT INTO productmaster (pname, pprice, ptype, pimage, pdescription, pbrand, pstock) VALUES
-- Mobile Products
('iPhone 15 Pro', 99999.00, 'mobile', 'PRODUCT/mobile1.jpg', 'Latest Apple iPhone with A17 chip', 'Apple', 50),
('Samsung Galaxy S24', 79999.00, 'mobile', 'PRODUCT/mobile2.jpg', 'Premium Android smartphone', 'Samsung', 45),
('OnePlus 12', 54999.00, 'mobile', 'PRODUCT/mobile3.jpg', 'Flagship killer smartphone', 'OnePlus', 40),
('Xiaomi Poco X5', 19999.00, 'mobile', 'PRODUCT/poco.jpg', 'Budget smartphone with great features', 'Xiaomi', 100),
('Vivo V30', 32999.00, 'mobile', 'PRODUCT/mobile4.jpg', 'Camera-focused smartphone', 'Vivo', 60),
('Realme GT 5', 28999.00, 'mobile', 'PRODUCT/mobile5.jpg', 'Performance-oriented phone', 'Realme', 75),

-- TV Products
('Sony Bravia 55 inch', 89999.00, 'tv', 'PRODUCT/tv1.jpg', '4K Smart LED TV', 'Sony', 20),
('Samsung QLED 65 inch', 129999.00, 'tv', 'PRODUCT/tv2.jpg', 'Premium QLED Smart TV', 'Samsung', 15),
('LG OLED 55 inch', 109999.00, 'tv', 'PRODUCT/tv3.jpg', 'OLED Smart TV with Dolby Vision', 'LG', 12),
('OnePlus Y1S Pro', 29999.00, 'tv', 'PRODUCT/tv5.jpg', 'Smart TV with Android TV', 'OnePlus', 30),
('Mi TV 5X 50 inch', 34999.00, 'tv', 'PRODUCT/tv6.jpg', '4K Smart TV with Dolby Audio', 'Xiaomi', 25);

-- ============================================
-- Sample Data: Orders
-- ============================================
INSERT INTO ordermaster (user_id, order_date, total_amount, shipping_address, order_status, payment_method) VALUES
(2, '2024-01-15', 99999.00, '123 Main St, Mumbai 400001', 'delivered', 'UPI'),
(3, '2024-01-20', 79999.00, '456 Oak Ave, Delhi 110001', 'delivered', 'Card'),
(2, '2024-02-01', 54999.00, '123 Main St, Mumbai 400001', 'shipped', 'UPI'),
(4, '2024-02-10', 29999.00, '789 Pine Rd, Bangalore 560001', 'pending', 'COD');

-- ============================================
-- Sample Data: Order Details
-- ============================================
INSERT INTO orderdetails (order_id, pid, quantity, price) VALUES
(1, 1, 1, 99999.00),
(2, 2, 1, 79999.00),
(3, 3, 1, 54999.00),
(4, 10, 1, 29999.00);

-- ============================================
-- Sample Data: Queries/Feedback
-- ============================================
INSERT INTO querymaster (user_name, user_email, query_text, query_subject, query_date, status) VALUES
('John Doe', 'john@example.com', 'I want to know about the warranty period for iPhone', 'Warranty Query', '2024-01-10', 'resolved'),
('Jane Smith', 'jane@example.com', 'Great shopping experience!', 'Feedback', '2024-01-12', 'resolved'),
('Bob Wilson', 'bob@example.com', 'When will OnePlus 12 be back in stock?', 'Stock Inquiry', '2024-02-05', 'pending'),
('Anonymous', 'anonymous@example.com', 'Can you provide discount for bulk orders?', 'Business Inquiry', '2024-02-08', 'pending');

-- ============================================
-- Query to verify data
-- ============================================
SELECT 'Users Table:' AS '';
SELECT * FROM usermaster;

SELECT 'Products Table:' AS '';
SELECT * FROM productmaster;

SELECT 'Orders Table:' AS '';
SELECT * FROM ordermaster;

SELECT 'Categories Table:' AS '';
SELECT * FROM category;

SELECT 'Queries Table:' AS '';
SELECT * FROM querymaster;
