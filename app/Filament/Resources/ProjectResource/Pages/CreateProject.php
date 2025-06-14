<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProject extends CreateRecord
{
    protected static string $resource = ProjectResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Project Created';
    }

    protected function getFormActions(): array
    {
        return [
            parent::getCreateFormAction()
                ->label('Save')
                ->icon('heroicon-s-check-circle'),
            parent::getCancelFormAction()
                ->icon('heroicon-s-backspace')
                ->color('danger'),
        ];
    }
}
