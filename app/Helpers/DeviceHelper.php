<?php

/**
 * check if device is desktop
 *
 * @return boolean
 */
function is_desktop()
{
    $agent = new \Jenssegers\Agent\Agent();
    return $agent->isDesktop();
}

/**
 * check if device is mobile
 *
 * @return boolean
 */
function is_mobile()
{
    $agent = new \Jenssegers\Agent\Agent();
    return $agent->isMobile();
}
