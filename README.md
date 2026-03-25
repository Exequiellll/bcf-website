# BCF Church Fellowship

A full-stack church management website with a public-facing site and a feature-rich admin panel.

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![SQLite](https://img.shields.io/badge/SQLite-003B57?style=for-the-badge&logo=sqlite&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white)
![Alpine.js](https://img.shields.io/badge/Alpine.js-3-8BC0D0?style=for-the-badge&logo=alpinedotjs&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-5-646CFF?style=for-the-badge&logo=vite&logoColor=white)

---

## Screenshots

| Public Site | Admin Panel |
|---|---|
| ![Homepage](screenshots/homepage.png) | ![Dashboard](screenshots/dashboard.png) |
| ![Announcements](screenshots/announcements.png) | ![Admin Announcements](screenshots/admin-announcements.png) |
| ![Events](screenshots/events.png) | ![Admin Events](screenshots/admin-events.png) |
| ![Live Stream](screenshots/livestream.png) | ![Admin Inbox](screenshots/admin-inbox.png) |
| ![Church Team](screenshots/church-team.png) | ![Admin Team Management](screenshots/admin-team.png) |

---

## About

BCF Church Fellowship is a church website built to serve a real congregation. It gives church administrators full control over their online presence — from publishing announcements and managing events to embedding live stream services and receiving community sign-ups — all through a clean, intuitive admin dashboard.

The public site provides visitors with everything they need: service schedules, upcoming events, staff directory, live stream access, donation information, and a way to join the community.

**Built for:** Churches and religious organizations that need a self-hosted, easy-to-manage website without relying on third-party website builders.

**Problem it solves:** Eliminates the need for manual website updates by providing a CMS-style admin panel where non-technical church staff can manage all content independently.

---

## Tech Stack

| Layer | Technology |
|---|---|
| **Backend** | Laravel 12, PHP 8.2+ |
| **Database** | SQLite (swappable to MySQL/PostgreSQL) |
| **Frontend** | Blade Templates, Tailwind CSS 3, Bootstrap 5, Alpine.js 3 |
| **Build Tool** | Vite 5 |
| **Icons** | Font Awesome 6 |
| **Animations** | AOS (Animate on Scroll) |
| **Queue** | Database-driven job queue |
| **Authentication** | Laravel UI with custom admin middleware |

---

## Key Features

### Public Site
- **Homepage** with dynamic slideshow carousel, latest announcements, and upcoming events
- **Announcements** — paginated listing with individual detail pages
- **Events** — separated into upcoming and past events with full details
- **Service Schedules** — weekly service times organized by day
- **Church Team Directory** — staff profiles organized by role (Pastors, Leaders, Singers, Band Members)
- **Live Stream** — embedded Facebook/YouTube/Vimeo player with live status indicator
- **Community Sign-Up** — contact form with duplicate detection and rate limiting
- **Donate Page** — GCash and bank transfer details with QR code support
- **SEO Optimized** — meta descriptions, Open Graph tags, canonical URLs, JSON-LD structured data, XML sitemap

### Admin Panel
- **Dashboard** — overview cards with announcement, event, schedule, and page counts
- **Announcements CRUD** — create, edit, publish/unpublish, delete
- **Events CRUD** — manage event details, dates, locations, and publishing status
- **Schedules CRUD** — configure service days, times, and locations
- **Church People CRUD** — manage staff profiles with photo uploads, bios, and role assignments
- **Live Stream Controls** — update embed codes, toggle live status, edit stream details
- **Slideshow Management** — manage homepage carousel images and captions
- **Community Inbox** — view, read, and manage sign-up submissions with IP tracking
- **Responsive Admin Nav** — mobile-friendly hamburger menu with unread inbox badge

### Security
- Security headers middleware (X-Content-Type-Options, X-Frame-Options, HSTS, Referrer-Policy)
- XSS prevention with iframe domain whitelisting for embeds
- Mass assignment protection on sensitive fields
- Rate limiting on login (5/min) and community sign-up (10/min)
- Admin-only access enforcement with session invalidation for non-admin users
- CSRF protection on all forms
- Registration disabled by default

---

## How to Run Locally

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js 18+ and npm

### Setup

```bash
# Clone the repository
git clone https://github.com/your-username/church-site.git
cd church-site

# Install PHP dependencies
composer install

# Copy environment file and generate app key
cp .env.example .env
php artisan key:generate

# Run database migrations
php artisan migrate

# Install frontend dependencies and build assets
npm install
npm run build
```

### Create an Admin User

```bash
php artisan tinker
```

```php
use App\Models\User;
use Illuminate\Support\Facades\Hash;

User::create([
    'name' => 'Admin',
    'email' => 'admin@example.com',
    'password' => Hash::make('your-password'),
    'is_admin' => true,
]);
```

### Start the Development Server

```bash
# Run everything concurrently (server, queue worker, Vite)
composer dev
```

Or run individually:

```bash
php artisan serve        # Laravel server on port 8000
npm run dev              # Vite dev server with HMR
php artisan queue:listen # Process queued jobs (email notifications)
```

### Access the Site

| URL | Description |
|---|---|
| `http://localhost:8000` | Public website |
| `http://localhost:8000/admin/login` | Admin login |

---

## Project Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Admin/          # Admin panel controllers
│   │   ├── Auth/           # Authentication controllers
│   │   └── ...             # Public controllers
│   └── Middleware/
│       ├── Admin.php       # Admin access middleware
│       └── SecurityHeaders.php
├── Models/                 # Eloquent models
└── Notifications/          # Email notifications

resources/views/
├── admin/                  # Admin panel views
├── announcements/          # Public announcement pages
├── events/                 # Public event pages
├── church-people/          # Staff directory views
├── schedules/              # Schedule views
├── layouts/                # Base layouts
└── ...                     # Other public pages

database/migrations/        # Schema definitions
routes/web.php              # All route definitions
```
