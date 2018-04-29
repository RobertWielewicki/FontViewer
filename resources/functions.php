<?php
    /* Path that contains font files to check*/
    $path = "fonts/";
    $fontExtensions = array("eot", "odttf", "otf", "ttf", "svg", "woff", "woff2");
    //$fontExtensionsAdditional = array("abf", "acfm", "afm", "amfm", "bdf", "cha", "chr", "compositefont", "dfont", "etx", "euf", "f3f", "fea", "ffil", "fnt", "fnt", "fon", "fot", "gdr", "gf", "glif", "gxf", "lwfn", "mcf", "mf", "mxf", "nftr", "pcf", "");
    
    /* Alphabets to display */
    $alphabet[] = 'AaĄąBbCcĆćDdEeĘęFfGgHhIiJjKkLlŁłMmNnŃńOoÓóPpRrSsŚśTtUuWwYyZzŹźŻż'; // Polish
    $alphabet[] = 'AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz'; // English

    // add Russian

    /* CSS classes */
    //$divSize = array('textSmall', 'textModerate', 'textBig');
    $divSize = array('textBig');
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
    global $divSize;
    for($i = 0; $i < count($divSize); $i++)
    {
        //echo "I: $i<br/>";
        for($j = 0; $j < count($alphabet); $j++)
        {
        //echo "J: $j<br/>";
            for($k = 0; $k < strlen($alphabet[$j]); $k++)
            {
                $tmp = '';
                
                if(isset($alphabet[$j][$k+1]))
                {
                    $tmp = $alphabet[$j][$k].$alphabet[$j][$k+1];
                    //echo $tmp. ' ';
                    echo htmlentities($tmp).' ';
                }
                
                //echo $alphabet[$j][$k].' ';
            }
            echo "<br/>";
        }
    }
    echo htmlentities($alphabet[0][2]);

   // echo $alphabet[0][2].$alphabet[0][3];
}

function lines($number)
{
    for($i = 0; $i < $number; $i++)
    {
        echo '<br/>';
    }
}

function test()
{
    global $alphabet;
    echo "$alphabet[0]";
}