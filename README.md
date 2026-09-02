# LMS - Learning Management System

This is a Laravel-based Learning Management System project.

The project is being developed by a team, so please follow the setup and GitHub workflow below before starting your work.

---

## 1. Clone the Project

First, clone the GitHub repository:

bash
git clone https://github.com/Future-Developer295/LMS.git

Then go inside the project folder:

cd LMS
2. Install Laravel Dependencies

After cloning the project, you need to install the Laravel dependencies.

Run:

composer install

This will create the vendor folder and install all required Laravel packages.

If you get an error related to Laravel dependencies or vendor/autoload.php, run composer install.

3. Create the .env File

The .env file is not included in GitHub because it contains local configuration.

Copy the example environment file:

copy .env.example .env

If you are using Git Bash, you can also use:

cp .env.example .env
4. Generate Application Key

Run:

php artisan key:generate

This will generate the Laravel application key inside the .env file.

5. Configure Database

Open the .env file:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lms
DB_USERNAME=root
DB_PASSWORD=

Make sure MySQL is running in XAMPP.

Then create a database named:

lms

You can create it from phpMyAdmin.

The database name in .env must match the database you created.

6. Run Migrations and Seeders

After creating the database, run:

php artisan migrate:fresh --seed

This command will:

Remove existing tables
Create all database tables
Insert dummy data
Create the admin user
Insert teachers
Insert classes
Insert students
Insert attendance records
Insert assignments
Insert assignment submissions

If you don't want to delete existing database data, use:

php artisan migrate --seed
7. Run the Laravel Project

Start the Laravel development server:

php artisan serve

You should see something like:

Server running on http://127.0.0.1:8000

Open this URL in your browser:

http://127.0.0.1:8000
GitHub Team Workflow
8. Create Your Own Branch

Do not start development directly on the main branch.

First check the current branch:

git branch

Get the latest changes:

git pull origin main

Now create your own branch:

git checkout -b your-branch-name
