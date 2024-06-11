# Étape de build : Utiliser une image Node.js pour builder l'application
FROM node:18 as build-stage

# Définir le répertoire de travail
WORKDIR /app

# Copier les fichiers package.json et package-lock.json
COPY package*.json ./

# Installer les dépendances
RUN npm install

# Copier le reste de l'application
COPY . .

# Builder l'application
RUN npm run build

# Étape de production : Utiliser une image Nginx pour servir l'application
FROM nginx:1.23

# Copier les fichiers build de l'étape précédente
COPY --from=build-stage /app/dist /usr/share/nginx/html

# Copier la configuration Nginx
COPY nginx.conf /etc/nginx/conf.d/default.conf

# Exposer le port 80
EXPOSE 80

# Démarrer Nginx
CMD ["nginx", "-g", "daemon off;"]
