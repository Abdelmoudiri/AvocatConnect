CREATE DATABASE AvocatConnect;
USE AvocatConnect;
DROP DATABASE AvocatConnect;

CREATE TABLE Role (
    id_role INT PRIMARY KEY AUTO_INCREMENT,
    role VARCHAR(50) NOT NULL
);

CREATE TABLE user (
    id_user INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    age INT,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    image VARCHAR(255),
    id_role INT,
    FOREIGN KEY (id_role) REFERENCES Role(id_role) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE avocat (
    id_avocat INT PRIMARY KEY AUTO_INCREMENT,
    specialite VARCHAR(100) NOT NULL,
    annee_exp DATE,
    bio TEXT,
    id_user INT UNIQUE, 
    FOREIGN KEY (id_user) REFERENCES user(id_user) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Disponibilite (
    id_dispo INT PRIMARY KEY AUTO_INCREMENT,
    id_avocat INT,  
    date_reserv DATE NOT NULL,
    is_disponible BOOLEAN NOT NULL DEFAULT TRUE,
    FOREIGN KEY (id_avocat) REFERENCES avocat(id_avocat) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Reservation (
    id_reser INT PRIMARY KEY AUTO_INCREMENT,
    id_client INT,
    id_avocat INT,
    date_res DATE NOT NULL,
    status VARCHAR(50),
    FOREIGN KEY (id_client) REFERENCES user(id_user) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_avocat) REFERENCES avocat(id_avocat) ON DELETE CASCADE ON UPDATE CASCADE
);


INSERT INTO Role (role) VALUES  
('Client'), 
('Avocat');

INSERT INTO user (nom, prenom, age, email, password, phone, id_role) VALUES 
('Dupont', 'Jean', 35, 'jean.dupont@example.com', 'password123', '0612345678', 1),
('Martin', 'Claire', 28, 'claire.martin@example.com', 'password456', '0678910111', 1),
('Durand', 'Sophie', 45, 'sophie.durand@example.com', 'password789', '0623456789', 2),
('Bernard', 'Paul', 50, 'paul.bernard@example.com', 'password101', '0698765432', 2);
 TRUNCATE TABLE user;

INSERT INTO avocat (specialite, annee_exp, bio, id_user) VALUES 
('Droit Civil', '2005-06-15', 'Spécialisé en droit civil depuis 15 ans.', 3),
('Droit Pénal', '2010-03-20', 'Expertise en affaires criminelles.', 4);

INSERT INTO Disponibilite (id_avocat, date_reserv, is_disponible) VALUES 
(1, '2024-12-18', TRUE),
(2, '2024-12-19', FALSE),
(1, '2024-12-20', FALSE),
(2, '2024-12-21', TRUE);

INSERT INTO Reservation (id_client, id_avocat, date_res, status) VALUES 
(1, 1, '2024-12-18', 'Confirmée'),
(2, 2, '2024-12-19', 'En attente'),
(1, 1, '2024-12-20', 'Annulée'),
(2, 2, '2024-12-21', 'Confirmée');


SELECT u.nom, u.prenom, u.image, a.specialite, YEAR(CURDATE()) - YEAR(a.annee_exp) AS experience, a.bio 
FROM avocat a JOIN user u 
ON a.id_user = u.id_user WHERE u.id_role = 2;