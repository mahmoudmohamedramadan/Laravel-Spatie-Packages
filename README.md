# Laravel Spatie Packages Project

## References

<ul>
<li><a href="https://github.com/spatie/laravel-permission">Laravel Permission</a></li>
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

### Laravel Permission Installation

to install `spatie/laravel-permission` package, run the NEXT command

```
composer require spatie/laravel-permission
```

### Package Views

then copy my code in <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/tree/master/resources/views/permissions">permissions views</a> and <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/tree/master/resources/views/roles">roles views</a>

### Package Controllers

to create `UserRolesController` resource, run the NEXT command

```
php artisan make:controller UserRolesController -r
```

then copy my code in <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/blob/master/app/Http/Controllers/UserRolesController.php">UserRolesController.php</a>

also to create `UserPermissionsController` resource, run the NEXT command

```
php artisan make:controller UserPermissionsController -r
```

then copy my code in <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/blob/master/app/Http/Controllers/UserPermissionsController.php">UserPermissionsController.php</a>

### Package Routes

also copy my code in <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/blob/master/routes/web.php#L17">roles routes</a> and <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/blob/master/routes/web.php#L18">permissions routes</a>
