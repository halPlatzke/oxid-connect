<?php

/**
 * This file is part of a marmalade GmbH project
 * It is not Open Source and may not be redistributed.
 * For contact information please visit http://www.marmalade.de
 * Version:    1.0
 * Author:     Jens Richter <richter@marmalade.de>
 * Author URI: http://www.marmalade.de
 */
class makaira_connect_oxviewconfig extends makaira_connect_oxviewconfig_parent
{
    public function getAggregationFilter()
    {
        return (array) oxRegistry::getConfig()->getRequestParameter('makairaFilter');
    }

    public function getMakairaMainStylePath()
    {
        $modulePath = $this->getModulePath('makaira/connect').'';
        $file = glob($modulePath.'out/dist/*.css');
        return substr(reset($file), strlen($modulePath));
    }

    public function getMakairaMainScriptPath()
    {
        $modulePath = $this->getModulePath('makaira/connect').'';
        $file = glob($modulePath.'out/dist/*.js');
        return substr(reset($file), strlen($modulePath));
    }
}