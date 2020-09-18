@component('mail::message')
# Welcome to DevPage.uz

This is a social network for devs!

@component('mail::button', ['url' => 'https://devpage.uz'])
Back to website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
