<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bar extends Model
{
    use HasFactory;

    protected $table = 'bar';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];
    /**
     * Get the Food that owns the Bar.
     */
    public function foo()
    {
        return $this->belongsTo('App\Models\Foo');
    }
}
