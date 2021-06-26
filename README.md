# Laravel Spatie Packages Project

## References

<ul>
<li><a href="https://github.com/spatie/laravel-permission">Laravel Permission</a></li>
<li><a href="https://github.com/spatie/image-optimizer">Laravel Image Optimizer</a></li>
</ul>

## Getting Started

### Laravel Installation

if you are NOT install Laravel Installer as a global Composer dependency, run the NEXT command

```
composer create-project laravel/laravel Laravel_Spatie_Packages
```

and if you want to install Laravel Installer as a global Composer dependency, run the NEXT command

```
composer global require laravel/installer
```

then run the NEXT command

```
laravel new Laravel_Spatie_Packages
```

## Laravel Permission Installation

to install `spatie/laravel-permission` package, run the NEXT command

```
composer require spatie/laravel-permission
```

### Permission Views

then copy my code in the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/tree/master/resources/views/permissions">permissions views</a> and <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/tree/master/resources/views/roles">roles views</a>

### Permission Controllers

to create `UserRolesController` resource, run the NEXT command

```
php artisan make:controller UserRolesController -r
```

then copy my code in the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/blob/master/app/Http/Controllers/UserRolesController.php">UserRolesController.php</a>

also to create `UserPermissionsController` resource, run the NEXT command

```
php artisan make:controller UserPermissionsController -r
```

then copy my code in the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/blob/master/app/Http/Controllers/UserPermissionsController.php">UserPermissionsController.php</a>

### Permission Routes

also copy my code in the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/blob/master/routes/web.php#L17">roles routes</a> and the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/blob/master/routes/web.php#L18">permissions routes</a>

## Laravel Image Optimizer Installation

to install `spatie/image-optimizer` package, run the NEXT command

```
composer require spatie/image-optimizer
```

### Image Optimizer Views

we will use the `register.blade.php` view, to let the user upload his avatar, so copy my code in the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/blob/master/resources/views/auth/register.blade.php">register.blade.php</a>

also copy my code in the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/blob/master/resources/views/layouts/app.blade.php">app.blade.php</a>, to view the avatar

### Image Optimizer Models

at the first, add the `avatar` column into the `users` table, so copy my code in the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/blob/master/database/migrations/2014_10_12_000000_create_users_table.php">2014_10_12_000000_create_users_table.php</a>

to save the data of the user successfully, do NOT forget to put the `avatar` key in the `fillable` attribute, so copy my code in the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/blob/master/app/Models/User.php">User.php</a>

### Image Optimizer Controllers

also use `RegisterController` which come WITH Laravel, we'll let the user upload his avatar in registeration then optimize it, so copy my code in the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/blob/master/app/Http/Controllers/Auth/RegisterController.php">RegisterController.php</a>

> NOTE that you may face an issue that says `Class "Spatie\ImageOptimizer\OptimizerChain" not found`, and to solve it, run the NEXT command

```
composer dump-autoload
```
