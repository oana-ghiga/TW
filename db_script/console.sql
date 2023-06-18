-- 'users' table
CREATE TABLE users (
  user_id INT NOT NULL AUTO_INCREMENT,
  username VARCHAR(50) NOT NULL,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  PRIMARY KEY (user_id)
);

-- 'plants' table
CREATE TABLE plants (
  plant_id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  likes INT NOT NULL DEFAULT 0,
  plant_imagine LONGBLOB NOT NULL,
  PRIMARY KEY (plant_id)
);

-- 'tags' table
CREATE TABLE tags (
  tag_id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  PRIMARY KEY (tag_id)
);

-- 'plant_tags'
CREATE TABLE plant_tags (
  plant_id INT NOT NULL,
  tag_id INT NOT NULL,
  PRIMARY KEY (plant_id, tag_id),
  FOREIGN KEY (plant_id) REFERENCES plants(plant_id),
  FOREIGN KEY (tag_id) REFERENCES tags(tag_id)
);

-- 'albums' table
CREATE TABLE albums (
  album_id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  PRIMARY KEY (album_id)
);

-- 'album_tags' table linked albums and tags
CREATE TABLE album_tags (
  album_id INT NOT NULL,
  tag_id INT NOT NULL,
  PRIMARY KEY (album_id, tag_id),
  FOREIGN KEY (album_id) REFERENCES albums(album_id),
  FOREIGN KEY (tag_id) REFERENCES tags(tag_id)
);

-- 'album_plants' table linked to albums and plants
CREATE TABLE album_plants (
  album_id INT NOT NULL,
  plant_id INT NOT NULL,
  PRIMARY KEY (album_id, plant_id),
  FOREIGN KEY (album_id) REFERENCES albums(album_id),
  FOREIGN KEY (plant_id) REFERENCES plants(plant_id)
);

-- Users
INSERT INTO users (username, email, password) VALUES
('user1', 'user1@example.com', 'password1'),
('user2', 'user2@example.com', 'password2');

-- Plants
INSERT INTO plants (name, description, likes) VALUES
('Rose', 'comment1', 69),
('Lavender', 'comment2', 1000);

-- Tags
INSERT INTO tags (name) VALUES
('Flowers'),
('Yearly'),
('Herbs');

-- Plant tags
INSERT INTO plant_tags (plant_id, tag_id) VALUES
(2,1),
(1, 2),
(1,1),
(2, 2);

-- Albums
INSERT INTO albums (name) VALUES
('My Garden'),
('Medicinal Plants');

-- Album tags
INSERT INTO album_tags (album_id, tag_id) VALUES
(1, 1),
(1, 2),
(2, 1);

-- Album plants
INSERT INTO album_plants (album_id, plant_id) VALUES
(1, 1),
(2, 2);

-- Select all plants
SELECT * FROM plants;

