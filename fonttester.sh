#!/bin/sh

FONTDIR=${1:-"."}

[ ! -d "$FONTDIR" ] && echo "Directory \"$FONTDIR\" doesn't exist!" && exit 1
NUM=1
FONTS=$( find "$FONTDIR" -type f -name "*.ttf" -o -name "*.otf" -o -name "*.woff" )
FONTSNUM=$( echo "$FONTS" | wc -l )
[ "$FONTS" == '' ] && echo "No fonts found!" && exit
printf "<!DOCTYPE html><head><style>"  > FONTS.html
printf "body{max-width:1000px;background-color:#F0F7F4; margin-left:auto;margin-right:auto;padding:0 10px;}.fix{clear:left;} .fl{}"  >> FONTS.html
printf "h6 {margin: 20px 0 0 0;padding: 5px 0 0 15px;background-color:#32292f;color:#99e1d9;}"  >> FONTS.html
printf "div {background-color:#32292F; color:#F0F7F4; padding: 15px;} div:nth-of-type(2n) {background-color:#99e1d9;color:black;}"  >> FONTS.html


echo "$FONTS" | while read LINE
do
	awk -v x="$NUM" -v l="$LINE" 'BEGIN { print "@font-face{font-family:\"" l "\";src: url(\"" l "\");}" }' >> FONTS.html
done

echo "$FONTS" | while read LINE
do
	awk -v x="$NUM" -v l="$LINE" 'BEGIN { print "div:nth-of-type" "(" x "){font-family:\"" l "\";}"}' >> FONTS.html
	NUM=$( echo "1+$NUM" | bc )
done
printf "</style><body>"  >> FONTS.html
echo "$FONTS" | while read LINE
do
	awk -v x="$NUM" -v l="$LINE" 'BEGIN { print "<h6 class=\"fontname\">" l "</h6><div><p>Aa Bb Cc Dd Ee Ff Gg Hh Ii Jj Kk Ll Mm Nn Oo Pp Qq Rr Ss Tt Uu Vv Ww Xx Yy Zz Zażółć Gęślą Jaźń</p></div>"  }' >> FONTS.html
done
printf "</body></html>"  >> FONTS.html
$BROWSER --version 2>/dev/null 2>&1
[ $? -eq 0 ] && $BROWSER FONTS.html >/dev/null 2>&1 &
