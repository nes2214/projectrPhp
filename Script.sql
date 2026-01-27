-- ==============================
-- MODEL RELACIONAL VETERINÀRIA
-- ==============================

-- DROP TABLES (en orden inverso por las foreign keys)
DROP TABLE IF EXISTS linies_historial;
DROP TABLE IF EXISTS mascota;
DROP TABLE IF EXISTS propietari;


CREATE USER "vet_user"@"localhost" IDENTIFIED BY "vet_password";
GRANT ALL PRIVILEGES ON *.* TO "vet_user"@"localhost";
-- ==============================
-- CREATE TABLES
-- ==============================

-- Taula PROPIETARI
-- Un propietari pot tenir moltes mascotes
CREATE TABLE propietari (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    mobil VARCHAR(20)
);

-- Taula MASCOTA
-- Cada mascota pertany a un únic propietari
CREATE TABLE mascota (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    propietari_id INT NOT NULL,
    CONSTRAINT fk_mascota_propietari
        FOREIGN KEY (propietari_id)
        REFERENCES propietari(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Taula LÍNIES DE HISTORIAL
-- Una mascota pot tenir moltes línies d'historial
CREATE TABLE linies_historial (
    id INT PRIMARY KEY AUTO_INCREMENT,
    data DATE NOT NULL,
    motiu_visita VARCHAR(255),
    descripcio TEXT,
    mascota_id INT NOT NULL,
    CONSTRAINT fk_historial_mascota
        FOREIGN KEY (mascota_id)
        REFERENCES mascota(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- ==============================
-- INSERT DATA
-- ==============================

-- Insertar propietaris
INSERT INTO propietari (nom, email, mobil) VALUES
('Joan García', 'joan.garcia@email.com', '666111222'),
('Maria López', 'maria.lopez@email.com', '666333444'),
('Pere Martínez', 'pere.martinez@email.com', '666555666'),
('Anna Sánchez', 'anna.sanchez@email.com', '666777888'),
('Carles Fernández', 'carles.fernandez@email.com', '666999000');

-- Insertar mascotes
INSERT INTO mascota (nom, propietari_id) VALUES
('Max', 1),
('Luna', 1),
('Toby', 2),
('Bella', 3),
('Rocky', 3),
('Coco', 4),
('Mia', 5);

-- Insertar línies d'historial
INSERT INTO linies_historial (data, motiu_visita, descripcio, mascota_id) VALUES
('2024-01-15', 'Vacunació', 'Vacuna antiràbica anual', 1),
('2024-02-20', 'Revisió general', 'Control de pes i estat general. Tot correcte.', 1),
('2024-01-10', 'Desparasitació', 'Desparasitació interna i externa', 2),
('2024-03-05', 'Consulta', 'Problemes digestius. Tractament prescrit.', 3),
('2024-02-14', 'Vacunació', 'Vacuna polivalent', 4),
('2024-01-25', 'Cirurgia', 'Esterilització. Tot correcte.', 5),
('2024-03-12', 'Revisió post-operatòria', 'Evolució favorable després de cirurgia', 5),
('2024-02-28', 'Neteja dental', 'Neteja dental profunda amb sedació', 6),
('2024-01-18', 'Vacunació', 'Vacuna leucèmia felina', 7),
('2024-03-01', 'Urgència', 'Intoxicació alimentària. Estabilitzat.', 3);