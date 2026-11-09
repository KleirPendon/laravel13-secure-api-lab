# Laravel RBAC API Lab

##  API Routes
- **POST** `/api/register` - Register a new user
- **POST** `/api/login` - Authenticate & get token
- **GET** `/api/profile` - Get user profile (Auth required)
- **POST** `/api/logout` - Revoke token (Auth required)
- **GET** `/api/admin/dashboard` - Admin only (`admin` middleware)
- **GET** `/api/student/dashboard` - Student only (`role:student`)
- **GET** `/api/students` - Shared (`role:admin,student`)

## Local Setup
1. Clone repository & `cd` into folder
2. Run `composer install`
3. Copy `.env.example` to `.env` and set up database
4. Run `php artisan key:generate`
5. Run `php artisan migrate`
6. Run `php artisan serve`

## Reflection Questions
**1. What is the difference between authentication and authorization?**
- **Authentication** verifies *who you are* (logging in).
- **Authorization** verifies *what you are allowed to do* (checking your role permissions).

**2. Why does a student get `403` on the admin dashboard, but a request with no token gets `401`?**
- **401 Unauthorized:** No token/credentials were provided, so the system doesn't know who you are.
- **403 Forbidden:** You are logged in, but your role lacks permission to access that specific route.

## Postman Screenshots
Saved in the `SCREENSHOTS/` folder (`01-admin-login.png` through `08-no-token.png`).