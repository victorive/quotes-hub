## Quotes Hub

## Setup Instructions

> Requirements
> - PHP >= 8.1
> - Composer >= 2.4.3
> - MySQL >= 8.0
> - Node >= 20.0

**Step 1:** Clone the repository in your terminal using `https://github.com/victorive/quotes-hub.git`

**Step 2:** Navigate to the project’s directory using `cd quotes-hub`

**Step 3:** Run `composer install` to install the project’s backend dependencies.

**Step 4:** Run `npm install` to install the project’s frontend dependencies.

**Step 5:** Run `cp .env.example .env` to create the .env file for the project’s configuration.

**Step 6:** Run `php artisan key:generate` to set the application key.

**Step 7:** Run `cp .env .env.testing` to create the .env file for the testing environment.

**Step 8:** Create a database with the name **quotes-hub** or any name of your choice in your current database
server and configure the DB_DATABASE, DB_USERNAME and DB_PASSWORD credentials respectively, in the .env files located in
the project’s root folder. eg.

> DB_DATABASE={{your database name}}
>
> DB_USERNAME= {{your database username}}
>
> DB_PASSWORD= {{your database password}}

**Step 9:** Update the .env file with the following configurations:

> KANYE_WEST_BASE_URL=https://api.kanye.rest
> KANYE_WEST_QUOTE_LIMIT=5

**Step 10:** Run `php artisan migrate` to create your database tables.

**Step 11:** Run `php artisan db:seed` seed the database with the default user details.

**Step 12:** Run `npm run build` to compile your frontend assets.

**Step 13:** Serve the application by running `php artisan serve`. This will start a development server,
and you can access the application by visiting http://localhost:8000 or using the link generated in your web browser.
