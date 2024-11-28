CREATE TABLE movies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL, -- Movie title
    category ENUM('THRILLER', 'DRAMA', 'ANIMATION', 'HORROR', 'COMEDY', 'MUSIC', 'ACTION', 'ROMANCE', 'ANIME') NOT NULL, -- Movie category
    thumbnail VARCHAR(255) NOT NULL, -- Path or URL for thumbnail
    video_url VARCHAR(255) NOT NULL, -- URL for trailer
    duration VARCHAR(20) NOT NULL, -- Movie duration
    date varchar(10) NOT NULL, -- Release year
    description TEXT NOT NULL, -- Movie description
    section	VARCHAR(50) NOT NULL -- Movie section
);
