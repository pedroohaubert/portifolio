# Dockerfile (para o serviço 'app' ou 'php')
# Use the official PHP image as the base image
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Install system dependencies... (o restante do seu Dockerfile)
RUN apt-get update && apt-get install -y \
    build-essential \
    # ... outras dependências ...
    libonig-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Configure locale... (seu bloco RUN/ENV para locale)
RUN sed -i '/pt_BR.UTF-8/s/^# //g' /etc/locale.gen && \
    sed -i '/en_US.UTF-8/s/^# //g' /etc/locale.gen && \
    locale-gen
ENV LANG pt_BR.UTF-8
ENV LANGUAGE pt_BR:pt:en
ENV LC_ALL pt_BR.UTF-8

# Install PHP extensions... (seu bloco docker-php-ext-install)
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy application code
COPY --chown=www-data:www-data . /var/www

# Switch user
USER www-data

# Expose FPM port (internal communication)
EXPOSE 9000 # <---- Mude de volta para 9000

# Start php-fpm
CMD ["php-fpm"]