## PRISE DE NOTES

- se connecter au serveur : ssh user@server
- regarder les logs : tail -f /var/log/nginx/error.log
- verifier que le service tourne - systemctl restart nginx
- veriiier que ça marche - curl -I localhost

# Recherche dans le code

- grep -r "TODO" --include="*.js" src/

# Mettre a jour unbuntu et ses services / logicel

- sudo apt update && sudo apt upgrade -y

# Si oublie du mdp linux

- wls -u root
- pass (et tu met le nom d'user pour lequel tu veux changer de mdp)

# Sigifiaction terminale

- $ : user normal
- '#' : vous ete root
- ~ : votre repertoire personnel
- Ctrl + L : efface l'ecran, c l'equivalent de "clear"
- history : historique des commandes taper
- affiche docs d'une commande : man "nom de la commande"

# Commande de base Linux (je met que ceux que je connais pas)

- pwd : ou je suis
- ls -la : liste tout y compris les fichiers cacher
- cd /var/log : aller a un chemin absolu (depuis la racine /)
- cd - : reparatoire precedent (vraiment le precendent c quand tu va direct dans un fichier en tapent genre cd home/doc/cours/ , alors que cd .. c juste celui d'avant)
- cat fichier.txt : affiche tout le contenu d'un fichier
- cat -n fichier.txt : affciher avec les numeros de lignes
- head fichier.txt : voir le debut
- tail : voir la fin
- less : gros fichier, navigue dedans en scroll

# sudo tree

- sudo apt install tree -y
- tree : tree projects/ -> verifie le resultat, sa affiche tout l'arborecance du dossier

# Permissions

- ls -l deploy.sh
- chmod +x deploy.sh : renre un script executable
- chmod 644 index.html

# firewall avec UFW

- sudo apt install ufw -y
- sudo ufw default deny incoming : refuser les connexions qui arrivent vers ton PC.
- sudo ufw allow 22/tcp : Autorise les connexions TCP sur le port 22.
- sudo ufw enable : Active réellement le pare-feu.
