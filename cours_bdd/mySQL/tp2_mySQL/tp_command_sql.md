# Exercices SQL

## SELECT – Lire des données (bdd world.sql)

### 1. Afficher toutes les colonnes des pays ayant une population supérieure à 100 millions d’habitants

```sql
SELECT *
FROM `country`
WHERE population > 100000000;
```

### 2. Afficher le nom et la population des pays ayant une population supérieure à 100 millions d’habitants

```sql
SELECT name, population
FROM `country`
WHERE population > 100000000;
```

### 3. Afficher toutes les colonnes des pays ayant une population supérieure à 100 millions d’habitants et trier par nom de pays (Z → A)

```sql
SELECT *
FROM `country`
WHERE population > 100000000
ORDER BY name DESC;
```

### 4. Afficher toutes les colonnes des pays ayant une population supérieure à 100 millions d’habitants, une superficie inférieure à 5 millions et qui ne proviennent pas d’Asie

```sql
SELECT *
FROM `country`
WHERE population > 100000000
  AND SurfaceArea < 5000000
  AND Continent NOT LIKE 'Asia';
```

### 5. Affichez toutes les colonnes des pays ayant une population comprise entre 50 millions et 90 millions, qui ne proviennent pas d'Afrique et qui sont une république ou une république fédérale (ici, on met != a la place de NOT LIKE)

```sql
SELECT *
FROM `country`
WHERE population BETWEEN 50000000 AND 90000000
  AND Continent != 'Africa'
  AND GovernmentForm IN ('Republic', 'Federal Republic');
```

### 6. Affichez tous les pays contenant le mot Territory dans GovernementForm

```sql
SELECT *
FROM `country`
WHERE GovernmentForm LIKE '%Territory%';
```

### 7. Affichez le nombre de pays ayant le statut de république

```sql
SELECT COUNT(*)
FROM `country`
WHERE GovernmentForm = 'Republic';
```

### 8. Affichez le total de la population par continent

```sql
SELECT Continent, SUM(Population)
FROM `country`
GROUP BY Continent;
```

### 9. Affichez les 3 continents ayant la plus grande moyenne de population/pays (affichez également leur moyenne)

```sql
SELECT Continent, AVG(Population) AS moy_pop
FROM `country`
GROUP BY Continent
ORDER BY moy_pop DESC
LIMIT 3;
```

## SELECT – Lire des données avec les jointures (bdd ecole.sql)

### 10. Afficher la liste des élèves avec leur ville

```sql
SELECT etudiants.nom, ville.ville_nom
FROM `etudiants`
LEFT JOIN ville
ON ville.ville_id = etudiants.id_ville;
```

### 11. Afficher tous les nom et prénom des étudiants et les noms des cours auxquels ils sont inscrits.

```sql
SELECT etudiants.nom, etudiants.prenom, cours.intitule
FROM etudiants
INNER JOIN inscriptions
ON etudiants.id = inscriptions.etudiant_id
INNER JOIN cours
ON inscriptions.cours_id = cours.id;
```

### 12. Afficher les noms des cours qui n'ont pas d'étudiants inscrits.

```sql
SELECT cours.intitule
FROM cours
LEFT JOIN inscriptions ON cours.id = inscriptions.cours_id
WHERE inscriptions.cours_id IS NULL;
```

### 13. Afficher tous les étudiants et les noms des cours auxquels ils sont inscrits ainsi que la ville rattachée à l’étudiant et la salle rattachée au cours. Afficher toutes les données à l’exception des ID. Les cours ne possédant pas encore de salle doivent également s’afficher !

```sql
SELECT etudiants.nom, etudiants.prenom, etudiants.age, cours.intitule, cours.professeur, ville.ville_nom, salles.nom
FROM etudiants
INNER JOIN inscriptions ON etudiants.id = inscriptions.etudiant_id
INNER JOIN cours ON cours.id = inscriptions.cours_id
LEFT JOIN ville ON ville.ville_id = etudiants.id_ville
LEFT JOIN salles ON salles.id = cours.salle_id;
```

## CREATE, UPDATE, DELETE (bdd word.sql)

### 14. Modifiez la population de la France à 50 000

```sql
UPDATE `country`
SET Population = 50000
WHERE code = 'FRA';
```

### 15. Modifiez la population de la France à 80 000 et sa superficie à 8 000

```sql
UPDATE country
SET Population = 80000, SurfaceArea = 8000
WHERE Code = 'FRA'
```

### 16. Modifiez la superficie à 10 000 de tous les pays ayant une superficie inférieure à ce nombre

```sql
UPDATE country
SET SurfaceArea = 10000
WHERE SurfaceArea < 10000;
```

### 17. Déplacez tous les pays en Antarctique

```sql
UPDATE `country`
SET Continent = 'Antarctica';
```

### 18. Supprimez toutes les villes dont la population est supérieure à 10 000

```sql
DELETE FROM `city`
WHERE Population > 10000;
```

### 19. Créez votre propre ville en France (CountryCode doit donc contenir FRA) en renseignant tous les champs

```sql
INSERT INTO city (`Name`, `CountryCode`, `District`, `Population`)
VALUES ('BurgerCity', 'FRA', 'Steak', 1);
```
