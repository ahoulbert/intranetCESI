INSERT INTO promotion VALUES (1, "RIL",	"2019-2021", 48);

INSERT INTO entreprise VALUES
(1, "Vinci Energies Systemes Informations", null),
(2, "STUDEFI", null);

INSERT INTO eleve VALUES
("clement.azibeiro@viacesi.fr",	"$2y$10$YrkJTI7FX9jouSI/dUEOnOOXLXLxSJSwjHvnqQ/ipJL48kfeqDDPy", "AZIBEIRO", "Clément", "1999-07-13", "0611363675", "Le Mans", "En alternance chez Vinci", null, null, 1, 1, 2, 1),
("maxime.villermin@viacesi.fr",	"$2y$10$YrkJTI7FX9jouSI/dUEOnOOXLXLxSJSwjHvnqQ/ipJL48kfeqDDPy", "VILLERMIN", "Maxime", "1998-10-26", "0611459875", "Le Mans", "En alternance chez Vinci", null, null, 1, 1, 2, 1),
("antoine.houlbert@viacesi.fr",	"$2y$10$YrkJTI7FX9jouSI/dUEOnOOXLXLxSJSwjHvnqQ/ipJL48kfeqDDPy", "HOULBERT", "Antoine", "1999-01-01", "0611125675", "Spay", "En alternance chez Studefi", null, null, 2, 2, 1),
("marvyn.rocher@viacesi.fr", "$2y$10$YrkJTI7FX9jouSI/dUEOnOOXLXLxSJSwjHvnqQ/ipJL48kfeqDDPy", "AZIBEIRO", "Clément", "1999-01-01", "06765475", "Le Mans", "En alternance chez ta darone", null, null, null, 1, 2, 1);

INSERT INTO groupe VALUES (1, "ALL", "2020-02-27", "ALL");

INSERT INTO groupeeleve VALUES 
(1, "clement.azibeiro@viacesi.fr"),
(1, "maxime.villermin@viacesi.fr"),
(1, "antoine.houlbert@viacesi.fr"),
(1, "marvyn.rocher@viacesi.fr");

INSERT INTO role VALUES
(1, "Lire"),
(2, "Poster"),
(3, "Liker"),
(4, "Commenter");

INSERT INTO eleverolegroupeevenement VALUES
(1, "clement.azibeiro@viacesi.fr", null, 1),
(2, "clement.azibeiro@viacesi.fr", null, 1),
(3, "clement.azibeiro@viacesi.fr", null, 1),
(4, "clement.azibeiro@viacesi.fr", null, 1),
(1, "marvyn.rocher@viacesi.fr", null, 1),
(2, "marvyn.rocher@viacesi.fr", null, 1),
(3, "marvyn.rocher@viacesi.fr", null, 1),
(4, "marvyn.rocher@viacesi.fr", null, 1),
(1, "maxime.villermin@viacesi.fr", null, 1),
(2, "maxime.villermin@viacesi.fr", null, 1),
(3, "maxime.villermin@viacesi.fr", null, 1),
(4, "maxime.villermin@viacesi.fr", null, 1),
(1, "antoine.houlbert@viacesi.fr", null, 1),
(2, "antoine.houlbert@viacesi.fr", null, 1),
(3, "antoine.houlbert@viacesi.fr", null, 1),
(4, "antoine.houlbert@viacesi.fr", null, 1);