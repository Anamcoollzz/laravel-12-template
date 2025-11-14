<?php

use App\Enums\AppEnum;
use App\Repositories\SettingRepository;

/**
 * get active template
 *
 * @return string
 */
function active_template()
{
    return config('app.template');
}

/**
 * check if active template is stisla
 *
 * @return boolean
 */
function is_stisla_template()
{
    return active_template() === 'stisla';
}

/**
 * get since year
 *
 * @return int
 */
function since()
{
    return SettingRepository::since();
}

/**
 * get year or year range
 *
 * @return string
 */
function year()
{
    return since();
}

/**
 * get application name
 *
 * @return string
 */
function app_name()
{
    return SettingRepository::appName();
}

/**
 * get developer name
 *
 * @return string
 */
function developer_name()
{
    return SettingRepository::developerName();
}

/**
 * get developer whatsapp number
 *
 * @return string
 */
function developer_whatsapp()
{
    return SettingRepository::developerWhatsapp();
}

/**
 * check if app type is chat
 *
 * @return boolean
 */
function is_app_chat()
{
    return config('stisla.app') === AppEnum::APP_CHAT;
}

/**
 * get domain from app url
 *
 * @return string
 */
function domain()
{
    return parse_url(config('app.url'), PHP_URL_HOST);
}
