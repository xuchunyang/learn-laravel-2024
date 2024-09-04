<?php

namespace App\Console\Commands;

use App\Models\LolChampion;
use Illuminate\Console\Command;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class ImportLolChampions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-lol-champions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import League of Legends champions from the official API (https://ddragon.leagueoflegends.com/cdn/14.17.1/data/zh_CN/champion.json)';

    /**
     * Execute the console command.
     *
     * @throws RequestException
     */
    public function handle(): void
    {
        $response = Http::get('https://ddragon.leagueoflegends.com/cdn/14.17.1/data/zh_CN/champion.json')->throw();
        $champions = $response->json()['data'];

        foreach ($champions as $champion) {
            LolChampion::updateOrCreate([
                'uid' => $champion['id'],
            ], [
                'name' => $champion['name'],
                'title' => $champion['title'],
                'blurb' => $champion['blurb'],
            ]);
        }

        $this->info('League of Legends champions have been imported successfully.');
    }
}
