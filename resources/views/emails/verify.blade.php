@component('mail::message')
# Verifikasi Email Anda

Halo {{ $user->name }},

Silakan klik tombol di bawah ini untuk memverifikasi email Anda dan mengaktifkan akun Anda.

@component('mail::button', ['url' => $url])
Verifikasi Email
@endcomponent

Jika Anda tidak membuat akun, abaikan email ini.

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent
