# Blog API Package

Blog API package for Lumen micro service framework with JWT

### Service Provider
Add Service Provider on your `bootstrap/app.php` file:
```
$app->register(Ridwanpandi\Blog\Providers\BlogServiceProvider::class);
```
### Migrations
You'll need to run the provided migrations against your database. Publish the migration files using the `vendor:publish` Artisan command and run `migrate`:

```
php artisan vendor:publish
php artisan migrate
```
