<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VendorResource\Pages;
use App\Filament\Resources\VendorResource\RelationManagers;
use App\Models\Vendor;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VendorResource extends Resource
{
    protected static ?string $model = Vendor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                ->label('Nama Vendor')
                ->type('text')
                ->required(),

                TextInput::make('email')
                ->label('Email')
                ->type('email')
                ->required(),

                TextInput::make('password')
                ->label('Password')
                ->type('password')
                ->required(),

                TextInput::make('phone')
                ->label('Nomor Handphone')
                ->type('number')
                ->minLength(11)
                ->maxLength(20)
                ->required(),

                TextInput::make('company_name')
                ->label('Nama Perusahaan')
                ->type('text')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->searchable()
                ->sortable(),

                TextColumn::make('email')
                ->searchable()
                ->sortable(),

                TextColumn::make('phone')
                ->searchable()
                ->sortable(),

                TextColumn::make('company_name')
                ->searchable()
                ->sortable(),

                TextColumn::make('status')
                ->searchable()
                ->sortable()
                ->badge(function ($record) {
                    return $record->status === 'pending' ? 'yellow' : ($record->status === 'approved' ? 'green' : 'default');
                })
                ->formatStateUsing(fn (string $state): string => ucfirst($state)),

            ])
            ->filters([
                //
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
            'index' => Pages\ListVendors::route('/'),
            'create' => Pages\CreateVendor::route('/create'),
            'edit' => Pages\EditVendor::route('/{record}/edit'),
        ];
    }
}
