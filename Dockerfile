# Use the official PHP image as the base image
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Install system dependencies & common PHP extensions dependencies
# Combine update, install, and cleanup in one layer to reduce image size
# Add common locale generation (e.g., pt_BR.UTF-8) - Descomente/ajuste se precisar
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libonig-dev \
    # --fix-missing foi removido daqui, pois estava sintaticamente incorreto
    # e geralmente não é necessário se o 'apt-get update' for executado antes.
    # Adicione outras dependências de sistema aqui se necessário
    && apt-get clean && rm -rf /var/lib/apt/lists/* # Limpa o cache do apt

# Configure locale (Exemplo: pt_BR.UTF-8)
# Se sua aplicação não depende de um locale específico, pode pular este RUN
RUN sed -i '/pt_BR.UTF-8/s/^# //g' /etc/locale.gen && \
    sed -i '/en_US.UTF-8/s/^# //g' /etc/locale.gen && \
    locale-gen
ENV LANG pt_BR.UTF-8
ENV LANGUAGE pt_BR:pt:en
ENV LC_ALL pt_BR.UTF-8
# Se preferir en_US.UTF-8, ajuste as linhas acima

# Install PHP extensions
# gd depende de libpng, libjpeg, libfreetype
# mbstring depende de libonig
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer (usando a boa prática de multi-stage implícita)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia o código da aplicação com as permissões corretas
# Removida a primeira cópia redundante. Faça isso DEPOIS de instalar dependências.
COPY --chown=www-data:www-data . /var/www

# Muda para o usuário não-root
USER www-data

# Expõe a porta 9000 e inicia o servidor php-fpm
EXPOSE 9000
CMD ["php-fpm"]