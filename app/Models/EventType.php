<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class EventType extends Model
{
    use SoftDeletes;

    protected $table = 'event_types';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'event_type',
    ];

    // Each event type can have many events
    public function events() {
        return $this->hasMany(Event::class,'event_type_id');
    }

    public static function boot()
    {
        parent::boot();

        static::deleted(function($event_type)
        {
            $event_type->events()->delete();
        });

        static::restored(function($event_type)
        {
            $event_type->events()->withTrashed()->restore();
        });
    }
}
