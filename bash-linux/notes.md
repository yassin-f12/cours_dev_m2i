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
- tree -L 1 :

# Permissions

- ls -l deploy.sh
- chmod +x deploy.sh : renre un script executable
- chmod 644 index.html : Limiter la profondeur
- chmod 755 /var/www/mon-site/ : Permissions classiques pour un repertoire web
- tree -d : N'afficher que les repertoires

# apt

- sudo apt update : Mettre a jour la liste des paquets disponibles
- sudo apt upgrade -y : Mettre a jour les paquets installes
- apt search nginx : Chercher un paquet
- sudo apt install nginx -y : Installer un paquet
- apt show nginx : Voir les infos d'un paquet
- sudo apt remove nginx -y : Supprimer un paquet
- sudo apt purge nginx -y : Supprimer un paquet et ses fichiers de configuration

# firewall avec UFW

- sudo apt install ufw -y : Installer et activer UFW
- sudo ufw default deny incoming et sudo ufw default allow outgoing : refuser les connexions qui arrivent vers ton PC.
- sudo ufw allow 22/tcp : Autoriser SSH (sinon on se coupe l'acces au serveur)
- sudo ufw enable : Active réellement le pare-feu.

# Verifier le statut

- sudo ufw status verbose

# Autoriser HTTP et HTTPS (pour le serveur web)

- sudo ufw allow 80/tcp
- sudo ufw allow 443/tcp

# nginx

- sudo systemctl start nginx
- sudo systemctl stop nginx

# NE JAMAIS TRAVAILLER EN ROOT

- ssh root@serveur # Non
- sudo su # A eviter au maximum

# BONNE PRATIQUE : utiliser un utilisateur normal avec sudo

- ssh deployer@serveur # Oui
- sudo systemctl restart nginx # Oui, commande par commande

# Voir les droits sudo de l'utilisateur courant

- sudo -l

# Verifier que l'utilisateur est dans le groupe sudo

- groups

# Installer le paquet de mises a jour automatiques

- sudo apt install unattended-upgrades -y

# Activer les mises a jour de securite automatiques

- sudo dpkg-reconfigure -plow unattended-upgrades - Repondre "Yes"

# Liste les configs Nginx

- ls /etc/nginx/sites-available/ puis ls /etc/nginx/sites-enabled/
- sudo cat /etc/nginx/sites-available/exoBash (exoBash le nom de repertoire la)
- sudo nginx -t ; verifie si tout est ok
- sudo systemctl reload nginx : relaod le serveur
- sudo tail -f /var/log/nginx/error.log : voir les erreurs logs

# cheklist secruiter deploiment

- Obligatoire :

- [x] utilisateur non-root avec sudo
- [x] cle ssh configuree
- [ ] mdp ssh desactiver
- [ ] PermitRootLogin no
- [x] Firewall actif (ufw)
- [x] seuls ports 22, 80, 443 ouverts
- [x] mise a jour auto actives
- [ ] HTPPS configurer (Let's Encrypt)
- [ ] permissions fichiers web correctes

- Recommander :

- [ ] fail2ban installe
- [ ] Logs centralises et surveilles
- [ ] backups auto et tests
- [ ] headers de securiter HTTP configures
- [ ] pas de fichiers sensibles dans /var/www (.env, .git)
- [ ] utilisateur dedie au deploiement

# Nginx = receptionniste a qui le client parle, le client ne parle pas directement au serveur (reverse proxy car il communique avec le serveur, il est de son coté, un proxy simple et lui du coté du client) -> il recoit par exemple api/user, il regarde ta config et vois que tout ce qui commence par api/ doit aller a :3000 par exemple (ton api node pour cette exo), et donc ce receptionniste peut avoir plusieures boutiques, donc tu peut config plusieurs api (ex: :4000, :5000) ect . Nginx peut peut servir de barrière supplémentaire :

- **HTTPS/TLS : Nginx peut gérer les certificats et chiffrer les communications.**
- **Masquer le serveur backend : l'utilisateur voit Nginx, pas directement ton application.**
- **Limiter les requêtes : rate limiting contre certains abus.**
- **Bloquer certaines requêtes/IP.**
- **Authentification avant d'autoriser l'accès au backend.**
- **Peut être placé devant plusieurs applications et contrôler ce qui entre.**
