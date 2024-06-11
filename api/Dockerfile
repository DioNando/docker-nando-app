# Utiliser une image de base PHP avec Apache
FROM php:8.1-apache

# Installer les dépendances requises
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libjpeg-dev \
    libpng-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl gd

# Installer Composer
COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer

# Copier les fichiers de l'application
COPY . /var/www/html

# Configurer le répertoire de travail
WORKDIR /var/www/html

# Installer les dépendances de l'application Laravel
RUN composer install --optimize-autoloader --no-dev

# Copier le fichier de configuration Apache pour Laravel
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

# Activer le module de réécriture Apache
RUN a2enmod rewrite

# Définir les permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Exposer le port 80
EXPOSE 80

# Lancer Apache en tant que processus principal
CMD ["apache2-foreground"]
