# Vectarlabs — Company Website + Admin CMS

A complete dynamic website for **Vectarlabs**, built with **Laravel 11 + Bootstrap 5 + MySQL**.

## Features

**Public website (all content served from MySQL):**
- Home — hero, services grid, sectors, testimonial, stats, approach, insights, CTA
- About Us — mission, stats, values, insights
- Services — catalog page + one dynamic detail page per service (`/services/{slug}`)
- Team — team member grid
- Contact — info + working contact form (saved to the database)

**Admin panel (`/admin`):**
- Dashboard with counts and latest inquiries
- Services manager — full CRUD incl. feature cards per service
- Team manager — full CRUD
- Insights (articles) manager — full CRUD
- Messages inbox — read / mark-read / delete contact form submissions
- Site Content editor — edit all Home/About/Contact copy (hero text, stats, CTAs, contact info)

## Requirements

- PHP 8.2+ with Composer
- MySQL 8+

## Setup

```bash
# 1. Install dependencies
composer install

# 2. Configure environment
cp .env.example .env
# edit .env and set DB_DATABASE / DB_USERNAME / DB_PASSWORD

# 3. Create the database
mysql -u root -p -e "CREATE DATABASE vectarlabs CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# 4. Generate key, run migrations, seed content
php artisan key:generate
php artisan migrate --seed

# 5. Serve
php artisan serve
```

Visit `http://localhost:8000`.

## Admin access

- URL: `http://localhost:8000/admin`
- Default credentials (created by the seeder): **admin@vectarlabs.com / admin123**
- Change the password immediately in production.

## Project structure

```
app/Http/Controllers/          Public pages + contact form
app/Http/Controllers/Admin/    Admin auth, dashboard, CRUD controllers
app/Http/Middleware/           AdminMiddleware (is_admin guard)
app/Models/                    Service, ServiceCard, TeamMember, Post, ContactMessage, Setting, User
database/migrations/           users + CMS tables
database/seeders/              Admin user + full launch content
resources/views/               Blade views (Bootstrap 5), layouts & partials
public/css/app.css             Brand theme (navy / orange / cream)
routes/web.php                 Public + admin routes
```

## Notes

- Bootstrap 5, Bootstrap Icons, and Google Fonts load via CDN — no npm build step required.
- Sessions, cache, and queue use the database driver (created by the default migrations).
- To add an admin user manually: `php artisan tinker` then
  `App\Models\User::create(['name'=>'…','email'=>'…','password'=>bcrypt('…'),'is_admin'=>true]);`
