<?php

namespace App\Helpers;

/**
 * Format response.
 */
class ResponseFormatter 
{

    function timeDiff($firstTime, $lastTime): string
    {
        $firstTime = strtotime($firstTime);
        $lastTime = strtotime($lastTime);

        $difference = $lastTime - $firstTime;

        $data['years'] = abs(floor($difference / 31536000));
        $data['days'] = abs(floor(($difference - ($data['years'] * 31536000)) / 86400));
        $data['hours'] = abs(floor(($difference - ($data['years'] * 31536000) - ($data['days'] * 86400)) / 3600));
        $data['minutes'] = abs(floor(($difference - ($data['years'] * 31536000) - ($data['days'] * 86400) - ($data['hours'] * 3600)) / 60));

        $timeString = '';

        if ($data['years'] > 0) {
            $timeString .= $data['years'] . " Years, ";
        }

        if ($data['days'] > 0) {
            $timeString .= $data['days'] . " Days, ";
        }

        if ($data['hours'] > 0) {
            $timeString .= $data['hours'] . " Hours, ";
        }

        if ($data['minutes'] > 0) {
            $timeString .= $data['minutes'] . " Minutes";
        }

        return $timeString;
    }
}