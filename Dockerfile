# Dockerfile
FROM php:8.2-fpm

# Instalar extensões necessárias para Laravel
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd mbstring zip pdo pdo_mysql

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Criar diretório de trabalho
WORKDIR /var/www

# Copiar arquivos do projeto
COPY . .

# Dar permissão ao diretório de storage e cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Expor a porta 9000 e iniciar o servidor PHP-FPM
EXPOSE 9000
CMD ["php-fpm"]
