<!DOCTYPE HTML>
<html lang="pl">
    <head>
        ﻿<?php
        $ver = "1.0.0 Copyright Robert Wielewicki 2018";
        /*
         * REV 1.0.0 25.04.2018r
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
        </div>
        <div class="center">
            <div class="header">
                <ul>
                    <a href="javascript:test()"><li>Skalowalne (vh - vw)</li></a>
                    <a href="javascript:test()"><li>Stałe (px)</li></a>
                    <a href="javascript:test()"><li>Inne</li></a>
                </ul>
            <div class="clear"></div>
            <span class="currentFont">Obecnie używana czcionka: <span id="crFt">NONE</span></span>
            <span class="browser">Browser: <span id="browser"></span></span>
            </div>
            <table>
                <tr>
                    <td class="ft" id="content">
                    <?php
                        printText();
                    ?>
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td>
                        <?php
                            test();
                        ?>
                    </td>
                </tr>
            </table>
            <?php lines(50);?>
        </div>
</html>