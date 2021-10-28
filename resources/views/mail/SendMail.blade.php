@component('mail::message')
# Email Criado

Olá, {{$nome}}, sua conta foi criada com sucesso!!!

@component('mail::button', ['url' => config('app.url')])
Acesse o RefGenes Easy!
@endcomponent

Atenciosamente,

{{ config('app.name') }}
@endcomponent
