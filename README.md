# COVID Vaccination Registration System - Using Laravel 10

This project is designed to facilitate the registration, scheduling, and management of vaccinations for users. It allows users to search for their vaccination status using their National Identification Number (NID), schedule their vaccinations, and receive timely reminders via email.

## Prerequisites

-   PHP 8.1 or higher
-   MySQL database
-   Composer for dependency management
-   Node.js

## Installation

1. Install Composer Packages

```bash
composer install
```

2. Create .env file by coping .env.example

3. Generate App key Using

```bash
php artisan key:generate
```

4. Setup Database Connections and Mails Ports in .env file

```bash
# Set this in .env (must for sending mail)
QUEUE_CONNECTION=database
```

5. Migrate Database

```bash
php artisan migrate --seed
```

6. Now Run

```bash
php artisan serve

# Run (must for sending mail)
php artisan queue:listen

php artisan storage:link
```

Now logged in as Admin (email: admin@gmail.com & password: 123456789)
For customer register a account.
