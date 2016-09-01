<?php

namespace Nasution;

/**
 * This code originally could be found on Kohana 3.1
 * https://github.com/kohana/core/blob/3.1/master/classes/kohana/html.php#L166-L203
 *
 * Generates an obfuscated version of a string. Text passed through this
 * method is less likely to be read by web crawlers and robots, which can
 * be helpful for spam prevention, but can prevent legitimate robots from
 * reading your content.
 *
 *     echo HTML::obfuscate($text);
 *
 * @param   string  string to obfuscate
 * @return  string
 */
function obfuscate($string)
{
    $safe = '';
    foreach (str_split($string) as $letter)
    {
        switch (rand(1, 3))
        {
            // HTML entity code
            case 1:
                $safe .= '&#'.ord($letter).';';
            break;

            // Hex character code
            case 2:
                $safe .= '&#x'.dechex(ord($letter)).';';
            break;

            // Raw (no) encoding
            case 3:
                $safe .= $letter;
        }
    }

    return $safe;
}
