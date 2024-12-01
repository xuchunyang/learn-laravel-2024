<?php

namespace App\Http\Controllers;

use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;

class DeferController extends Controller
{
    public function __invoke()
    {
        $start = microtime(true);
        sleep(1);

        defer(function () {
            sleep(5);

            Mail::to('xuchunyang56@gmail.com')->send(new Welcome);
        });

        $duration = microtime(true) - $start;

        return response()->json([
            'duration' => $duration,
        ]);
    }
}
