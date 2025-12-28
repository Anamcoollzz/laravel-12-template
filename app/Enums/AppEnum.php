<?php

namespace App\Enums;

enum AppEnum: string
{
    case TEMPLATE_STISLA = 'stisla';
    case TEMPLATE_TAILWIND = 'tailwind';

    case APP_DEFAULT = 'default';
    case APP_CHAT = 'chat';
    case APP_BANK = 'bank';
    case APP_EDUCATION = 'education';
    case APP_BLANK = 'blank';
    case APP_ECOMMERCE = 'ecommerce';
    case APP_DATAKU = 'dataku';
    case APP_FINGERPRINT = 'fingerprint';
    case APP_POCARI = 'pocari';
}
