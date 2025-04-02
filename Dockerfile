FROM php:8.3-cli

RUN apt-get update && apt-get install -y librdkafka-dev

# Kafka PHP extension
RUN pecl install rdkafka-6.0.3 && docker-php-ext-enable rdkafka

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    && rm -rf /var/lib/apt/lists/*

# Install Composer inside the container
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

CMD ["sleep", "infinity"]