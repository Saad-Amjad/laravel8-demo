<?php

namespace App\Events;

use App\Models\Foo;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FooEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $foo;

    /**
     * Create a new event instance.
     *
     * @param  \App\Models\Foo  $foo
     * @return void
     */
    public function __construct()
    {
        $this->foo = 'This is Foo Event';
    }
}
