<!DOCTYPE HTML>
<html lang="pl">
    <head>
        ﻿<?php
        $ver = "1.0.4 Copyright Robert Wielewicki 2018";
        /*
         * REV 1.0.0 25.04.2018r
         * REV 1.0.1 30.04.2018r
         * REV 1.0.2 01.05.2018r
         * REV 1.0.3 01.05.2018r
         * REV 1.0.4 11.05.2018r
         */
        require_once 'resources/functions.php';
        ?>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=0.7">
        <link rel="stylesheet" href="resources/styles.css"/>
        <link rel="stylesheet" href="resources/html5.css"/>
        <script src="resources/scripts.js"></script>
        <script src="resources/html5.js"></script>
        <title>Font Testing Script <?php echo "$ver"; ?></title>
        <style id="scriptjs"></style>
        <table style="display:none;">
            <caption id="styleIE" style="display:none;"></caption>
        </table>

    
    </head>

    <div id="unsupportedBrowser">
        <div class="nosupport">
            <p>Unfortunately your browser is unsupported. Please use at least IE9 or higher on any other modern browser.</p>
            <div class="images">
                <a href="https://www.google.com/chrome/index.html" target="_blank">
                    <div class="imgBrowser"><img src="resources/chrome.gif" alt="Google Chrome" />
                        <p>Google Chrome</p>
                    </div>
                </a>
                <a href="https://www.mozilla.org" target="_blank">
                    <div class="imgBrowser"><img src="resources/firefox.gif" alt="Mozilla Firefox" />
                        <p>Mozilla Firefox</p>
                    </div>
                </a>
                <a href="https://www.opera.com" target="_blank">
                    <div class="imgBrowser"><img src="resources/opera.gif" alt="Opera" />
                        <p>Opera</p>
                    </div>
                </a>
                <a href="https://support.microsoft.com/en-us/help/2718695/internet-explorer-10-is-now-available" target="_blank">
                    <div class="imgBrowser"><img src="resources/edge.gif" alt="Internet Explorer 10" />
                        <p>Internet Explorer/EDGE</p>
                    </div>
                </a>
                <div style="clear:both;content: '';"></div>
            </div>
        </div>
    </div>
        <div class="sidebar">
            <?php files(); ?>
            <div class="clear"></div>
            <ul class="options">
                <li onclick="makeBold()"><b>Bold</b> <div id="bold"></div></li>
                <li onclick="makeItalic()"><i>Italic</i> <div id="italic"></div></li>
                <li><span style="color:black;">C</span><span style="color:#CCC;">ol</span><span style="color:red;">ou</span><span style="color:brown;">r</span> <input type="text" onclick="colourClear()" onblur="changeColour()" id="colour" /></li>
                <li onclick="dynWidth()">Dynamic width <div id="dynWidth"></div></li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="center">
            <div class="header">
                <ul>
                    <!--
                    These links does nothing for now
                    !-->
                    <a href="javascript:test()"><li>Skalowalne (vh - vw)</li></a>
                    <a href="javascript:test()"><li>Stałe (px)</li></a>
                    <a href="javascript:test()"><li>Inne</li></a>
                    <div class="clear"></div>
                </ul>
                <span class="information">Obecnie używana czcionka: <span id="crFt">NONE</span></span>
                <span class="information"> Browser: <span id="browser"></span></span>
                <div class="clear"></div>
            </div>
            <div class="contentBox">
                <div id="ifSVG" class="info"></div>
                <div id="ifOTFinIE" class="info"></div>
                <table>
                    <tr>
                        <td class="ft" id="content">
                        <?php
                            printText();
                        ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="footer">
                <h2>Compatible with:</h2>
                <p>IE9+ [EOT WOFF TTF/OTF] <sub><i>Having some issues with IE9, but nothing impossible to solve. Please wait for updates.</i></sub></p>
                <p>Google Chrome [TTF/OTF WOFF WOFF2]</p>
                <p>Mozilla Firefox [TTF/OTF WOFF WOFF2]</p>
                <p>Safari <sub><i>Tested on Windows version from 2012, it has to work on current ones</i></sub></p>
            </div>
        </div>
</html>