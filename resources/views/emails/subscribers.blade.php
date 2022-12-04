<x-mail::message>
# Invitation to join {{ config('app.name') }}

You are receiving this email because you were invited to join {{ config('app.name') }}.<br>
Yaou email address is <b>{{ $user->email }}</b>.<br>
Your password is <b>{{ $password }}</b>.<br>
Login to {{ config('app.name') }} using the link below.

<x-mail::button :url="'http://127.0.0.1:8000/auth'">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
