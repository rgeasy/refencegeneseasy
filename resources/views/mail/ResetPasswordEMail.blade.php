@component('mail::message')
# Recuperação de Senha

Olá, 

esse email é referente à sua solicitação de recuperação de senha.
Acesse o link abaixo para trocar sua senha.

@component('mail::button', ['url' => $url])
Acesse o RefGenes Easy!
@endcomponent

Atenciosamente,

{{ config('app.name') }}
@endcomponent