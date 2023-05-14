<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Verifikasi Alamat Email!')
                ->line('Klik pada link atau tombol dibawah ini untuk melakukan verifikasi email anda. Abaikan saja pesan ini jika anda merasa tidak pernah melakukan pendaftaran!')
                ->line('Informasi Login Anda :')
                ->line('Username : ' . $notifiable->username . '')
                ->action('Verifikasi Alamat Email', $url);
        });
    }
}
