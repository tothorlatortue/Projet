drop database if exists distributics;
create database distributics;
use distributics;

create table utilisateur
(
    mail varchar(100) primary key,
    pass varchar(100) not null,
    nom varchar(100) not null,
    prenom varchar(100) not null,
    typec real,
    foreign key (typec) references categorie(numC),
    photo varchar(100)
);

create table produit 
(
    numP varChar(100) primary key,
    marqueP varChar(100) not null,
    nomP varChar(100) not null,
    typeP real,
    foreign key (typeP) references type_produit(num_typeproduit),
    prixP real not null,
    photoP varChar(100)
);

create table type_produit
(
    num_typeproduit real primary key,
    intitule_cp varChar(100)
);

create table inventaire
(
    numD varChar(100),
    numP varChar(100),
    quantite integer,
    foreign key (numP) references produit(numP),
    foreign key (numD) references distributeur(numD),
    primary key (numP, numD)
);

create table distributeur
(
    numD varChar(100) primary key,
    lieuD varChar(100) not null,
    etatD boolean
);

create table note
(
    mail varChar(100),
    numP varChar(100),
    valeur real,
    foreign key (numP) references produit(numP),
    foreign key (mail) references utilisateur(mail),
    primary key (numP, mail)
);

create table idee_produit 
(
    idip varChar(100) primary key,
    marqueiP varChar(100) not null,
    nomiP varChar(100) not null,
    typeiP real,
    foreign key (typeiP) references type_produit(num_typeproduit),
    prixiP real not null,
    photoiP varChar(100),
    mail varChar(100),
    foreign key (mail) references utilisateur(mail)
);

create table categorie 
(
    numC real primary key,
    intitule_c varChar(100)
);
    