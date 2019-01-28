@component('mail::message')
# Introduction {{$project->title}}

The body of your message.


@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>

{{--Foo is set as public in ProjectCreated() and therefore is accessible here--}}
{{ $foo }}
{{ config('app.name') }}
@endcomponent

{{--Used in LFS30 - Mailables--}}
{{--//Created with artisan make:mail ProjectCreated --markdown="emails.project-created"--}}