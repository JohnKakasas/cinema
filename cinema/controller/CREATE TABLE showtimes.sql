CREATE TABLE showtimes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    movie_id INT NOT NULL,
    show_date DATE NOT NULL,
    show_time TIME NOT NULL,
    total_seats INT NOT NULL,
    available_seats INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (movie_id) REFERENCES movies(id) ON DELETE CASCADE
);
