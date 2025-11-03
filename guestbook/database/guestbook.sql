
CREATE DATABASE IF NOT EXISTS ci_guestbook;
USE ci_guestbook;

CREATE TABLE IF NOT EXISTS guests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO guests (name, email, message) VALUES 
('Admin Test', 'admin@example.com', 'Pesan contoh untuk testing');