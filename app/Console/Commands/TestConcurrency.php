<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Benchmark;
use Illuminate\Support\Facades\Concurrency;

class TestConcurrency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-concurrency';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test the new beta concurrency feature';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Benchmark::dd(function () {
            $this->info('Running 3 tasks concurrently...');

            // Supported: "process", "fork", "sync"
            // the "process" driver is the default
            $results = Concurrency::driver('fork')->run([
                function () {
                    sleep(1);

                    return 1;
                },
                function () {
                    sleep(2);

                    return 2;
                },
                function () {
                    sleep(3);

                    return 3;
                },
            ]);

            $this->info('Results: '.json_encode($results));
        });

    }
}
