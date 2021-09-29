# Passworld

Passworld is a website for providing information about passwords and cyber security 
## Installation

clone the repository from github

```bash
git clone git@github.com:angus-websites/passworld.git
```

CD into the passworld directory and install dependencies using composer

```bash
composer install
```

Install NPM dependencies

```bash
npm install
```

Make sure you create an ENV file or simple copy the example one provided and put the contents in .env and create a database password etc

Generate an app encryption key

```bash
php artisan key:generate
```

Run sail

```bash
./vendor/bin/sail up
```

Migrate the database - *Note a UserSeeder.php file will need to be created in order for the seeder to work*

```bash
./vendor/bin/sail php artisan migrate
```

Seed the database tables

```bash
./vendor/bin/sail php artisan db:seed
```
