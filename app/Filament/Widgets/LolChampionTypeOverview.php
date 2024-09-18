<?php

namespace App\Filament\Widgets;

use App\Models\LolChampion;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class LolChampionTypeOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Tank', LolChampion::where('type', 'tank')->count()),
            Stat::make('Fighter', LolChampion::where('type', 'fighter')->count()),
            Stat::make('Mage', LolChampion::where('type', 'mage')->count()),
            Stat::make('Assassin', LolChampion::where('type', 'assassin')->count()),
            Stat::make('Marksman', LolChampion::where('type', 'marksman')->count()),
            Stat::make('Support', LolChampion::where('type', 'support')->count()),
        ];
    }
}
