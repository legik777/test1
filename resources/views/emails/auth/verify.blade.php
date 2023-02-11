{{-- <x-mail::message>
    Please refer to the following link:

    The body of your message.

    <x-mail::button :url="$href">
        Активировать
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
 --}}

 @component('mail::message')
Активация аккаунта

@component('mail::button', ['url' => $href])
Активировать
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
