drop database if exists distributics;
create database distributics;
use distributics;

create table categorie 
(
    numC real primary key,
    intitule_c varChar(100)
);

create table type_produit
(
    num_typeproduit real primary key,
    intitule_cp varChar(100)
);

create table distributeur
(
    numD varChar(100) primary key,
    lieuD varChar(100) not null,
    etatD boolean
);

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

create table inventaire
(
    numD varChar(100),
    numP varChar(100),
    quantite integer,
    foreign key (numP) references produit(numP),
    foreign key (numD) references distributeur(numD),
    primary key (numP, numD)
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
    
    insert into utilisateur (mail, pass, nom, prenom, typec, photo)
values 
    ("anne-lisedeguilhem@mail.fr", "empereurromain","Deguilhem", "Anne-lise", 1, "Anne-lise.jpg"),
    ("inesdasilva@mail.fr", "paresseux","Da Silva", "Inês", 1, "ines.jpg"),
    ("campistronguillaume@mail.fr", "levieux","Campistron", "Guillaume", 1, "guillaume.jpg"),
    ("cousinvictor@mail.fr", "tortue","Cousin", "Victor", 2, "victor.jpg"),
    ("ledjoud@mail.fr", "random","Djoudi", "Mahieddine", 3, "DjoudiPro.png"),
    ("lisachater@mail.fr", "onguligrade","Chater", "Lisa", 4, "lisa.jpg");

insert into produit (numP, marqueP, nomP, typeP, prixP, photoP)
values
    ("produit_1", "Kinder", "Country", 1, 2, "country.png"),
    ("produit_2", "Kinder", "Bueno_noir", 1, 3, "buenonoir.png"),
    ("produit_3", "Kinder", "Bueno_blanc", 1, 3.5, "buenoblanc.png"),
    ("produit_4", "St-Michel", "Madelaine", 1, 2, "madelaine.png"),
    ("produit_5", "Lion", "Barre chocolat", 1, 1.5, "lion.png"),
    ("produit_6", "Merling", "Chocolat Chaud", 2, 1, "chocolat.png"),
    ("produit_7", "Nespresso", "Café", 2, 0.75, "cafe.png"),
    ("produit_8", "Coca-cola", "Classic", 3, 3.5, "coca.png"),
    ("produit_9", "Andros", "jus de pomme", 3, 2.5, "jdp.png");

insert into distributeur (numD, lieuD, etatD)
values
    ("distributeur_1", "B03", 1),
    ("distributeur_2", "B03", 0),
    ("distributeur_3", "B07", 1),
    ("distributeur_4", "B08", 0);

insert into inventaire (numD, numP, quantite)
values
    ("distributeur_1", "produit_1", 5),
    ("distributeur_1", "produit_2", 4),
    ("distributeur_1", "produit_3", 3),
    ("distributeur_2", "produit_4", 2),
    ("distributeur_2", "produit_5", 1),
    ("distributeur_2", "produit_6", 0),
    ("distributeur_3", "produit_7", 1),
    ("distributeur_3", "produit_8", 7),
    ("distributeur_3", "produit_9", 8),
    ("distributeur_4", "produit_2", 9),
    ("distributeur_4", "produit_5", 4),
    ("distributeur_4", "produit_8", 10);

insert into note (mail, numP, valeur)
values 
    ("inesdasilva@mail.fr", "produit_7", 2),
    ("cousinvictor@mail.fr", "produit_8", 3),
    ("ledjoud@mail.fr", "produit_8", 4),
    ("lisachater@mail.fr", "produit_8", 1),
    ("lisachater@mail.fr", "produit_6", 5);

insert into categorie (numC, intitule_c)
values 
    (1, "Étudiant"),
    (2, "Personnel"),
    (3, "Enseignant"),
    (4, "Doctorant"),
    (5, "Autres");

insert into type_produit (num_typeproduit, intitule_cp)
values
    (1, "Nourriture"),
    (2, "Boissons_chaudes"),
    (3, "Boissons_froides");

insert into idee_produit (idip, marqueiP, nomiP, typeiP, prixiP, photoiP, mail)
values 
    ("idee_produit_1", "Haribo", "dragibus", 1, 4, "dragibus.png", "anne-lisedeguilhem@mail.fr"),
    ("idee_produit_2", "Lu", "petit ecolier", 1, 3.5, "ecolier.png", "cousinvictor@mail.fr"),
    ("idee_produit_3", "Merling", "latte machiato", 2, 2, "latte.png", "campistronguillaume@mail.fr"),
    ("idee_produit_4", "Coca-cola", "Cherry", 3, 3.5, "cocacherry.png", "lisachater@mail.fr"),
    ("idee_produit_5", "Volvic", "Citron", 3, 3.5, "citron.png", "ledjoud@mail.fr"),
    ("idee_produit_6", "Innocent", "smoothie fraise", 3, 7, "innocent.png", "inesdasilva@mail.fr");