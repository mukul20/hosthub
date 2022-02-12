<?php
namespace App\Utility;

/**
 * Class DateHelper
 *
 * @package App\Utility
 */
class DateHelper
{
    /**
     * Creating date collection between two dates
     * 
     * @param string since any date, time or datetime format
     * @param string until any date, time or datetime format
     * @param string step
     * @param string date of output format
     * @return array
     */
    public static function dateRange($first, $last, $step = '+1 day', $output_format = 'Y-m-d')
    {

        $dates = array();
        $current = strtotime($first);
        $last = strtotime($last);

        while ($current <= $last)
        {

            $dates[] = date($output_format, $current);
            $current = strtotime($step, $current);
        }

        return $dates;
    }
}

