# Seconde Vie — Modèle de données et liste des écrans

## 1. Modèle de données

### Fiche Don

Un don regroupe les objets reçus de la part d'un donateur. (Donateur, demande de reçu).

Sources : mail « certains donateurs veulent un reçu » ; US08.

### Fiche Objet

Un objet appartient à une catégorie et possède un état, un prix de base lié à sa catégorie, un prix de vente calculé selon son état, une localisation et un statut de vente.

Sources : US01, US02, US03, US04 ; contrainte sur le calcul du prix.

### Liens entre les fiches

- Un don contient un ou plusieurs objets. (Hypothèse à confirmer : le mail ne précise pas explicitement la relation entre un don et les objets.)
- Chaque objet appartient à une catégorie. (US04 et contrainte sur le prix.)
- Le prix de vente d'un objet dépend du prix de base de sa catégorie et de son état. (US04 et contrainte sur le prix.)

## 2. Liste des écrans

### Écran 1 — Enregistrer un don

- **Utilité :** enregistrer les informations d'un don et les objets reçus.
- **Utilisateur :** bénévole.
- **Champs :** donateur, demande de reçu.
- **Boutons :** Enregistrer le don, Ajouter un objet.

Sources : mail « suivre les objets qu'on reçoit » et « certains donateurs veulent un reçu » ; US01, US08.

### Écran 2 — Gestion des objets

- **Utilité :** consulter et gérer les objets reçus.
- **Utilisateur :** bénévole.
- **Champs :** catégorie, état, prix de base, prix de vente, localisation, statut de vente.
- **Boutons :** Ajouter un objet, Modifier, Enregistrer.

Sources : US01, US02, US03, US04.

### Écran 3 — Définition du prix

- **Utilité :** déterminer le prix d'un objet selon sa catégorie et son état.
- **Utilisateur :** bénévole.
- **Champs :** catégorie, état, prix de base, prix de vente.
- **Boutons :** Calculer le prix, Enregistrer.

Sources : US04 et contrainte « Le prix dépend du prix de base de la catégorie et de l'état ».

### Écran 4 — Consultation des objets

- **Utilité :** retrouver les objets et connaître leur emplacement et leur statut de vente.
- **Utilisateur :** bénévole.
- **Champs :** catégorie, état, localisation, statut de vente, prix de vente.
- **Boutons :** Rechercher, Consulter.

Sources : US02, US03.

### Écran 5 — Émission d'un reçu

- **Utilité :** permettre de fournir un reçu à un donateur qui en fait la demande.
- **Utilisateur :** bénévole.
- **Champs :** donateur, demande de reçu.
- **Boutons :** Générer le reçu.

Source : US08.

## 3. Liste des hypothèses

Voici les éléments qui ne sont pas explicitement détaillés dans le mail ou les User Stories.

| Hypothèse                                                 | Pourquoi ?                                                                        |
| --------------------------------------------------------- | --------------------------------------------------------------------------------- |
| Un don peut contenir plusieurs objets.                    | La relation entre don et objets n'est pas précisée.                               |
| Un donateur possède des informations enregistrées.        | Le mail ne précise pas lesquelles.                                                |
| Le don possède une date.                                  | Aucune date d'enregistrement n'est demandée explicitement.                        |
| Chaque objet possède une catégorie.                       | Nécessaire pour appliquer la règle de prix communiquée.                           |
| Chaque objet possède un état.                             | Le prix dépend de l'état, mais les états possibles ne sont pas précisés.          |
| Le statut de vente est enregistré sur chaque objet.       | Le suivi des objets vendus est demandé, mais les modalités ne sont pas précisées. |
| La localisation est enregistrée sous forme d'emplacement. | Le mail demande de savoir où sont les objets, sans préciser le format.            |
| Le prix de base est défini pour chaque catégorie.         | La méthode est imposée, mais la gestion de ces prix n'est pas détaillée.          |

## 4. Questions à faire confirmer par la présidente

1. Un don peut-il contenir plusieurs objets ?
2. Quelles informations faut-il conserver sur un donateur ?
3. Quelles catégories d'objets souhaitez-vous utiliser ?
4. Quels états possibles souhaitez-vous attribuer aux objets ?
5. Comment souhaitez-vous définir et modifier les prix de base des catégories ?

**Important :** les hypothèses ne sont pas des règles validées. Il faudra les confirmer avant de figer le modèle de données.
