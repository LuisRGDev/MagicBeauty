# Magic Beauty - Laravel Migration

This project has been migrated to a Laravel-like structure.

## Structure

-   **app/**: Core logic (Router).
-   **public/**: Publicly accessible files (index.php, css, js, img).
-   **resources/views/**: HTML templates (Blade-style).
-   **routes/**: Route definitions.
-   **legacy_src/**: Backup of the original static site and previous build files.

## How to Run

1.  **XAMPP**:
    -   Place this project in `htdocs`.
    -   Visit: `http://localhost/Paginas_web/MagicBeauty/public/`

2.  **PHP Server**:
    -   Run: `php -S localhost:8000 -t public`
    -   Visit: `http://localhost:8000`

## Editing

-   To change **HTML/Content**, edit files in `resources/views/`.
-   To change **Styles**, edit `public/css/styles.css`.
-   To add **Pages**, add a route in `routes/web.php` and a view in `resources/views/`.
