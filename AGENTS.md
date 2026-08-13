# TokoMarketplace — Agent Instructions

## Stack
- Laravel 13, PHP ^8.3, SQLite, Vite + Tailwind CSS v4
- Queue & cache use `database` driver (jobs + cache tables via migrations)

## Commands
| Action | Command |
|--------|---------|
| Full setup | `composer run setup` |
| Dev servers (concurrent) | `composer run dev` — starts Artisan serve, queue:listen, Pail logs, Vite |
| Tests | `composer run test` (runs `config:clear` then `php artisan test`) |
| Single test | `php artisan test --filter=TestName` |
| Lint | `./vendor/bin/pint` |
| Tinker | `php artisan tinker` |
| Build assets | `npm run build` |

## Testing
- SQLite `:memory:` in phpunit.xml — no external DB needed
- Test suites: `tests/Unit`, `tests/Feature`
- Use `RefreshDatabase` trait for feature tests touching the DB

## Structure
- `routes/web.php` — web routes; `routes/console.php` — Artisan commands
- `app/Models/` — Eloquent models
- `app/Http/Controllers/` — controllers
- `resources/views/` — Blade templates (Vite entry: `resources/js/app.js`, `resources/css/app.css`)
- `database/migrations/` — default: users, cache, jobs tables

## Notes
- `.env` defaults to SQLite; `DB_CONNECTION=sqlite` with `database/database.sqlite`
- Session driver is `file` in local, testing uses `array`
- No custom code exists yet — this is a fresh skeleton
- EditorConfig: 4-space indentation, LF line endings
