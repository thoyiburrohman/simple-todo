<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProject extends EditRecord
{
    protected static string $resource = ProjectResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Project Updated';
    }

    protected function getFormActions(): array
    {
        return [
            parent::getSaveFormAction()
                ->label('Save')
                ->icon('heroicon-s-check-circle'),
            parent::getCancelFormAction()
                ->icon('heroicon-s-backspace')
                ->color('danger'),
        ];
    }
}
