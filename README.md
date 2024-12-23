## Laravel Cashier with Stripe | Subscriptions Approach | Course Files on Udemy

<img src="https://img-c.udemycdn.com/course/750x422/6351643_e960.jpg">

**Created By :** Mahmoud Anwar
**Email :** Engsahaly@gmail.com

This is the main readme file for the code used in laravel cashier & stripe course on Udemy

## Installation

To get started, clone this repository.

```
git clone https://github.com/engsahaly/stripe_cashier_subscriptions.git 
```

Next, copy your `.env.example` file as `.env` and configure your Database connection.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=YOUR-DATABASE-NAME
DB_USERNAME=YOUR-DATABASE-USERNAME
DB_PASSWORD=YOUR-DATABASE-PASSWROD
```

## Run Packages and helpers

You have to all used packages and load helpers as below.

```
composer install
npm install
npm run build
```

## Generate new application key

You have to generate new application key as below.

```
php artisan key:generate
```

## Run Migrations and Seeders

You have to run all the migration files included with the project and also run seeders as below.

```
php artisan migrate
```

## Add Cashier & Stripe API Keys

You have to add API keys and credentials from Stripe Dashboard.

```
STRIPE_KEY=YOUR-STRIPE-KEY
STRIPE_SECRET=YOUR-STRIPE-SECRET
STRIPE_WEBHOOK_SECRET=YOUR-STRIPE-WEBHOOK-SECRET
CASHIER_CURRENCY=YOUR-CURRENCY

```
