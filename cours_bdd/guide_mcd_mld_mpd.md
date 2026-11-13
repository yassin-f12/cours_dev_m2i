# MCD, MLD et MPD

Exemple : une agence touristique.

## 1. MCD — Modèle Conceptuel de Données

Objectif : représenter les données et les relations entre elles.

Contenu :

- Entités
- Attributs
- Identifiants
- Associations (verbes)
- Cardinalités

Exemple :

CLIENT

- #client_id
- first_name
- last_name
- email

BOOKING

- #booking_id
- booking_date
- total_price

TRIP

- #trip_id
- name
- departure_date

DESTINATION

- #destination_id
- name
- country

Associations :

- CLIENT — MAKES — BOOKING (1,N — 1,1)
- BOOKING — CONCERNS — TRIP (1,1 — 0,N)
- TRIP — INCLUDES — DESTINATION (1,N — 0,N)

À retenir :
Pas de types SQL ni de clés étrangères dans le MCD.

## 2. MLD — Modèle Logique de Données

Objectif : transformer les entités du MCD en tables relationnelles.

Contenu :

- Tables et colonnes
- Clés primaires (PK)
- Clés étrangères (FK)

Exemple :

CLIENT

- client_id (PK)
- first_name
- last_name
- email

BOOKING

- booking_id (PK)
- booking_date
- total_price
- client_id (FK)
- trip_id (FK)

TRIP

- trip_id (PK)
- name
- departure_date

DESTINATION

- destination_id (PK)
- name
- country

TRIP_DESTINATION (table intermédiaire)

- trip_id (PK, FK)
- destination_id (PK, FK)

Règles :

- One-to-Many : la FK va du côté Many.
- Many-to-Many : création d'une table intermédiaire avec les deux FK.
- One-to-One : une FK est placée dans l'une des deux tables.

## 3. MPD — Modèle Physique de Données

Objectif : décrire précisément comment les tables seront organisées dans le système de base de données.

Contenu :

- Types de données (INT, VARCHAR, DATE...)
- Contraintes (NOT NULL, UNIQUE...)
- Clés primaires et étrangères
- Index et détails techniques

Exemple :

CLIENT

- client_id : INT, PRIMARY KEY
- first_name : VARCHAR(100), NOT NULL
- last_name : VARCHAR(100), NOT NULL
- email : VARCHAR(255), UNIQUE

## 4. Résumé

MCD :

- Entités
- Attributs
- Associations
- Cardinalités

MLD :

- Tables
- Colonnes
- PK
- FK

MPD :

- Types de données
- Contraintes
- Détails techniques

À retenir :

- MCD : je représente les données et leurs relations.
- MLD : je transforme les données en tables.
- MPD : je précise techniquement comment créer ces tables.
