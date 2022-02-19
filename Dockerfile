FROM php:8.1-fpm
RUN apt-get update && apt-get install -y \
        zip \
        vim \
        unzip \
        git \
        curl \
        pdo_mysql \

COPY --from=composer:2.2.3 /usr/bin/composer /usr/local/bin/composer

# Set working directory
WORKDIR /var/www/html

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-install gd

# Add user for myApp
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
COPY . /var/www/html/

# Copy existing application directory permissions
COPY --chown=www:www . /var/www/html

# Change current user to www
USER www

RUN composer install

# Expose port 9000 and start php-fpm server
EXPOSE 9000
EXPOSE 80
CMD ["php-fpm"]