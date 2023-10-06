{{-- <x-mail::message>
# Introduction


<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message> --}}



<h1>Contact from {{ $name }}</h1>
<p>{{ $body }}</p><br />
<br />
From the {{ $email }}
