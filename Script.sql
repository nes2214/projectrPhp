-- ==============================
-- CREAR USUARIO Y PERMISOS
-- ==============================

-- Eliminar el usuario si ya existe
DROP USER IF EXISTS 'vet_user'@'localhost';

-- Crear el usuario
CREATE USER 'vet_user'@'localhost' IDENTIFIED BY 'vet_password';

-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS projecte CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Dar todos los permisos sobre la base de datos projecte
GRANT ALL PRIVILEGES ON projecte.* TO 'vet_user'@'localhost';

-- Aplicar los cambios
FLUSH PRIVILEGES;

-- Usar la base de datos
USE projecte;

-- ==============================
-- DROP TABLES
-- ==============================
DROP TABLE IF EXISTS linies_historial;
DROP TABLE IF EXISTS mascota;
DROP TABLE IF EXISTS propietari;

-- ==============================
-- CREATE TABLES
-- ==============================

-- Taula PROPIETARI
CREATE TABLE propietari (
    id INT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    mobil VARCHAR(20)
);

-- Taula MASCOTA
CREATE TABLE mascota (
    id INT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    propietari_id INT NOT NULL,
    CONSTRAINT fk_mascota_propietari
        FOREIGN KEY (propietari_id)
        REFERENCES propietari(id)
);

-- Taula LÍNIES DE HISTORIAL
CREATE TABLE linies_historial (
    id INT PRIMARY KEY,
    data DATE NOT NULL,
    motiu_visita VARCHAR(255),
    descripcio TEXT,
    mascota_id INT NOT NULL,
    CONSTRAINT fk_historial_mascota
        FOREIGN KEY (mascota_id)
        REFERENCES mascota(id)
);

-- ==============================
-- INSERT DATA
-- ==============================

-- Insertar propietaris
INSERT INTO propietari (id, nom, email, mobil) VALUES
(1, 'Joan García', 'joan.garcia@email.com', '666111222'),
(2, 'Maria López', 'maria.lopez@email.com', '666333444'),
(3, 'Pere Martínez', 'pere.martinez@email.com', '666555666'),
(4, 'Anna Sánchez', 'anna.sanchez@email.com', '666777888'),
(5, 'Carles Fernández', 'carles.fernandez@email.com', '666999000');

-- Insertar mascotes
INSERT INTO mascota (id, nom, propietari_id) VALUES
(1, 'Max', 1),
(2, 'Luna', 1),
(3, 'Toby', 2),
(4, 'Bella', 3),
(5, 'Rocky', 3),
(6, 'Coco', 4),
(7, 'Mia', 5);

-- Insertar línies d'historial
INSERT INTO linies_historial (id, data, motiu_visita, descripcio, mascota_id) VALUES
(1, '2024-01-15', 'Vacunació', 'Vacuna antiràbica anual', 1),
(2, '2024-02-20', 'Revisió general', 'Control de pes i estat general. Tot correcte.', 1),
(3, '2024-01-10', 'Desparasitació', 'Desparasitació interna i externa', 2),
(4, '2024-03-05', 'Consulta', 'Problemes digestius. Tractament prescrit.', 3),
(5, '2024-02-14', 'Vacunació', 'Vacuna polivalent', 4),
(6, '2024-01-25', 'Cirurgia', 'Esterilització. Tot correcte.', 5),
(7, '2024-03-12', 'Revisió post-operatòria', 'Evolució favorable després de cirurgia', 5),
(8, '2024-02-28', 'Neteja dental', 'Neteja dental profunda amb sedació', 6),
(9, '2024-01-18', 'Vacunació', 'Vacuna leucèmia felina', 7),
(10, '2024-03-01', 'Urgència', 'Intoxicació alimentària. Estabilitzat.', 3);

-- ==============================
-- VERIFICAR PERMISOS
-- ==============================
-- Para verificar que el usuario tiene permisos:
-- SHOW GRANTS FOR 'vet_user'@'localhost';