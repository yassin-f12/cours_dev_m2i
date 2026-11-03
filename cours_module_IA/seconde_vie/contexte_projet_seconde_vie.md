# Dossier de contexte — Projet « Seconde Vie »

> **Objectif de ce document :** transmettre à une autre IA le contexte nécessaire pour comprendre le projet Seconde Vie et reprendre le travail sans repartir de zéro.
>
> **Attention :** ce document distingue les demandes présentes dans le mail, les User Stories reformulées à partir de ces demandes et les choix de conception proposés. Une hypothèse ne doit jamais être présentée comme une exigence explicitement formulée par la présidente.

---

## 1. Présentation générale du projet

**Seconde Vie** est une application de gestion destinée à une ressourcerie associative.

Aujourd'hui, l'association utilise des tableurs pour suivre son activité. Elle souhaite disposer d'une application permettant notamment de suivre les dons et les objets reçus, de connaître leur emplacement et leur statut de vente, d'organiser les permanences des bénévoles et de fournir des statistiques à la mairie, qui subventionne l'association.

Le volume annoncé est d'environ **200 objets reçus par semaine**.

La vente en ligne n'est pas souhaitée pour le moment. Le projet porte donc sur la gestion interne de la ressourcerie, et non sur la création d'une boutique en ligne.

## 2. Mail original de la présidente

Le texte ci-dessous est le besoin initial communiqué pour le projet :

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

## 3. Les besoins reformulés en User Stories

Les User Stories ci-dessous sont des **reformulations du mail**, et non des phrases qui figuraient telles quelles dans le message de la présidente. Le projet comporte huit User Stories fonctionnelles dans la liste de travail actuelle.

### US01 — Enregistrer les objets reçus

**En tant que** bénévole, **je veux** enregistrer les objets reçus, **afin de** suivre les objets qui arrivent dans la ressourcerie.

Source : « On voudrait une appli pour suivre les objets qu'on reçoit (on en reçoit à peu près 200 par semaine). »

### US02 — Localiser les objets

**En tant que** bénévole, **je veux** connaître l'emplacement des objets, **afin de** pouvoir les retrouver dans la ressourcerie.

Source : « savoir où ils sont ».

### US03 — Suivre les objets vendus

**En tant que** bénévole, **je veux** connaître les objets qui ont été vendus, **afin de** suivre les ventes de la ressourcerie.

Source : « et ce qui est vendu ».

### US04 — Harmoniser la fixation des prix

**En tant que** bénévole, **je veux** disposer d'une règle commune pour fixer le prix des objets selon leur état, **afin de** limiter les différences de prix entre bénévoles.

Source : « Les bénévoles mettent un prix selon l'état, mais chacun fait un peu à sa façon. »

**Précision importante :** le mail signale une pratique variable, mais ne formule pas directement une demande de grille tarifaire. La contrainte du TP impose cependant que le prix dépende du prix de base de la catégorie et de l'état. US04 est donc la formalisation du besoin de cohérence tarifaire pour le travail de conception.

### US05 — S'inscrire aux permanences

**En tant que** bénévole, **je veux** m'inscrire aux permanences, **afin de** participer à l'organisation des permanences de l'association.

Source : « Il faudrait que les bénévoles puissent s'inscrire aux permanences ».

### US06 — Éviter les permanences incomplètes, notamment le samedi

**En tant que** responsable de l'organisation, **je veux** repérer les permanences qui ne sont pas suffisamment couvertes, **afin de** limiter les créneaux sans bénévoles, notamment le samedi.

Source : « parce qu'on a souvent des trous le samedi ».

**Précision :** cette story est une traduction fonctionnelle du problème exprimé. Le mail ne précise pas à lui seul le nombre de bénévoles requis par créneau.

### US07 — Consulter des statistiques pour la mairie

**En tant que** responsable de l'association, **je veux** disposer de statistiques sur l'activité, **afin de** fournir des informations à la mairie qui subventionne l'association.

Source : « Ce serait bien d'avoir aussi des statistiques pour la mairie, qui nous subventionne. »

**Précision :** les indicateurs exacts attendus ne sont pas définis dans le mail.

### US08 — Obtenir un reçu pour un don

**En tant que** donateur, **je veux** pouvoir obtenir un reçu pour mon don, **afin de** disposer d'un justificatif de mon don.

Source : « Et certains donateurs veulent un reçu. »

**Précision :** le mail ne précise ni le contenu, ni le format, ni la nature fiscale éventuelle du reçu. Il ne faut donc pas le qualifier de « reçu fiscal » sans confirmation.

### Éléments qui ne sont pas des User Stories fonctionnelles

- **Gestion sans tableurs :** « Aujourd'hui on note tout dans des tableurs et on s'y perd. » C'est le constat à l'origine du projet et un objectif général, pas une fonctionnalité précise à elle seule.
- **Pas de vente en ligne :** « Pas besoin de vente en ligne pour l'instant. » C'est une contrainte de périmètre, pas une fonctionnalité.

**Bilan de la liste actuelle :** 8 User Stories fonctionnelles, US01 à US08. Les US09 et US10 parfois évoquées dans les échanges précédents correspondaient respectivement au besoin général de remplacer les tableurs et à l'exclusion de la vente en ligne ; elles ne sont pas comptées parmi les huit User Stories fonctionnelles.

---

## 4. Périmètre du TP 4

Le TP 4 porte spécifiquement sur les modules **Dons et Objets**.

### Travail demandé

1. Proposer le modèle de données des modules Dons et Objets.
2. Lister les écrans nécessaires pour réaliser les User Stories concernées.

### Contraintes de rédaction et de conception

- Ne rien ajouter qui ne soit justifié par le mail, les User Stories ou les contraintes du TP.
- Le prix dépend du **prix de base de la catégorie** et de **l'état de l'objet**.
- Ne pas fournir de code ni de schéma technique : le modèle doit être décrit avec des phrases simples.
- Pour le modèle : écrire une phrase par fiche, avec les informations entre parenthèses, puis une phrase par relation entre les fiches.
- Pour les écrans : indiquer le nom, l'utilité, l'utilisateur, les champs et les boutons.
- Ajouter une liste des hypothèses.
- Chaque fiche, relation et écran doit être rattaché à une User Story ou à une phrase du mail.
- Chaque champ affiché sur un écran doit correspondre à une information présente dans le modèle de données.

### User Stories dans le périmètre du TP 4

- US01 — Enregistrer les objets reçus.
- US02 — Localiser les objets.
- US03 — Suivre les objets vendus.
- US04 — Harmoniser la fixation des prix.
- US08 — Obtenir un reçu pour un don.

Les US05 et US06 concernent l'organisation des bénévoles et des permanences. US07 concerne les statistiques destinées à la mairie. Elles sont hors du périmètre du TP 4 consacré à Dons et Objets.

---

## 5. Règles métier connues

### Règles issues du mail ou de la consigne du TP

1. L'application doit permettre de suivre les objets reçus.
2. L'application doit permettre de connaître l'emplacement des objets.
3. L'application doit permettre de distinguer les objets vendus.
4. Le prix d'un objet dépend du prix de base de sa catégorie et de son état.
5. Certains donateurs souhaitent obtenir un reçu.
6. La vente en ligne n'est pas dans le périmètre actuel.
7. Le volume annoncé est d'environ 200 objets reçus par semaine.

### Règle précisée par l'utilisateur pendant les échanges

8. **Un objet vendu ne revient pas en stock.** Cette règle a été explicitement ajoutée par l'utilisateur au contexte du projet. Un objet vendu conserve donc le statut « vendu » et ne doit pas redevenir disponible dans le stock.

### Règles concernant les permanences (autre module, hors TP 4)

Les règles suivantes ont été communiquées pour le module de gestion des bénévoles :

- Une permanence dure 3 heures.
- Les créneaux sont le mardi, le jeudi ou le samedi, le matin ou l'après-midi.
- Il faut au moins 2 bénévoles par permanence, dont un référent caisse.
- Un bénévole ne réalise pas plus de 2 permanences par semaine.
- Un bénévole peut se désinscrire jusqu'à 48 heures avant la permanence.

Ces règles ne doivent pas être mélangées avec le périmètre Dons et Objets du TP 4.

---

## 6. Proposition actuelle de modèle de données — TP 4

La proposition de travail actuelle contient trois fiches. Elle est volontairement minimale et doit être comprise comme une **proposition de conception**, pas comme une liste de champs explicitement dictée mot pour mot par le mail.

### Fiche Don

Un don contient les informations suivantes : un identifiant, le nom du donateur et l'indication précisant si un reçu est demandé.

Justification : US08 (« certains donateurs veulent un reçu ») et US01 pour le rattachement des objets reçus à un don.

### Fiche Objet

Un objet contient les informations suivantes : un identifiant, une désignation, une catégorie, un état, une localisation, un prix de vente et un statut de vente.

Justification : US01 pour l'enregistrement, US02 pour la localisation, US03 pour le suivi des ventes et US04 pour la fixation du prix selon l'état.

### Fiche Catégorie

Une catégorie contient un nom et un prix de base.

Justification : contrainte du TP indiquant que le prix dépend du prix de base de la catégorie et de l'état de l'objet.

### Relations entre les fiches

- Un don peut contenir plusieurs objets ; chaque objet est rattaché à un seul don.
- Une catégorie peut regrouper plusieurs objets ; chaque objet appartient à une seule catégorie.

**Statut de ces relations :** ce sont des choix de conception retenus pour structurer le suivi des dons et des objets. Le mail ne décrit pas précisément les cardinalités. Il faut les conserver comme hypothèses explicites, sauf nouvelle information.

---

## 7. Proposition actuelle des écrans — TP 4

La proposition actuelle comprend trois écrans.

### Écran 1 — Liste des objets

**Utilité :** consulter les objets enregistrés et retrouver rapidement leur état, leur emplacement et leur statut de vente.

**Utilisateur :** bénévole.

**Champs affichés :**
- Identifiant de l'objet.
- Désignation.
- Catégorie.
- État.
- Localisation.
- Prix de vente.
- Statut de vente.

**Boutons :**
- Ajouter un objet.
- Consulter un objet.

**Stories concernées :** US01, US02 et US03.

### Écran 2 — Fiche d'un objet

**Utilité :** enregistrer un nouvel objet ou consulter et modifier les informations d'un objet existant. Le prix de vente est déterminé à partir du prix de base de sa catégorie et de l'état de l'objet.

**Utilisateur :** bénévole.

**Champs :**
- Désignation.
- Catégorie.
- État.
- Localisation.
- Prix de base de la catégorie (affiché).
- Prix de vente (calculé).
- Statut de vente.

**Boutons :**
- Enregistrer.
- Modifier.
- Marquer comme vendu.

**Stories concernées :** US01, US02, US03 et US04.

### Écran 3 — Gestion des dons

**Utilité :** enregistrer un don, associer les objets reçus à celui-ci et permettre au donateur d'obtenir un reçu lorsqu'il en fait la demande.

**Utilisateur :** bénévole.

**Champs :**
- Nom du donateur.
- Demande de reçu.
- Objets associés au don.

**Boutons :**
- Enregistrer le don.
- Ajouter un objet au don.
- Générer le reçu.

**Stories concernées :** US01 et US08.

**Pourquoi trois écrans ?** La proposition regroupe le suivi dans une liste, la consultation ou modification détaillée dans une fiche objet, et l'enregistrement d'un don avec sa demande de reçu dans un écran dédié. Aucun écran d'administration des catégories n'est prévu à ce stade, car aucune User Story du TP 4 ne demande explicitement de gérer les catégories.

---

## 8. Hypothèses et décisions encore à confirmer

Cette section est importante : elle évite qu'une future IA ou l'équipe de développement transforme des hypothèses en exigences certaines.

### Choix retenus dans la proposition actuelle

- Un don peut regrouper plusieurs objets.
- Chaque objet est rattaché à un seul don.
- Chaque objet appartient à une seule catégorie.
- Les catégories et leurs prix de base sont des données de référence utilisées par l'application ; aucun écran d'administration des catégories n'est prévu dans le TP 4.
- L'identifiant de chaque don et de chaque objet sert à les retrouver sans ambiguïté. Il s'agit d'une information technique de gestion.
- Le nom du donateur est conservé sur la fiche Don pour pouvoir rattacher le don à son donateur et préparer le reçu.
- La demande de reçu est représentée par une information indiquant si le donateur souhaite un reçu.

### Points non définis par les sources

- **Grille tarifaire :** le mail et le TP ne donnent aucun coefficient ou montant pour chaque état. Il ne faut pas inventer de pourcentages tels que 100 %, 80 %, 60 % ou 40 %. La formule doit dépendre du prix de base de la catégorie et de l'état, mais la correspondance exacte doit être décidée et validée avant développement.
- **Liste des catégories :** les catégories concrètes ne sont pas données.
- **Liste des états :** les états possibles ne sont pas donnés.
- **Localisations :** les emplacements possibles dans la ressourcerie ne sont pas définis.
- **Reçu :** son contenu, son format et les informations obligatoires ne sont pas précisés. Ne pas le qualifier de reçu fiscal sans preuve.
- **Date du don :** elle n'est pas explicitement demandée dans le mail initial. Ne pas la présenter comme une exigence explicite ; elle peut être proposée comme choix de conception si elle devient nécessaire.
- **Données du donateur :** en dehors de la notion de donateur et du souhait éventuel de recevoir un reçu, les informations à recueillir ne sont pas précisées.
- **Statuts détaillés de l'objet :** le mail distingue les objets reçus, localisés et vendus, mais ne fournit pas une liste complète de statuts. Le statut « vendu » est nécessaire au suivi ; les autres valeurs doivent être définies avec prudence.
- **Suppression ou annulation :** aucune règle de suppression d'un don ou d'un objet n'est indiquée.

### Grille tarifaire précédemment évoquée, mais non validée

Une proposition antérieure utilisait les coefficients suivants : neuf 100 %, très bon 80 %, bon 60 %, usagé 40 %. **Ces coefficients sont arbitraires et ne viennent ni du mail ni de la consigne du TP. Ils ne font pas partie de la conception validée et ne doivent pas être réutilisés sans décision explicite de l'équipe ou de la présidente.**

---

## 9. Correspondance entre les User Stories du TP 4 et les écrans

| User Story | Besoin | Écran(s) concerné(s) |
|---|---|---|
| US01 | Enregistrer les objets reçus | Liste des objets, Fiche d'un objet, Gestion des dons |
| US02 | Localiser les objets | Liste des objets, Fiche d'un objet |
| US03 | Suivre les objets vendus | Liste des objets, Fiche d'un objet |
| US04 | Harmoniser la fixation des prix | Fiche d'un objet |
| US08 | Obtenir un reçu pour un don | Gestion des dons |

---

## 10. État actuel de la conception

**Proposition actuelle pour le TP 4 :**

- 3 fiches de données : Don, Objet et Catégorie.
- 2 relations principales : Don–Objet et Catégorie–Objet.
- 3 écrans : Liste des objets, Fiche d'un objet et Gestion des dons.
- 5 User Stories couvertes : US01, US02, US03, US04 et US08.

Cette proposition est cohérente avec le périmètre défini, mais les points listés dans la section 8 restent à confirmer ou à décider avant le développement. Il ne faut pas prétendre que le mail précise des éléments qu'il ne précise pas.

---

## 11. Consignes à l'IA qui reprend ce projet

Lorsque tu aides sur ce projet :

1. **Commence par lire ce document en entier.** Il constitue le contexte de référence disponible.
2. Distingue toujours les exigences explicites, les User Stories reformulées, les règles ajoutées par l'utilisateur et les hypothèses de conception.
3. Ne crée pas de fonctionnalité supplémentaire simplement pour rendre le projet plus complexe ou plus impressionnant. La qualité attendue vient de la cohérence et de la couverture des besoins, pas de fonctionnalités hors périmètre.
4. Ne présente jamais les coefficients tarifaires 100 %, 80 %, 60 % et 40 % comme des règles validées.
5. Ne transforme pas le reçu en reçu fiscal sans confirmation.
6. Ne mélange pas le TP 4 Dons et Objets avec les modules Permanences et Statistiques.
7. Respecte la consigne du TP : phrases simples, pas de code ni de schéma technique lorsqu'il s'agit du livrable de conception.
8. Vérifie que chaque écran répond à une ou plusieurs User Stories et que chaque champ affiché existe dans le modèle de données.
9. Signale clairement les informations manquantes. Lorsqu'une décision est nécessaire, propose une décision argumentée et identifie-la comme un choix de conception.
10. L'utilisateur apprend le développement et préfère des explications en français, progressives et pédagogiques. Pour les exercices de programmation, ne donne pas directement une structure de code à trous : explique et guide étape par étape, sauf demande explicite de code.

**Principe directeur :** produire une conception complète et cohérente à partir des besoins connus, sans inventer de demandes ni masquer les décisions qui restent à prendre.
