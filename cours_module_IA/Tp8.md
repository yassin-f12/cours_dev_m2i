# TP 8 - Les rôles et les droits de l'application Seconde Vie

**Projet :** Seconde Vie — ressourcerie associative
**Formation :** CDA — Concepteur Développeur d'Applications
**Étape :** définition et vérification des droits d'accès

---

## 1. Rôles retenus

Pour cet exercice, trois rôles sont retenus à partir du fonctionnement décrit dans le projet :

| Rôle                | Description                                                                                                                                                                                                      |
| ------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **Bénévole**        | Enregistre les dons et les objets, renseigne leur état et leur localisation, consulte les informations utiles à son activité et s'inscrit aux permanences.                                                       |
| **Référent caisse** | Est un bénévole désigné pour tenir la caisse pendant une permanence. Il conserve les droits nécessaires aux activités d'un bénévole et dispose en plus des droits liés à l'enregistrement des ventes.            |
| **Présidente**      | Supervise l'activité de la ressourcerie, organise les permanences, suit les bénévoles et consulte les statistiques destinées à la mairie. Elle dispose des droits de gestion nécessaires à cette responsabilité. |

**Précision :** le donateur n'est pas considéré comme un rôle de connexion à l'application. Il est une personne enregistrée dans le système à travers ses dons. Le mail ne demande pas que les donateurs se connectent eux-mêmes.

Le rôle « référent caisse » vient de la règle métier indiquant qu'une permanence doit compter au moins deux bénévoles, dont un référent caisse. Le rôle « présidente » est retenu pour cet exercice afin de représenter la personne qui supervise l'association. Ces profils et leurs droits devront être confirmés par la présidente.

## 2. Liste des actions recensées

Avant de construire la matrice, les actions de l'application ont été regroupées par domaine.

### Dons et donateurs

- Enregistrer un donateur.
- Consulter les informations d'un donateur.
- Modifier les informations d'un donateur.
- Enregistrer un don.
- Consulter un don.
- Modifier un don.
- Générer un reçu pour un don.
- Supprimer un don ou un donateur.
- Exporter des informations personnelles sur les donateurs.

### Objets et catégories

- Enregistrer un objet reçu.
- Consulter la liste des objets.
- Consulter la fiche d'un objet.
- Modifier un objet (désignation, état ou localisation).
- Consulter les catégories et leurs prix de base.
- Créer ou modifier une catégorie et son prix de base.
- Marquer un objet comme vendu.
- Supprimer un objet.

### Ventes

- Consulter les ventes.
- Enregistrer une vente regroupant plusieurs objets.
- Modifier ou annuler une vente.
- Exporter les données des ventes.

### Bénévoles et permanences

- Consulter la liste des bénévoles.
- Ajouter ou modifier un bénévole.
- Supprimer un bénévole.
- Consulter le planning des permanences.
- Créer ou modifier une permanence.
- S'inscrire à une permanence.
- Annuler sa propre inscription dans le délai prévu.
- Modifier ou annuler l'inscription d'un autre bénévole.
- Désigner le référent caisse d'une permanence.

### Statistiques

- Consulter les statistiques de l'association.
- Exporter les statistiques destinées à la mairie.

**Périmètre :** les actions ci-dessus couvrent les besoins connus des modules Dons et Objets, Ventes, Bénévoles, Permanences et Statistiques. La vente en ligne n'est pas incluse.

## 3. Matrice des droits corrigée

Légende : **Oui** = le rôle peut réaliser l'action ; **Non** = le rôle ne dispose pas de ce droit.

| Action                                                   | Bénévole | Référent caisse | Présidente | Justification des droits accordés                                                                                                                                                                                 |
| -------------------------------------------------------- | :------: | :-------------: | :--------: | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| Enregistrer un donateur                                  |   Oui    |       Oui       |    Oui     | Le bénévole qui accueille un don doit pouvoir identifier le donateur ; le référent caisse conserve les droits de bénévole ; la présidente doit pouvoir intervenir en cas de besoin.                               |
| Consulter les informations d'un donateur                 |   Oui*   |      Oui*       |    Oui     | Le bénévole et le référent caisse peuvent consulter les informations nécessaires au traitement du don dont ils s'occupent ; la présidente supervise le suivi des dons et les demandes de reçus.                   |
| Modifier les informations d'un donateur                  |   Oui*   |      Oui*       |    Oui     | La correction d'une coordonnée erronée peut être nécessaire lors du traitement d'un don ; la présidente peut corriger les dossiers.                                                                               |
| Enregistrer un don                                       |   Oui    |       Oui       |    Oui     | L'enregistrement des dons fait partie du suivi quotidien de la ressourcerie ; le référent caisse conserve les droits de bénévole ; la présidente peut intervenir.                                                 |
| Consulter un don                                         |   Oui*   |      Oui*       |    Oui     | Le bénévole et le référent caisse consultent les dons nécessaires à leur activité ; la présidente a besoin d'une vue de suivi globale.                                                                            |
| Modifier un don                                          |   Oui*   |      Oui*       |    Oui     | Une correction peut être nécessaire après la saisie ; les modifications doivent rester limitées aux dons traités ou aux corrections autorisées.                                                                   |
| Générer un reçu pour un don                              |   Oui    |       Oui       |    Oui     | Un bénévole chargé de l'accueil peut répondre à la demande du donateur ; le référent caisse conserve les droits de bénévole ; la présidente peut également générer un reçu.                                       |
| Supprimer un don ou un donateur                          |   Non    |       Non       |   Non**    | La suppression ferait perdre l'historique des dons et pourrait affecter les objets associés ou un reçu. Aucun besoin de suppression n'est défini dans le mail ou les User Stories.                                |
| Exporter des informations personnelles sur les donateurs |   Non    |       Non       |   Non**    | L'export de données personnelles n'est pas nécessaire aux tâches courantes décrites. Les statistiques destinées à la mairie doivent être privilégiées sous une forme agrégée, sans liste nominative de donateurs. |
| Enregistrer un objet reçu                                |   Oui    |       Oui       |    Oui     | L'enregistrement des objets reçus est une activité centrale du bénévole ; le référent caisse conserve les droits de bénévole ; la présidente peut intervenir.                                                     |
| Consulter la liste des objets                            |   Oui    |       Oui       |    Oui     | Les bénévoles doivent retrouver les objets ; le référent caisse en a besoin pour les ventes ; la présidente supervise le stock.                                                                                   |
| Consulter la fiche d'un objet                            |   Oui    |       Oui       |    Oui     | Les informations de l'objet sont nécessaires au suivi, à la localisation et à la vente.                                                                                                                           |
| Modifier un objet (désignation, état ou localisation)    |   Oui    |       Oui       |    Oui     | Les bénévoles mettent à jour les informations utiles au suivi des objets ; le référent caisse conserve les droits de bénévole ; la présidente peut corriger une fiche.                                            |
| Consulter les catégories et leurs prix de base           |   Oui    |       Oui       |    Oui     | Le prix de vente dépend de la catégorie et de l'état ; les personnes qui enregistrent ou vendent un objet doivent pouvoir consulter la référence tarifaire.                                                       |
| Créer ou modifier une catégorie et son prix de base      |   Non    |       Non       |   Oui**    | Une modification du référentiel tarifaire a des conséquences sur les prix ; elle doit être centralisée plutôt que laissée à chaque bénévole. Ce choix doit être validé par la présidente.                         |
| Marquer un objet comme vendu / enregistrer une vente     |   Non    |       Oui       |    Oui     | Le référent caisse est chargé de l'activité de caisse pendant la permanence ; la présidente doit pouvoir superviser et corriger une opération selon une procédure à définir.                                      |
| Supprimer un objet                                       |   Non    |       Non       |   Non**    | Un objet fait partie de l'historique des dons et du suivi de stock ; sa suppression pourrait faire perdre une information utile. Aucun besoin de suppression n'est défini.                                        |
| Consulter les ventes                                     |   Non    |       Oui       |    Oui     | Le référent caisse doit vérifier les ventes réalisées ; la présidente suit l'activité globale de la ressourcerie.                                                                                                 |
| Enregistrer une vente regroupant plusieurs objets        |   Non    |       Oui       |    Oui     | Le référent caisse enregistre les ventes pendant sa permanence ; la présidente peut assurer cette opération en cas de besoin.                                                                                     |
| Modifier ou annuler une vente                            |   Non    |       Non       |   Oui**    | Une modification ou une annulation peut avoir un effet sur plusieurs objets et sur le suivi des ventes ; elle doit être réservée à la présidente, sous réserve d'une procédure validée.                           |
| Exporter les données détaillées des ventes               |   Non    |       Non       |   Oui**    | La présidente peut avoir besoin de données de synthèse pour le suivi de l'association ; l'export doit être limité aux informations nécessaires et ne pas inclure de données personnelles sans justification.      |
| Consulter la liste des bénévoles                         |   Oui*   |      Oui*       |    Oui     | Un bénévole peut avoir besoin de connaître les personnes inscrites à une même permanence ; la présidente doit pouvoir organiser l'équipe. L'accès doit rester limité aux informations utiles.                     |
| Ajouter ou modifier un bénévole                          |   Non    |       Non       |   Oui**    | La gestion des dossiers des bénévoles relève de la supervision de l'association ; ce droit doit être confirmé.                                                                                                    |
| Supprimer un bénévole                                    |   Non    |       Non       |   Non**    | La suppression peut casser l'historique des inscriptions et des permanences. Une désactivation ou une conservation de l'historique serait à étudier plutôt qu'une suppression définitive.                         |
| Consulter le planning des permanences                    |   Oui    |       Oui       |    Oui     | Les bénévoles doivent connaître les créneaux ; le référent caisse doit connaître la permanence où il intervient ; la présidente organise le planning.                                                             |
| Créer ou modifier une permanence                         |   Non    |       Non       |    Oui     | La présidente organise les créneaux et doit veiller à leur couverture. Aucun besoin ne justifie que tous les bénévoles modifient le planning.                                                                     |
| S'inscrire à une permanence                              |   Oui    |       Oui       |   Non**    | L'inscription est prévue pour les bénévoles ; le référent caisse est lui-même un bénévole. Le rôle de la présidente comme participante n'est pas défini.                                                          |
| Annuler sa propre inscription dans le délai prévu        |   Oui    |       Oui       |   Non**    | La règle métier autorise un bénévole à se désinscrire jusqu'à 48 heures avant la permanence ; le référent caisse est également bénévole.                                                                          |
| Modifier ou annuler l'inscription d'un autre bénévole    |   Non    |       Non       |   Oui**    | La présidente doit pouvoir traiter une erreur ou une situation exceptionnelle d'organisation ; ce droit doit être confirmé et encadré.                                                                            |
| Désigner le référent caisse d'une permanence             |   Non    |       Non       |   Oui**    | Il faut garantir qu'une permanence dispose d'un référent caisse ; la désignation relève de l'organisation des permanences.                                                                                        |
| Consulter les statistiques de l'association              |   Non    |       Non       |    Oui     | Les statistiques sont prévues pour la mairie et le suivi de l'association ; la présidente est le rôle qui en a besoin.                                                                                            |
| Exporter les statistiques destinées à la mairie          |   Non    |       Non       |    Oui     | La présidente est l'interlocutrice de la mairie ; elle doit pouvoir transmettre les indicateurs demandés, sans exporter inutilement des données personnelles.                                                     |

**Portée des droits avec astérisque :**

- `Oui*` : accès limité aux informations nécessaires à l'activité, par exemple au don ou à la permanence concernée ; cela ne signifie pas un accès libre à toutes les données personnelles.
- `Non**` : droit volontairement refusé dans la matrice actuelle ou décision proposée sous réserve d'une validation de la présidente. Les cas concernés sont repris dans les questions ci-dessous.

## 4. Justification des droits sensibles

### 4.1 Supprimer

La suppression définitive est refusée aux trois rôles pour les dons, les objets, les donateurs et les bénévoles, ainsi que pour les ventes.

**Pourquoi ?**

- Un don est lié à un ou plusieurs objets : supprimer le don pourrait faire perdre le lien avec les objets reçus.
- Un objet vendu doit conserver son historique et ne revient pas en stock.
- La suppression d'un donateur pourrait rendre difficile le suivi des dons précédents et des reçus.
- La suppression d'un bénévole pourrait faire perdre l'historique de ses inscriptions.

**Décision proposée :** privilégier une correction contrôlée ou une désactivation plutôt qu'une suppression définitive. Le fonctionnement exact doit être validé par la présidente.

### 4.2 Exporter

- La présidente peut exporter les statistiques nécessaires à la mairie.
- Les bénévoles et le référent caisse ne peuvent pas exporter les données détaillées.
- Aucun rôle ne peut exporter une liste nominative complète des donateurs dans la matrice actuelle.

**Pourquoi ?** Le mail demande des statistiques pour la mairie, mais ne demande pas de transmettre les coordonnées des donateurs. Un export agrégé répond au besoin sans diffuser inutilement de données personnelles.

### 4.3 Consulter des données personnelles

Le nom et les coordonnées d'un donateur sont des informations personnelles. L'accès des bénévoles et des référents caisse doit être limité aux informations nécessaires au don qu'ils traitent. La présidente peut consulter les dossiers pour assurer le suivi des dons et des reçus.

Les bénévoles n'ont pas besoin d'accéder à l'ensemble des coordonnées de tous les donateurs pour localiser un objet ou suivre le stock. De même, le référent caisse n'a pas besoin de consulter les coordonnées des donateurs pour enregistrer une vente.

### 4.4 Modifier les prix de base

La consultation des catégories et des prix de base est ouverte aux rôles qui enregistrent ou vendent des objets. En revanche, la modification du référentiel tarifaire est réservée à la présidente dans cette proposition, afin de garder une règle commune et d'éviter que chaque bénévole change les prix de base.

Cette restriction est un choix de conception à valider : le mail signale des pratiques de prix différentes, mais ne précise pas qui doit administrer les catégories et les prix de base.

## 5. Questions à poser à la présidente

1. **Qui peut consulter les coordonnées complètes des donateurs ?** Tous les bénévoles, uniquement les personnes qui enregistrent un don, ou seulement la présidente ? Les bénévoles doivent-ils voir l'adresse et le téléphone, ou seulement le nom et l'e-mail lorsque le reçu est demandé ?
2. **Qui peut modifier les catégories et les prix de base ?** La présidente uniquement, un responsable désigné ou plusieurs bénévoles autorisés ?
3. **Qui peut enregistrer et annuler une vente ?** Le référent caisse uniquement, ou tout bénévole formé ? Qui valide une annulation ou une erreur de caisse ?
4. **La présidente doit-elle pouvoir s'inscrire elle-même aux permanences comme un bénévole ?** Si oui, doit-elle disposer des mêmes droits d'inscription ?
5. **Que doit-il se passer lorsqu'une fiche est erronée ?** Faut-il autoriser une suppression, ou conserver la fiche et permettre une correction avec historique ?
6. **Quelles données la mairie doit-elle recevoir ?** Des statistiques globales uniquement, ou certains détails supplémentaires ? Les exports doivent-ils exclure systématiquement les noms et coordonnées des donateurs et des bénévoles ?
7. **Le référent caisse est-il toujours un bénévole désigné pour une permanence, ou s'agit-il d'un rôle permanent attribué à certaines personnes ?**

## 6. Corrections apportées à la proposition initiale de l'assistant

| Proposition initiale ou droit envisagé                                   | Correction retenue                                                                                                                                             | Pourquoi                                                                                                                                                                     | Source du projet                                                                                                          |
| ------------------------------------------------------------------------ | -------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------- |
| Donner aux trois rôles la possibilité de supprimer des fiches            | Aucun droit de suppression définitive dans la matrice                                                                                                          | La suppression pourrait faire perdre l'historique des dons, objets, ventes ou inscriptions ; aucun besoin de suppression n'est formulé.                                      | Mail : suivi des objets reçus et vendus ; US01, US03 et US08. Règle communiquée : un objet vendu ne revient pas en stock. |
| Autoriser l'export de toutes les données par la présidente               | Autoriser uniquement l'export des statistiques utiles à la mairie ; refuser l'export général des données personnelles                                          | Le besoin exprimé porte sur des statistiques pour la mairie, pas sur la transmission de listes nominatives.                                                                  | Mail : « des statistiques pour la mairie ». US07.                                                                         |
| Permettre à tous les bénévoles d'enregistrer ou d'annuler une vente      | Réserver l'enregistrement des ventes au référent caisse et à la présidente ; réserver l'annulation à la présidente dans la proposition                         | Le rôle de référent caisse est prévu dans les règles des permanences ; la gestion des erreurs de vente reste à valider.                                                      | Règle des permanences : au moins deux bénévoles, dont un référent caisse ; US03.                                          |
| Donner à tous les bénévoles accès à toutes les coordonnées des donateurs | Limiter la consultation aux données nécessaires au don traité ; la présidente conserve la vue de supervision                                                   | Les coordonnées ne sont pas nécessaires au suivi courant de chaque objet.                                                                                                    | US01, US02 et US08 ; mail sur les reçus demandés par certains donateurs.                                                  |
| Autoriser les bénévoles à modifier librement les prix de base            | Autoriser la consultation, mais réserver la modification du référentiel à la présidente dans la proposition                                                    | Le prix dépend de la catégorie et de l'état ; le mail signale des pratiques de prix variables. Une règle commune doit éviter les modifications individuelles non contrôlées. | US04 et contrainte du TP : prix de base de la catégorie et état.                                                          |
| Créer un rôle de connexion pour les donateurs                            | Ne pas créer de rôle Donateur dans la matrice                                                                                                                  | Le mail demande qu'un donateur puisse obtenir un reçu, mais ne demande pas de compte ni d'accès à l'application.                                                             | US08 et mail : « certains donateurs veulent un reçu ».                                                                    |
| Donner à tous les bénévoles le droit de modifier le planning             | Réserver la création et la modification des permanences à la présidente ; permettre aux bénévoles de consulter le planning et de gérer leur propre inscription | Les bénévoles doivent s'inscrire ; les règles d'organisation et de couverture des créneaux doivent être supervisées.                                                         | US05 et US06 ; règles métier des permanences communiquées.                                                                |

## 7. Limites et hypothèses de cette matrice

- Les trois rôles sont une proposition de travail construite à partir des informations disponibles. Leur intitulé et leur périmètre doivent être validés par la présidente.
- Le référent caisse est considéré comme un bénévole qui possède des droits supplémentaires liés aux ventes.
- La présidente est considérée comme responsable de l'organisation et du suivi de l'association.
- Le mail ne précise pas le système de connexion, les comptes utilisateurs, ni les règles techniques d'authentification. La matrice décrit les droits fonctionnels attendus ; elle ne constitue pas encore une spécification technique complète de sécurité.
- Les droits de consultation des données personnelles doivent être précisés avant le développement.
- Les règles de suppression, de correction et d'annulation ne sont pas décrites dans le mail ; les restrictions proposées sont donc prudentes et restent à valider.
- Les actions d'export concernent les statistiques ou les données détaillées de gestion ; aucun besoin d'export des coordonnées des donateurs n'a été identifié.

## 8. Bilan

La matrice distingue les responsabilités des trois profils :

- Le **bénévole** réalise les tâches quotidiennes de réception et de suivi des dons et des objets, et gère sa propre inscription aux permanences.
- Le **référent caisse** conserve les droits du bénévole et possède les droits supplémentaires nécessaires à l'enregistrement et à la consultation des ventes.
- La **présidente** supervise les données, les catégories et les prix de référence, l'organisation des permanences et les statistiques destinées à la mairie.

Les droits sensibles sont limités : pas de suppression définitive dans la proposition actuelle, export statistique réservé à la présidente et accès aux données personnelles limité au besoin professionnel.

Les questions de la section 5 doivent être soumises à la présidente avant de figer les droits et de développer l'authentification.
