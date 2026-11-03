# TP 7 — Plan de lancement du projet Seconde Vie

**Formation :** CDA — Concepteur Développeur d'Applications
**Projet :** Seconde Vie — application de gestion pour une ressourcerie associative
**Périmètre du travail :** priorisation du backlog, planification en trois sprints, risques, glossaire et corrections des propositions de l'IA.

> **Statut du document :** proposition de planification à relire et à valider. Les exigences issues du mail et des User Stories sont séparées des décisions de conception et des hypothèses.

---

## 1. Contexte et sources utilisées

### 1.1 Présentation du projet

Seconde Vie est une application destinée à une ressourcerie associative. L'association utilise actuellement des tableurs et souhaite centraliser le suivi des dons, des objets reçus, de leur emplacement et de leurs ventes. Le volume annoncé est d'environ **200 objets reçus par semaine**.

Le projet comprend également l'inscription des bénévoles aux permanences, le suivi de leur couverture, des statistiques destinées à la mairie et la possibilité de fournir un reçu à certains donateurs. La vente en ligne est explicitement exclue du périmètre actuel.

### 1.2 Mail de la présidente — besoin initial

> Bonjour,
>
> Comme convenu, voici ce qu'on aimerait.
>
> Aujourd'hui on note tout dans des tableurs et on s'y perd.
>
> On voudrait une appli pour suivre les objets qu'on reçoit (on en reçoit à peu près 200 par semaine), savoir où ils sont et ce qui est vendu.
>
> Les bénévoles mettent un prix selon l'état, mais chacun fait un peu à sa façon.
>
> Il faudrait que les bénévoles puissent s'inscrire aux permanences parce qu'on a souvent des trous le samedi.
>
> Ce serait bien d'avoir aussi des statistiques pour la mairie, qui nous subventionne.
>
> Et certains donateurs veulent un reçu.
>
> Pas besoin de vente en ligne pour l'instant.
>
> Merci, la présidente.

**À vérifier avant remise :** le plan reprend le mail original communiqué dans le contexte du projet. Vérifier qu'il correspond bien, mot pour mot, au mail complet de la slide 48 du support de cours.

### 1.3 Backlog de référence — 8 User Stories

Les User Stories ci-dessous sont les huit stories fonctionnelles reformulées à partir du mail. Elles ne sont pas toutes formulées mot pour mot dans le mail.

| ID   | User Story                                                                                                                                                             | Besoin source                                                                                                                                                  |
| ---- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| US01 | En tant que bénévole, je veux enregistrer les objets reçus afin de suivre les objets qui arrivent dans la ressourcerie.                                                | « suivre les objets qu'on reçoit »                                                                                                                             |
| US02 | En tant que bénévole, je veux connaître l'emplacement des objets afin de pouvoir les retrouver dans la ressourcerie.                                                   | « savoir où ils sont »                                                                                                                                         |
| US03 | En tant que bénévole, je veux connaître les objets qui ont été vendus afin de suivre les ventes de la ressourcerie.                                                    | « et ce qui est vendu »                                                                                                                                        |
| US04 | En tant que bénévole, je veux disposer d'une règle commune pour fixer le prix des objets selon leur état afin de limiter les différences entre bénévoles.              | « Les bénévoles mettent un prix selon l'état, mais chacun fait un peu à sa façon » et contrainte du TP : prix selon le prix de base de la catégorie et l'état. |
| US05 | En tant que bénévole, je veux m'inscrire aux permanences afin de participer à leur organisation.                                                                       | « les bénévoles puissent s'inscrire aux permanences »                                                                                                          |
| US06 | En tant que responsable de l'organisation, je veux repérer les permanences insuffisamment couvertes afin de limiter les créneaux sans bénévoles, notamment le samedi.  | « on a souvent des trous le samedi »                                                                                                                           |
| US07 | En tant que responsable de l'association, je veux disposer de statistiques sur l'activité afin de fournir des informations à la mairie qui subventionne l'association. | « des statistiques pour la mairie, qui nous subventionne »                                                                                                     |
| US08 | En tant que donateur, je veux pouvoir obtenir un reçu pour mon don afin de disposer d'un justificatif.                                                                 | « certains donateurs veulent un reçu »                                                                                                                         |

**Éléments qui ne sont pas des User Stories fonctionnelles :**

- Le remplacement des tableurs est le contexte général et l'objectif du projet, pas une fonctionnalité distincte.
- L'absence de vente en ligne est une contrainte de périmètre, pas une User Story. La vente en ligne est donc classée « pas maintenant » dans le plan, sans créer une US supplémentaire.

### 1.4 Informations connues sur l'équipe et la capacité

Le projet est actuellement réalisé individuellement. Le TP est présenté comme un travail en binôme, mais l'organisation réelle communiquée pour ce projet est un travail seul.

Aucun nombre d'heures disponibles par semaine, aucune date de disponibilité précise et aucune capacité en points ne sont fournis. Les trois sprints ci-dessous constituent donc un **ordre de réalisation proposé**, pas une promesse de charge réalisable en six semaines. La charge devra être réévaluée selon le temps réellement disponible.

### 1.5 Règles métier complémentaires déjà communiquées

Les règles suivantes ont été données pour le module des permanences :

- Une permanence dure 3 heures.
- Les permanences ont lieu le mardi, le jeudi ou le samedi, le matin ou l'après-midi.
- Une permanence doit compter au moins deux bénévoles, dont un référent caisse.
- Un bénévole ne réalise pas plus de deux permanences par semaine.
- Un bénévole peut se désinscrire jusqu'à 48 heures avant la permanence.

Autre règle métier explicitement précisée pour les objets : **un objet vendu ne revient pas en stock**.

Ces règles sont à conserver comme informations communiquées pour le projet. Elles ne figurent pas toutes dans le mail initial.

---

## 2. Priorisation du backlog

### 2.1 Classement proposé

| Priorité           | User Stories                                                                                                                                                  | Justification                                                                                                                                                                                                                            |
| ------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **Indispensable**  | US01 — Enregistrer les objets reçus ; US02 — Localiser les objets ; US03 — Suivre les objets vendus                                                           | Ce sont les fonctions centrales explicitement demandées pour suivre les objets, savoir où ils se trouvent et distinguer ceux qui sont vendus. Sans elles, l'application ne répond pas au besoin principal de gestion des objets.         |
| **Important**      | US04 — Harmoniser la fixation des prix ; US05 — S'inscrire aux permanences ; US06 — Repérer les permanences insuffisamment couvertes ; US08 — Obtenir un reçu | Le mail décrit clairement les problèmes de prix, les inscriptions aux permanences, les trous du samedi et les demandes de reçus. Ces besoins sont importants, mais peuvent être planifiés après la première version du suivi des objets. |
| **Souhaitable**    | US07 — Consulter des statistiques pour la mairie                                                                                                              | Le mail formule ce besoin par « Ce serait bien », sans préciser les indicateurs attendus. Il est pertinent, mais les données à présenter et le format du rapport doivent d'abord être définis.                                           |
| **Pas maintenant** | Vente en ligne — hors backlog fonctionnel                                                                                                                     | La présidente indique explicitement : « Pas besoin de vente en ligne pour l'instant. » Cette fonctionnalité est exclue du périmètre actuel.                                                                                              |

### 2.2 Vérification avec le mail complet

Le classement est cohérent avec les formulations du mail :

- Le suivi des objets, leur emplacement et les ventes sont exprimés directement : priorité indispensable.
- La fixation des prix, les permanences et les reçus correspondent à des besoins clairement identifiés : priorité importante.
- Les statistiques sont souhaitées, mais restent peu précises : priorité souhaitable à ce stade.
- La vente en ligne est explicitement écartée : pas maintenant.

**Point à faire valider :** le niveau de priorité est une décision de planification proposée. La présidente ou le commanditaire peut demander de remonter US08 ou US07 selon ses contraintes réelles.

---

## 3. Planification en trois sprints de deux semaines

### Principes de planification

1. Commencer par les données fondamentales : un objet doit pouvoir être enregistré avant d'être localisé, vendu ou inclus dans des statistiques.
2. Traiter les prix après avoir défini les catégories, les états et la règle de calcul.
3. Traiter les ventes après l'enregistrement des objets.
4. Traiter le reçu à partir des informations du don et du donateur.
5. Traiter les inscriptions et la couverture des permanences dans le même ensemble fonctionnel, car US06 dépend de l'existence des permanences et des inscriptions.
6. Préparer les statistiques après la disponibilité de données fiables sur l'activité.

### Sprint 1 — Semaines 1 et 2 : enregistrer et localiser les objets

**Objectif :** disposer d'une première version utilisable pour enregistrer les dons et les objets reçus, puis retrouver leur emplacement.

**User Stories :**

- US01 — Enregistrer les objets reçus.
- US02 — Localiser les objets.

**Travaux prévus :**

- Mettre en place les premières données Don, Donateur, Objet et Catégorie.
- Permettre l'enregistrement d'un don et des objets qui lui sont associés.
- Enregistrer la désignation, la catégorie et l'état d'un objet.
- Enregistrer la localisation d'un objet.
- Construire les écrans de gestion des dons, de liste des objets et de fiche objet à partir des wireframes retenus.
- Préparer une liste de catégories, d'états et de localisations à faire valider.

**Dépendances et points de vigilance :**

- Les catégories et les états possibles ne sont pas encore fournis dans le mail.
- La localisation doit être suffisamment claire pour que les bénévoles retrouvent les objets.
- Les champs réellement obligatoires doivent être décidés sans demander des informations inutiles.

**Livrable de fin de sprint :** un don et ses objets peuvent être enregistrés ; chaque objet possède une catégorie, un état et une localisation renseignés selon les valeurs validées.

### Sprint 2 — Semaines 3 et 4 : fixer les prix, suivre les ventes et gérer les reçus

**Objectif :** compléter la gestion des objets en permettant de fixer un prix cohérent, d'enregistrer une vente et de répondre à une demande de reçu.

**User Stories :**

- US03 — Suivre les objets vendus.
- US04 — Harmoniser la fixation des prix.
- US08 — Obtenir un reçu pour un don.

**Travaux prévus :**

- Mettre en place l'enregistrement d'une vente et son association avec les objets concernés.
- Permettre à une vente de regrouper plusieurs objets, conformément au cas de vente du samedi testé au TP 5.
- Appliquer une règle de prix fondée sur le prix de base de la catégorie et l'état de l'objet.
- Générer un reçu lorsqu'un donateur en fait la demande, après validation de son contenu et des informations nécessaires.
- Conserver la règle : un objet vendu ne revient pas en stock.

**Dépendances et points de vigilance :**

- US03 dépend de l'existence des objets enregistrés (US01).
- US04 dépend des catégories, des prix de base, de la liste des états et de la grille tarifaire validée. Le mail et la consigne du TP ne fournissent pas les coefficients ou montants exacts.
- US08 dépend des informations du donateur et du don. Le mail ne précise ni le contenu, ni le format, ni la nature fiscale éventuelle du reçu.

**Livrable de fin de sprint :** les objets vendus sont rattachés à une vente ; leur prix est établi selon une règle validée ; un reçu peut être préparé pour les dons concernés.

### Sprint 3 — Semaines 5 et 6 : organiser les permanences et préparer les statistiques

**Objectif :** permettre aux bénévoles de s'inscrire aux permanences, repérer les créneaux insuffisamment couverts et préparer les statistiques demandées par la mairie.

**User Stories :**

- US05 — S'inscrire aux permanences.
- US06 — Repérer les permanences insuffisamment couvertes.
- US07 — Consulter des statistiques pour la mairie (**objectif complémentaire, selon la capacité restante**).

**Travaux prévus :**

- Enregistrer les permanences et leurs créneaux.
- Permettre à un bénévole de s'inscrire à une permanence.
- Vérifier les règles de fonctionnement communiquées : durée de trois heures, jours et créneaux autorisés, minimum de deux bénévoles dont un référent caisse, maximum de deux permanences par bénévole et délai de désinscription de 48 heures.
- Repérer les permanences qui n'atteignent pas la couverture nécessaire.
- Définir avec le commanditaire les indicateurs statistiques attendus par la mairie.
- Produire une première présentation des indicateurs uniquement lorsque les données sources sont suffisamment fiables.

**Dépendances et points de vigilance :**

- US06 dépend de la gestion des permanences et des inscriptions (US05).
- Les règles de couverture et de désinscription doivent être confirmées et testées.
- US07 dépend de données de dons, d'objets et de ventes fiables. Les indicateurs ne sont pas définis dans le mail.
- US07 est un objectif complémentaire : si le temps manque, il reste dans le backlog pour une itération ultérieure plutôt que de mettre en risque US05 et US06.

**Livrable de fin de sprint :** les bénévoles peuvent s'inscrire aux permanences et les créneaux incomplets sont identifiables ; une première version des statistiques est préparée si les indicateurs ont été validés et si la capacité le permet.

### 3.1 Vue synthétique du planning

| Sprint   |      Durée | User Stories principales                     | Résultat attendu                                                                                       |
| -------- | ---------: | -------------------------------------------- | ------------------------------------------------------------------------------------------------------ |
| Sprint 1 | 2 semaines | US01, US02                                   | Enregistrer les dons et objets, renseigner et retrouver leur localisation.                             |
| Sprint 2 | 2 semaines | US03, US04, US08                             | Suivre les ventes, fixer les prix selon une règle validée et générer les reçus demandés.               |
| Sprint 3 | 2 semaines | US05, US06 ; US07 en objectif complémentaire | Gérer les inscriptions, repérer les permanences insuffisamment couvertes et préparer les statistiques. |

### 3.2 Vérification de l'ordre et de la charge

**Ordre des dépendances :**

- US01 précède US02, US03 et US07, car les objets doivent exister dans l'application avant d'être localisés, vendus ou comptabilisés.
- US04 nécessite les catégories, les prix de base et les états définis avant de pouvoir calculer les prix.
- US08 nécessite un don et les informations utiles du donateur.
- US06 nécessite les permanences et les inscriptions prévues par US05.
- US07 nécessite des données fiables et des indicateurs définis.

**Charge :** aucune estimation en heures ou en points n'est avancée, car le nombre d'heures disponibles par semaine n'a pas été communiqué. Le projet étant réalisé seul, les trois sprints doivent être ajustés après estimation de chaque User Story. US07 est volontairement placé en objectif complémentaire pour protéger les fonctionnalités plus prioritaires.

---

## 4. Les cinq principaux risques du projet

L'évaluation de probabilité et d'impact ci-dessous est qualitative et constitue une première appréciation à réviser avec le commanditaire.

|  N° | Risque lié à Seconde Vie                                                                                                                                                                                                    | Source / justification                                                                                                                                                                                                                    | Probabilité      | Impact        | Prévention ou réponse proposée                                                                                                                                                                                                                                           |
| --: | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------- | ------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ |
|  R1 | Les catégories, les états et les localisations ne sont pas définis de manière commune. Les bénévoles pourraient classer un même objet différemment ou ne pas savoir dans quelle catégorie placer un objet comme l'aquarium. | TP4 : prix selon la catégorie et l'état ; TP5, cas 2 : aquarium de M. Petit et question sur sa catégorie ; mail : savoir où se trouvent les objets.                                                                                       | Élevée           | Élevé         | Faire valider une liste de catégories, d'états et de localisations avant la saisie à grande échelle. Prévoir une procédure de traitement des objets sans catégorie adaptée.                                                                                              |
|  R2 | La règle de calcul des prix reste incomplète : le prix dépend du prix de base de la catégorie et de l'état, mais aucune grille de coefficients ou de montants n'est fournie.                                                | Mail : les bénévoles fixent les prix selon l'état de façon variable ; contrainte du TP4 : prix de base de la catégorie et état.                                                                                                           | Élevée           | Élevé         | Faire valider par la présidente une grille de prix avant d'automatiser le calcul. Ne pas utiliser de pourcentages arbitraires.                                                                                                                                           |
|  R3 | Le volume d'environ 200 objets reçus par semaine peut rendre la saisie et la mise à jour difficiles, surtout avec un développement et une organisation réalisés par une seule personne.                                     | Mail : environ 200 objets reçus par semaine ; organisation actuelle du projet : travail individuel.                                                                                                                                       | Moyenne à élevée | Élevé         | Tester le parcours d'enregistrement sur un lot représentatif, limiter les champs obligatoires aux informations réellement nécessaires et vérifier que la recherche d'un objet reste pratique. Réévaluer la charge de chaque sprint selon le temps réellement disponible. |
|  R4 | Les permanences du samedi risquent de rester incomplètes malgré les inscriptions ; les règles de couverture et de désinscription rendent l'organisation plus contraignante.                                                 | Mail : « trous le samedi » ; règles communiquées : trois heures, mardi/jeudi/samedi matin ou après-midi, deux bénévoles minimum dont un référent caisse, deux permanences maximum par bénévole et désinscription jusqu'à 48 heures avant. | Moyenne à élevée | Élevé         | Formaliser les règles et tester les cas limites : permanence avec un seul inscrit, absence de référent caisse, limite hebdomadaire atteinte et annulation à moins de 48 heures.                                                                                          |
|  R5 | Le reçu demandé par certains donateurs n'est pas spécifié : les informations à collecter, le contenu et le format ne sont pas connus. Un reçu pourrait être incomplet ou être présenté à tort comme un reçu fiscal.         | Mail : « certains donateurs veulent un reçu » ; aucun contenu, format ou statut fiscal n'est précisé.                                                                                                                                     | Moyenne          | Moyen à élevé | Faire valider le contenu et le mode de remise du reçu avant son développement. Ne pas le qualifier de reçu fiscal sans confirmation. Ne collecter que les données personnelles nécessaires.                                                                              |

---

## 5. Glossaire du projet — 10 termes métier

Les définitions suivantes sont des définitions de travail destinées à utiliser les mêmes mots dans les écrans, les documents et les échanges avec l'association. Elles restent à relire et à valider.

| Terme            | Définition dans le projet Seconde Vie                                                                                                                                 |
| ---------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **Ressourcerie** | Association ou structure qui récupère des objets, les suit, les remet éventuellement en circulation et organise leur vente.                                           |
| **Donateur**     | Personne qui apporte un ou plusieurs objets à la ressourcerie.                                                                                                        |
| **Don**          | Ensemble des objets remis par un donateur à la ressourcerie. Cette définition correspond au choix de conception retenu pour rattacher plusieurs objets à un même don. |
| **Objet**        | Article reçu par la ressourcerie et suivi dans l'application depuis son enregistrement jusqu'à sa vente éventuelle.                                                   |
| **Catégorie**    | Classe de rangement utilisée pour regrouper des objets de même type et leur associer un prix de base.                                                                 |
| **État**         | Condition dans laquelle se trouve l'objet lors de son évaluation ; il participe à la détermination de son prix.                                                       |
| **Prix de base** | Valeur de référence associée à une catégorie, utilisée avec l'état de l'objet pour déterminer son prix de vente.                                                      |
| **Localisation** | Emplacement où se trouve actuellement un objet dans la ressourcerie.                                                                                                  |
| **Vente**        | Opération au cours de laquelle un ou plusieurs objets sont vendus. Dans le modèle global proposé, une vente peut regrouper plusieurs objets.                          |
| **Permanence**   | Créneau de présence organisé par la ressourcerie, d'une durée prévue de trois heures et assuré par des bénévoles, dont un référent caisse.                            |

**Validation :** le TP demande une relecture du glossaire en binôme. Le projet étant actuellement réalisé seul, cette relecture par un binôme n'est pas disponible. Le glossaire doit donc être relu par l'utilisateur et, si possible, confronté à un formateur, un autre étudiant ou un représentant de l'association avant d'être considéré comme validé.

---

## 6. Corrections apportées aux propositions de l'IA

Cette liste trace les corrections effectuées pour garder une conception fidèle aux besoins et éviter les fonctionnalités ou règles inventées.

|  N° | Proposition initiale de l'IA                                                                  | Correction retenue                                                                                                                                                                            | Pourquoi / source                                                                                                                                                           |
| --: | --------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
|  C1 | Présenter le remplacement des tableurs comme une User Story à part entière (US09).            | Le remplacement des tableurs est conservé comme contexte et objectif général, pas comme User Story fonctionnelle.                                                                             | Le mail indique que les tableurs sont la situation actuelle ; il ne décrit pas une action fonctionnelle précise.                                                            |
|  C2 | Présenter l'absence de vente en ligne comme une User Story (US10).                            | La vente en ligne est retirée du backlog et conservée comme contrainte de périmètre : pas de vente en ligne pour le moment.                                                                   | Mail de la présidente : « Pas besoin de vente en ligne pour l'instant. »                                                                                                    |
|  C3 | Utiliser des coefficients de prix de 100 %, 80 %, 60 % et 40 % selon l'état.                  | Tous les coefficients arbitraires sont supprimés. La règle reste : prix de base de la catégorie + état de l'objet ; la grille exacte doit être validée.                                       | La contrainte du TP4 indique les deux éléments utilisés, mais ne fournit aucun coefficient ni montant.                                                                      |
|  C4 | Parler de « reçu fiscal ».                                                                    | Employer simplement « reçu » jusqu'à confirmation de sa nature et de son contenu.                                                                                                             | Le mail dit seulement que certains donateurs veulent un reçu. Il ne précise pas qu'il est fiscal.                                                                           |
|  C5 | Ajouter un écran d'administration des catégories.                                             | Aucun écran de gestion des catégories n'est retenu dans les écrans initiaux du TP4. Les catégories sont des données de référence à définir.                                                   | Aucune User Story du périmètre TP4 ne demande explicitement de gérer les catégories.                                                                                        |
|  C6 | Utiliser uniquement un champ `nom_donateur` dans la table DON.                                | Le modèle global proposé sépare DONATEUR et DON, afin qu'un même donateur puisse être associé à plusieurs dons.                                                                               | Le TP5 demande d'éprouver les fiches Donateur et Don ; la séparation est un choix de modélisation, pas une exigence détaillée du mail.                                      |
|  C7 | Ne représenter une vente que par un statut sur l'objet.                                       | Le modèle global proposé ajoute une table VENTE et relie les objets à une vente.                                                                                                              | Le TP5, cas 3, demande de traiter la vente du samedi de la table de Mme Diallo et de la chaise de Mme Leroy. Une vente regroupant plusieurs objets représente mieux ce cas. |
|  C8 | Conserver `statut_vente` en plus de `id_vente` dans le modèle global.                         | `statut_vente` est retiré du modèle global proposé ; l'état vendu/non vendu est déduit de la présence de `id_vente`.                                                                          | Éviter de stocker deux fois la même information dans le modèle global. La règle utilisateur précise qu'un objet vendu ne revient pas en stock.                              |
|  C9 | Créer une table UTILISATEUR et supposer une authentification.                                 | Le modèle global propose une table BENEVOLE pour les inscriptions aux permanences ; une table de comptes et de connexion reste à décider.                                                     | Le mail demande l'inscription des bénévoles, mais ne décrit pas de connexion, de mot de passe ni de gestion des comptes.                                                    |
| C10 | Créer une table séparée pour les statistiques.                                                | Aucune table STATISTIQUE n'est ajoutée pour le moment ; les statistiques sont prévues comme des résultats calculés à partir des données d'activité.                                           | Le mail demande des statistiques, mais ne demande pas de stocker des statistiques comme des données autonomes. Les indicateurs restent à définir.                           |
| C11 | Ajouter des données de contact, une date de don et d'autres champs sans signaler leur statut. | Les coordonnées du donateur et certaines dates sont identifiées comme des choix de conception à confirmer, et non comme des exigences initiales.                                              | Le mail ne détaille pas les données personnelles à collecter ni la date à enregistrer. Les informations doivent être limitées au besoin réel, notamment pour le reçu.       |
| C12 | Planifier les permanences sans tenir compte des règles métier complémentaires.                | Les règles déjà communiquées sur la durée, les créneaux, le nombre minimum, le référent caisse, la limite hebdomadaire et le délai de désinscription sont intégrées au risque et au Sprint 3. | Règles métier complémentaires fournies pour le projet, en plus du mail initial.                                                                                             |
| C13 | Présenter le planning de trois sprints comme une charge garantie.                             | Le planning est présenté comme une proposition d'ordre et de dépendances ; la charge doit être ajustée, car le projet est réalisé seul et aucune disponibilité hebdomadaire n'a été donnée.   | Informations d'équipe disponibles : travail individuel ; informations de capacité horaire non communiquées.                                                                 |

---

## 7. Décisions à obtenir avant ou pendant les sprints

Les points suivants ne doivent pas être inventés par l'équipe de développement :

1. La liste des catégories d'objets, notamment la catégorie adaptée à un aquarium.
2. La liste des états possibles et la grille de calcul des prix associée au prix de base de chaque catégorie.
3. Les emplacements ou règles de localisation utilisés dans la ressourcerie.
4. Les informations réellement nécessaires sur un donateur et le contenu, le format et le mode de remise du reçu.
5. Les indicateurs exacts attendus par la mairie.
6. La confirmation des règles de permanence et des créneaux autorisés.
7. Le nombre d'heures réellement disponibles chaque semaine pour vérifier la charge des trois sprints.
8. La nécessité ou non d'un compte de connexion pour les bénévoles.

---

## 8. Bilan du plan de lancement

- **8 User Stories** sont classées dans quatre niveaux de priorité.
- Le cœur du projet — enregistrement, localisation et suivi des ventes des objets — est planifié en premier.
- Les prix et les reçus sont planifiés après la mise en place des données de dons et d'objets.
- Les permanences sont planifiées avec leurs règles métier complémentaires.
- Les statistiques sont un objectif souhaitable et restent dépendantes de la définition des indicateurs et de la qualité des données.
- Cinq risques propres à Seconde Vie sont identifiés avec des actions de prévention.
- Dix termes métier sont définis dans le glossaire.
- Les principales corrections apportées aux propositions de l'IA sont tracées et justifiées par le mail, le backlog, les cas du TP5 ou les règles métier communiquées.

**Conclusion :** ce plan propose un ordre de lancement cohérent avec les besoins connus de Seconde Vie. Il devra être ajusté après validation des décisions métier manquantes et estimation de la capacité réelle de travail.
