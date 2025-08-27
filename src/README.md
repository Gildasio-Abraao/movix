
# Movix

Essa Doc está organizada por seções

## Auth
### Login

```http
  POST /api/login
```

| Parâmetro  | Tipo       | Descrição                            |
|:-----------|:-----------|:-------------------------------------|
| `email`    | `string`   | **Obrigatório**.                     |
| `password` | `string`   | **Obrigatório**. Mínimo 8 caracteres |

Retorna:

```json
{
    "token": "1|movix_secret_token",
    "user": {
        "id": 1,
        "name": "Username",
        "document": "12345678900",
        "email": "example@gmail.com",
        "role": "delivery",
        "active": true,
        "email_verified_at": "2025-08-27T00:02:45.000000Z",
        "created_at": "2025-08-27T00:00:49.000000Z",
        "updated_at": "2025-08-27T00:02:45.000000Z"
    }
}
```

### Register

```http
  POST /api/register
```

| Parâmetro  | Tipo       | Descrição                             |
|:-----------|:-----------|:--------------------------------------|
| `name`     | `string`   | **Obrigatório**. Máximo 60 caracteres |
| `email`    | `string`   | **Obrigatório**.                      |
| `document` | `string`   | **Obrigatório**.                      |
| `password` | `string`   | **Obrigatório**. Mínimo 8 caracteres  |

Retorna:

```json
{
    "created": true
}
```

### Confirm Account

```http
  POST /api/confirm-account
```

| Parâmetro  | Tipo       | Descrição          |
|:-----------|:-----------|:-------------------|
| `code`     | `string`   | **Obrigatório**.   |
| `email`    | `string`   | **Obrigatório**.   |

```json
{
    "success": true,
    "token": "1|movix_secret_token"
}
```

### Resend Code

```http
  POST /api/resend-code
```

| Parâmetro  | Tipo       | Descrição          |
|:-----------|:-----------|:-------------------|
| `email`    | `string`   | **Obrigatório**.   |

```json
{
    "success": true
}
```

### Logout

```http
  POST /api/logout
```

| Parâmetro   | Tipo       | Descrição                       |
|:------------|:-----------|:--------------------------------|
| `token`     | `string`   | **Obrigatório**. Bearer token   |

### User (autologin)

```http
  GET /api/user
```

| Parâmetro   | Tipo       | Descrição                       |
|:------------|:-----------|:--------------------------------|
| `token`     | `string`   | **Obrigatório**. Bearer token   |
