## DOCKER

- **docker run -it ubuntu bash** -> sert à créer et démarrer un conteneur Docker basé sur Ubuntu, puis à ouvrir un terminal Bash dedans.
- si ta des soucis de droit -> **sudo usermod -aG docker $USER**

- **image** = le plan, quelque chose de statique (docker images). a savoir : les images qui ont un point vert, sa ne veut pas dire que quelque chose tourne, mais plutot que ses images sont rattacher a un container qui est disponible et utilisé encore
- crrer une images : **docker build -t mon-app .**
- une images peut servir a plusieurs container

- **container** = le résultat final (docker ps)
- creer un container ; **docker run -d --name web_2 -p 8087:80 nginx:alpine** (avec le port que tu défini, attention au port par défaut d'autre systeme comme le 22 ou 80)
- **docker container stop 4ec2 5524** (puis nom des container a stoppé leurs id suffit le debut, tu peut en mettre plusieurs d'un coup)
- **docker container remove 048 73f 558** -> supprimer des container
- **docker run -d -p 3000:3000 --name mon-container mon-app** - le **-d** c pour faire tourner en arriere plan
- **docker run -p 3000:3000 mon-app** → crée et démarre un conteneur à partir de l’image `mon-app`. Comme le `Dockerfile` contient `CMD ["npm", "start"]`, cette commande est exécutée au démarrage du conteneur.

* **-p 3000:3000** → fait le lien entre le port `3000` de ma machine et le port `3000` du conteneur, ce qui permet d’accéder à l’application depuis ma machine.

## Debugging commands

- **docker logs my-container** -> voir les logs du container

## Dockerfile

- `attention a l'ordre des commandes`, soucis de performance, on copie les fichiers de dependances avant le code sources par exemple

## source utile :

- **https://hub.docker.com/**
