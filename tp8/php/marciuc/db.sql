CREATE DATABASE IF NOT EXISTS `emagazin`;

USE `emagazin`;

CREATE TABLE IF NOT EXISTS `emagazin`.`cumparatori` (
    `id_cumparator` int NOT NULL AUTO_INCREMENT,
    `nume` varchar(255) NOT NULL,
    `adresa` varchar(255) NOT NULL,
    `oras` varchar(255) NOT NULL,
    `tara` varchar(255) NOT NULL,
    `cod_postal` varchar(255) NOT NULL,

    PRIMARY KEY (`id_cumparator`) 
);

CREATE TABLE IF NOT EXISTS `emagazin`.`vanzatori` (
    `id_vanzator` int NOT NULL AUTO_INCREMENT,
    `nume` varchar(255) NOT NULL,
    `adresa` varchar(255) NOT NULL,
    `oras` varchar(255) NOT NULL,
    `tara` varchar(255) NOT NULL,
    `cod_postal` varchar(255) NOT NULL,

    PRIMARY KEY (`id_vanzator`) 
);

CREATE TABLE IF NOT EXISTS `emagazin`.`articole` (
    `id_articol` int NOT NULL AUTO_INCREMENT,
    `nume` varchar(255) NOT NULL,
    `pret` varchar(255) NOT NULL,
    `id_vanzator` int NOT NULL,

    PRIMARY KEY (`id_articol`),
    FOREIGN KEY (`id_vanzator`)
        REFERENCES `vanzatori`(`id_vanzator`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

