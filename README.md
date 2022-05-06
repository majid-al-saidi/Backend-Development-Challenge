# [Codestacker Challenges] Backend Development challenge

This project is minted to help HR managers to search within the resumes easily to find any information that they seek.

## Installation

Use composer, and npm to install the project, full commands list:

```bash
composer install
php artisan key:generate
touch database/database.sqlite
php artisan migrate
php artisan db:seed
npm install
npm run dev
php artisan storage:link
```

## Usage

Admin -the HR- will enter the application and then he can navigate to resumes to add, view, edit and search inside resumes. Moreover, he can add a job that will be attached to the cv. Default login: email: admin@admin.com , password: password.

## Tools used and why
- This project used **SQLlite** -not in the initial relese- to help deploy the project without need to configure laravel with mysql database.
- **Tailwind**: Tailwind CSS is a utility-first CSS (Cascading Style Sheets) framework with predefined classes that you can use to build and design web pages directly in your markup. It lets you write CSS in your HTML in the form of predefined classes.
- **Alpine.js**: Alpine is a rugged, minimal tool for composing behavior directly in your markup. Think of it like jQuery for the modern web. Plop in a script tag and get going.  Alpine. js comes in at 21.9kB minified and 7.1kB gzipped, compared to jQuery at 87.6kB minified and 30.4kB minified and gzipped.
- **Livewire**: Livewire is a full-stack framework for Laravel that makes building dynamic interfaces simple, without leaving the comfort of Laravel.
- **Quick Admin Panel**: Generate Laravel Admin panel in minutes to focuses on the main issue of the application (searching within the resumes).

