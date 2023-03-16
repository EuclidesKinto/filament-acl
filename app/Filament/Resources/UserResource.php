<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\{TextInput, CheckboxList, Toggle};
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\{TextColumn, IconColumn};
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Admin Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('name')
                            ->label('Nome')
                            ->rule('min:3')
                            ->validationAttribute('nome')
                            ->maxLength(255)
                            ->required(),
                        TextInput::make('email')
                            ->label('E-mail')
                            ->email()
                            ->validationAttribute('email')
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->required(),
                        TextInput::make('password')
                            ->password()
                            ->validationAttribute('senha')
                            ->maxLength(255)
                            ->dehydrateStateUsing(static fn(null|string $state): null|string =>
                                filled($state) ? Hash::make($state) : null,
                            )
                            ->required(static fn(Page $livewire): string =>
                                $livewire instanceof Pages\CreateUser
                            )
                            ->dehydrated(static fn(null|string $state): bool =>
                                filled($state)
                            )
                            ->label(static fn(Page $livewire): string =>
                                ($livewire instanceof Pages\EditUser) ? 'Nova Senha' : 'Senha'
                            ),
                        Toggle::make('is_admin')
                            ->label('É um Admin?'),
                        CheckboxList::make('roles')
                            ->relationship('roles', 'name')
                            ->columns(2)
                            ->required()
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('name')
                    ->label('Usuário')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('email')
                    ->label('E-mail')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('roles.name')
                    ->label('Role')
                    ->sortable()
                    ->searchable(),
                IconColumn::make('is_admin')
                    ->boolean()
                    ->sortable()
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Criado em')
                    ->date('d/m/Y')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('deleted_at')
                    ->label('Deletado')
                    ->date('d/m/Y')
                    ->sortable()
                    ->searchable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make()
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
//            RelationManagers\RolesRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
