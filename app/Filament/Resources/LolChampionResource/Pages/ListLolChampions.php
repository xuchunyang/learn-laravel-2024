<?php

namespace App\Filament\Resources\LolChampionResource\Pages;

use App\Filament\Resources\LolChampionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLolChampions extends ListRecords
{
    protected static string $resource = LolChampionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
