-- sql/schema.sql
-- Run this in phpMyAdmin's SQL tab.

-- 1) Create a database
CREATE DATABASE IF NOT EXISTS login_tutorial
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

-- 2) Use the database
USE login_tutorial;

-- 3) Create a users table
CREATE TABLE IF NOT EXISTS users (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(190) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;


-- 4) Password reset tokens
CREATE TABLE IF NOT EXISTS password_resets (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT UNSIGNED NOT NULL,
  token VARCHAR(64) NOT NULL UNIQUE,
  expires_at DATETIME NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX (user_id),
  CONSTRAINT fk_resets_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;
