CREATE TABLE `EnumSexeEleve` (
    `idSexeEleve` INT(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `libelle` VARCHAR (50)
);

CREATE TABLE `EnumTypeEleve` (
    `idTypeEleve` INT(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `libelle` VARCHAR (50)
);

CREATE TABLE `EnumStatutAmitier` (
    `idStatut` INT(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `libelle` VARCHAR(50)
);

CREATE TABLE `Entreprise` (
    `idEntreprise` INT(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `designation` VARCHAR(50),
    `siteWeb` VARCHAR(100)
);

CREATE TABLE `Promotion` (
    `idPromotion` INT(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `nom` VARCHAR(50),
    `annee` VARCHAR(20),
    `effectif` INT(4)
);

CREATE TABLE `Role` (
    `idRole` INT(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `libelle` VARCHAR(50)
);

CREATE TABLE `Evenement` (
    `idEvenement` INT(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `titre` VARCHAR(50),
    `description` VARCHAR(250),
    `date` DATE,
    `dateCreation` DATE,
    `lieu`VARCHAR(250)
);

CREATE TABLE `Groupe` (
    `idGroupe` INT(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `nom` VARCHAR(50),
    `dateCreation` DATE,
    `description` VARCHAR(250)
);

CREATE TABLE `Tag` (
    `idTag` INT(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `libelle` VARCHAR(250)
);

CREATE TABLE `Eleve` (
    `mailCESI` VARCHAR(50) NOT NULL PRIMARY KEY,
    `mdp` VARCHAR(250) NOT NULL,
    `nom` VARCHAR(50),
    `prenom` VARCHAR(50),
    `dateNaissance` DATE,
    `tel` VARCHAR(10),
    `ville` VARCHAR(50),
    `description` VARCHAR(250),
    `lienLinkedin` VARCHAR(250),
    `imgProfil` VARCHAR(250),
    `idEntreprise` INT(11),
    `idPromotion` INT(11) NOT NULL,
    `idTypeEleve` INT(11) NOT NULL,
    `idSexeEleve` INT(11) NOT NULL,

    FOREIGN KEY (`idEntreprise`) REFERENCES `Entreprise` (`idEntreprise`),
    FOREIGN KEY (`idPromotion`) REFERENCES `Promotion` (`idPromotion`),
    FOREIGN KEY (`idTypeEleve`) REFERENCES `EnumTypeEleve` (`idTypeEleve`),
    FOREIGN KEY (`idSexeEleve`) REFERENCES `EnumSexeEleve` (`idSexeEleve`)
);

CREATE TABLE `EtreAmis` (
    `mailCESIDemandeur` VARCHAR(50) NOT NULL,
    `mailCESIReceveur` VARCHAR(50) NOT NULL,
    `idStatut` INT(11) NOT NULL,

    PRIMARY KEY (`mailCESIDemandeur`, `mailCESIReceveur`),

    FOREIGN KEY (`mailCESIDemandeur`) REFERENCES `Eleve` ( mailCESI),
    FOREIGN KEY (`mailCESIReceveur`) REFERENCES `Eleve` (mailCESI),
    FOREIGN KEY (`idStatut`) REFERENCES `EnumStatutAmitier` (idStatut)
);

CREATE TABLE `TagEleve` (
    `mailCESI` VARCHAR(50) NOT NULL,
    `idTag` INT(11) NOT NULL,

    PRIMARY KEY (`mailCESI`, `idTag`),

    FOREIGN KEY (`mailCESI`) REFERENCES `Eleve` (`mailCESI`),
    FOREIGN KEY (`idTag`) REFERENCES `Tag` (`idTag`)
);

CREATE TABLE `Post` (
    `idPost` INT(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `dateCreation` DATE,
    `description` VARCHAR(250),
    `titre` VARCHAR(50),
    `mailCESI` VARCHAR(50) NOT NULL,
    `idGroupe` INT(11) NOT NULL,

    FOREIGN KEY (`mailCESI`) REFERENCES `Eleve` (`mailCESI`),
    FOREIGN KEY (`idGroupe`) REFERENCES `Groupe` (`idGroupe`)
);

CREATE TABLE `TagPost` (
    `idPost` INT(11) NOT NULL,
    `idTag` INT(11) NOT NULL,

    PRIMARY KEY (`idPost`, `idTag`),
    
    FOREIGN KEY (`idTag`) REFERENCES `Tag` (`idTag`),
    FOREIGN KEY (`idPost`) REFERENCES `Post` (`idPost`)
);

CREATE TABLE `GroupeEleve` (
    `idGroupe` INT(11) NOT NULL,
    `mailCESI`VARCHAR(50) NOT NULL,

    PRIMARY KEY (`idGroupe`, `mailCESI`),

    FOREIGN KEY (`mailCESI`) REFERENCES `Eleve` (`mailCESI`),
    FOREIGN KEY (`idGroupe`) REFERENCES `Groupe` (`idGroupe`)
);

CREATE TABLE `EleveEvenement` (
    `idEvenement` INT(11) NOT NULL,
    `mailCESI` VARCHAR(50) NOT NULL,

    PRIMARY KEY (`idEvenement`, `mailCESI`),

    FOREIGN KEY (`mailCESI`) REFERENCES `Eleve` (`mailCESI`),
    FOREIGN KEY (`idEvenement`) REFERENCES `Evenement` (`idEvenement`)
);

CREATE TABLE `Image` (
    `idImage` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nom` VARCHAR(250),
    `idPost` INT(11),
    `idEvenement` INT(11),

    FOREIGN KEY (`idEvenement`) REFERENCES `Evenement` (`idEvenement`),
    FOREIGN KEY (`idPost`) REFERENCES `Post` (`idPost`)
);

CREATE TABLE `EleveRoleGroupeEvenement` (
    `idRole` INT(11),
    `mailCESI` VARCHAR(50),
    `idEvenement` INT(11),
    `idGroupe` INT(11),

    PRIMARY KEY (`idRole`, `mailCESI`),

    FOREIGN KEY (`mailCESI`) REFERENCES `Eleve` (`mailCESI`),
    FOREIGN KEY (`idEvenement`) REFERENCES `Evenement` (`idEvenement`),
    FOREIGN KEY (`idGroupe`) REFERENCES `Groupe` (`idGroupe`),
    FOREIGN KEY (`idRole`) REFERENCES `Role` (`idRole`)
);

INSERT INTO EnumSexeEleve 
VALUES 
(1, "Homme"),
(2, "Femme");

INSERT INTO EnumStatutAmitier
VALUES
(1, "Accepté"),
(2, "En attente"),
(3, "Refusé");

INSERT INTO EnumTypeEleve
VALUES
(1, "Etudiant"),
(2, "Alternant");