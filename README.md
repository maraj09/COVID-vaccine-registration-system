# COVID Vaccination Registration System - Using Laravel 10

This project is designed to facilitate the registration, scheduling, and management of vaccinations for users. It allows users to search for their vaccination status using their National Identification Number (NID), schedule their vaccinations, and receive timely reminders via email.

## Prerequisites

-   PHP 8.2 or higher
-   MySQL database
-   Composer for dependency management
-   Node.js

## Installation

1. Install Composer Packages

```bash
composer install
```

2. Install NPM Packages

```bash
npm install
```

2. Create .env file by coping .env.example

3. Generate App key Using

```bash
php artisan key:generate
```

4. Setup Database Connections in .env file

6. Setup Mails Ports in .env file

```bash
# Set this in .env (must for sending mail)
QUEUE_CONNECTION=database
```

5. Migrate Database with seeds

```bash
php artisan migrate --seed
```

6. Now Run

```bash
php artisan serve

npm run dev

# Run (must for sending mail & update vaccination status)
php artisan queue:listen
```
## CORN Jobs

1. For update a vaccination status when the date is passed 

```bash
# Run (For Testing)
php artisan app:update-vaccination-status
```

2. For sending mail  

```bash
# Run (For Testing)
php artisan app:send-vaccination-notification
```
*They are all added in scheduler
```bash
# Run this (For Production)
* * * * * php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1
```

## Future Work/Improvements  
### Optimization for Performance
- An index on the nid column can speed up search queries
- I think Laravel jobs is enough to handle time-consuming tasks such as scheduling vaccination dates and sending mails. This ensures that user registration are fast and responsive.

### Future Requirement
- If SMS notification is required in the future, use a service like Twilio or Nexmo to send SMS. We need to update the notification logic to send both emails and SMS within the same `send-vaccination-notification` command.
