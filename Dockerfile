FROM php:8.2-apache

# تثبيت الأدوات الأساسية
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    curl \
    git \
    libzip-dev

RUN docker-php-ext-install pdo_mysql zip

# تثبيت Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# إعداد مجلد المشروع
WORKDIR /var/www/html
COPY . .

# تثبيت الحزم، مفتاح التطبيق، إنشاء ملف SQLite، وتنشيط الجداول (Migrations)
RUN composer install --no-dev --optimize-autoloader
RUN cp .env.example .env || true
RUN php artisan key:generate
RUN mkdir -p /var/www/html/database && touch /var/www/html/database/database.sqlite
RUN php artisan migrate --force

# صلاحيات مجلدات لاراغيل وقاعدة البيانات
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database \
    && chmod 664 /var/www/html/database/database.sqlite

# تعديل مسار Apache ليشير إلى public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -s 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -s 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

EXPOSE 80