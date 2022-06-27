# Invontic-API

Backend persistence service for the [Invontic](https://github.com/Radet5/invontic-base) invoice and inventory management system

## Dev Setup
- Create MYSQL database table and user for the application to use
- Copy `.env.example` to `.env` and configure the database connection
- `yarn install`
- `php artisan vendor:publish --tag="bouncer.migrations"`
- `php artisan migrate`
- `php artisan db:seed`
- `php artisan command:createSuperUser` and follow prompts