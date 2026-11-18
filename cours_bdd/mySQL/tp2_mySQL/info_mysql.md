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
