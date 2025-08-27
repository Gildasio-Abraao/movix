<x-mail::message>
# Olá {{ $user_name }}

Seja bem-vindo a Movix! Falta pouco para completar seu cadastro!

Seu código de verificação é:

<x-mail::panel>
    {{ $code }}
</x-mail::panel>

Este código expira em 5 minutos.

Obrigado,<br>
Movix
</x-mail::message>
