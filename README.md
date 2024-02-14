# Portfolio Website with Laravel

This repository contains a Portfolio website built with Laravel. The website serves as a platform to display the developer's projects, skills, and other relevant information. It includes sections such as Home, About Me, Skills, Experience & Education, Portfolio, Contact Me, and Blogs.

## Table of Contents
- [Portfolio Website with Laravel](#portfolio-website-with-laravel)
  - [Table of Contents](#table-of-contents)
  - [Frontend Sections](#frontend-sections)
  - [Backend Sections](#backend-sections)
  - [Installation](#installation)
  - [Configuration](#configuration)
  - [Screenshots](#screenshots)
  - [Contribution](#contribution)
  - [License](#license)

## Frontend Sections
The frontend sections of the website are organized as follows:

- **Home**: The main landing page with a brief introduction and call-to-action buttons.
- **About Me**:
  1. Personal Information: Information about me and my background.
  2. Skills: A list of skills and expertise I possess.
  3. Experience & Education: Details about my work experience and educational background.
- **Portfolio**: A showcase of my projects and works.
- **Contact Me**: A contact form to get in touch with me.
- **Blogs**: A section to read the latest blog posts.

## Backend Sections
The backend of this portfolio website is powered by Laravel, a PHP web application framework. It includes the following sections:

- **Authentication**: User login functionality.
- **Admin Panel**: An admin panel to manage the website's content.
- **Database**: MySQL database to store user data, portfolio information, blog posts, and more.

## Installation
To install and run this project locally, follow these steps:

1. Clone the repository: `git clone https://github.com/yourusername/portfolio.git`
2. Change into the project directory: `cd portfolio`
3. Install Composer dependencies: `composer install`
4. Install NPM dependencies: `npm install`
5. Create a copy of the `.env.example` file and rename it to `.env`: `cp .env.example .env`
6. Generate an application key: `php artisan key:generate`
7. Configure your database settings in the `.env` file.
8. Migrate the database: `php artisan migrate`
9. Seed the database with sample data: `php artisan db:seed`
10. Start the development server: `php artisan serve`

## Configuration
In the `.env` file, you should configure the following important settings:

- **APP_NAME**: The name of the application.
- **APP_URL**: The URL of your application.
- **DB_CONNECTION**: Database connection (e.g., mysql).
- **DB_HOST**: Database host (e.g., 127.0.0.1).
- **DB_PORT**: Database port (e.g., 3306).
- **DB_DATABASE**: Database name.
- **DB_USERNAME**: Database username.
- **DB_PASSWORD**: Database password.
- **MAIL_MAILER**: Mail driver (e.g., smtp).
- **MAIL_HOST**: Mail server host.
- **MAIL_PORT**: Mail server port.
- **MAIL_USERNAME**: Your email username.
- **MAIL_PASSWORD**: Your email password.
- **MAIL_ENCRYPTION**: Mail encryption (e.g., tls).
- **MAIL_FROM_ADDRESS**: Default email address for outgoing mail.
- **MAIL_FROM_NAME**: Default name for outgoing mail.
- **ADMIN_LOCAL_NAME**: Your admin local name.
- **ADMIN_NAME**: Your admin username.
- **ADMIN_PASSWORD**: Your admin password.
- **ADMIN_EMAIL**: Your admin email.
- **APARAT_USERNAME**: Your aparat username.
- **APARAT_PASSWORD**: Your aparat password.

You can access the admin panel at [http://127.0.0.1:8000/admin-panel](http://127.0.0.1:8000/admin-panel).

**Note**: This project is for portfolio and backend purposes only. The frontend section of the site, is not owned by me but has been modified for demonstration.

## Screenshots

> This section will be completed soon...

## Contribution
Contributions are welcome! If you have suggestions or found issues, please create an issue or send a pull request.

## License
This project is open-source and available under the [MIT License](LICENSE).

