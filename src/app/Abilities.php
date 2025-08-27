<?php

namespace App;

enum Abilities: string
{
    // Sanctum middleware
    case Auth = 'auth:sanctum';

    // User can ConfirmAccount
    case ConfirmAccount = 'can:confirm-account';

    // User can authenticate
    case Authenticate = 'can:authenticate';

    // User role: Delivery Plan
    case Delivery = 'can:delivery';
}
