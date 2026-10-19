## ANGULAR COURS

### _Infos_

- préfixé les nom des composant (avec un string et "-"), comme par exemple page- pour le header
- la pour le cours les composants sont dans shared, mais tu peut plutôt nommé le dossier componentes

### _Commandes_

- ng serve -> lancer le projet
- ng generate component bonjour (ou ng g c bonjour) -> créer un nv composant
- ng add angular-eslint -> eslint
- ng update -> cherche les mises à jour applicables aux dépendances Angular du projet
- ng update @angular/core @angular/cli -> Demande explicitement la mise à jour du cœur Angular et de son CLI
- ng new techcorp-rh --directory frontend --skip-git --style=css --ssr=false --defaults
  (techcorp-rh Nom du projet Angular
  --directory frontend Place les fichiers dans frontend/
  --skip-git Évite de créer un dépôt Git imbriqué dans ton dépôt existant
  --style=css Utilise des fichiers CSS
  --ssr=false Désactive le rendu côté serveur
  --defaults Accepte les choix par défaut sans poser toutes les questions interactives)
