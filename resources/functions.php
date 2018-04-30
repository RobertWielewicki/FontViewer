<?php
    /* Path that contains font files to check*/
    $path = "fonts/";
    $fontExtensions = array("eot", "odttf", "otf", "ttf", "svg", "woff", "woff2");

    /* Alphabets to display */
    $alphabet[] = 'AaĄąBbCcĆćDdEeĘęFfGgHhIiJjKkLlŁłMmNnŃńOoÓóPpRrSsŚśTtUuWwYyZzŹźŻż'; // Polish
    $alphabet[] = 'AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz'; // English
    $alphabet[] = 'АаБбВвГгДдЕеЁёЖжЗзИиЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЪъЫыЬьЭэЮюЯя';

    $divSize = array('textBig', 'textModerate', 'textSmall');
    $symbols = '&.,?!@()#$%*+-=:;1234567890';
    
function files()
{
    global $path;
    global $fontExtensions;
    $dir = scandir($path);
    $fontsFile = array(count($dir) - 2);
    $fontCounter = 0;
    echo "<ul>"; 
    foreach ($dir as $file)
    {
        if($file === "." || $file === "..")
        {
            continue;
        }
        for($i = 0; $i < count($fontExtensions); $i++)
        {
            if(getExtension($file) === $fontExtensions[$i])
            {
                $fontsFile[$fontCounter] = $file;
                $fontCounter++;
            }
        } 
    }
    for($i = 0; $i < $fontCounter; $i++)
    {
        echo '<a href=\'javascript:font("'.$fontsFile[$i].'")\'><li>'.$fontsFile[$i].'</li></a>';
    }

    if($fontCounter !== 0)
    {
        echo '<div class="clear"></div><span class="files">Fonts:&nbsp;'.$fontCounter.'</span>';

    } else
    {
        echo '<p class="noFile">No font file were found. Paste font files to "'.$path.'" directory!</p>';
    }
    echo '</ul><div class="clear"></div>';

}

function getExtension($string)
{
    $string = strrev($string);
    $lenght = strlen($string);
    for($i = 0; $i < 6; $i++)
    {
        if ($i >= $lenght)
        {
            return NULL;
        }
        if($string[$i] === '.')
        {
            $string = substr($string, 0, $i);
            $string = strrev($string);
            return $string;
        }
    }
    return NULL; // IF NOTHING WAS FINDED
}

function printText()
{
    global $alphabet;
    global $symbols;
    
    echo '<div id="fontUsed">Select one of the fonts</div><div class="clear"></div>';
    
    printFragment($alphabet[0]);
    printFragment($alphabet[2]);
    printFragment($symbols);
    printLineFragments($alphabet[0]);
}

function printFragment($alphabet)
{
    global $divSize;
    echo "<div class=\"$divSize[0]\"><p>";
    printAlphabet($alphabet);
    echo '</p></div><div class="clear"></div>';    
    for($i = 0; $i < 2; $i++)
    {
        echo "<div class=\"$divSize[1]\"><p>";
        printAlphabet($alphabet);
        echo '</p></div>';         
    }
    echo '<div class="clear"></div>';
    for($i = 0; $i < 4; $i++)
    {
        echo "<div class=\"$divSize[2]\"><p>";
        printAlphabet($alphabet);
        echo '</p></div>'; 
    }
    echo '<div class="clear"></div>';
}

function printAlphabet($alphabet)
{
    for($k = 0; $k < mb_strlen($alphabet, 'UTF-8'); $k++)
    {
        echo mb_substr($alphabet, $k, 1, 'UTF-8')." ";
    }
}

function printLineFragments($alphabet)
{
    global $symbols;
    $pre = '<div class="tableLine"><table class="tblLine"><tbody><tr><td class="tableNumber">';
    $after = '</tr></tbody></table></div>';
    echo '<div id="tableLine">';
    for($i = 10; $i < 15; $i ++)
    {
        echo "$pre";
        echo "$i</td><td class=\"tableRow\" style=\"font-size:$i"."px\">$alphabet</td>";
        echo "$after";
    }
    for($i = 16; $i <= 24; $i+=2)
    {
        echo "$pre";
        echo "$i</td><td class=\"tableRow\" style=\"font-size:$i"."px\">$alphabet</td>";
        echo "$after";
    }
    for($i = 25; $i < 60; $i+=5)
    {
        echo "$pre";
        echo "$i</td><td class=\"tableRow\" style=\"font-size:$i"."px\">$alphabet</td>";
        echo "$after";
    }
    for($i = 60; $i <= 90; $i+=10)
    {
        echo "$pre";
        echo "$i</td><td class=\"tableRow\" style=\"font-size:$i"."px\">$alphabet</td>";
        echo "$after";
    }
    echo '</div>';
}

function lines($number)
{
    for($i = 0; $i < $number; $i++)
    {
        echo '<br/>';
    }
}

