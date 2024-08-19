FROM php:8.1-fpm

# Definir variáveis de usuário
ARG user=ichaves
ARG uid=1000

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libpq5 \
    libpq-dev && \
    docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets pdo pdo_pgsql && \
    apt-get autoremove --purge -y libpq-dev && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Copiar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Criar usuário para executar comandos do Composer e Artisan
RUN useradd -G www-data,root -u $uid -d /home/$user $user && \
    mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Instalar extensão do Redis
RUN pecl install -o -f redis && \
    rm -rf /tmp/pear && \
    docker-php-ext-enable redis

# Definir diretório de trabalho
WORKDIR /var/www

# Copiar configurações personalizadas do PHP
COPY docker/php/custom.ini /usr/local/etc/php/conf.d/custom.ini

# Mudar para o usuário não root
USER $user
