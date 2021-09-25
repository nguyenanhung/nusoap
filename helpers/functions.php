<?php
/**
 * Project nusoap
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/25/2021
 * Time: 16:48
 */
// XML Schema Datatype Helper Functions

//xsd:dateTime helpers
if (!function_exists('timestamp_to_iso8601')) {
    /**
     * convert unix timestamp to ISO 8601 compliant date string
     *
     * @param int     $timestamp Unix time stamp
     * @param boolean $utc       Whether the time stamp is UTC or local
     *
     * @return    mixed ISO 8601 date string or false
     * @access   public
     */
    function timestamp_to_iso8601($timestamp, $utc = true)
    {
        $datestr = date('Y-m-d\TH:i:sO', $timestamp);
        $pos     = strrpos($datestr, "+");
        if ($pos === false) {
            $pos = strrpos($datestr, "-");
        }
        if ($pos !== false) {
            if (strlen($datestr) == $pos + 5) {
                $datestr = substr($datestr, 0, $pos + 3) . ':' . substr($datestr, -2);
            }
        }
        if ($utc) {
            $pattern = '/' .
                       '([0-9]{4})-' .    // centuries & years CCYY-
                       '([0-9]{2})-' .    // months MM-
                       '([0-9]{2})' .    // days DD
                       'T' .            // separator T
                       '([0-9]{2}):' .    // hours hh:
                       '([0-9]{2}):' .    // minutes mm:
                       '([0-9]{2})(\.[0-9]*)?' . // seconds ss.ss...
                       '(Z|[+\-][0-9]{2}:?[0-9]{2})?' . // Z to indicate UTC, -/+HH:MM:SS.SS... for local tz's
                       '/';

            if (preg_match($pattern, $datestr, $regs)) {
                return sprintf('%04d-%02d-%02dT%02d:%02d:%02dZ', $regs[1], $regs[2], $regs[3], $regs[4], $regs[5], $regs[6]);
            }

            return false;
        } else {
            return $datestr;
        }
    }
}

if (!function_exists('iso8601_to_timestamp')) {
    /**
     * convert ISO 8601 compliant date string to unix timestamp
     *
     * @param string $datestr ISO 8601 compliant date string
     *
     * @return    mixed Unix timestamp (int) or false
     * @access   public
     */
    function iso8601_to_timestamp($datestr)
    {
        $pattern = '/' .
                   '([0-9]{4})-' .    // centuries & years CCYY-
                   '([0-9]{2})-' .    // months MM-
                   '([0-9]{2})' .    // days DD
                   'T' .            // separator T
                   '([0-9]{2}):' .    // hours hh:
                   '([0-9]{2}):' .    // minutes mm:
                   '([0-9]{2})(\.[0-9]+)?' . // seconds ss.ss...
                   '(Z|[+\-][0-9]{2}:?[0-9]{2})?' . // Z to indicate UTC, -/+HH:MM:SS.SS... for local tz's
                   '/';
        if (preg_match($pattern, $datestr, $regs)) {
            // not utc
            if ($regs[8] != 'Z') {
                $op = substr($regs[8], 0, 1);
                $h  = substr($regs[8], 1, 2);
                $m  = substr($regs[8], strlen($regs[8]) - 2, 2);
                if ($op == '-') {
                    $regs[4] = $regs[4] + $h;
                    $regs[5] = $regs[5] + $m;
                } elseif ($op == '+') {
                    $regs[4] = $regs[4] - $h;
                    $regs[5] = $regs[5] - $m;
                }
            }

            return gmmktime($regs[4], $regs[5], $regs[6], $regs[2], $regs[3], $regs[1]);
//		return strtotime("$regs[1]-$regs[2]-$regs[3] $regs[4]:$regs[5]:$regs[6]Z");
        } else {
            return false;
        }
    }
}

if (!function_exists('usleepWindows')) {
    /**
     * sleeps some number of microseconds
     *
     * @param string $usec the number of microseconds to sleep
     *
     * @access   public
     * @deprecated
     */
    function usleepWindows($usec)
    {
        $start = gettimeofday();

        do {
            $stop       = gettimeofday();
            $timePassed = 1000000 * ($stop['sec'] - $start['sec'])
                          + $stop['usec'] - $start['usec'];
        }
        while ($timePassed < $usec);
    }
}
