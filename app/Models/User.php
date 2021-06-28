<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /* By default the package will log the created, updated, deleted events. You can modify this behaviour by setting the $recordEvents property on a model */

    /* only the `updated` and `deleted` event will get logged automatically */
    protected static $recordEvents = [
        'updated',
        'deleted',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            /* if you want to make the model use another name than the `default` */
            ->useLogName('system')
            /* use the `logFillabel()` to store the all fillable attributes on the model */
            // ->logFillable()
            /* may be you've used the `guarded` property instead of the `fillable` property, and want to log the attributes that NOT in `guarded` (fillable) property, So you can use the `logUnguarded()` method */
            // ->logUnguarded()
            /* here I want to log the `name` and the `email` if any one of them has changed */
            ->logOnly(['name', 'email'])
            /* here the updated properties only will be saved */
            ->logOnlyDirty()
            /* sometimes you do NOT need to log a user if a specific column has changed */
            ->dontLogIfAttributesChangedOnly(['name'])
            /* By default the package will log created, updated, deleted in the description of the activity. You can modify this text by providing callback to the ->setDescriptionForEvent() method on LogOptions class */
            ->setDescriptionForEvent(fn (string $eventName) => "The User has been {$eventName}");;
    }
}
