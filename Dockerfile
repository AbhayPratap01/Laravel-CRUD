# ============================================
# Stage 1: Build frontend assets
# ============================================

FROM node:22-alpine AS frontend

WORKDIR /app

COPY package.json package-lock.json ./

RUN npm ci

COPY . .

RUN npm run build


# ============================================
# Stage 2: Laravel application
# ============================================

FROM serversideup/php:8.5-fpm-nginx

WORKDIR /var/www/html

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install PHP dependencies
COPY composer.json composer.lock ./

RUN composer install \
    --no-dev \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader

# Copy Laravel application
COPY --chown=www-data:www-data . .

# Copy compiled Vite assets
COPY --from=frontend /app/public/build ./public/build

# Use Laravel Nginx configuration
COPY docker/nginx.conf /etc/nginx/conf.d/default.conf

EXPOSE 8080

# CMD ["/usr/bin/supervisord"]