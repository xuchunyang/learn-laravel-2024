<?php

namespace App\Console\Commands;

use App\Terminal\Hello;
use Illuminate\Console\Command;

class HelloTerminal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:hello-terminal';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the hello terminal';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        (new Hello)->prompt();
    }
}
