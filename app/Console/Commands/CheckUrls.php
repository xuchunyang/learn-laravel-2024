<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class CheckUrls extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-urls';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '检查所有的网站是否正常运行';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $urls = config('services.check.urls');

        $this->withProgressBar($urls, function ($url) {
            try {
                Http::get($url)->throw();

                $ok = true;
                $this->info("{$url} is OK");
            } catch (Exception) {
                $ok = false;
                $this->error("{$url} is not OK");
            }

            $data = [
                'ts' => now()->timestamp,
                'url' => $url,
                'ok' => $ok,
            ];
            Storage::append('urls.log', json_encode($data));
        });
    }
}
