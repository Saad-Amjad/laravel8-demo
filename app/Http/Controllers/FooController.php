<?php

namespace App\Http\Controllers;

use App\Models\Foo;

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
}
