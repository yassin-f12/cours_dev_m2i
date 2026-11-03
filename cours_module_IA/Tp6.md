# TP 6 – Auditer une réponse et un prompt

**Durée :** 30 minutes
**Sujet :** Auditer une réponse et un prompt d'intelligence artificielle.

---

## 1. Le prompt : repérer les données sensibles et le réécrire

### 1.1 Les données à ne pas transmettre

Le prompt du collègue contient plusieurs informations confidentielles et personnelles qui ne doivent pas être transmises inutilement à une IA.

| Donnée                     | Pourquoi ne pas la transmettre ?                                            |
| -------------------------- | --------------------------------------------------------------------------- |
| Identifiant administrateur | Permet d'accéder à un compte privilégié.                                    |
| Mot de passe du serveur    | Secret d'authentification pouvant permettre un accès non autorisé.          |
| Adresse du serveur interne | Révèle des informations sur l'infrastructure informatique de l'association. |
| Noms des donateurs         | Données personnelles permettant d'identifier les personnes.                 |
| Adresses e-mail            | Données personnelles permettant d'identifier et de contacter les donateurs. |

### 1.2 Prompt réécrit sans données sensibles

Salut !

Voici les données de nos trois derniers donateurs, sans leurs informations personnelles :

- Donateur A : 7 objets.
- Donateur B : 3 objets.
- Donateur C : 9 objets.

Dis-moi lesquels ont donné plus de 5 objets cette année et rédige un message de remerciement générique que nous pourrons personnaliser.

Indique également les obligations éventuelles liées à la protection des données personnelles pour ce type de fichier, notamment au regard du RGPD et de la CNIL.

---

## 2. La réponse : identifier les trois erreurs et apporter les preuves

### Erreur n° 1 : le nombre de donateurs ayant donné plus de 5 objets est incorrect.

**Réponse de l'IA :**

« Jeanne Durand, Karim Benali et Lucie Morel ont donné plus de 5 objets. »

**Pourquoi est-ce faux ?**

En relisant le prompt original, on retrouve les quantités suivantes :

- Jeanne Durand : 7 objets.
- Karim Benali : 3 objets.
- Lucie Morel : 9 objets.

Karim Benali a donné seulement 3 objets. Il ne dépasse donc pas le seuil de 5 objets.

**Preuve :** les données du prompt de la slide 72.

**Correction :** seuls Jeanne Durand et Lucie Morel ont donné plus de 5 objets.

Attention : les dates des dons ne sont pas indiquées. On ne peut donc pas confirmer qu'ils ont tous été effectués cette année.

### Erreur n° 2 : tous les donateurs recevraient automatiquement un reçu fiscal avec une réduction d'impôt de 66 %.

**Réponse de l'IA :**

« Comme chaque année, vous recevrez votre reçu fiscal donnant droit à une réduction d'impôt de 66 %. »

**Pourquoi est-ce faux ?**

Dans son mail, la présidente précise :

« Et certains donateurs veulent un reçu. »

Cela signifie que certains donateurs souhaitent recevoir un reçu, et non que tous les donateurs doivent automatiquement en recevoir un.

De plus, un reçu fiscal ne donne pas automatiquement droit à une réduction d'impôt de 66 %. Cet avantage dépend notamment de l'éligibilité de l'association et du respect des conditions fiscales.

**Preuves :**

- Mail de la présidente, slide 48.
- Site officiel des impôts : les dons ouvrant droit à une réduction de 66 % sont soumis à des conditions.

Source : https://www.impots.gouv.fr/particulier/questions/jai-fait-des-dons-une-association-que-puis-je-deduire

**Correction :** il faut vérifier si l'association est autorisée à délivrer des reçus fiscaux avant de promettre une réduction d'impôt aux donateurs.

### Erreur n° 3 : tous les fichiers de données personnelles doivent être déclarés à la CNIL.

**Réponse de l'IA :**

« Depuis le RGPD, tout fichier de données personnelles doit être déclaré à la CNIL avant sa mise en service. »

**Pourquoi est-ce faux ?**

Depuis l'entrée en application du RGPD, les déclarations préalables de fichiers à la CNIL ont été supprimées dans la majorité des cas.

Les organismes doivent néanmoins respecter les obligations du RGPD, notamment :

- Protéger les données personnelles.
- Informer les personnes concernées.
- Définir une durée de conservation.
- Tenir un registre des activités de traitement lorsque cela est obligatoire.
- Mettre en place des mesures de sécurité adaptées.

**Preuve :** la CNIL indique officiellement qu'il n'y a plus de déclaration préalable pour ce type de fichiers depuis l'entrée en application du RGPD.

Source : https://www.cnil.fr/fr/cnil-direct/question/controle-de-lutilisation-dinternet-et-de-la-messagerie-electronique-que-faire

**Correction :** l'association n'a pas à déclarer systématiquement son fichier à la CNIL. Elle doit en revanche respecter les obligations du RGPD.

---

## 3. La checklist : cinq points de contrôle

Avant d'utiliser une réponse générée par une IA, nous devons appliquer les cinq contrôles suivants :

1. **Protection des données :** vérifier qu'aucune donnée personnelle, confidentielle, aucun mot de passe ou identifiant sensible n'a été transmis inutilement à l'IA.
2. **Exactitude des informations :** comparer les informations fournies par l'IA avec les données originales pour détecter les erreurs ou les informations inventées.
3. **Vérification des sources :** vérifier les affirmations importantes à partir de sources officielles et fiables, comme la CNIL, les impôts ou les textes de loi.
4. **Respect du contexte :** vérifier que la réponse respecte les besoins, les consignes et les décisions communiqués par l'association.
5. **Validation humaine :** relire, corriger et valider la réponse avant toute utilisation ou diffusion.

---

## Conclusion

L'intelligence artificielle est un outil utile pour faciliter certaines tâches, mais ses réponses ne sont pas toujours fiables.

Ce TP nous montre qu'il est important de protéger les données sensibles, de vérifier les informations avec des sources officielles et de conserver une validation humaine avant d'utiliser une réponse générée par une IA.

Une réponse d'IA doit toujours être considérée comme une proposition à vérifier et non comme une vérité absolue.
