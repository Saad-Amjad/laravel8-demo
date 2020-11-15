<?php

namespace App\Http\Controllers;

use App\Events\FooEvent;
use App\Jobs\FooJob;
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

    public function queue()
    {
        // showcase queue catch error
        dispatch(function () {
            throw new \Exception('Encountered an error');
        })->catch(function (\Throwable $e) {
            info('Caught exception');
        });

        // queue job retry
        // php artisan queue:work database --tries=3
        // FooJob::dispatch();

        return 'FooJob Dispatched';
    }
}
