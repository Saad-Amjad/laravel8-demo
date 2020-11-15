<?php

namespace App\Http\Controllers;


class BarController extends Controller
{
    /**
     * invoke
     *
     * @return string
     */
    public function __invoke()
    {
        return 'Bar Controlller';
    }
}
