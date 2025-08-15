
## Movix - Documentação da API

Antes de prosseguir, na página de login do usuário primeiro devemos fazer uma requisição:
```http
  GET /sanctum/csrf-cookie
```
Isso retorna um cookie **XSRF-TOKEN** para deixar a requisição mais segura!

### Login

```http
  POST /api/login
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `email` | `string` | **Obrigatório**. |
| `password` | `string` | **Obrigatório**. Mínimo 8 caracteres |

Retorna:

```json
{
  "token": "82|atWURf1kuWEj2xJsjpwbvMmNZKTxwYf0KpLC6X0tc73e19f4",
  "user": {
    "id": 1,
    "name": "Username",
    "email": "example@gmail.com",
    "email_verified_at": null,
    "role": "delivery",
    "created_at": "2025-08-09T01:58:45.000000Z",
    "updated_at": "2025-08-09T01:58:45.000000Z"
  }
}
```

### Register

```http
  POST /api/register
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `name`      | `string` | **Obrigatório**. Máximo 60 caracteres |
| `email`      | `string` | **Obrigatório**. |
| `password`      | `string` | **Obrigatório**. Mínimo 8 caracteres |

Retorna:

```json
{
  "token": "82|atWURf1kuWEj2xJsjpwbvMmNZKTxwYf0KpLC6X0tc73e19f4",
  "user": {
    "id": 1,
    "name": "Username",
    "email": "example@gmail.com",
    "created_at": "2025-08-09T01:58:45.000000Z",
    "updated_at": "2025-08-09T01:58:45.000000Z"
  }
}
```

### Logout

Aqui o parâmetro seria um **Bearer token** com o **token** do usuário no header da requisição!

```http
  POST /api/logout
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `token`      | `string` | **Obrigatório**. Bearer token |

### User (autologin)

Aqui o parâmetro seria um **Bearer token** com o **token** do usuário no header da requisição!

```http
  GET /api/user
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `token`      | `string` | **Obrigatório**. Bearer token |
