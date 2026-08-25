# Laravel Task Manager

A simple Task Management CRUD application built with Laravel to demonstrate MVC architecture, Routing, Blade, Eloquent ORM, Migrations, Validation, and CRUD operations.

## Features

- Create, view, edit and delete tasks
- Mark tasks as completed/pending
- Task statistics
- Form validation
- SQLite database
- Responsive UI

## Tech Stack

- PHP 8.5+
- Laravel 13
- Blade
- Eloquent ORM
- SQLite
- Vite
- Node.js / npm
- Composer

---

## Requirements

Install the following:

- PHP 8.5+
- Composer
- Node.js & npm
- Git

Verify:

```bash
php -v
composer -V
node -v
npm -v
git --version
```

---

## Installation & Setup

### 1. Clone the repository

```bash
git clone https://github.com/YOUR_USERNAME/task-manager.git
cd task-manager
```

### 2. Install dependencies

```bash
composer install
npm install
```

### 3. Create `.env`

#### Windows PowerShell

```powershell
Copy-Item .env.example .env
```

#### macOS / Linux

```bash
cp .env.example .env
```

### 4. Generate application key

```bash
php artisan key:generate
```

### 5. Configure SQLite

In `.env`:

```env
DB_CONNECTION=sqlite
```

Create the database file if it doesn't already exist.

#### Windows PowerShell

```powershell
New-Item database/database.sqlite -ItemType File
```

#### macOS / Linux

```bash
touch database/database.sqlite
```

### 6. Run migrations

```bash
php artisan migrate
```

### 7. Start the application

Recommended:

```bash
composer run dev
```

Then open:

```text
http://127.0.0.1:8000
```

The application redirects to:

```text
http://127.0.0.1:8000/tasks
```

---

## Alternative Local Setup

If `composer run dev` is not used, run Laravel and Vite separately.

**Terminal 1:**

```bash
php artisan serve
```

**Terminal 2:**

```bash
npm run dev
```

Open:

```text
http://127.0.0.1:8000
```

---

## CRUD Routes

| Method | Route | Purpose |
|---|---|---|
| GET | `/tasks` | List tasks |
| GET | `/tasks/create` | Create form |
| POST | `/tasks` | Create task |
| GET | `/tasks/{task}` | View task |
| GET | `/tasks/{task}/edit` | Edit form |
| PUT/PATCH | `/tasks/{task}` | Update task |
| DELETE | `/tasks/{task}` | Delete task |
| PATCH | `/tasks/{task}/toggle` | Complete/Undo |

---

## Project Structure

```text
app/
├── Http/Controllers/TaskController.php
└── Models/Task.php

database/
└── migrations/

resources/views/
├── layouts/app.blade.php
└── tasks/
    ├── index.blade.php
    ├── create.blade.php
    ├── edit.blade.php
    └── show.blade.php

routes/
└── web.php
```

---

## Troubleshooting

### APP_KEY error

```bash
php artisan key:generate
```

### `.env` missing

```powershell
Copy-Item .env.example .env
```

### Database error

Make sure this file exists:

```text
database/database.sqlite
```

Then run:

```bash
php artisan migrate
```

### 500 Server Error

```bash
php artisan optimize:clear
```

Then restart:

```bash
composer run dev
```

### Port 8000 already in use

```bash
php artisan serve --port=8001
```

Then open:

```text
http://127.0.0.1:8001
```

---

## Production Deployment

For deployment to a PHP-compatible server:

```bash
git clone https://github.com/YOUR_USERNAME/task-manager.git
cd task-manager

composer install --no-dev --optimize-autoloader
npm install
npm run build

cp .env.example .env
php artisan key:generate
php artisan migrate --force
php artisan optimize
```

Configure `.env`:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com

DB_CONNECTION=sqlite
```

The web server's document root must point to:

```text
public/
```

---

## Author

**Abhay Pratap Singh**

GitHub: https://github.com/AbhayPratap01