## Ordre d'une requête SQL

1. SELECT : ce que tu veux afficher.
2. FROM : dans quelle table chercher.
3. WHERE : filtrer les lignes selon une condition.
4. GROUP BY : regrouper les résultats.
5. HAVING : filtrer les groupes.
6. ORDER BY : trier les résultats (ASC ou DESC).
7. LIMIT : limiter le nombre de résultats.

## Fonctions SQL à connaître

- COUNT(*) : compter le nombre de lignes.
- SUM(colonne) : additionner les valeurs.
- AVG(colonne) : calculer la moyenne.
- MIN(colonne) : trouver la valeur minimale.
- MAX(colonne) : trouver la valeur maximale.

## Opérateurs et conditions

- = : égal à.
- != ou <> : différent de.
- '>' : supérieur à. (sans les '')
- < : inférieur à.
- '>' = : supérieur ou égal à. (sans les '')
- <= : inférieur ou égal à.
- LIKE '%mot%' : recherche un texte contenant le mot, peu importe ce qui se trouve avant ou après. Le '%' représente zéro, un ou plusieurs caractères.
- LIKE 'mot%'` : recherche un texte qui commence par le mot.
- LIKE '%mot'` : recherche un texte qui se termine par le mot.
- LIKE 'mot'` : recherche une correspondance exacte. (vaux mieux utiliser '=' dans ce cas la)
- NOT LIKE '%mot%'` : recherche les textes qui ne contiennent pas le mot.
- % : représente zéro, un ou plusieurs caractères.
- _ : représente exactement un seul caractère.
- NOT LIKE '%mot%'` : recherche les valeurs qui ne contiennent pas le mot indiqué.
- IN (...) : appartient à une liste de valeurs.
- BETWEEN ... AND ... : compris entre deux valeurs.
- IS NULL : valeur manquante.
- IS NOT NULL : valeur non manquante.
- AND : les deux conditions doivent être vraies.
- OR : au moins une condition doit être vraie.
- NOT : inverse une condition.

## Jointures SQL (JOIN)

- INNER JOIN : récupère uniquement les lignes qui possèdent une correspondance dans les deux tables.
- LEFT JOIN : récupère toutes les lignes de la table de gauche, même sans correspondance dans la table de droite. Les colonnes sans correspondance prennent la valeur `NULL`.
- RIGHT JOIN : récupère toutes les lignes de la table de droite, même sans correspondance dans la table de gauche. Les colonnes sans correspondance prennent la valeur `NULL`.
- FULL OUTER JOIN : récupère toutes les lignes des deux tables, qu'elles aient une correspondance ou non (non pris en charge directement par MySQL).
- CROSS JOIN : associe chaque ligne de la première table avec chaque ligne de la deuxième table.
- ON : définit la condition de correspondance entre les deux tables.
- USING : permet de faire une jointure en utilisant une colonne qui porte le même nom dans les deux tables.
- SELF JOIN : permet de joindre une table avec elle-même.

## Autres éléments utiles

- AS : donner un alias (nom personnalisé) à une colonne.
- ASC : trier par ordre croissant.
- DESC : trier par ordre décroissant.
- DISTINCT : supprimer les doublons dans les résultats.
- '-' : sélectionner toutes les colonnes. (sans les '')

## À retenir

- WHERE filtre les lignes avant le regroupement.
- HAVING filtre les groupes après le regroupement.
- GROUP BY vient avant ORDER BY.
- Les apostrophes ' ' servent à entourer les valeurs textuelles.

## Fonctions scalaires SQL

Les fonctions scalaires permettent de transformer une valeur et de retourner un résultat pour chaque ligne.

**Fonctions sur les textes**

- UPPER(texte) : convertir un texte en majuscules.
- LOWER(texte) : convertir un texte en minuscules.
- LENGTH(texte) : retourner la longueur d'un texte en octets.
- CHAR_LENGTH(texte) : retourner le nombre de caractères.
- CONCAT(texte1, texte2) : assembler plusieurs textes.
- CONCAT_WS('séparateur', ...) : assembler plusieurs textes avec un séparateur.
- SUBSTRING(texte, début, longueur) : extraire une partie d'un texte.
- REPLACE(texte, ancien, nouveau) : remplacer une partie d'un texte.
- TRIM(texte) : supprimer les espaces au début et à la fin.
- LTRIM(texte) : supprimer les espaces au début.
- RTRIM(texte) : supprimer les espaces à la fin.
- LEFT(texte, nombre) : récupérer les caractères situés à gauche.
- RIGHT(texte, nombre) : récupérer les caractères situés à droite.
- REVERSE(texte) : inverser un texte.

**Fonctions numériques**

- ABS(nombre) : retourner la valeur absolue d'un nombre.
- ROUND(nombre, décimales) : arrondir un nombre.
- CEIL(nombre) : arrondir au nombre entier supérieur.
- FLOOR(nombre) : arrondir au nombre entier inférieur.
- TRUNCATE(nombre, décimales) : supprimer les décimales sans arrondir.
- MOD(nombre1, nombre2) : retourner le reste d'une division.
- POWER(nombre, puissance) : calculer une puissance.
- SQRT(nombre) : calculer la racine carrée.
- RAND() : générer un nombre aléatoire entre 0 et 1.

**Fonctions sur les dates et heures**

- NOW() : retourner la date et l'heure actuelles. (s'adapte au type de la colonne, time, datetime, date, year..)
- CURDATE() : retourner la date actuelle.
- CURTIME() : retourner l'heure actuelle.
- YEAR(date) : récupérer l'année d'une date.
- MONTH(date) : récupérer le mois d'une date.
- DAY(date) : récupérer le jour du mois.
- HOUR(heure) : récupérer les heures.
- MINUTE(heure) : récupérer les minutes.
- SECOND(heure) : récupérer les secondes.
- DATEDIFF(date1, date2) : calculer le nombre de jours entre deux dates.
- DATE_ADD(date, INTERVAL ...) : ajouter une durée à une date.
- DATE_SUB(date, INTERVAL ...) : retirer une durée à une date.
- DAYNAME(date) : retourner le nom du jour.
- MONTHNAME(date) : retourner le nom du mois.

**Fonctions de conversion**

- CAST(valeur AS type) : convertir une valeur vers un autre type.
- CONVERT(valeur, type) : convertir une valeur vers un autre type.

**Fonctions de gestion des valeurs NULL**

- IFNULL(valeur, remplacement) : remplacer une valeur NULL par une autre valeur.
- COALESCE(valeur1, valeur2, ...) : retourner la première valeur qui n'est pas NULL.
- NULLIF(valeur1, valeur2) : retourner NULL si les deux valeurs sont égales.

**Fonctions conditionnelles**

- IF(condition, valeur_si_vrai, valeur_si_faux) : retourner une valeur selon une condition.
- CASE WHEN : effectuer plusieurs tests conditionnels et retourner un résultat selon le premier test vrai.

## À retenir

- Une fonction scalaire travaille sur une valeur et retourne un résultat pour chaque ligne.
- Une fonction d'agrégation travaille sur plusieurs lignes pour produire un résultat global ou par groupe.
- CONCAT() permet de regrouper plusieurs textes.
- IFNULL() permet de remplacer les valeurs NULL.
- CASE WHEN permet de créer des conditions directement dans une requête SQL.

## Commandes MySQL (terminal : mysql -u root (rajoute -p si y a un mdp))

**Gestion des bases de données**

- SHOW DATABASES; : afficher toutes les bases de données.
- CREATE DATABASE nom; : créer une nouvelle base de données.
- DROP DATABASE nom; : supprimer une base de données.
- USE nom; : sélectionner une base de données.
- SELECT DATABASE(); : afficher la base de données actuellement sélectionnée.

**Gestion des tables**

- SHOW TABLES; : afficher toutes les tables de la base de données sélectionnée.
- DESCRIBE nom_table; : afficher la structure d'une table (colonnes, types, clés).
- DESC nom_table; : raccourci de DESCRIBE.
- SHOW COLUMNS FROM nom_table; : afficher les colonnes d'une table.
- SHOW CREATE TABLE nom_table; : afficher la commande de création d'une table.
- CREATE TABLE nom_table (...); : créer une nouvelle table.
- DROP TABLE nom_table; : supprimer une table.
- TRUNCATE TABLE nom_table; : supprimer toutes les données d'une table sans supprimer sa structure.
- RENAME TABLE ancien_nom TO nouveau_nom; : renommer une table.
- ALTER TABLE nom_table ADD colonne TYPE (TYPE => genre INT); : ajouter une nouvelle colonne.
- ALTER TABLE nom_table DROP COLUMN colonne; : supprimer une colonne.
- ALTER TABLE nom_table MODIFY colonne TYPE; : modifier le type ou les propriétés d'une colonne.
- ALTER TABLE nom_table CHANGE ancien_nom nouveau_nom TYPE; : renommer une colonne et éventuellement modifier son type.
- ALTER TABLE nom_table RENAME COLUMN ancien_nom TO nouveau_nom; : renommer une colonne.
- ALTER TABLE nom_table RENAME TO nouveau_nom; : renommer une table.
- ALTER TABLE nom_table ADD PRIMARY KEY (colonne); : ajouter une clé primaire.
- ALTER TABLE nom_table DROP PRIMARY KEY; : supprimer une clé primaire.
- ALTER TABLE nom_table ADD CONSTRAINT nom_contrainte FOREIGN KEY (colonne) REFERENCES autre_table(id); : ajouter une clé étrangère.

**Contraintes SQL**

- NOT NULL : interdit les valeurs NULL dans une colonne.
- UNIQUE : interdit les doublons dans une colonne.
- DEFAULT valeur : définit une valeur par défaut si aucune valeur n'est fournie.
- CHECK (condition) : impose une condition aux valeurs d'une colonne.
- PRIMARY KEY : définit la clé primaire d'une table.
- FOREIGN KEY : définit une clé étrangère qui référence une autre table.
- AUTO_INCREMENT : génère automatiquement un nouvel identifiant.

**Informations sur MySQL**

- SELECT VERSION(); : afficher la version de MySQL.
- SELECT USER(); : afficher l'utilisateur et l'hôte de connexion.
- SELECT DATABASE(); : afficher la base de données sélectionnée.
- SHOW STATUS; : afficher les statistiques du serveur.
- SHOW VARIABLES; : afficher les variables de configuration du serveur.
- SHOW VARIABLES LIKE 'time_zone'; : afficher le fuseau horaire configuré.
- SELECT NOW(); : afficher la date et l'heure actuelles.
- SET time_zone = 'Europe/Paris'; : définir le fuseau horaire de la connexion actuelle.

**Gestion des utilisateurs et permissions**

- SELECT CURRENT_USER(); : afficher l'utilisateur MySQL utilisé pour les autorisations.
- SHOW GRANTS; : afficher les permissions de l'utilisateur actuel.
- CREATE USER 'nom'@'localhost' IDENTIFIED BY 'mot_de_passe'; : créer un utilisateur.
- GRANT ALL PRIVILEGES ON nom_base.* TO 'nom'@'localhost'; : accorder toutes les permissions sur une base.
- REVOKE ALL PRIVILEGES ON nom_base.* FROM 'nom'@'localhost'; : retirer les permissions sur une base.
- DROP USER 'nom'@'localhost'; : supprimer un utilisateur.

**Clés étrangères et suppression**

Les options ON DELETE définissent ce qui se passe lorsqu'une ligne référencée est supprimée.

- ON DELETE CASCADE : supprime automatiquement les lignes liées.
- ON DELETE SET NULL : remplace la clé étrangère par NULL.
- ON DELETE RESTRICT : empêche la suppression si des lignes liées existent.
- ON DELETE NO ACTION : empêche également la suppression si des lignes liées existent (comportement proche de RESTRICT dans MySQL).

**Transactions SQL**

Une transaction permet de regrouper plusieurs opérations SQL pour les valider ensemble ou les annuler.

- START TRANSACTION; : commencer une transaction.
- COMMIT; : valider définitivement les modifications.
- ROLLBACK; : annuler les modifications effectuées depuis le début de la transaction.

**Requêtes préparées (Prepared Statements)**

- PREPARE nom_requete FROM 'requête SQL'; : préparer une requête SQL.
- ? : emplacement réservé à une valeur qui sera fournie plus tard.
- SET @nom = valeur; : stocker une valeur dans une variable MySQL.
- EXECUTE nom_requete USING @variable; : exécuter la requête avec la valeur de la variable.
- DEALLOCATE PREPARE nom_requete; : supprimer la requête préparée. (tu peut aussi ecrire DROP a la place de DEALLOCATE)

**Procédures stockées (Stored Procedures)**

Une procédure stockée est un ensemble d'instructions SQL enregistré dans MySQL et réutilisable grâce à son nom.

**Création :**

- CREATE PROCEDURE nom_procedure(...) : créer une procédure stockée.
- BEGIN : début du contenu de la procédure.
- END : fin du contenu de la procédure.
- CALL nom_procedure(...) : exécuter une procédure stockée.
- DROP PROCEDURE nom_procedure; : supprimer une procédure stockée.

**Paramètres :**

- IN nom TYPE : recevoir une valeur en entrée.
- OUT nom TYPE : retourner une valeur en sortie.
- INOUT nom TYPE : recevoir une valeur, la modifier et retourner le résultat.

**Délimiteurs (DELIMITER) :**

- DELIMITER // : remplacer temporairement le délimiteur ; par //.
- DELIMITER ; : remettre le délimiteur habituel.
- Permet d'utiliser des ; à l'intérieur d'une procédure sans arrêter sa création prématurément.

**Commandes pour consulter les procédures stockées :**

- SHOW PROCEDURE STATUS WHERE Db = 'nom_base'; : afficher la liste des procédures stockées d'une base de données.
- SHOW CREATE PROCEDURE nom_procedure; : afficher le code complet d'une procédure stockée précise.

**Commandes utiles dans le terminal MySQL**

- \help : afficher l'aide MySQL.
- \status : afficher les informations sur la connexion actuelle.
- \c : annuler la requête en cours de saisie.
- \q : quitter MySQL.
- \G : afficher le résultat verticalement au lieu d'un tableau.
- \s : afficher l'état de la connexion.
- SELECT DISTINCT colonne FROM table; : affiche les valeurs sans doublons.
- CREATE INDEX nom_index ON table (colonne); : crée un index pour accélérer certaines recherches.
- DROP INDEX nom_index ON table; : supprime un index.
- UNION : rassemble les résultats de plusieurs SELECT en supprimant les doublons.
- UNION ALL : rassemble les résultats de plusieurs SELECT en conservant les doublons.
- EXPLAIN SELECT ...; : affiche le plan d'exécution d'une requête.

## À retenir

- SHOW : afficher des informations.
- USE : sélectionner une base de données.
- DESCRIBE : examiner la structure d'une table.
- CREATE : créer un élément.
- DROP : supprimer un élément.
- ALTER : modifier la structure d'un élément.
- SET : modifier une variable ou un paramètre.
- SELECT : consulter des données ou des informations.
- Les commandes SQL se terminent généralement par un point-virgule (;).
