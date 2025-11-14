<?php

/**
 * format number to rp format
 *
 * @param float|int $number
 * @param int $decimals
 * @return string
 */
function rp($number, $decimals = 0)
{
    return number_format($number, $decimals, ',', '.');
}

/**
 * format number to dollar format
 *
 * @param float|int $number
 * @param int $decimals
 * @return string
 */
function dollar($number, $decimals = 0)
{
    return number_format($number, $decimals, '.', ',');
}

/**
 * format number to idr format
 *
 * @param float|int $number
 * @param int $decimals
 * @return string
 */
function idr($number, $decimals = 0)
{
    return rp($number, $decimals);
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
