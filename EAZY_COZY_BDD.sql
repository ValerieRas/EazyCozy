
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
-- CREATE TABLE vendeur (
--     idvend INT NOT NULL AUTO_INCREMENT, 
--     nom VARCHAR(50), 
--     prenom VARCHAR (50), 
--     dateNaissance VARCHAR, 
--     adresse VARCHAR(100), 
--     tel INT,
--     mail varchar(50),
--     motdepasse varchar(50),
--     PRIMARY KEY (idvend)
-- );





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

-- création de la table panier
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

-- Création de la table commande
create table commande(
    idcomm INT NOT NULL AUTO_INCREMENT,
    idcli INT,
    prixcom INT(250),
    idpaie INT(250),
    nbrprod INT(250),
    datcom TIMESTAMP,
    statucom VARCHAR(100)
)

-- Création table commande en attente

create table attentcom(
    idcomm INT,
    idcli INT,
    idprod INT(250),
    idpaie INT(250),
    quant INT(250),
    statucom VARCHAR(100)

)

-- création table paiement
create table paiement_client(
    idfact INT NOT NULL,
    idpaie INT,
    idcomm INT,
    prixcom INT,
    date_paie TIMESTAMP
)

-- insert value in produit table
INSERT INTO produit 
(prodnom, descprod, prod_motcle, idcat, idcreat, img1prod, img2prod, img3prod, prodprix, quantité, dateprod)
VALUES ('$prodnom', '$descprod','$prodcle', $prodcat, $prodcreat, '$prodimg1', '$prodimg2', '$prodimg3', $prodprix, $quantprod,NOW());


Creation table admin

create table admin (
    idadmin INT NOT NULL, 
    nomadmin VARCHAR(100), 
    mailadmin VARCHAR(100), 
    motdepasse VARCHAR(255)
)