#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: magasin
#------------------------------------------------------------

CREATE TABLE magasin(
        nom_magasin Varchar (25) ,
        id_magasin  Int NOT NULL AUTO_INCREMENT ,
        ville       Varchar (25) ,
        PRIMARY KEY (id_magasin )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: produit
#------------------------------------------------------------

CREATE TABLE produit(
        nom_produit  Varchar (25) ,
        id_produit   Int NOT NULL AUTO_INCREMENT ,
        prix         Float ,
        quantite     Int ,
        id_magasin   Int ,
        id_categorie Int ,
        n_commande   Int ,
        PRIMARY KEY (id_produit )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: categorie
#------------------------------------------------------------

CREATE TABLE categorie(
        id_categorie  Int NOT NULL AUTO_INCREMENT ,
        nom_categorie Varchar (25) ,
        PRIMARY KEY (id_categorie )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: client
#------------------------------------------------------------

CREATE TABLE client(
        nom       Varchar (25) ,
        tel       Varchar (25) ,
        PRIMARY KEY (tel)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: commande
#------------------------------------------------------------

CREATE TABLE commande(
        datecommande  Varchar (25) ,
        datelivrasion Varchar (25) ,
        n_commande    Int NOT NULL  AUTO_INCREMENT,
        tel       Varchar (25),
        PRIMARY KEY (n_commande )
)ENGINE=InnoDB;

ALTER TABLE produit ADD CONSTRAINT FK_produit_id_magasin FOREIGN KEY (id_magasin) REFERENCES magasin(id_magasin);
ALTER TABLE produit ADD CONSTRAINT FK_produit_id_categorie FOREIGN KEY (id_categorie) REFERENCES categorie(id_categorie);
ALTER TABLE produit ADD CONSTRAINT FK_produit_n_commande FOREIGN KEY (n_commande) REFERENCES commande(n_commande);
ALTER TABLE commande ADD CONSTRAINT FK_commande_tel FOREIGN KEY (tel) REFERENCES client(tel);

