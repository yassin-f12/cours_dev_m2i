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

## Les Procédures stockées

### 7. Créez une procédure stockée “ajouter_etudiant” qui prend deux paramètres, nom_etudiant et prenom_etudiant, et insère un nouvel étudiant dans la table étudiants.

```text
DELIMITER //
```

```text
CREATE PROCEDURE ajouter_etudiant (
    -> IN nom_etudiant VARCHAR(50),
    -> IN prenom_etudiant VARCHAR(50)
    -> )
    -> BEGIN
    -> INSERT INTO etudiants (nom, prenom) VALUES (nom_etudiant, prenom_etudiant);
    -> END //
```

```text
DELIMITER ;
```

```text
CALL ajouter_etudiant('Sam', 'Tom');
```

### 8. Créez une procédure stockée compter_etudiants_par_cours qui prend un paramètre id_cours (IN) et un paramètre nombre_etudiants (OUT), puis retourne le nombre d'étudiants inscrits à ce cours.

```text
DELIMITER //
```

```text
CREATE PROCEDURE compter_etudiants_par_cours (
    -> IN id_cours INT,
    -> OUT nombre_etudiants INT
    -> )
    -> BEGIN
    -> SELECT COUNT(*) INTO nombre_etudiants FROM inscriptions WHERE cours_id = id_cours;
    -> END //
```

```text
DELIMITER ;
```

```text
CALL compter_etudiants_par_cours(1, @nombre);
```

```text
SELECT @nombre;
```

```text
DROP PROCEDURE compter_etudiants_par_cours;
```

### 9. Créez une procédure stockée changer_etudiant_cours qui prend deux paramètres, id_etudiant (IN) et ancien_cours_id (INOUT), désinscrit l'étudiant de l'ancien cours et l'inscrit à un nouveau cours dont l'ID est égal à l'ancien ID du cours + 1.

```text
CREATE PROCEDURE changer_etudiant_cours (
    -> IN id_etudant INT,
    -> INOUT ancien_cours_id INT
    -> )
    -> BEGIN
    -> DELETE FROM inscriptions WHERE etudiant_id = id_etudant AND cours_id = ancien_cours_id;
    -> SET ancien_cours_id = ancien_cours_id + 1;
    -> INSERT INTO inscriptions (etudiant_id, cours_id) VALUES (id_etudant, ancien_cours_id);
    -> END //
```

```text
CALL changer_etudiant_cours(4, @nouveau_cours);
```

## Les Fonctions stockées

### 10. Créez une fonction nombre_etudiants_cours qui prend un paramètre id_cours et retourne le nombre d'étudiants inscrits à ce cours.

```text
DELIMITER //
```

```text
CREATE FUNCTION nombre_etudiants_cours (
    -> id_cours INT)
    -> RETURNS INT
    -> NOT DETERMINISTIC
    -> READS SQL DATA
    -> BEGIN
    -> RETURN (SELECT COUNT(*) FROM inscriptions WHERE cours_id = id_cours);
    -> END //
```

```text
DELIMITER ;
```

```text
SELECT nombre_etudiants_cours(1);
```

### 11. Créez une fonction nom_complet_etudiant qui prend un paramètre id_etudiant et retourne le nom complet (prénom et nom) de l'étudiant.

```text
DELIMITER //
```

```text
CREATE FUNCTION nom_complet_etudiant (
    -> id_etudiant INT)
    -> RETURNS VARCHAR(50)
    -> NOT DETERMINISTIC
    -> READS SQL DATA
    -> BEGIN
    -> RETURN (SELECT CONCAT(prenom,' ', nom) FROM etudiants WHERE id_etudiant = etudiants.id);
    -> END //
```

```text
DELIMITER ;
```

```text
SELECT nom_complet_etudiant(4);
```

## Les Triggers (Déclencheurs)

### 12. Créez un déclencheur (Trigger) sur la table inscriptions pour ajouter un enregistrement dans la table historique_inscriptions avant qu’un étudiant s'inscrive à un cours.

---> Il faut avant créer une table, et lui ajouter les PK et FK la consigne : Créez une nouvelle table historique_inscriptions avec les colonnes suivantes : id, etudiant_id, cours_id, action (pour suivre l'action effectuée, comme 'ajout' ou 'suppression') et date_action (pour enregistrer la date et l'heure de l'action). :

```text
CREATE TABLE historique_inscriptions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    etudiant_id INT,
    cours_id INT,
    action VARCHAR(50),
    date_action DATETIME
);
```

```text
ALTER TABLE historique_inscriptions
ADD CONSTRAINT fk_historique_etudiant
FOREIGN KEY (etudiant_id)
REFERENCES etudiants(id);
```

```text
ALTER TABLE historique_inscriptions
ADD CONSTRAINT fk_historique_cours
FOREIGN KEY (cours_id)
REFERENCES cours(id);
```

---> Le TRIGGER :

```text
DELIMITER //
```

```text
CREATE TRIGGER avant_ajout_etudiant
    -> BEFORE INSERT ON inscriptions
    -> FOR EACH ROW
    -> BEGIN
    -> INSERT INTO historique_inscriptions (etudiant_id, cours_id, action, date_action)
    -> VALUES (NEW.etudiant_id, NEW.cours_id, 'ajout', NOW());
    -> END //
```

```text
DELIMITER ;
```

---> Tester le trigger :

```text
INSERT INTO inscriptions (etudiant_id, cours_id)
VALUES (5, 1);
```

```text
SELECT * FROM historique_inscriptions;
```

### 13. Créez un déclencheur (Trigger) sur la table inscriptions pour ajouter un enregistrement dans la table historique_inscriptions avant qu’un étudiant se désinscrit d'un cours.

```text
DELIMITER //
```

```text
CREATE TRIGGER apres_suppr_etudiant
    -> BEFORE DELETE ON inscriptions
    -> FOR EACH ROW
    -> BEGIN
    -> INSERT INTO historique_inscriptions (etudiant_id, cours_id, action, date_action)
    -> VALUES (OLD.etudiant_id, OLD.cours_id, 'suppression', NOW());
    -> END //
```

```text
DELIMITER ;
```

---> Tester le trigger :

```text
DELETE FROM inscriptions
WHERE etudiant_id = 5 AND cours_id = 1;
```

```text
SELECT * FROM historique_inscriptions;
```
