# electro-shop — E-Commerce Platform

A full-featured e-commerce web app for electronics and appliances, built with PHP, MySQL, HTML5, CSS3, and vanilla JavaScript. Supports product browsing, categories, search, cart, wishlist, checkout, and user accounts.

See [PROJECT_PROPOSAL.md](PROJECT_PROPOSAL.md) for the full project overview, objectives, and architecture.

## Tech Stack

- **Backend:** PHP 8.1+, PDO
- **Database:** MySQL / MariaDB
- **Frontend:** HTML5, CSS3, JavaScript
- **Server Environment:** XAMPP / MAMP (or any Apache + MySQL + PHP stack)

## Getting Started

### Prerequisites

- XAMPP, MAMP, or another local PHP + MySQL environment
- PHP 8.1+

### Setup

1. Clone this repo into your server's web root (e.g. `htdocs` for XAMPP):
   ```bash
   git clone https://github.com/<your-username>/kinbech-shop.git
   ```
2. Start Apache and MySQL from your XAMPP/MAMP control panel.
3. Import the database:
   - Create a database (or let the app auto-create it — see `components/connect.php`)
   - Import `shop_db.sql` via phpMyAdmin or the command line:
     ```bash
     mysql -u root -p shop_db < shop_db.sql
     ```
4. If your database needs the extra `category` column, also run `add_category_column.sql` (see [README_CATEGORY_UPDATE.md](README_CATEGORY_UPDATE.md) for details).
5. (Optional) Set environment variables if your DB credentials differ from local defaults:
   - `SHOP_DB_HOST`, `SHOP_DB_PORT`, `SHOP_DB_USER`, `SHOP_DB_PASSWORD`, `SHOP_DB_NAME`
6. Visit `http://localhost/<project-folder>/home.php` in your browser.

Having trouble getting the UI or scripts to load? See [TROUBLESHOOTING.md](TROUBLESHOOTING.md).

## Features

- Product browsing by category with search
- Cart and wishlist
- User registration, login, and account management
- Checkout and order tracking
- Contact and about pages

## Project Structure

```
.
├── components/          # Shared PHP components (header, footer, DB connection, auth)
├── css/                 # Stylesheets
├── js/                  # Client-side scripts
├── images/               # Site assets (icons, banners)
├── uploaded_img/         # Product images
├── project images/        # Additional product images
├── shop_db.sql            # Database schema + seed data
├── add_category_column.sql # Migration for category column
└── *.php                  # Application pages (home, shop, cart, checkout, etc.)
```

## License

This project is open source and available under the [MIT License](LICENSE).
