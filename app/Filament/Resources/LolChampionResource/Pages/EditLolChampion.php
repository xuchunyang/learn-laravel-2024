<?php

namespace App\Filament\Resources\LolChampionResource\Pages;

use App\Filament\Resources\LolChampionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLolChampion extends EditRecord
{
    protected static string $resource = LolChampionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
