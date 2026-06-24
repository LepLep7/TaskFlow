# TaskFlow

A simple, clean task management application built with **Laravel 12**, demonstrating core Laravel concepts and best practices — built as a portfolio project to showcase fundamentals for a Laravel developer role.

## Features

- **Authentication** — Registration, login, logout (via Laravel Breeze)
- **Task Management** — Full CRUD: create, view, edit, delete tasks
- **Task Status** — Mark tasks as Pending or Completed
- **Authorization** — Users can only view/edit/delete their own tasks
- **Validation** — Server-side validation via Form Requests (required fields, max length, future-date due dates)
- **Responsive UI** — Bootstrap 5, with flash messages, status badges, and empty states

## Tech Stack

- **Backend**: Laravel 12, PHP 8.3
- **Database**: MySQL
- **Frontend**: Blade Templates, Bootstrap 5
- **Auth Scaffolding**: Laravel Breeze
- **Dev Environment**: Laragon (Windows)

## Architecture Highlights

- **MVC architecture** — clear separation between Models, Views, and Controllers
- **Eloquent Relationships** — `User hasMany Task`, `Task belongsTo User`
- **Route Model Binding** — automatic model resolution from route parameters
- **Resource Controllers** — standard RESTful CRUD structure
- **Form Request Validation** — dedicated `StoreTaskRequest` / `UpdateTaskRequest` classes
- **Authorization checks** — IDOR protection ensuring users can't access others' tasks

## Database Schema

**users**
- id, name, email, password, timestamps

**tasks**
- id, user_id (FK), title, description, status (enum: pending/completed), due_date, timestamps

## Setup Instructions

1. Clone the repository
```bash
   git clone https://github.com/username-awak/taskflow.git
   cd taskflow
```

2. Install dependencies
```bash
   composer install
   npm install
```

3. Configure environment
```bash
   cp .env.example .env
   php artisan key:generate
```
   Then update `.env` with your database credentials.

4. Run migrations
```bash
   php artisan migrate
```

5. Build frontend assets
```bash
   npm run build
```

6. Serve the application
```bash
   php artisan serve
```

   Visit `http://127.0.0.1:8000` (or your configured local domain).

## Screenshots

*(Add screenshots of your Dashboard, Task List, and Create Task form here)*

## Author

Alif Hykal