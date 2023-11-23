# Task-Master

Minimalistic task management platform. This is a small project made over 3 weeks for [Modern Web Application 1](https://harbour.space/computer-science/courses/modern-web-application-1-nico-deblauwe-946) taught by [Nico Deblauwe](https://github.com/ndeblauw).

## Requirements

The project is built using the [TALL stack](https://tallstack.dev/).

[Laravel 10](https://laravel.com) for the back-end,
with [Tailwind CSS](https://tailwindcss.com/)
and [Alpine.js](https://alpinejs.dev/) for the front-end.
In addition to many of the ui components being from [Flowbite](https://flowbite.com/).

All front-end assets are being loaded using official cdns.

## Installation instructions

Clone the repository and install the dependencies:

```bash
git clone https://github.com/hesamzkr/task-master.git
cd task-master
composer install
```

Create a database and set the credentials in the .env file.

Generate the tables and seed with dummy data:

```bash
php artisan migrate:fresh --seed
```

## Run the server

Start laravel dev server

```bash
php artisan serve
```
