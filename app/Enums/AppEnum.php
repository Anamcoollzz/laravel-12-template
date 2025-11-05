<?php

namespace App\Enums;

enum AppEnum: string
{
    case TEMPLATE_STISLA = 'stisla';
    case TEMPLATE_TAILWIND = 'tailwind';

    case APP_DEFAULT = 'default';
    case APP_CHAT = 'chat';
}
