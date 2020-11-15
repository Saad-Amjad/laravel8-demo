<?php

namespace App\Http\Controllers;

use App\Events\FooEvent;
use App\Jobs\FooBatchJob;
use App\Jobs\FooJob;
use App\Models\Foo;
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Bus;
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

    public function batch()
    {
        Bus::batch([
            new FooBatchJob(),
            new FooBatchJob(),
            new FooBatchJob(),
            new FooBatchJob(),
            new FooBatchJob(),
        ])->then(function (Batch $batch) {
            info('Done');
        })->catch(function (Batch $batch, Throwable $e) {
            info('Failed');
        })->finally(function (Batch $batch) {
            info('Batch is finishing');
        })->dispatch();

        return 'FooBatchJob Dispatched';
    }
}
