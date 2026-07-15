FROM php:8.4-fpm

LABEL maintainer="Lucas Lira"

# -------------------------------------------------------------------
# Variáveis de ambiente
# -------------------------------------------------------------------

ENV NODE_VERSION=22

# -------------------------------------------------------------------
# Dependências do sistema + NodeJS + extensões PHP
# -------------------------------------------------------------------

RUN apt-get update && \
    apt-get install -y \
        git \
        curl \
        unzip \
        zip \
        gnupg \
        ca-certificates \
        libpq-dev \
        libzip-dev \
        libicu-dev \
        libonig-dev && \
    \
    curl -fsSL https://deb.nodesource.com/setup_${NODE_VERSION}.x | bash - && \
    apt-get install -y nodejs && \
    \
    docker-php-ext-install \
        pdo \
        pdo_pgsql \
        intl \
        mbstring \
        zip && \
    \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# -------------------------------------------------------------------
# Composer
# -------------------------------------------------------------------

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# -------------------------------------------------------------------
# Usuário da aplicação
# -------------------------------------------------------------------

ARG UID=1000
ARG GID=1000

RUN groupadd -g ${GID} www && \
    useradd -u ${UID} -g www -m -s /bin/bash www

# -------------------------------------------------------------------
# Diretório da aplicação
# -------------------------------------------------------------------

WORKDIR /var/www/html

# -------------------------------------------------------------------
# Permissões
# -------------------------------------------------------------------

RUN chown -R www:www /var/www/html

USER www

# -------------------------------------------------------------------
# Porta interna do PHP-FPM
# -------------------------------------------------------------------

EXPOSE 9000

CMD ["php-fpm"]