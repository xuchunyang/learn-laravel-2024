<?php

namespace App\Console\Commands;

use App\Models\LolChampion;
use Illuminate\Console\Command;

class RandomizeLolChampionCreatedAt extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:randomize-lol-champion-created-at';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Randomize the created_at column of the lol_champions table';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        // Get all the lol champions
        $lolChampions = LolChampion::all();
        $this->withProgressBar($lolChampions, function ($lolChampion) {
            // Randomize the created_at column
            $lolChampion->update([
                'created_at' => now()->subDays(rand(1, 365)),
            ]);
        });
    }
}
