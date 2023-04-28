--Selectionner tout les utilisateurs ainsi que toutes leurs informations
Select *
From utilisateur;

--Selectionner les numeros et l'emplacement des distributeurs en panne
Select lieuD, numD, etatD
From distributeur
Where etatD = 0;

--Selectionner l'emplacement et le numeros des distributeurs qui ont des emplacements de produits vide
Select numD, lieuD, quantite
From distributeur join inventaire using (numD)
Where quantite = 0;

--selectionner la photo, l'adresse mail, le nom et le prénom des étudiants (et le nom et la marque du produit) qui ont proposé comme produit des boissons froides 
Select photo, mail, nom, prenom, marqueIP, nomIP
From utilisateur join idee_produit using (mail) join categorie ON (numC = typec)
Where typeIP = 3
And numC = 1;

--selectionner les produits qui ont un prix supérieur à 2€ et qui sont de la nourriture
Select numP, marqueP, nomP, photoP
From produit
Where prixP > 2
And typeP = 1;

-- afficher le produit qui a la plus haute note
Select numP, marqueP, nomP, photoP
From produit join note using (numP)
ORDER BY valeur DESC
Limit 1;

--Compter le nombre de produits pour chaque catégorie
SELECT typeP, COUNT(*) AS nombre_produits
FROM produit
GROUP BY typeP;

--Donner le prix moyen pour chaque catégorie de produits et les trier par ordre décroissant
SELECT typeP, AVG(prixP) AS prix_moyen
FROM produit
GROUP BY typeP
ORDER BY prix_moyen DESC;

--sélectionner tout les produits et les trier par prix décroissant
SELECT * 
FROM produit
ORDER BY prixP DESC;

--supprimer de la table produit ceux qui ont une note en dessous de 2
DELETE FROM produit
WHERE numP IN (
  SELECT numP
  FROM note
  WHERE valeur < 2
);