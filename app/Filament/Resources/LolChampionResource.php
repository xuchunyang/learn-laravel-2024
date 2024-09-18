<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LolChampionResource\Pages;
use App\Models\LolChampion;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LolChampionResource extends Resource
{
    protected static ?string $model = LolChampion::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('attachment')
                    ->disk('public'),
                Repeater::make('members')
                    ->schema([
                        TextInput::make('name')->required(),
                        Select::make('role')
                            ->options([
                                'member' => 'Member',
                                'administrator' => 'Administrator',
                                'owner' => 'Owner',
                            ])
                            ->required(),
                    ])
                    ->cloneable()
                    ->collapsible()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('uid')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name'),
                Forms\Components\TextInput::make('title'),
                Forms\Components\Textarea::make('blurb'),
                Forms\Components\Select::make('type')
                    ->options([
                        'tank' => 'Tank',
                        'fighter' => 'Fighter',
                        'mage' => 'Mage',
                        'assassin' => 'Assassin',
                        'marksman' => 'Marksman',
                        'support' => 'Support',
                    ]),
                Forms\Components\DatePicker::make('published_at')
                    ->maxDate(now()),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload(),
                Tabs::make('Tabs')
                    ->columnSpanFull()
                    ->tabs([
                        Tabs\Tab::make('Tab 1')
                            ->icon('heroicon-m-bell')
                            ->schema([
                                Forms\Components\TextInput::make('tab_1_field_1'),
                            ]),
                        Tabs\Tab::make('Tab 2')
                            ->icon('heroicon-m-bell')
                            ->schema([
                                Forms\Components\TextInput::make('tab_2_field_1'),
                            ]),
                        Tabs\Tab::make('Tab 3')
                            ->icon('heroicon-m-bell')
                            ->schema([
                                Forms\Components\TextInput::make('tab_3_field_1'),
                            ]),
                    ]),
                Fieldset::make('Label')
                    ->schema([
                        Forms\Components\RichEditor::make('abilities')->columnSpanFull(),
                    ]),
                Split::make([
                    Section::make([
                        TextInput::make('title'),
                        Textarea::make('content'),
                    ]),
                    Section::make([
                        Toggle::make('is_published'),
                        Toggle::make('is_featured'),
                    ])->grow(false),
                ])->from('md'),
                Section::make('Rate limiting')
                    ->description('Prevent abuse by limiting the number of requests per period')
                    ->columns()
                    ->schema([
                        Forms\Components\TextInput::make('rate_limit')
                            ->numeric()
                            ->step(10),
                        Forms\Components\Select::make('rate_limit_period')
                            ->options([
                                'minute' => 'Minute',
                                'hour' => 'Hour',
                                'day' => 'Day',
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('uid')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('type'),
            ])
            ->filters([
                // Filter by type
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'tank' => 'Tank',
                        'fighter' => 'Fighter',
                        'mage' => 'Mage',
                        'assassin' => 'Assassin',
                        'marksman' => 'Marksman',
                        'support' => 'Support',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLolChampions::route('/'),
            'create' => Pages\CreateLolChampion::route('/create'),
            'edit' => Pages\EditLolChampion::route('/{record}/edit'),
        ];
    }
}
