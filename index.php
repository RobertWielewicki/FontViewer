<!DOCTYPE HTML>
<html lang="pl">
    <head>
        ﻿<?php
        $ver = "1.0.3 Copyright Robert Wielewicki 2018";
        /*
         * REV 1.0.0 25.04.2018r
         * REV 1.0.1 30.04.2018r
         * REV 1.0.2 01.05.2018r
         * REV 1.0.3 01.05.2018r
         */
        require_once 'resources/functions.php';
        ?>
        <meta charset="utf-8"/>
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
        <div class="sidebar">
            <?php files(); ?>
            <ul class="options">
                <li onclick="makeBold()"><b>Bold</b> <div id="bold"></div></li>
                <li onclick="makeItalic()"><i>Italic</i> <div id="italic"></div></li>
                <li><span style="color:black;">C</span><span style="color:#CCC;">ol</span><span style="color:red;">ou</span><span style="color:brown;">r</span> <input type="text" onblur="changeColour()" id="colour" /></li>
                <li onclick="dynWidth()">Dynamic width <div id="dynWidth"></div></li>
            </ul>
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
                <div id="ifSVG"></div>
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