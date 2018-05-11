window.onload = function(){
   browserDisplay(); 
   tablewidthInitial();
   dynWidth();
};

/* Compatibility list for browsers */
var Chrome = ['ttf', 'woff', 'woff2', 'otf'];
var Safari = ['ttf', 'svg', 'woff', 'woff2'];
var Firefox = ['ttf', 'woff', 'woff2', 'otf'];
var IE9 = ['ttf', 'eot', 'woff', 'otf'];


var browser;
var path = "fonts/";
var wasSVGUsed = false;
var wasOTFUsed = false;
var bold = false;
var italic = false;
var dynamicWidth = false;
var width;
var IEversion;

function font(font)
{
   //alert(getWithoutExtension(font));
   var fontName = getWithoutExtension(font);
   var script = '@font-face {font-family: \''+fontName+'\';';
   var ext = getExtension(font);
   if(ext === 'eot')
   {
       script = script + 'src: url(\'' + path + font + '?#iefix\') format(\'embedded-opentype\');}';
   } else if(ext === 'ttf')
   {
       script = script + 'src: url(\'' + path + font + '\') format(\'truetype\');}';
   } else if(ext === 'woff')
   {
       script = script + 'src: url(\'' + path + font + '\') format(\'woff\');}';
   } else if(ext === 'svg')
   {
       script = script + 'src: url(\'' + path + font + '\') format(\'svg\');}';
       if(wasSVGUsed === false)
       {
           wasSVGUsed = true;
           document.getElementById("ifSVG").innerHTML = 'If you can see empty spaces in SVG font it basically means that font doesn\'t support specified language <a href="javascript:hideSVG()"><sup>CLOSE</sup></a>';
           setTimeout("hideSVG()", 5000);
       }
   } else if(ext === 'woff2')
   {
       script = script + 'src: url(\'' + path + font + '\') format(\'woff2\');}';
   } else if(ext === 'otf')
   {
       if(browser === 'Internet Explorer')
       {
           if(wasOTFUsed === false)
           {
                wasOTFUsed = true;
                document.getElementById("ifOTFinIE").innerHTML = 'If you can\'t see font preview, you should enable otf support first! <a href="javascript:hideOTF()"><sup>CLOSE</sup></a>';
                setTimeout("hideOTF()", 5000);               
           }

       }
       script = script + 'src: url(\'' + path + font + '\') format(\'opentype\');}';
   }
   script = script + '.ft{font-family:\'' + fontName + '\'!important;}';

   if(getBrowser() !== 'Internet Explorer')
   {
       document.getElementById("scriptjs").innerHTML = script;
   } else
   {
       script = '<style>' + script + '</style>';
       document.getElementById("styleIE").innerHTML = script;
   }
   
   if(compatibleFont(font) === true)
   {
        document.getElementById("crFt").innerHTML = font;
        document.getElementById("fontUsed").innerHTML = font;
   }
   else
   {
       document.getElementById("crFt").innerHTML = fontName+".<span style=\"color:red;\">"+ext+"</span>";
       document.getElementById("fontUsed").innerHTML = fontName+".<span style=\"color:red;\">"+ext+"</span>";
   }

}

function getExtension(file)
{
    var file = file.split("").reverse();
    for (var i = 0; i < 6; i++)
    {
        if(i >= file.length)
        {
            return '';
        }
        if(file[i] === ".")
        {
            file = file.join("").substr(0, i);
            return file.split("").reverse().join("");
        }
    }
    return '';
}

function getWithoutExtension(file)
{
    var tmpFile = file.split("");
    var file = file.split("").reverse();
    for (var i = 0; i < 6; i++)
    {
        if(i >= file.length)
        {
            return '';
        }
        if(file[i] === '.')
        {
            file = file.reverse().join("");
            return file.substr(0, file.length-i-1);
        }
    }
    return '';
}

function getBrowser()
{
    // Opera 8.0+
    var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
    // Firefox 1.0+
    var isFirefox = typeof InstallTrigger !== 'undefined';
    // Safari 3.0+ "[object HTMLElementConstructor]" 
    var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || (typeof safari !== 'undefined' && safari.pushNotification));
    // Internet Explorer 6-11
    var isIE = /*@cc_on!@*/false || !!document.documentMode;
    // Edge 20+
    var isEdge = !isIE && !!window.StyleMedia;
    // Chrome 1+
    var isChrome = !!window.chrome && !!window.chrome.webstore;
    // Blink engine detection
    var isBlink = (isChrome || isOpera) && !!window.CSS;
    if(isOpera === true)
    {
        browser = "Opera";
    }else if(isFirefox === true)
    {
        browser = "Mozilla Firefox";
    }else if(isIE === true)
    {
        browser = "Internet Explorer";
        var IEversion = (function(){

    var undef,
        v = 3,
        div = document.createElement('div'),
        all = div.getElementsByTagName('i');

    while (
        div.innerHTML = '<!--[if gt IE ' + (++v) + ']><i></i><![endif]-->',
        all[0]
    );

    return v > 4 ? v : undef;

}());
        showUnsupported(IEversion);
    }else if(isEdge === true)
    {
        browser = "Microsoft Edge";
    }else if(isChrome === true)
    {
        browser = "Google Chrome";
    }else if(isBlink === true)
    {
        browser = "Blink Engine";
    }else
    {
        browser = "Unknown Browser";
    }
    return browser;
}

function browserDisplay()
{
    document.getElementById("browser").innerHTML = getBrowser();
}

function test()
{
    
}

function hideSVG()
{
    document.getElementById("ifSVG").innerHTML = '';
}

function hideOTF()
{
   document.getElementById("ifOTFinIE").innerHTML = '';
}

function makeBold()
{
    if(bold === false)
    {
        document.getElementById("bold").className += "bold";
        document.getElementById("content").className += " Bold";
        bold = true;
    }
    else
    {
        document.getElementById("bold").className = document.getElementById("bold").className.replace( /(?:^|\s)bold(?!\S)/g , '' );
        document.getElementById("content").className = document.getElementById("content").className.replace( /(?:^|\s)Bold(?!\S)/g , '' );
        bold = false;
    }

}

function makeItalic()
{
    if(italic === false)
    {
        document.getElementById("italic").className += "italic";
        document.getElementById("content").className += " Italic";
        italic = true;
    }
    else
    {
        document.getElementById("italic").className = document.getElementById("italic").className.replace( /(?:^|\s)italic(?!\S)/g , '' );
        document.getElementById("content").className = document.getElementById("content").className.replace( /(?:^|\s)Italic(?!\S)/g , '' );
        italic = false;
    }   
}

function changeColour()
{

    /* Supported colors right now are all of text ones like 'red' etc. and HEX ones like #999333 and #333 */
    var flag = false; // Flag saying if the color is correct or not.
    var colourFlag = false;
    var color = document.getElementById("colour").value.toLowerCase();
    if(color === '')
    {
        document.getElementById("content").style.color = "black";  
    }
    var CSS_COLOR_NAMES = ["AliceBlue","AntiqueWhite","Aqua","Aquamarine","Azure","Beige","Bisque","Black","BlanchedAlmond","Blue","BlueViolet","Brown","BurlyWood","CadetBlue","Chartreuse","Chocolate","Coral","CornflowerBlue","Cornsilk","Crimson","Cyan","DarkBlue","DarkCyan","DarkGoldenRod","DarkGray","DarkGrey","DarkGreen","DarkKhaki","DarkMagenta","DarkOliveGreen","Darkorange","DarkOrchid","DarkRed","DarkSalmon","DarkSeaGreen","DarkSlateBlue","DarkSlateGray","DarkSlateGrey","DarkTurquoise","DarkViolet","DeepPink","DeepSkyBlue","DimGray","DimGrey","DodgerBlue","FireBrick","FloralWhite","ForestGreen","Fuchsia","Gainsboro","GhostWhite","Gold","GoldenRod","Gray","Grey","Green","GreenYellow","HoneyDew","HotPink","IndianRed","Indigo","Ivory","Khaki","Lavender","LavenderBlush","LawnGreen","LemonChiffon","LightBlue","LightCoral","LightCyan","LightGoldenRodYellow","LightGray","LightGrey","LightGreen","LightPink","LightSalmon","LightSeaGreen","LightSkyBlue","LightSlateGray","LightSlateGrey","LightSteelBlue","LightYellow","Lime","LimeGreen","Linen","Magenta","Maroon","MediumAquaMarine","MediumBlue","MediumOrchid","MediumPurple","MediumSeaGreen","MediumSlateBlue","MediumSpringGreen","MediumTurquoise","MediumVioletRed","MidnightBlue","MintCream","MistyRose","Moccasin","NavajoWhite","Navy","OldLace","Olive","OliveDrab","Orange","OrangeRed","Orchid","PaleGoldenRod","PaleGreen","PaleTurquoise","PaleVioletRed","PapayaWhip","PeachPuff","Peru","Pink","Plum","PowderBlue","Purple","Red","RosyBrown","RoyalBlue","SaddleBrown","Salmon","SandyBrown","SeaGreen","SeaShell","Sienna","Silver","SkyBlue","SlateBlue","SlateGray","SlateGrey","Snow","SpringGreen","SteelBlue","Tan","Teal","Thistle","Tomato","Turquoise","Violet","Wheat","White","WhiteSmoke","Yellow","YellowGreen"];
    // Huge thanks for bobspace on GitHub for this array!
    for(i = 0; i < CSS_COLOR_NAMES.length; i++)
    {
        if(color === CSS_COLOR_NAMES[i].toLowerCase())
        {
            flag = true;
            colourFlag = true;
        }
    }
    if(flag !== true)
    {
        if(color[0] === '#')
        {
            if(color.length === 7 || color.length === 4)
            {
                if(isHexNumber(color) === true)
                {
                    document.getElementById("content").style.color = color;
                    colourFlag = true;
                }
            }            
        }

    }
    else
    {
        document.getElementById("content").style.color = color;
    }
    if(colourFlag === false)
    {
        console.log("Wrong color... Typo?");
        document.getElementById("colour").value = '';
        document.getElementById("content").style.color = "black";
    }
    
}

function dynWidth()
{
    if(dynamicWidth === false)
    {
       dynamicWidth = true;
       document.getElementById("dynWidth").className += "dynWidth";
       dynWidthTimer();
    }
    else
    {
       document.getElementById("dynWidth").className = document.getElementById("dynWidth").className.replace( /(?:^|\s)dynWidth(?!\S)/g , '' );
       dynamicWidth = false;  
    }
}

function dynWidthTimer()
{
    if(dynamicWidth === true)
    {
        var widthTmp = document.getElementById("tableLine").style.width;
        if (widthTmp !== width)
        {
            width = (window.innerWidth*3/4) - 40;
            document.getElementById("tableLine").style.width = width+"px";
            document.getElementById("fontUsed").style.width = width+"px";
        }
        setTimeout(dynWidthTimer, 100); 
    }
}

function tablewidthInitial()
{
   width = document.getElementById("tableLine").clientWidth;
   document.getElementById("tableLine").clientWidth = (document.documentElement.clientWidth*3/4) - 40+'px'; //For IE compatibility...
}

function compatibleFont(font)
{
    var ext = getExtension(font);
    var extensions;
    var flag = false;
    if(browser === 'Google Chrome' || browser === 'Opera' || browser === 'Blink Engine')
    {
        extensions = Chrome.slice();
    }
    else if(browser === 'Mozilla Firefox')
    {
        extensions = Firefox.slice();
    }
    else if(browser === 'Safari')
    {
        extensions = Safari.slice();
    }
    else if(browser === 'Internet Explorer')
    {
        extensions = IE9.slice();
    }
    else
    {
        console.log("Returned true, but only for non-panic purpose. Unknown browser.");
        return true;
    }
    for(i = 0; i < extensions.length; i++)
    {
       if(ext === extensions[i])
       {
           flag = true;
       }
    }
    return flag;
}

function isHexNumber(number)
{
    if(number[0] === '#')
    {
        number = number.substring(1);
    }
    number = number.toLowerCase();
    /* Don't yell at me, this function treats hex number as string, because it is means to be used for CSS color hex values from form */
    var set = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f'];
    var flag = false;
    number = number.split("");
    var numberLength = number.length;
    number = number.join("");
    for(i = 0; i < numberLength; i++)
    {
        flag = false;
        for(j = 0; j < set.length; j++)
        {
            if(number[i] === set[j])
            {
                flag = true;
            }
        }
        if (flag === false)
        {
            return false;
        }
    }
    return true;
}

function showUnsupported(IEv)
{

    if(IEv <= 8)
    {
        
        document.getElementById("unsupportedBrowser").className = "unsupported";
    }
}

function colourClear()
{
    document.getElementById("colour").value = "";
}