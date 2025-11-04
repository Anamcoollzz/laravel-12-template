<?php

use App\Models\User;
use App\Repositories\SettingRepository;
use Illuminate\Support\Facades\Auth;

function active_template()
{
    return config('app.template');
}

function is_stisla_template()
{
    return active_template() === 'stisla';
}

function since()
{
    return SettingRepository::since();
}

function year()
{
    return since();
}

function app_name()
{
    return SettingRepository::appName();
}

function developer_name()
{
    return SettingRepository::developerName();
}

function developer_whatsapp()
{
    return SettingRepository::developerWhatsapp();
}

include 'LogHelper.php';
include 'ResponseHelper.php';
include 'MessageHelper.php';
include 'FileHelper.php';
include 'DateTimeHelper.php';
include 'ArrayHelper.php';
include 'NumberHelper.php';

if (!function_exists('encode_id')) {
    /**
     * make secure id
     *
     * @param $val
     * @return string
     */
    function encode_id($val = '')
    {
        $params = ['val' => $val];
        $secure = preg_replace('/[=]+$/', '', base64_encode(serialize($params)));
        return $secure;
    }
}

if (!function_exists('decode_id')) {
    /**
     * decode encrypted id
     *
     * @param string
     * @return int
     */
    function decode_id($val = '')
    {
        $secure = unserialize(base64_decode($val));
        return $secure['val'];
    }
}

/**
 * convert idr to double
 *
 * @param string $value
 * @return float
 */
function idr_to_double($value)
{
    return str_replace(',', '', $value);
}

/**
 * convert rp to double
 *
 * @param string $value
 * @return float
 */
function rp_to_double($value)
{
    return str_replace('.', '', $value);
}

/**
 * get user login model
 *
 * @return User
 */
function auth_user()
{
    return Auth::user() ?? auth('api')->user();
}

/**
 * check if user has role mahasiswa
 *
 * @return bool
 */
function is_mahasiswa()
{
    return auth_user()->hasRole('mahasiswa');
}

/**
 * check if user has role pimpinan fakultas
 *
 * @return bool
 */
function is_pimpinan_fakultas()
{
    return auth_user()->hasRole('pimpinan fakultas');
}

/**
 * check if user has role user
 *
 * @return bool
 */
function is_user()
{
    return auth_user()->hasRole('user');
}

/**
 * check if user has role superadmin
 *
 * @return bool
 */
function is_superadmin()
{
    return auth_user()->hasRole('superadmin');
}

/**
 * check if user has permission
 *
 * @param string $permission
 * @return bool
 */
function can($permission)
{
    return auth_user()->can($permission);
}

/**
 * get user login id
 *
 * @return int
 */
function auth_id()
{
    return Auth::id() ?? auth('api')->id();
}

/**
 * check if user is logged in
 *
 * @return bool
 */
function auth_check()
{
    return Auth::check() || auth('api')->check();
}

/**
 * check if user has permission
 *
 * @param string $permission
 * @return bool
 */
function user_can($permission)
{
    return Auth::user()->can($permission);
}

function user_email()
{
    return Auth::user()->email ?? auth('api')->user()->email;
}
