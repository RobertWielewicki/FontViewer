<?php
    /* Path that contains font files to check*/
    $path = "fonts/";
    $fontExtensions = array("eot", "odttf", "otf", "ttf", "svg", "woff", "woff2");
    //$fontExtensionsAdditional = array("abf", "acfm", "afm", "amfm", "bdf", "cha", "chr", "compositefont", "dfont", "etx", "euf", "f3f", "fea", "ffil", "fnt", "fnt", "fon", "fot", "gdr", "gf", "glif", "gxf", "lwfn", "mcf", "mf", "mxf", "nftr", "pcf", "");
    
    /* Alphabets to display */
    $alphabet[] = 'AaĄąBbCcĆćDdEeĘęFfGgHhIiJjKkLlŁłMmNnŃńOoÓóPpRrSsŚśTtUuWwYyZzŹźŻż'; // Polish
    $alphabet[] = 'AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz'; // English
    $alphabet[] = 'АаБбВвГгДдЕеЁёЖжЗзИиЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЪъЫыЬьЭэЮюЯя';
    // add Russian

    /* CSS classes */
    $divSize = array('textBig', 'textModerate', 'textSmall');
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

        //echo '<a href=&apos;'.'javascript:font("'.$fontsFile[$i].'"'.")".'"><li>'.$fontsFile[$i].'</li></a>';
        //echo '<li id="'.$fontsFile[$i].'" onclick=font()>'.$fontsFile[$i].'</li>';
        // kurwa
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
    printFragment($alphabet[0]);
    printFragment($alphabet[2]);
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
    $pre = '<div class="tableLine"><table class="tblLine"><tbody><tr><td class="tableNumber">';
    $after = '</tr></tbody></table></div>';

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
}

function lines($number)
{
    for($i = 0; $i < $number; $i++)
    {
        echo '<br/>';
    }
}

