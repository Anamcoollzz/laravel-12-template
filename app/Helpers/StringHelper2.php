<?php

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
 * generate uuid string
 *
 * @return string
 */
function uuid()
{
    return \Illuminate\Support\Str::uuid()->toString();
}

/**
 * generate image url from name
 *
 * @param string $name
 * @return string
 */
function generate_avatar($name)
{
    return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=random&size=128';
}
