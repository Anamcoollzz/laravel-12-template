<?php

namespace App\Services;

use Jenssegers\Agent\Agent;

class GeneralService
{
    private $agent;

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct()
    {
        $this->agent = new Agent();
    }

    /**
     * get user browser
     *
     * @return string
     */
    public function getBrowser()
    {
        return $this->agent->browser();
    }

    /**
     * get user device
     *
     * @return string
     */
    public function getDevice()
    {
        return $this->agent->device();
    }

    /**
     * get user platform
     *
     * @return string
     */
    public function getPlatform()
    {
        return $this->agent->platform();
    }

    /**
     * check if user is using mobile device
     *
     * @return boolean
     */
    public function isMobile()
    {
        return $this->agent->isMobile();
    }

    /**
     * check if user is using desktop device
     *
     * @return boolean
     */
    public function isDesktop()
    {
        return $this->agent->isDesktop();
    }
}
