insert into utilisateur (mail, pass, nom, prenom, typec, photo)
values 
    ("exemple_1_@mail.fr", "mot_de_passe_1","nom_1", "prenom_1", 1, "photoexmeple_1.png"),
    ("exemple_2_@mail.fr", "mot_de_passe_2","nom_1", "prenom_2", 1, "photoexmeple_2.png"),
    ("exemple_3_@mail.fr", "mot_de_passe_3","nom_1", "prenom_3", 1, "photoexmeple_3.png"),
    ("exemple_4_@mail.fr", "mot_de_passe_4","nom_1", "prenom_4", 2, "photoexmeple_4.png"),
    ("exemple_5_@mail.fr", "mot_de_passe_5","nom_1", "prenom_5", 3, "photoexmeple_5.png"),
    ("exemple_6_@mail.fr", "mot_de_passe_6","nom_1", "prenom_6", 4, "photoexmeple_6.png");

insert into produit (numP, marqueP, nomP, typeP, prixP, photoP)
values
    ("produit_1", "marqueP_1", "nomP_1", 1, 1, "photoP_1"),
    ("produit_2", "marqueP_2", "nomP_2", 1, 2, "photoP_2"),
    ("produit_3", "marqueP_3", "nomP_3", 2, 3, "photoP_3"),
    ("produit_4", "marqueP_4", "nomP_4", 2, 4, "photoP_4"),
    ("produit_5", "marqueP_5", "nomP_5", 3, 5, "photoP_5"),
    ("produit_6", "marqueP_6", "nomP_6", 3, 6, "photoP_6"),
    ("produit_7", "marqueP_7", "nomP_7", 2, 7.5, "photoP_7"),
    ("produit_8", "marqueP_8", "nomP_8", 1, 8.5, "photoP_8"),
    ("produit_9", "marqueP_9", "nomP_9", 2, 9.5, "photoP_9");

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
    ("exemple_2@mail.fr", "produit_7", 2.2),
    ("exemple_3@mail.fr", "produit_8", 3),
    ("exemple_4@mail.fr", "produit_8", 4),
    ("exemple_5@mail.fr", "produit_8", 1),
    ("exemple_5@mail.fr", "produit_6", 5);

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
    ("idee_produit_1", "marque_idee_1", "nom_idee_1", 1, 4, "photo_idee_1.png", "exemple_1_@mail.fr"),
    ("idee_produit_2", "marque_idee_2", "nom_idee_2", 1, 5, "photo_idee_2.png", "exemple_2_@mail.fr"),
    ("idee_produit_3", "marque_idee_3", "nom_idee_3", 2, 6, "photo_idee_3.png", "exemple_3_@mail.fr"),
    ("idee_produit_4", "marque_idee_4", "nom_idee_4", 2, 4, "photo_idee._4png", "exemple_4_@mail.fr"),
    ("idee_produit_5", "marque_idee_5", "nom_idee_5", 3, 5.5, "photo_idee_5.png", "exemple_5_@mail.fr"),
    ("idee_produit_6", "marque_idee_6", "nom_idee_6", 3, 7, "photo_idee_6.png", "exemple_6_@mail.fr");
