<?php

/**
 * This file is part of a marmalade GmbH project
 * It is not Open Source and may not be redistributed.
 * For contact information please visit http://www.marmalade.de
 * Version:    1.0
 * Author:     Thomas Uhlig <uhlig@marmalade.de>
 * Author URI: http://www.marmalade.de
 */
class makaira_connect_oxoutput extends makaira_connect_oxoutput_parent
{
    /**
     * output data
     *
     * @param string $sName  output name (used in json mode)
     * @param string $output output text/data
     *
     * @return null
     */
    public function output($sName, $output)
    {
        if (self::OUTPUT_FORMAT_HTML === $this->_sOutputFormat) {
            if (oxRegistry::getConfig()->getShopConfVar(
                'makaira_connect_use_user_agent',
                null,
                oxConfig::OXMODULE_MODULE_PREFIX . 'makaira/connect'
            )) {
                $closingHead    = "</body>";
                $closingHeadNew = "<script type=\"text/javascript\">
oiOS=new Date().getTimezoneOffset();oiOS=(oiOS<0?\"+\":\"-\")+(\"00\"+parseInt((Math.abs(oiOS/60)))).slice(-2);
document.cookie= \"oiLocalTimeZone=\"+oiOS+\";path=/;\";
</script></body>";

                $output = ltrim($output);
                if (false !== ($pos = stripos($output, $closingHead))) {
                    $output = substr_replace($output, $closingHeadNew, $pos, strlen($closingHead));
                }
            }
        }

        parent::output($sName, $output);
    }
}
