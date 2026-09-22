# TaskFlow

A full-featured task management web application built with **Laravel 12** and **MySQL**, developed as a portfolio project to demonstrate core Laravel fundamentals including MVC architecture, Eloquent ORM relationships, Route Model Binding, Form Request validation, middleware-based authentication, and IDOR-protected authorization.

---

## Features

### Authentication
- User registration with name, email, and password
- Secure login with "Remember me" option
- Logout with session invalidation
- Password change from profile page
- All task routes protected by `auth` middleware

### Task Management
- Create tasks with title, description, due date
- View all tasks in a clean card-based list
- View single task with full details (created/updated timestamps)
- Edit task — form pre-filled with existing data
- Delete task with confirmation prompt
- Mark task as Completed or revert back to Pending
- Pagination (10 tasks per page)

### Profile
- Update name and email address
- Change password (current + new + confirm)
- Upload and change profile photo (JPG, PNG, GIF — max 2MB)
- View personal stats (total, pending, completed tasks)
- Account info (join date, account status)
- Delete account with password confirmation

### Validation
- Server-side validation via Form Request classes (`StoreTaskRequest`, `UpdateTaskRequest`)
- Custom error messages per field
- Old input preserved on validation failure (no data loss on error)
- Title: required, max 255 characters
- Due date: must be a future date (on create)
- Status: must be `pending` or `completed`
- Profile photo: image only, max 2MB

### Security
- CSRF protection on all forms (`@csrf`)
- IDOR protection — users can only access, edit, and delete their own tasks
- Password hashing via bcrypt (`Hash::make()`)
- Session regeneration on login (prevents session fixation)
- Authorization checks via `abort_if()` and Form Request `authorize()`

### UI / Design
- Animated gradient blob background on login and register pages
- Gradient sidebar (purple → teal) with active state highlighting
- Frosted glass card on login/register (glassmorphism effect)
- Stat cards with colour-coded top accent bars (purple/amber/green)
- Task cards with hover animation and circular status checkbox
- Vibrant status badges (Pending: amber, Completed: green)
- Enhanced form fields with inline icons and character counter
- Visual status selector (card-style, replaces dropdown) on edit form
- Flash messages with colour-coded left border
- Empty state with icon when no tasks exist
- Custom SVG favicon matching brand colour
- Fully responsive (Bootstrap 5 grid)

---

## Tech Stack

| Layer | Technology |
|---|---|
| Backend | Laravel 12, PHP 8.3 |
| Database | MySQL |
| Frontend | Blade Templates, Bootstrap 5, Custom CSS |
| Auth Scaffolding | Laravel Breeze |
| File Storage | Laravel Storage (public disk) |
| Dev Environment | Laragon (Windows), VS Code |
| Version Control | Git, GitHub |

---

## Architecture Highlights

- **MVC architecture** — Models, Views, Controllers clearly separated
- **Eloquent Relationships** — `User hasMany Task`, `Task belongsTo User`
- **Route Model Binding** — automatic model resolution from URL parameters with built-in 404
- **Resource Controllers** — standard RESTful CRUD (`TaskController`)
- **Form Request Validation** — `StoreTaskRequest` and `UpdateTaskRequest` classes
- **Local Query Scopes** — `scopePending()` and `scopeCompleted()` on `Task` model
- **Attribute Casting** — `due_date` cast to Carbon instance for date formatting
- **Two layouts** — `layouts.app` (authenticated, with sidebar) and `layouts.guest` (public, with animated background)

---

## Database Schema

### `users`
| Column | Type | Notes |
|---|---|---|
| id | BIGINT (PK) | Auto increment |
| name | VARCHAR(255) | Required |
| email | VARCHAR(255) | Unique |
| password | VARCHAR(255) | Bcrypt hashed |
| profile_photo | VARCHAR(255) | Nullable |
| remember_token | VARCHAR(100) | Nullable |
| created_at / updated_at | TIMESTAMP | Auto managed |

### `tasks`
| Column | Type | Notes |
|---|---|---|
| id | BIGINT (PK) | Auto increment |
| user_id | BIGINT (FK) | References `users.id`, cascade delete |
| title | VARCHAR(255) | Required |
| description | TEXT | Nullable |
| status | ENUM | `pending` \| `completed`, default `pending` |
| due_date | DATE | Nullable |
| created_at / updated_at | TIMESTAMP | Auto managed |

---

## Setup Instructions

**1. Clone the repository**
```bash
git clone https://github.com/LepLep7/taskflow.git
cd taskflow
```

**2. Install dependencies**
```bash
composer install
npm install
```

**3. Configure environment**
```bash
cp .env.example .env
php artisan key:generate
```
Update `.env` with your database credentials:
```env
DB_DATABASE=taskflow_db
DB_USERNAME=root
DB_PASSWORD=
```

**4. Run migrations**
```bash
php artisan migrate
```

**5. Create storage symlink**
```bash
php artisan storage:link
```

**6. Build frontend assets**
```bash
npm run build
```

**7. Serve the application**
```bash
php artisan serve
```
Visit `http://127.0.0.1:8000` or your configured Laragon domain (`http://taskflow.test`).

---

## Project Structure
app/
├── Http/
│ ├── Controllers/
│ │ ├── Auth/ # Breeze auth controllers
│ │ ├── DashboardController.php
│ │ └── TaskController.php
│ └── Requests/
│ ├── StoreTaskRequest.php
│ └── UpdateTaskRequest.php
├── Models/
│ ├── User.php
│ └── Task.php
resources/
└── views/
├── layouts/
│ ├── app.blade.php # Authenticated layout (sidebar)
│ ├── guest.blade.php # Guest layout (animated bg)
│ └── navigation.blade.php
├── auth/ # Login, register, password pages
├── tasks/ # Index, show, create, edit
├── profile/ # Profile edit page
└── dashboard.blade.php
public/
└── css/
└── taskflow.css # Custom styles

---

## Author

**Muhammad Alif Hykal**
GitHub: [@LepLep7](https://github.com/LepLep7)