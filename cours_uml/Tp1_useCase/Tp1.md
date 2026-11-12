# Seconde Vie – dons et permanences : note justificative du diagramme

## Acteurs

- **Bénévole**
- **Référent caisse** : généralisation vers Bénévole (il hérite de tous ses cas)
- **Présidente**

## Cas d'utilisation et phrase du mail

| Cas                         | Acteur                     | Phrase du mail                                             | Story |
| --------------------------- | -------------------------- | ---------------------------------------------------------- | ----- |
| Enregistrer un don          | Bénévole                   | « suivre les objets qu'on reçoit »                         | US01  |
| Localiser un objet          | Bénévole                   | « savoir où ils sont »                                     | US02  |
| Enregistrer une vente       | Référent caisse            | « et ce qui est vendu »                                    | US03  |
| Éditer un reçu              | (étend Enregistrer un don) | « certains donateurs veulent un reçu »                     | US08  |
| S'inscrire à une permanence | Bénévole                   | « les bénévoles puissent s'inscrire aux permanences »      | US05  |
| Consulter les statistiques  | Présidente                 | « des statistiques pour la mairie »                        | US07  |
| S'authentifier              | (inclus)                   | Aucune phrase du mail, cas technique imposé par l'exercice | n/a   |

## Relations

- **«include»** : Chaque acteur doit être identifié avant d’agir → S'authentifier (il faut identifier le bénévole qui s'inscrit).
- **«extend»** : Éditer un reçu → Enregistrer un don, condition **[le donateur demande un reçu]**.
- **Généralisation** : Référent caisse → Bénévole.

## Vérifications

- Aucun cas de vente en ligne (le mail dit : « Pas besoin de vente en ligne pour l'instant »).
- US04 (prix) et US06 (trous du samedi) ne sont pas des cas : elles restent à clarifier avec la présidente. Le calcul du prix est une règle du système.
- « S'authentifier » ne vient pas du mail : il est ajouté pour l'«include» demandé. Le mail ne décrit pas de système de connexion.
