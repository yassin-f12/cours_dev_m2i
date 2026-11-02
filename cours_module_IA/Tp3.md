# Modèle de prompt — Analyse et formalisation des règles métier

## 1. Contexte

Je travaille sur un projet nommé **[NOM DU PROJET]**.

Présentation du projet :
[DESCRIPTION DE L'ORGANISATION, DE L'ENTREPRISE OU DE L'APPLICATION]

La partie de l'application concernée est : **[NOM DU MODULE]**.

Situation actuelle :
[EXPLIQUER LE FONCTIONNEMENT ACTUEL, LES UTILISATEURS CONCERNÉS ET LEURS BESOINS]

Les règles métier sont définies par : **[PERSONNE OU ORGANISATION RESPONSABLE]**.

## 2. Objectif

L'objectif est de concevoir ou de faire évoluer le module **[NOM DU MODULE]** afin de respecter les règles métier communiquées.

Je souhaite notamment :

- Identifier les règles de gestion.
- Déterminer les conditions d'acceptation ou de refus d'une action.
- Formaliser les comportements attendus de l'application.
- Identifier les cas où une action est autorisée ou interdite.
- Préparer des exemples de tests fonctionnels.

## 3. Contraintes et règles métier

Voici les règles définies par le responsable du projet :

[INSÉRER ICI LES RÈGLES MÉTIER]

Consignes impératives :

- Ne jamais inventer de nouvelles règles métier.
- Ne pas modifier le sens des règles communiquées.
- Ne pas supposer qu'une règle existe si elle n'a pas été explicitement donnée.
- Signaler les ambiguïtés ou les informations manquantes.
- Distinguer les règles métier des simples recommandations techniques.
- Si une règle est contradictoire avec une autre, le signaler sans choisir arbitrairement.

## 4. Format de réponse attendu

Présente le résultat avec les sections suivantes :

**A. Présentation du contexte**

- Résumé du projet.
- Module concerné.
- Utilisateurs concernés.
- Problème à résoudre.

**B. Objectif fonctionnel**

- Ce que le module doit permettre de faire.
- Les actions que l'application doit contrôler.

**C. Règles métier formalisées**

Présente chaque règle avec :

- Un identifiant (RM1, RM2, RM3...).
- Un titre.
- Une explication claire.
- Les conditions à respecter.
- Le comportement attendu de l'application.

**D. Cas attendus**

Présente les cas sous forme de tableau :

| Situation             | Résultat attendu | Règle concernée |
| --------------------- | ---------------- | --------------- |
| [Situation autorisée] | Acceptée         | RM1             |
| [Situation interdite] | Refusée          | RM2             |

**E. Informations manquantes**

- Liste les questions nécessaires pour lever les ambiguïtés.
- Ne propose pas de réponses inventées.

## 5. Critères de qualité

La réponse doit :

- Être claire, structurée et compréhensible par un débutant.
- Utiliser un vocabulaire professionnel mais accessible.
- Respecter strictement les informations fournies.
- Être suffisamment précise pour servir de base au développement.
- Présenter des exemples concrets et réalistes.
- Distinguer clairement les cas acceptés, refusés et non déterminés.
- Ne pas produire de code sauf demande explicite.

## 6. Exemple de données à analyser

Projet : [NOM DU PROJET]

Module : [NOM DU MODULE]

Contexte : [DESCRIPTION]

Objectif : [OBJECTIF]

Règles métier :

1. [PREMIÈRE RÈGLE]
2. [DEUXIÈME RÈGLE]
3. [TROISIÈME RÈGLE]
4. [QUATRIÈME RÈGLE]

Exemples de situations :

- [EXEMPLE D'UNE ACTION AUTORISÉE]
- [EXEMPLE D'UNE ACTION INTERDITE]
- [EXEMPLE D'UN CAS LIMITE]

À partir de ces informations, réalise l'analyse en respectant toutes les consignes précédentes.
