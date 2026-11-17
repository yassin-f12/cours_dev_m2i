# Exercices SQL

## SELECT – Lire des données

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
