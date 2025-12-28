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
 * @param AppEnum|null $app
 * @return boolean
 */
function is_app_chat($app = null)
{
    if ($app) {
        return $app === AppEnum::APP_CHAT;
    }
    return config('stisla.app') === AppEnum::APP_CHAT;
}

/**
 * check if app type is bank
 *
 * @param AppEnum|null $app
 * @return boolean
 */
function is_app_bank($app = null)
{
    if ($app) {
        return $app === AppEnum::APP_BANK;
    }
    return config('stisla.app') === AppEnum::APP_BANK;
}

/**
 * check if app type is education
 *
 * @param AppEnum|null $app
 * @return boolean
 */
function is_app_education($app = null)
{
    if ($app) {
        return $app === AppEnum::APP_EDUCATION;
    }
    return config('stisla.app') === AppEnum::APP_EDUCATION;
}

/**
 * check if app type is blank
 *
 * @param AppEnum|null $app
 * @return boolean
 */
function is_app_blank($app = null)
{
    if ($app) {
        return $app === AppEnum::APP_BLANK;
    }
    return config('stisla.app') === AppEnum::APP_BLANK;
}

/**
 * check if app type is default
 *
 * @param AppEnum|null $app
 * @return boolean
 */
function is_app_default($app = null)
{
    if ($app) {
        return $app === AppEnum::APP_DEFAULT;
    }
    return config('stisla.app') === AppEnum::APP_DEFAULT;
}

/**
 * check if app type is ecommerce
 *
 * @param AppEnum|null $app
 * @return boolean
 */
function is_app_ecommerce($app = null)
{
    if ($app) {
        return $app === AppEnum::APP_ECOMMERCE;
    }
    return config('stisla.app') === AppEnum::APP_ECOMMERCE;
}

/**
 * check if app type is dataku
 *
 * @param AppEnum|null $app
 * @return boolean
 */
function is_app_dataku($app = null)
{
    if ($app) {
        return $app === AppEnum::APP_DATAKU;
    }
    return config('stisla.app') === AppEnum::APP_DATAKU;
}

/**
 * check if app type is fingerprint
 *
 * @param AppEnum|null $app
 * @return boolean
 */
function is_app_fingerprint($app = null)
{
    if ($app) {
        return $app === AppEnum::APP_FINGERPRINT;
    }
    return config('stisla.app') === AppEnum::APP_FINGERPRINT;
}

/**
 * check if app type is pocari
 *
 * @param AppEnum|null $app
 * @return boolean
 */
function is_app_pocari($app = null)
{
    if ($app) {
        return $app === AppEnum::APP_POCARI;
    }
    return config('stisla.app') === AppEnum::APP_POCARI;
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
