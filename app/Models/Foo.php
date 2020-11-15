<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
