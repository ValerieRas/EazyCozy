
-- Création de la table produit
create table produit (
    idprod INT NOT NULL,
    prodnom varchar(50),
    descprod VARCHAR(200),
    prod_motcle VARCHAR(200),
    idcat INT,
    idcreat INT,
    img1prod text,
    img2prod text,
    img3prod text,
    quantité int
    prodprix int, 
    primary key (idprod)
);



-- création de la table client
CREATE TABLE CLIENT (
    idcli INT NOT NULL AUTO_INCREMENT, 
    nom VARCHAR(50), 
    prenom VARCHAR (50), 
    dateNaissance VARCHAR, 
    adresse VARCHAR(100), 
    tel INT,
    mail varchar(50),
    motdepasse varchar(50),
    PRIMARY KEY (idcli)
);




-- création de la table vendeur
CREATE TABLE vendeur (
    idvend INT NOT NULL AUTO_INCREMENT, 
    nom VARCHAR(50), 
    prenom VARCHAR (50), 
    dateNaissance VARCHAR, 
    adresse VARCHAR(100), 
    tel INT,
    mail varchar(50),
    motdepasse varchar(50),
    PRIMARY KEY (idvend)
);





-- création de la table admin
CREATE TABLE admin (
    idadmin INT NOT NULL AUTO_INCREMENT, 
    nom VARCHAR(50), 
    prenom VARCHAR (50), 
    dateNaissance VARCHAR, 
    adresse VARCHAR(100), 
    tel INT,
    mail varchar(50),
    motdepasse varchar(50),
    PRIMARY KEY (idadmin)
);



-- creation de la table catégorie
create table categorie (
    idcat INT NOT NULL AUTO_INCREMENT=1,
    nomcat VARCHAR(50)
);

Create table PanierClient(
   prodid INT NOT NULL,
   idclient INT,
   prodprix INT,
   quant INT,
   det_panier VARCHAR(100)
);


-- creation de la table créateur
create table createur(
    idcreat INT NOT NULL,
    nomcreat VARCHAR(50)
);


-- insert value in produit table
INSERT INTO produit 
(prodnom, descprod, prod_motcle, idcat, idcreat, img1prod, img2prod, img3prod, prodprix, quantité, dateprod)
VALUES ('$prodnom', '$descprod','$prodcle', $prodcat, $prodcreat, '$prodimg1', '$prodimg2', '$prodimg3', $prodprix, $quantprod,NOW());