# Démo : les bases des tests unitaires avec Angular

Cours court pour débutants (environ 1 h 30 : 20 min de notions, 1 h 10 de démonstration codée en direct). Il prépare la séance de tests du jour 6 avec une application minuscule : un compteur de congés, sans API ni routeur.

À la fin, les apprenants savent :

- lancer les tests d'un projet Angular et lire le résultat ;
- écrire un test avec `describe`, `it` et `expect`, en trois temps (préparer, agir, vérifier) ;
- tester une fonction, un pipe, un service et un composant ;
- vérifier qu'une erreur est bien levée ;
- simuler une saisie et un clic, puis vérifier ce qu'affiche la page ;
- lire un rapport de couverture sans en faire un objectif en soi.

## Contenu du dossier

| Dossier   | Rôle                                                                                                                                              |
| --------- | ------------------------------------------------------------------------------------------------------------------------------------------------- |
| `depart/` | L'application complète, avec **un bug caché**, et des fichiers de test qui ne contiennent que des `it.todo`. Point de départ de la démonstration. |
| `final/`  | La même application, corrigée, avec les 19 tests écrits et commentés.                                                                             |

L'application :

| Fichier                  | Rôle                                                           | Ce qu'on y apprend à tester               |
| ------------------------ | -------------------------------------------------------------- | ----------------------------------------- |
| `shared/working-days.ts` | `countWorkingDays(debut, fin)` : jours ouvrés entre deux dates | Une fonction pure, les cas limites        |
| `shared/days-pipe.ts`    | Pipe `days` : `1` donne "1 jour", `3` donne "3 jours"          | Une classe simple, sans Angular           |
| `core/leave-balance.ts`  | Service : solde de 25 jours, `take(jours)`                     | Un service avec signals, une erreur levée |
| `leave-request-form/`    | Deux dates, le nombre de jours, un bouton "Poser la demande"   | Un composant : rendu, saisie, clic        |

## Lancement

```bash
cd demo-tests-unitaires/depart
npm install
npm start          # l'application, sur http://localhost:4200
npm test           # les tests, relancés à chaque enregistrement
```

Autres commandes : `npm run test:ci` (une seule exécution, comme en intégration continue) et `npm run test:coverage` (avec le rapport de couverture).

---

## Partie 1 - Les notions

### Pourquoi tester ?

Vérifier à la main, c'est cliquer dans l'application après chaque modification. Ça prend du temps, et on finit par ne plus le faire. Un test automatique vérifie la même chose en quelques millisecondes, à chaque enregistrement, et il ne se lasse jamais.

Un test sert surtout à **modifier le code sans peur** : si une modification casse un comportement existant, un test échoue et indique lequel.

### Le vocabulaire

| Mot                            | Sens                                                                                          |
| ------------------------------ | --------------------------------------------------------------------------------------------- |
| Test unitaire                  | Vérifie une petite partie du code (une fonction, un service, un composant), isolée du reste   |
| Vitest                         | L'outil qui exécute les tests, utilisé par défaut par Angular 22 (`ng test`)                  |
| `describe('...')`              | Un groupe de tests, en général un par fichier testé                                           |
| `it('...')`                    | Un test. Sa phrase décrit le comportement attendu                                             |
| `expect(valeur).toBe(attendu)` | Une vérification. Si elle est fausse, le test échoue                                          |
| `TestBed`                      | L'outil d'Angular qui crée services et composants dans un test, comme le ferait l'application |
| Fichier `.spec.ts`             | Un fichier de tests, placé à côté du fichier testé                                            |

### Un test en trois temps

```ts
it("retire les jours posés du solde", () => {
  // Préparer : la situation de départ.
  const balance = TestBed.inject(LeaveBalance);
  // Agir : l'action dont on veut vérifier l'effet.
  balance.take(5);
  // Vérifier : le résultat attendu.
  expect(balance.remaining()).toBe(20);
});
```

Un bon test vérifie **un seul comportement**, porte un nom qui se lit comme une phrase, et ne dépend d'aucun autre test.

### Ce que ce cours ne traite pas

Les tests de bout en bout (Playwright, qui pilote un vrai navigateur) et les tests de services HTTP (`HttpTestingController`) : ils sont vus au jour 6.

---

## Partie 2 - La démonstration, étape par étape

Ouvrir `depart/` dans l'éditeur. Dans un terminal, `npm start` ; dans un autre, `npm test`, qu'on laisse tourner pendant toute la démonstration.

### Étape 1 - Lancer les tests

Le terminal de `npm test` affiche :

```text
Test Files  4 skipped (4)
     Tests  19 todo (19)
```

À souligner :

- `ng test` trouve tout seul les fichiers `*.spec.ts` ;
- un `it.todo('...')` est un test prévu mais pas encore écrit : c'est notre liste de travail ;
- le mode "watch" relance les tests à chaque enregistrement : on ne quitte plus ce terminal.

### Étape 2 - Premier test : une fonction pure

Une fonction pure renvoie toujours le même résultat pour les mêmes arguments, sans rien modifier d'autre : c'est ce qu'il y a de plus simple à tester. Dans `shared/working-days.spec.ts`, remplacer le premier `it.todo` :

```ts
it("compte une semaine du lundi au vendredi comme 5 jours", () => {
  const result = countWorkingDays("2026-11-02", "2026-11-06");
  expect(result).toBe(5);
});
```

Enregistrer. Le test **échoue** :

```text
× compte une semaine du lundi au vendredi comme 5 jours
  AssertionError: expected 4 to be 5
```

Ne pas corriger tout de suite. Lire le message avec le groupe : "on attendait 5, on a obtenu 4". Avant de toucher au code, écrire le test suivant :

```ts
it("compte 1 jour quand le premier et le dernier jour sont identiques", () => {
  expect(countWorkingDays("2026-11-02", "2026-11-02")).toBe(1);
});
```

Il échoue aussi : `expected 0 to be 1`. Les deux tests ensemble pointent le problème : **le dernier jour n'est jamais compté**.

### Étape 3 - Le bug attrapé

Dans l'application (`npm start`), choisir le même jour comme premier et dernier jour : "Jours ouvrés : 0 jour", et le bouton reste désactivé. Personne ne peut poser une seule journée, alors que l'application a l'air de fonctionner.

Dans `working-days.ts` :

```ts
while (day < last) {   // le dernier jour est exclu
while (day <= last) {  // correction : le dernier jour est inclus
```

Les deux tests passent. À souligner :

- c'est une erreur classique "à un près" (_off-by-one_), invisible à la relecture ;
- le test d'un cas limite (un seul jour) l'a trouvée immédiatement, le cas "normal" (une semaine) seulement à moitié ;
- le test reste dans le projet : si quelqu'un réintroduit le bug plus tard, il échouera de nouveau.

Écrire les quatre autres tests du fichier (week-end, samedi seul, dates inversées, date manquante). Ce sont les **cas limites** : là où se cachent les bugs.

### Étape 4 - Tester un pipe

Un pipe est une classe ordinaire : on la crée avec `new`, sans Angular. Dans `shared/days-pipe.spec.ts` :

```ts
const pipe = new DaysPipe();

it('écrit "jour" au singulier pour 0 et 1', () => {
  expect(pipe.transform(0)).toBe("0 jour");
  expect(pipe.transform(1)).toBe("1 jour");
});
```

À souligner : plusieurs `expect` dans un même test sont acceptables quand ils vérifient **le même comportement** (ici, le singulier).

### Étape 5 - Tester un service

Dans `core/leave-balance.spec.ts` :

```ts
let balance: LeaveBalance;

beforeEach(() => {
  balance = TestBed.inject(LeaveBalance);
});

it("commence avec 25 jours restants et aucun jour pris", () => {
  expect(balance.remaining()).toBe(25);
  expect(balance.taken()).toBe(0);
});

it("retire les jours posés du solde", () => {
  balance.take(5);

  expect(balance.taken()).toBe(5);
  expect(balance.remaining()).toBe(20);
});
```

À souligner :

- `TestBed.inject` fournit le service comme le ferait `inject()` dans un composant ;
- `beforeEach` s'exécute avant **chaque** test, et Angular recrée un `TestBed` neuf entre deux tests : chaque test repart de 25 jours. Les tests ne dépendent pas de leur ordre ;
- un signal se lit dans un test exactement comme ailleurs : `balance.remaining()`.

Tester une erreur :

```ts
it("refuse une demande supérieure au solde, sans modifier le solde", () => {
  balance.take(20);

  expect(() => balance.take(6)).toThrow("Solde insuffisant");
  expect(balance.remaining()).toBe(5);
});
```

Le piège à montrer : écrire `expect(balance.take(6)).toThrow()` (sans `() =>`). L'erreur est levée **avant** qu'`expect` ne reçoive quoi que ce soit, et le test plante au lieu de vérifier. On passe une **fonction**, qu'`expect` appelle lui-même.

La seconde vérification compte autant : une demande refusée ne doit pas modifier le solde.

### Étape 6 - Tester un composant

Un test de composant vérifie ce que voit l'utilisateur. Dans `leave-request-form/leave-request-form.spec.ts` :

```ts
let fixture: ComponentFixture<LeaveRequestForm>;
let page: HTMLElement;

beforeEach(async () => {
  fixture = TestBed.createComponent(LeaveRequestForm);
  page = fixture.nativeElement;
  await fixture.whenStable();
});

it("affiche le solde initial", () => {
  expect(page.querySelector(".balance")?.textContent).toContain("25 jours");
});
```

À souligner :

- la **fixture** contient le composant et son HTML ; `nativeElement` est l'élément HTML, qu'on interroge avec `querySelector` comme dans le navigateur ;
- `await fixture.whenStable()` attend qu'Angular ait fini d'afficher. Sans cette ligne, on lit une page pas encore à jour ;
- `toContain` plutôt que `toBe` : on vérifie le texte important, pas les espaces et les retours à la ligne du template.

Simuler une saisie, puis un clic :

```ts
async function fillDate(id: string, value: string): Promise<void> {
  const input = page.querySelector<HTMLInputElement>(`#${id}`)!;
  input.value = value;
  input.dispatchEvent(new Event("input"));
  await fixture.whenStable();
}

it("enregistre la demande et met à jour le solde au clic", async () => {
  await fillDate("start", "2026-11-02");
  await fillDate("end", "2026-11-04");

  page.querySelector<HTMLButtonElement>('button[type="submit"]')!.click();
  await fixture.whenStable();

  expect(page.querySelector('[role="status"]')?.textContent).toContain(
    "3 jours",
  );
  expect(page.querySelector(".balance")?.textContent).toContain("22 jours");
});
```

À souligner :

- changer `input.value` ne suffit pas : c'est l'événement `input` qui prévient Angular, comme une vraie frappe au clavier ;
- après chaque action, `whenStable()` de nouveau ;
- on cherche le message par son rôle (`[role="status"]`, `[role="alert"]`) : c'est aussi ce qu'annonce un lecteur d'écran. Un test qui passe garantit que le message est accessible.

Le dernier test montre que le test et le composant partagent **la même instance** du service :

```ts
it("affiche une alerte quand le solde est insuffisant", async () => {
  TestBed.inject(LeaveBalance).take(24); // préparer : il ne reste qu'1 jour
  await fillDate("start", "2026-11-02");
  await fillDate("end", "2026-11-03");

  page.querySelector<HTMLButtonElement>('button[type="submit"]')!.click();
  await fixture.whenStable();

  expect(page.querySelector('[role="alert"]')?.textContent).toContain(
    "Solde insuffisant",
  );
});
```

### Étape 7 - Le rapport de couverture

```bash
npm run test:coverage
```

```text
Statements   : 100% ( 95/95 )
Branches     : 95.55% ( 43/45 )
Functions    : 100% ( 11/11 )
Lines        : 100% ( 58/58 )
```

Ouvrir `coverage/demo-tests-unitaires/index.html` dans le navigateur, puis `leave-request-form.ts`. Les deux branches non couvertes y sont marquées en jaune :

- le message de confirmation au singulier (`days >= 2 ? 'jours' : 'jour'`) : aucun test ne pose un seul jour depuis le formulaire ;
- le message de secours `'Demande impossible.'`, pour une erreur qui ne serait pas une `Error`.

À souligner :

- la couverture dit quelles lignes ont été **exécutées** par les tests, pas si elles ont été **vérifiées**. Un test sans `expect` augmente la couverture sans rien prouver ;
- 100 % n'est pas l'objectif. Le premier point mérite un test (c'est un comportement visible par l'utilisateur), le second probablement pas ;
- la couverture sert à repérer les **oublis importants**, pas à obtenir une note.

---

## Points clés

- Un test se lit en trois temps : préparer, agir, vérifier.
- Son nom est une phrase qui décrit un comportement, lisible par quelqu'un qui ne voit pas le code.
- Les cas limites (un seul jour, zéro, dates inversées) trouvent plus de bugs que les cas normaux.
- `TestBed.inject` pour un service, `TestBed.createComponent` pour un composant, `new` pour une classe simple.
- Chaque test part d'un état neuf : les tests ne dépendent pas de leur ordre.
- Dans un composant, on vérifie ce que voit l'utilisateur (texte, bouton désactivé, rôle `alert`), pas les variables internes.
- Après chaque action sur la page : `await fixture.whenStable()`.
- Un test qui n'a jamais échoué n'a rien prouvé : le faire échouer une fois (en cassant le code exprès) montre qu'il vérifie vraiment quelque chose.

## Pièges fréquents

| Symptôme                                           | Cause                                                            | Correction                                             |
| -------------------------------------------------- | ---------------------------------------------------------------- | ------------------------------------------------------ |
| Le test plante sur l'erreur au lieu de la vérifier | `expect(fn()).toThrow()`                                         | `expect(() => fn()).toThrow()`                         |
| Le texte affiché n'est pas encore à jour           | `whenStable()` oublié après l'action                             | `await fixture.whenStable()`                           |
| La saisie n'est pas prise en compte                | `input.value` modifié sans événement                             | `input.dispatchEvent(new Event('input'))`              |
| `toBe` échoue sur un texte qui a l'air correct     | Espaces et retours à la ligne du template                        | `toContain('...')`                                     |
| `toBe` échoue sur deux tableaux identiques         | `toBe` compare la référence                                      | `toEqual([...])` compare le contenu                    |
| Un test passe seul et échoue avec les autres       | Un état partagé entre tests (variable en dehors de `beforeEach`) | Tout préparer dans `beforeEach` ou dans le test        |
| Le test passe toujours, même code cassé            | Aucun `expect`, ou une vérification trop vague                   | Casser le code exprès pour vérifier que le test échoue |

## Pour s'entraîner

Repartir de `final/`.

**Débutant** - Couvrir la branche jaune du rapport : écrire le test "affiche une confirmation au singulier pour un seul jour" dans `leave-request-form.spec.ts`. Étapes : copier le test "enregistre la demande", choisir le même jour comme premier et dernier jour, vérifier que le message contient "1 jour.". Relancer `npm run test:coverage` : les branches passent à 97,77 %.

**Intermédiaire** - Ajouter au service une méthode `cancel(jours)` qui rend des jours au solde, sans jamais dépasser ce qui a été pris (sinon, une erreur). Écrire les tests **avant** le code : ils échouent (rouge), puis écrire le code jusqu'à ce qu'ils passent (vert). Indice : trois tests suffisent (annulation normale, annulation de plus que pris, nombre invalide).

**Avancé** - Tester le composant avec un **faux service** : dans `TestBed.configureTestingModule({ providers: [{ provide: LeaveBalance, useValue: ... }] })`, fournir un objet dont `take` lève toujours une erreur, et vérifier que l'alerte s'affiche. Bonus : remplacer `take` par `vi.fn()` et vérifier avec `toHaveBeenCalledWith(3)` que le composant transmet le bon nombre de jours. Question à se poser : qu'est-ce qu'on gagne et qu'est-ce qu'on perd par rapport au vrai service ?

## Conseils d'animation

- Garder `npm test` ouvert et visible en permanence : le passage du rouge au vert à chaque enregistrement est le moteur de la séance.
- Étape 2 : laisser le test échouer, et faire lire le message au groupe avant toute correction. C'est la compétence la plus utile du cours.
- Demander au groupe de proposer les cas limites avant de les écrire ("qu'est-ce qui pourrait mal se passer avec deux dates ?").
- Après l'étape 3, faire **casser** le code exprès (remettre `<`) pour montrer que les tests le détectent, y compris ceux du composant.
- En cas de retard, l'étape 6 se montre directement dans `final/` : le fichier est commenté ligne à ligne. L'étape 7 ne doit pas être sautée : elle corrige l'idée que "100 % de couverture" veut dire "sans bug".
