<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Illuminate\Events\queueable;

class Foo extends Model
{
    use HasFactory;

    protected $table = 'foo';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the Bar record associated with Foo.
     */
    public function bar()
    {
        return $this->hasOne('App\Models\Bar');
    }

    protected static function booting()
    {
        // earlier this happened synchronously
        static::created(function (Foo $foo) {
            info('Queued: '.get_class($foo));
        });

        // now queueable
        static::created(queueable(function (Foo $foo) {
            info('Queued: '.get_class($foo));
        }));

    }
}

