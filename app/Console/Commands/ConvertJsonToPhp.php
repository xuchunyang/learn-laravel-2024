<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ConvertJsonToPhp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:convert-json-to-php';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert JSON to PHP';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        // Get JSON input from STDIN
        $json = file_get_contents('php://stdin');

        // Convert JSON to PHP
        $php = json_decode($json, true);

        // Output PHP
        var_export($php);
    }
}
