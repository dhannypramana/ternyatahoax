<?php

namespace App\Helpers;

/**
 * Format response.
 */
class SlugFormatter
{
    private static function multiexplode ($delimiters,$string) {
        $ready = str_replace($delimiters, $delimiters[0], $string);
        $launch = explode($delimiters[0], $ready);
        return  $launch;
    }

    public static function generateSlug($pass)
    {
        $title = strtolower($pass);
        $title = self::multiexplode(array(" ", "."), $title);
        $slug = "";

        if (end($title) == "") { 
            array_pop($title); 
        }

        foreach ($title as $t) {
            $slug .= $t;
            
            if (end($title) == $t) {
                break;
            }
            
            $slug .= '-';
        }
        return $slug;
    }

    static public function generateExcerpt($title)
    {
        $new = wordwrap($title, 350);
        $new = explode("\n", $new);
    
        $new = $new[0] . '...';
    
        return $new;
    }
}