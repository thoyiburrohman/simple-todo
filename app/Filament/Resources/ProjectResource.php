<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $activeNavigationIcon = 'heroicon-s-cube';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Proyek')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Proyek')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tasks_summary')
                    ->state(function (Project $record): string {
                        // Hitung total task
                        $totalTasks = $record->task->count();
                        // Hitung task yang belum selesai
                        $incompleteTasks = $record->task->where('is_completed', false)->count();

                        // Menggunakan Blade untuk menampilkan angka yang belum selesai dengan warna merah
                        // Ini akan dirender sebagai HTML di dalam kolom teks.
                        $incompleteHtml = "<span style='color: #EF4444; font-weight: bold;'>{$incompleteTasks}</span>"; // Menggunakan variabel CSS Filament
                        $totalTasks = "<span style='color: #22C55E; font-weight: bold;'>{$totalTasks}</span>"; // Hijau jika nol dan ada tugas


                        return $incompleteHtml . " dari " . $totalTasks . " tugas";
                    })->html()
                    ->label('Status Tugas'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->color('warning'),
                Tables\Actions\DeleteAction::make()
                    ->color('danger'),

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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
