<?php

namespace App\Filament\Vendor\Pages;

use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'pages.dashboard';

    public function mount()
    {
        $vendor = Auth::guard('vendor')->user();
        if (!$vendor || $vendor->status !== 'approved') {
            Auth::guard('vendor')->logout();

            redirect()->route('filament.vendor.auth.login')->with('error', 'Your account is not approved yet.');
        }
    }
}
