<?php

namespace App\Enums;

enum Table: string
{
    case USERS = "users";
    case PASSWORD_RESET_TOKENS = "password_reset_tokens";
    case SESSIONS = "sessions";
}
