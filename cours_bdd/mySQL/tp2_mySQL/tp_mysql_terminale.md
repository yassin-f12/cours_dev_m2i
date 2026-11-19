# Exercices SQL terminale

## mysql -u root

### 1. Créez une table "animaux" avec les colonnes suivantes : "id" (entier, clé primaire, auto-increment), "nom" (varchar, 50 caractères), "espece" (varchar, 50 caractères) et "age" (entier).

```text
mysql> USE veteri;
Database changed

mysql> CREATE TABLE animaux (
    -> id INT PRIMARY KEY AUTO_INCREMENT,
    -> nom VARCHAR(50),
    -> espece VARCHAR(50),
    -> age INT
    -> );
```

### 2. Créez une table "proprietaires" avec les colonnes suivantes : "id" (entier, clé primaire, auto-increment), "nom" (varchar, 50 caractères) et "prenom" (varchar, 50 caractères). (bdd veteri)

```text
mysql> CREATE TABLE proprietaires (
    -> id INT PRIMARY KEY AUTO_INCREMENT,
    -> nom VARCHAR(50),
    -> prenom VARCHAR(50)
    -> );
```

### 3. Ajoutez une colonne "proprietaire_id" (entier) à la table "animaux" et créez une contrainte de clé étrangère reliant cette colonne à la colonne "id" de la table "propriétaires". (bdd veteri)

```text
ALTER TABLE animaux ADD CONSTRAINT fk_animaux_propri FOREIGN KEY (proprietaire_id) REFERENCES proprietaires(id);
```

## Les transactions SQL

### 4. Dans une transaction, modifiez les informations d'un étudiant et désinscrivez-le d'un cours.

```text
START TRANSACTION;
```

```text
UPDATE etudiants SET age = 21 WHERE id = 1;
```

```text
DELETE FROM inscriptions WHERE etudiant_id = 1 AND cours_id = 2;
```

```text
COMMIT;
```

## Les Requêtes préparées

### 5. Utilisez une requête préparée pour sélectionner les étudiants qui ont un nom donné et les afficher puis supprimez la requête préparée.

```text
PREPARE rech_etudi FROM 'SELECT * FROM etudiants WHERE nom = ?';
```

```text
SET @nom = 'Doe';
```

```text
EXECUTE rech_etudi USING @nom;
```

```text
DEALLOCATE PREPARE rech_etudi;
```

### 6. Créez une requête préparée et exécutez la deux fois de suite pour mettre à jour les informations de 2 étudiants. puis supprimez la requête préparée.

```text
PREPARE modif_age FROM 'UPDATE etudiants SET age = ? WHERE id = ?';
```

```text
SET @age = 24, @id = 1;
```

```text
EXECUTE modif_age USING @age, @id;
```

```text
SET @age = 26, @id = 2;
```

```text
EXECUTE modif_age USING @age, @id;
```

```text
DEALLOCATE PREPARE modif_age;
```
