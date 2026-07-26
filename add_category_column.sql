-- Add category column to products table
-- Run this SQL query in phpMyAdmin or your database tool

ALTER TABLE `products` ADD `category` VARCHAR(50) NOT NULL DEFAULT 'other' AFTER `details`;

-- Update existing products if needed (optional)
-- UPDATE `products` SET `category` = 'laptop' WHERE name LIKE '%laptop%';
-- UPDATE `products` SET `category` = 'smartphone' WHERE name LIKE '%phone%' OR name LIKE '%smartphone%';

