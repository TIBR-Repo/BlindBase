# BlindPoint Supply - E-commerce Platform

BlindPoint Supply is a complete e-commerce platform for selling compliant blinds to schools, care homes, and commercial spaces. Built with Laravel 11 and Tailwind CSS.

## Features

- **Product Catalog**: Full product management with categories, variants (sizes/colours), and compliance badges
- **Shopping Cart**: Session-based cart with quantity management
- **Checkout**: Secure checkout with Stripe integration
- **Trade Accounts**: Separate authentication for trade customers with discount pricing
- **Admin Panel**: Complete back-office for managing products, orders, and trade accounts
- **Compliance**: Fire-rated, antimicrobial, child-safe product certifications
- **Responsive Design**: Mobile-first design with Tailwind CSS

## Tech Stack

- **Backend**: Laravel 11
- **Frontend**: Blade templates, Tailwind CSS, Alpine.js
- **Database**: SQLite (development) / MySQL/PostgreSQL (production)
- **Payments**: Stripe
- **Email**: Laravel Mail

## Quick Start

```bash
# Clone the repository
git clone https://github.com/your-org/blindpoint.git
cd blindpoint

# Install dependencies
composer install
npm install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Run migrations and seeders
php artisan migrate --seed

# Create storage link
php artisan storage:link

# Build assets
npm run build

# Start development server
php artisan serve
```

## Default Credentials

### Admin Panel
- URL: `/admin`
- Email: `admin@blindpoint.co.uk`
- Password: `BlindPoint2024!`

## Environment Variables

Key environment variables to configure:

```env
APP_NAME=BlindPoint
APP_URL=https://blindpoint.co.uk

# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=blindpoint
DB_USERNAME=root
DB_PASSWORD=

# Mail
MAIL_MAILER=smtp
MAIL_HOST=smtp.example.com
MAIL_PORT=587
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_FROM_ADDRESS=sales@blindpoint.co.uk
MAIL_FROM_NAME="BlindPoint Supply"

# Stripe
STRIPE_KEY=pk_live_...
STRIPE_SECRET=sk_live_...
STRIPE_WEBHOOK_SECRET=whsec_...
```

---

## Production Deployment Checklist

### Pre-Deployment

- [ ] **Environment Configuration**
  - [ ] Set `APP_ENV=production`
  - [ ] Set `APP_DEBUG=false`
  - [ ] Set `APP_URL` to your production domain
  - [ ] Configure production database credentials
  - [ ] Set up production mail server (SMTP/SES/Mailgun)
  - [ ] Configure Stripe live keys (not test keys!)

- [ ] **Security**
  - [ ] Generate a new `APP_KEY` for production
  - [ ] Ensure `.env` file is not in version control
  - [ ] Set strong admin password (change default!)
  - [ ] Enable HTTPS and set `SESSION_SECURE_COOKIE=true`
  - [ ] Set `SANCTUM_STATEFUL_DOMAINS` if using API
  - [ ] Review CORS settings in `config/cors.php`

- [ ] **Database**
  - [ ] Run migrations: `php artisan migrate --force`
  - [ ] Seed initial data: `php artisan db:seed --class=AdminSeeder`
  - [ ] Seed categories: `php artisan db:seed --class=CategorySeeder`
  - [ ] Set up database backups (daily recommended)

### Optimization

- [ ] **Cache Configuration**
  - [ ] `php artisan config:cache`
  - [ ] `php artisan route:cache`
  - [ ] `php artisan view:cache`
  - [ ] `php artisan event:cache`

- [ ] **Assets**
  - [ ] Run `npm run build` for production assets
  - [ ] Configure CDN if using one

- [ ] **Storage**
  - [ ] Run `php artisan storage:link`
  - [ ] Set up proper file permissions (755 for directories, 644 for files)
  - [ ] Configure S3/cloud storage for production (optional)

### SEO & Marketing

- [ ] **SEO**
  - [ ] Generate sitemap: `php artisan sitemap:generate`
  - [ ] Add sitemap to Google Search Console
  - [ ] Verify robots.txt is correct
  - [ ] Add Google Analytics/Tag Manager

- [ ] **Social**
  - [ ] Add Open Graph image (`public/images/og-image.jpg`)
  - [ ] Configure social media links in footer
  - [ ] Set up Facebook Pixel if using

### Payments

- [ ] **Stripe Configuration**
  - [ ] Switch from test to live API keys
  - [ ] Set up Stripe webhook endpoint: `POST /stripe/webhook`
  - [ ] Configure webhook to receive `checkout.session.completed` events
  - [ ] Test a real transaction with a small amount

### Monitoring

- [ ] **Logging & Errors**
  - [ ] Configure logging to files or service (Papertrail, Loggly)
  - [ ] Set up error tracking (Sentry, Bugsnag, etc.)
  - [ ] Configure `LOG_LEVEL=error` for production

- [ ] **Uptime Monitoring**
  - [ ] Set up uptime monitoring (UptimeRobot, Pingdom)
  - [ ] Configure health check endpoint
  - [ ] Set up SSL certificate monitoring

### Server Configuration

- [ ] **Web Server**
  - [ ] Configure Nginx/Apache for Laravel
  - [ ] Set `public/` as document root
  - [ ] Enable gzip compression
  - [ ] Configure proper caching headers

- [ ] **PHP**
  - [ ] PHP 8.2+ installed
  - [ ] Required extensions: BCMath, Ctype, JSON, Mbstring, OpenSSL, PDO, Tokenizer, XML
  - [ ] Configure OPcache for production
  - [ ] Set `memory_limit` appropriately (256M minimum)

- [ ] **Queue Worker** (if using queues)
  - [ ] Set up Supervisor for queue workers
  - [ ] Configure queue driver (Redis recommended)
  - [ ] `php artisan queue:work --queue=default,emails`

- [ ] **Scheduler**
  - [ ] Add cron job: `* * * * * cd /path-to-project && php artisan schedule:run >> /dev/null 2>&1`

### Post-Deployment

- [ ] **Testing**
  - [ ] Test all user flows (browse, cart, checkout)
  - [ ] Test trade account registration/login
  - [ ] Test admin panel access and functions
  - [ ] Test contact form submission
  - [ ] Test email delivery

- [ ] **Documentation**
  - [ ] Document admin procedures
  - [ ] Create backup/restore procedures
  - [ ] Document deployment process

---

## Artisan Commands

```bash
# Generate sitemap
php artisan sitemap:generate

# Clear all caches
php artisan optimize:clear

# Cache for production
php artisan optimize
```

## Support

For support, email support@blindpoint.co.uk.

## License

Proprietary - All rights reserved.
