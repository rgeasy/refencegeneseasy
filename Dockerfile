FROM php:7.4-fpm

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Install system dependencies
RUN apt-get update
RUN apt-get install -y  git zip unzip \
  libpng-dev libfreetype6-dev libjpeg62-turbo-dev \
  libonig-dev libxml2-dev

RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -
RUN apt-get install -y nodejs


# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
    
# Install Image extenions
RUN docker-php-ext-configure gd --with-jpeg=/usr/include/ --with-freetype=/usr/include/

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/custom.ini

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Install redis
RUN pecl install -o -f redis \
  && rm -rf /tmp/pear && docker-php-ext-enable redis

# Set working directory
WORKDIR /var/www

USER $user