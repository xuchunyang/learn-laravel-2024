<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $readme = file_get_contents(base_path('README.md'));

        return view('home', [
            'readme' => $readme,
        ]);
    }
}
