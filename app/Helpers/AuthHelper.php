<?php

use Illuminate\Support\Facades\Auth;

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
 * check if user has role kepala sekolah
 *
 * @return bool
 */
function is_kepala_sekolah()
{
    return auth_user()->hasRole('kepala sekolah');
}

/**
 * check if user has role guru
 *
 * @return bool
 */
function is_guru()
{
    return auth_user()->hasRole('guru');
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
    return Auth::id() ?? auth('api')->id() ?? null;
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

/**
 * get user login email
 *
 * @return string
 */
function user_email()
{
    return Auth::user()->email ?? auth('api')->user()->email;
}

/**
 * check if user has role pusat
 *
 * @return bool
 */
function is_pusat()
{
    return auth_user()->hasRole('pusat');
}

/**
 * check if user has role cabang
 *
 * @return bool
 */
function is_cabang()
{
    return auth_user()->hasRole('cabang');
}
