# STARKICES Portfolio

> Personal developer portfolio of **Wisdom Ogheneobrozie** — PHP / Laravel Developer and builder of STARKICES.

[![Laravel](https://img.shields.io/badge/Laravel-13.x-FF2D20?logo=laravel&logoColor=white)](https://laravel.com/)
[![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?logo=mysql&logoColor=white)](https://www.mysql.com/)
[![Git](https://img.shields.io/badge/Git-Version_Control-F05032?logo=git&logoColor=white)](https://git-scm.com/)
[![GitHub](https://img.shields.io/badge/GitHub-Starkices-181717?logo=github&logoColor=white)](https://github.com/Starkices)

**Live:** [.....](#) &nbsp;·&nbsp; **Repo:** [github.com/Starkices/portfolio](https://github.com/Starkices/portfolio)

<!-- Add a real screenshot before publishing — docs/screenshot.png, ~1280px wide, homepage above the fold -->
![Portfolio screenshot](/screenshot.png)

### Contents

[About](#about-the-portfolio) · [What It Showcases](#what-the-portfolio-showcases) · [Featured Projects](#featured-projects) · [Structure](#application-structure) · [Contact System](#contact-system) · [Local Development](#local-development) · [Roadmap](#roadmap) · [Vision](#vision) · [Author](#author)

---

## About the Portfolio

This repository contains my personal developer portfolio, built with Laravel and designed to showcase my software development work, technical interests, projects, and ongoing growth as a software engineer.

The portfolio is more than an online résumé. It's a working Laravel application that demonstrates how I approach application structure, database-driven content, user interaction, validation, email communication, responsive interfaces, and deployment-oriented development.

It also documents the journey toward my long-term goal of building **STARKICES** as a software development company.

---

## What the Portfolio Showcases

- Database-driven project management — Eloquent models, migrations, seeders, not static HTML
- Responsive, component-based UI with Blade and Tailwind
- Server-side validation with inline error feedback
- A rate-limited, spam-protected contact form with Gmail SMTP delivery
- SEO foundations — sitemap, robots.txt, meta tags
- Git/GitHub-based version control and deployment workflow

---

## Featured Projects

### Students Discussion Forum

A database-driven discussion platform built with raw PHP and MySQL.

**Highlights**
- User and discussion functionality
- Authentication and sessions
- CRUD operations
- Production database configuration and live deployment

**Live Demo:** [starkices-dforum.freedev.app](https://starkices-dforum.freedev.app)
**Source Code:** [github.com/Starkices/Discussion-forum](https://github.com/Starkices/Discussion-forum)

### Dynamic Email & PDF Template System

A reusable Laravel-based system for managing dynamic email and PDF content through database-driven templates and configurable placeholders. Separates reusable communication and document templates from application logic, so content and document layouts can be generated dynamically from application data.

**Stack:** Laravel · PHP · MySQL · Blade · Livewire · DomPDF

---

## Application Structure

```text
app/
├── Http/
│   ├── Controllers/
│   └── Requests/
│
├── Mail/
│
└── Models/

database/
├── migrations/
└── seeders/

resources/
├── css/
├── js/
└── views/
    ├── layouts/
    ├── partials/
    └── projects/

routes/
└── web.php
```

The application separates routing, controllers, validation, Eloquent models, database persistence, Blade presentation, reusable layouts and partials, and mail delivery.

---

## Contact System

Rather than a static `mailto:` link, the portfolio has a working contact form: validated server-side, protected against spam with rate limiting and a honeypot field, persisted to MySQL, and delivered to my inbox via Gmail SMTP with the visitor's address set as `Reply-To`. Failed sends are logged rather than shown to the visitor as a broken form.

An admin panel for managing stored messages is planned — see [Roadmap](#roadmap).

---

## Configuration

Site-wide portfolio information is centralized in `config/portfolio.php` — developer name, professional title, company/brand, contact addresses, GitHub, LinkedIn, site description — a single source of truth instead of scattered hardcoded strings across views. Environment-specific credentials (database, mail) stay in `.env`.

---

## Local Development

**Requirements:** PHP 8.x · Composer · Node.js and npm · MySQL · Laravel Herd or another Laravel-compatible local environment

```bash
git clone https://github.com/Starkices/portfolio.git
cd portfolio
composer install
npm install
cp .env.example .env
php artisan key:generate
```

Configure the database in `.env`, then:

```bash
php artisan migrate
php artisan db:seed
npm run dev
```

Serve through Laravel Herd or your preferred Laravel environment.

### Environment Variables

Did not commit `.env`. Important configuration includes:

```env
APP_URL=

DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

MAIL_MAILER=
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME=
```

For Gmail SMTP, use a Google App Password rather than your normal account password.

---

## Roadmap

### Completed
- [x] Laravel portfolio foundation and dynamic configuration
- [x] Database-driven projects, featured projects, and detail pages
- [x] Responsive navigation
- [x] Functional contact form with MySQL storage and Gmail SMTP notifications
- [x] Rate limiting, validation, and graceful error handling
- [x] SEO essentials — robots.txt, sitemap.xml, meta tags

### Planned
- [ ] Contact-message admin panel
- [ ] Project screenshots and richer case studies
- [ ] Production deployment on a custom domain
- [ ] Google Search Console
- [ ] More substantial production Laravel projects
- [ ] Open-source contributions

---

## Vision

**STARKICES** is the long-term vision behind this work — growing from individual software projects into a software development company focused on building useful technology and solving real-world problems through software. This portfolio is part of that journey.

> Learn. Build. Ship. Improve. Repeat.

---

## Author

**Wisdom Ogheneobrozie**
PHP / Laravel Developer · Delta State, Nigeria

- GitHub: [github.com/Starkices](https://github.com/Starkices)
- LinkedIn: [linkedin.com/in/wisdom-ogheneobrozie](https://www.linkedin.com/in/wisdom-ogheneobrozie)
- Email: [wisdomoghe@gmail.com](mailto:wisdomoghe@gmail.com)

---

## License

All rights reserved. This is personal portfolio software — please don't copy, redistribute, or reuse the source or original design without permission.