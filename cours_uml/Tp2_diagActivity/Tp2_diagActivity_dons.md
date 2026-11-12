# TP 2 — Diagramme d'activité : « Enregistrer un don »

## 1. Scénario

1. Le bénévole saisit le donateur.
2. Le bénévole saisit un objet.
3. S'il y a un autre objet, il saisit l'objet suivant.
4. Quand il n'y a plus d'objet, l'application calcule les prix.
5. L'application enregistre le don.
6. Si le donateur demande un reçu, l'application édite le reçu, puis le service d'e-mail l'envoie par e-mail.
7. Sinon, le scénario se termine sans reçu.

Déclencheur : un donateur apporte des objets. Résultat : le don est enregistré, et le reçu est envoyé s'il a été demandé.

## 2. Couloirs

Un couloir par acteur du cas, plus un pour l'application :

- **Bénévole**
- **Application**
- **Service d'e-mail**

## 3. Actions (un verbe à l'infinitif, dans le couloir de celui qui la fait)

| N°  | Action                     | Couloir          |
| --- | -------------------------- | ---------------- |
| 1   | Saisir le donateur         | Bénévole         |
| 2   | Saisir un objet            | Bénévole         |
| 3   | Calculer les prix          | Application      |
| 4   | Enregistrer le don         | Application      |
| 5   | Éditer le reçu             | Application      |
| 6   | Envoyer le reçu par e-mail | Service d'e-mail |

## 4. Décisions et fusions

| Décision                                 | Gardes (une par sortie)                                                                               | Fusion                                                         |
| ---------------------------------------- | ----------------------------------------------------------------------------------------------------- | -------------------------------------------------------------- |
| Boucle sur les objets (couloir Bénévole) | `[autre objet]` : retour à « Saisir un objet » ; `[aucun autre objet]` : on passe au calcul des prix  | Le retour de la boucle rejoint l'entrée de « Saisir un objet » |
| Reçu (couloir Application)               | `[reçu demandé]` : éditer puis envoyer le reçu ; `[reçu non demandé]` : on passe directement à la fin | Les deux chemins se rejoignent avant le nœud final             |

## 5. Code PlantUML

voir image

## 6. Lecture à voix haute

« Le bénévole saisit le donateur, puis saisit un objet. S'il y a un autre objet, il saisit l'objet suivant. Quand il n'y a plus d'objet, l'application calcule les prix, puis enregistre le don. Si un reçu est demandé, l'application édite le reçu et le service d'e-mail l'envoie par e-mail. Sinon, rien de plus. Fin. »

## 7. Relecture

- Nœud initial : oui (en haut du couloir Bénévole).
- Nœud final : oui (en bas, dans le couloir Application).
- Chaque action commence par un verbe à l'infinitif : oui.
- Chaque sortie de décision a une garde : oui (4 gardes en tout).
- Les chemins se rejoignent : oui (boucle, puis fusion après la décision `[reçu demandé]`).
- Aucun flux sans issue : oui, tous les chemins mènent au nœud final.
- Aucun nom de classe dans une action : oui, les classes sont pour le diagramme de séquence.
- Six actions, trois couloirs, une boucle, une décision et sa fusion : conforme au livrable.

## 8. Points à confirmer en binôme

- « Éditer le reçu » est placé dans le couloir Application, car c'est elle qui produit le document avant que le service d'e-mail l'envoie. Le scénario dit seulement « un reçu part par e-mail ».
- La saisie du choix « reçu demandé » n'est pas une action séparée : l'information est saisie avec le donateur (le mail dit « certains donateurs veulent un reçu »). Si ton binôme préfère l'avoir comme action explicite, ajoute « Indiquer si le reçu est demandé » dans le couloir Bénévole, avant la décision.
