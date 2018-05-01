window.onload = function(){
   browserDisplay(); 
   tablewidthInitial();
   dynWidth();
};

/* Compatibility list for browsers */
var Chrome = ['ttf', 'woff', 'woff2', 'otf'];
var Safari = ['ttf', 'svg', 'woff', 'woff2'];
var Firefox = ['ttf', 'woff', 'woff2', 'otf'];


var browser;
var path = "fonts/";
var wasSVGUsed = false;
var bold = false;
var italic = false;
var dynamicWidth = false;
var width;

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

function cont()
{
    
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
    document.getElementById("ifSVG").innerHTML = "";
}

function makeBold()
{
    if(bold === false)
    {
        document.getElementById("bold").classList.add("bold");
        document.getElementById("content").classList.add("Bold");
        bold = true;
    }
    else
    {
       document.getElementById("bold").classList.remove("bold");
       document.getElementById("content").classList.remove("Bold");
       bold = false;
    }

}

function makeItalic()
{
    if(italic === false)
    {
        document.getElementById("italic").classList.add("italic");
        document.getElementById("content").classList.add("Italic");
        italic = true;
    }
    else
    {
       document.getElementById("italic").classList.remove("italic");
       document.getElementById("content").classList.remove("Italic");
       italic = false;
    }   
}

function changeColour()
{
    document.getElementById("content").style.color = document.getElementById("colour").value;
    if(document.getElementById("content").style.color !== document.getElementById("colour").value && (document.getElementById("colour").value[0] !== '#'))
    {
        console.log("Probably wrong color...Try again maybe?");
    }
}

function dynWidth()
{
    if(dynamicWidth === false)
    {
       dynamicWidth = true;
       document.getElementById("dynWidth").classList.add("dynWidth");
       dynWidthTimer();
    }
    else
    {
       document.getElementById("dynWidth").classList.remove("dynWidth");
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
        }
        setTimeout(dynWidthTimer, 100); 
    }
}

function tablewidthInitial()
{
   width = document.getElementById("tableLine").clientWidth;
   //document.getElementById("tableLine").style.width = (window.innerWidth*3/4) - 40+"px"; 
   document.getElementById("tableLine").clientWidth = (document.documentElement.clientHeight*3/4) - 40+"px"; //For IE compatibility...
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
    if(browser === 'Mozilla Firefox')
    {
        extensions = Firefox.slice();
    }
    if(browser === 'Safari')
    {
        extensions = Safari.slice();
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