DROP DATABASE IF EXISTS eguraldia;
CREATE DATABASE eguraldia;
USE eguraldia;

CREATE TABLE herria (
    id INT PRIMARY KEY AUTO_INCREMENT,
    izena VARCHAR(100) NOT NULL
);

CREATE TABLE iragarpena (
    id INT PRIMARY KEY AUTO_INCREMENT,
    herria_id INT NOT NULL,
    eguna DATE NOT NULL,
    iragarpena_testua TEXT,
    eguraldia ENUM('oskarbi', 'hodei-gutxi', 'hodeitsua', 'euria', 'elurra') NOT NULL,
    tenperatura_minimoa DECIMAL(4, 1),
    tenperatura_maximoa DECIMAL(4, 1),
    FOREIGN KEY (herria_id) REFERENCES herria(id) ON DELETE CASCADE
);

CREATE TABLE iragarpena_orduko (
    id INT PRIMARY KEY AUTO_INCREMENT,
    iragarpena_id INT NOT NULL,
    ordua TIME NOT NULL,
    eguraldia ENUM('oskarbi', 'hodei-gutxi', 'hodeitsua', 'euria', 'elurra') NOT NULL,
    tenperatura DECIMAL(4, 1),
    prezipitazioa DECIMAL(4, 1),
    haizea_nondik VARCHAR(50),
    haizea_kmh INT,
    FOREIGN KEY (iragarpena_id) REFERENCES iragarpena(id) ON DELETE CASCADE
);

INSERT INTO herria (izena) VALUES ('Oiartzun');
INSERT INTO herria (izena) VALUES ('Errenteria');
INSERT INTO herria (izena) VALUES ('Lezo');
INSERT INTO iragarpena (herria_id, eguna, iragarpena_testua, eguraldia, tenperatura_minimoa, tenperatura_maximoa) VALUES (1, 2024-11-4, 'Gaur hodei gehiago agertuko dira eta Hegoaldeko haizearekin jarraituko dugu', 'hodeitsua', 22, 26);
INSERT INTO iragarpena (herria_id, eguna, iragarpena_testua, eguraldia, tenperatura_minimoa, tenperatura_maximoa)
VALUES (2, '2024-11-04', 'Goizean oskarbi, baina arratsaldean hodeiak sartuko dira. Haizea aldakorra', 'hodei-gutxi', 18, 23);

INSERT INTO iragarpena (herria_id, eguna, iragarpena_testua, eguraldia, tenperatura_minimoa, tenperatura_maximoa)
VALUES (2, '2024-11-05', 'Hodeitsua eta euri zaparrada motzak. Haizeak ipar-mendebaldetik joko du', 'hodeitsua', 17, 21);

INSERT INTO iragarpena (herria_id, eguna, iragarpena_testua, eguraldia, tenperatura_minimoa, tenperatura_maximoa)
VALUES (3, '2024-11-04', 'Oskarbi eta eguraldi argia, baina gauean hoztu egingo du', 'oskarbi', 15, 22);

INSERT INTO iragarpena_orduko (iragarpena_id, ordua, eguraldia, tenperatura, prezipitazioa, haizea_nondik, haizea_kmh) VALUES (1, 00:00, 'oskarbi', 20, 3, 'hego');
INSERT INTO iragarpena_orduko (iragarpena_id, ordua, eguraldia, tenperatura, prezipitazioa, haizea_nondik, haizea_kmh)
VALUES (1, '06:00', 'hodeitsua', 18, 1, 'hego-ekialde', 10);

INSERT INTO iragarpena_orduko (iragarpena_id, ordua, eguraldia, tenperatura, prezipitazioa, haizea_nondik, haizea_kmh)
VALUES (2, '12:00', 'euria', 21, 5, 'ipar', 20);

INSERT INTO iragarpena_orduko (iragarpena_id, ordua, eguraldia, tenperatura, prezipitazioa, haizea_nondik, haizea_kmh)
VALUES (2, '18:00', 'hodeitsua', 19, 2, 'mendebalde', 18);
