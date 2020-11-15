<?php

namespace App\Http\Controllers;

use App\Events\FooEvent;
use App\Models\Foo;
use Illuminate\Support\Facades\Event;

class FooController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Foo::all();
    }

    public function event()
    {
        // earlier, still works though
        Event::listen(FooEvent::class, function (FooEvent $event) {
            info($event->foo);
        });

        // new
        Event::listen(function (FooEvent $event) {
            info($event->foo);
        });

        FooEvent::dispatch();

        return 'FooEvent Dispatched';
    }
}
