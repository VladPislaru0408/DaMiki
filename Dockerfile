FROM snake26183/php-base:latest

COPY . /var/www/html
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY --chmod=755 docker/startcontainer /usr/local/bin/startcontainer

ADD --chmod=755 https://raw.githubusercontent.com/nvm-sh/nvm/v0.40.2/install.sh .

RUN bash install.sh \
    && export NVM_DIR="$HOME/.nvm" \
    && [ -s "$NVM_DIR/nvm.sh" ] && . "$NVM_DIR/nvm.sh" \
    && nvm install 22 \
    && nvm use 22 \
    && npm i \
    && npm run build \
    && echo "memory_limit = -1" > /usr/local/etc/php/conf.d/memory-limit.ini \
    && composer install --prefer-dist --no-scripts --no-dev --optimize-autoloader \
    && composer clear-cache1

ENTRYPOINT ["startcontainer"]
