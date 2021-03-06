# Laravel Spatie Packages Project

## References

<ul>
<li><a href="https://github.com/spatie/laravel-permission">Laravel Permission</a></li>
<li><a href="https://github.com/spatie/image-optimizer">Laravel Image Optimizer</a></li>
<li><a href="https://github.com/spatie/laravel-activitylog">Laravel ActivityLog</a></li>
<li><a href="https://github.com/spatie/laravel-medialibrary">Laravel MediaLibrary</a></li>
<li><a href="https://github.com/spatie/laravel-tags">Laravel Tags</a></li>
<li><a href="https://github.com/spatie/period">Laravel Period</a></li>
<li><a href="https://github.com/spatie/laravel-searchable">Laravel Searchale</a></li>
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

then copy my code in the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/tree/master/resources/views/permissions">permissions views</a> and the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/tree/master/resources/views/roles">roles views</a>

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

also copy the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/blob/master/routes/web.php#L17">roles routes</a> and the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/blob/master/routes/web.php#L18">permissions routes</a>

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

## Laravel ActivityLog Installation

to install `spatie/laravel-activitylog` package, run the NEXT command

```
composer require spatie/laravel-activitylog
```

### ActivityLog Views

then copy my code in the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/tree/master/resources/views/logs_activity">logs_activity views</a>

### ActivityLog Models

update the `User` model, to log the user activity

so copy my code in the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/blob/master/app/Models/User.php">User.php</a>

### ActivityLog Controllers

to create `UserLogsActivityController` resource, run the NEXT command

```
php artisan make:controller UserLogsActivityController -r
```

then copy my code in the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/blob/master/app/Http/Controllers/UserLogsActivityController.php">UserLogsActivityController.php</a>

### ActivityLog Routes

also copy the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/blob/master/routes/web.php#L25">logs_activity routes</a>

## Laravel MediaLibrary Installation

to install `spatie/laravel-medialibrary` package, run the NEXT command

```
composer require spatie/laravel-medialibrary
```

### MediaLibrary Views

then copy my code in the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/tree/master/resources/views/media_library">media_library views</a>

### MediaLibrary Models

update the `User` model, to interact WITH media

so copy my code in the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/blob/master/app/Models/User.php">User.php</a>

### MediaLibrary Controllers

to create `UserMediaLibraryController` resource, run the NEXT command

```
php artisan make:controller UserMediaLibraryController -r
```

then copy my code in the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/blob/master/app/Http/Controllers/UserMediaLibraryController.php">UserMediaLibraryController.php</a>

### MediaLibrary Routes

also copy the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/blob/master/routes/web.php#L28">media_library routes</a>

## Laravel Tags Installation

to install `spatie/laravel-tags` package, run the NEXT command

```
composer require spatie/laravel-tags
```

### Tags Views

at the first, we'll use <a href="https://github.com/bootstrap-tagsinput/bootstrap-tagsinput">tagsinput</a>, so I updated the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/tree/master/resources/views/layouts/app.blade.php">app.blade.php</a>, so you must copy the updates

then copy the updates in the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/tree/master/resources/views/posts/create.blade.php">posts/create.blade.php</a>

### Tags Models

So, at the first copy the updates in the `Post` model, to interact WITH tags

so copy my code in the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/blob/master/app/Models/Post.php">Post.php</a>

### Tags Controllers

also we'll use the `UserPostsController` resource, so copy the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/blob/master/app/Http/Controllers/UserPostsController.php">UserPostsController.php</a> 

### Tags Routes

finally, we'll use the `posts` routes, so we'll do NO updates in the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/blob/master/routes/web.php">web.php</a>

## Laravel Period Installation

to install `spatie/period` package, run the NEXT command

```
composer require spatie/period
```

### Period Views

then copy my code in the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/tree/master/resources/views/feeds">feeds views</a>

### Period Models

update the `Feed` model, to interact WITH period

so copy my code in the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/blob/master/app/Models/Feed.php">Feed.php</a>

### Period Controllers

to create `FeedController` resource, run the NEXT command

```
php artisan make:controller FeedController -r
```

then copy my code in the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/blob/master/app/Http/Controllers/FeedController.php">FeedController.php</a>

### Period Routes

also copy the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/blob/master/routes/web.php#L30">feeds routes</a>

## Laravel Searchable Installation

to install `spatie/laravel-searchable` package, run the NEXT command

```
composer require spatie/laravel-searchable
```

### Searchable Views

at the first, we'll prepare our view for searching, so we'll update the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/tree/master/resources/views/posts/index.blade.php">index.blade.php</a>

then copy my code in the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/tree/master/resources/views/posts/search.blade.php">search.blade.php</a>

### Searchable Models

update the `Post` model, so copy my code in the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/blob/master/app/Models/Post.php">Post.php</a>

### Searchable Controllers

we'll update the `UserPostsController` resource, so copy my code in the <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/blob/master/app/Http/Controllers/UserPostsController.php">UserPostsController.php</a>

### Searchable Routes

also we'll update the `posts` routes, so copy my code in <a href="https://github.com/mahmoudmohamedramadan/Laravel-Spatie-Packages/blob/master/routes/web.php#L26">posts routes</a>

**congratulations we've finished this tutorial ????????, and if you want to discover more visit <a href="https://spatie.be/open-source?search=&sort=-downloads">Spatie Packages</a> ????**
