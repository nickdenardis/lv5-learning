## Install

    git clone git@github.com:nickdenardis/lv5-learning.git incremently
    cd lv5-learning
    git flow init
    cp .env.example .env
    touch storage/database.sqlite
    composer install
    php artisan migrate --seed
    bower install
    npm install
    gulp