# Seconde Vie — Module Dons : tri des User Stories, cas d'utilisation et questions

## 1. Tri des User Stories

| User Story                      | Classement  | Justification                                                                                                           |
| ------------------------------- | ----------- | ----------------------------------------------------------------------------------------------------------------------- |
| US01 : Suivi des objets reçus   | Fidèle      | Le mail demande de « suivre les objets qu'on reçoit ».                                                                  |
| US02 : Localisation des objets  | Fidèle      | « savoir où ils sont ».                                                                                                 |
| US03 : Suivi des ventes         | Fidèle      | « et ce qui est vendu ».                                                                                                |
| US04 : Harmonisation des prix   | À clarifier | Le mail dit que les bénévoles fixent les prix chacun à sa façon, mais ne demande pas explicitement une méthode commune. |
| US07 : Statistiques             | Fidèle      | « des statistiques pour la mairie » est une demande explicite.                                                          |
| US08 : Reçus pour les donateurs | Fidèle      | « certains donateurs veulent un reçu ».                                                                                 |
| US09 : Gestion sans tableurs    | Écartée     | C'est le contexte et l'objectif général du projet, pas un cas d'utilisation.                                            |
| US10 : Pas de vente en ligne    | Écartée     | C'est une contrainte de périmètre, pas une fonctionnalité.                                                              |
| US05, US06 : Permanences        | Hors module | Elles seront traitées au TP 1 avec les permanences.                                                                     |

## 2. Regroupement en cas d'utilisation

Un cas d'utilisation est un objectif complet, nommé par un verbe à l'infinitif.

| Cas d'utilisation          | Stories       | Remarque                                                                                                                                                            |
| -------------------------- | ------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| Enregistrer un don         | US01 (+ US04) | Saisir le donateur et ajouter ses objets forment un seul objectif. Le calcul du prix selon la catégorie et l'état est une règle du système, donc pas un cas à part. |
| Localiser un objet         | US02          |                                                                                                                                                                     |
| Enregistrer une vente      | US03          |                                                                                                                                                                     |
| Générer un reçu            | US08          |                                                                                                                                                                     |
| Consulter les statistiques | US07          |                                                                                                                                                                     |

## 3. Acteurs

| Acteur     | Cas d'utilisation                                                              |
| ---------- | ------------------------------------------------------------------------------ |
| Bénévole   | Enregistrer un don, Localiser un objet, Enregistrer une vente, Générer un reçu |
| Présidente | Consulter les statistiques                                                     |

Le donateur n'est pas un acteur : il ne se connecte pas à l'application et le mail ne le demande pas. C'est le bénévole qui génère le reçu pour lui. Le référent caisse n'apparaît pas pour l'instant, car la question de savoir qui enregistre les ventes est posée à la présidente (question 5).

Il n'y a aucune relation entre les cas (ni include, ni extend).

## 4. Questions pour la présidente

### Sur les stories à clarifier

1. Souhaitez-vous une grille tarifaire commune pour que tous les bénévoles fixent les prix de la même manière (selon la catégorie et l'état) ?

### Sur les informations absentes du mail

2. Quelles informations voulez-vous enregistrer pour chaque don (nom du donateur, coordonnées, date…) et pour chaque objet (désignation, catégorie, état, localisation…) ?
3. Quelles catégories d'objets et quels états possibles souhaitez-vous utiliser ? Par exemple, dans quelle catégorie classer un aquarium ?
4. Comment voulez-vous décrire la localisation d'un objet (rayon, étagère, réserve…) ?
5. Qui peut enregistrer une vente : tous les bénévoles ou seulement le référent caisse ?
6. Quelles informations doivent figurer sur le reçu, et doit-il avoir une valeur fiscale ou être un simple justificatif ?
7. Les donateurs ont-ils besoin d'accéder eux-mêmes à l'application, ou le bénévole gère-t-il le reçu pour eux ?
8. Quelles statistiques la mairie attend-elle (objets reçus, objets vendus, chiffre des ventes…), et qui les consulte ?
