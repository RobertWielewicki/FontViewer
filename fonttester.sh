#!/bin/sh
#Author: Robert Wielewicki
#2021
#License: GPL2
FONTDIR=${1:-"."}
[ ! -d "$FONTDIR" ] && echo "Directory \"$FONTDIR\" doesn't exist!" && exit 1

examplechoice(){
[ $1 -eq 0 ] && EXAMPLE='<p>Aa Bb Cc Dd Ee Ff Gg Hh Ii Jj Kk Ll Mm Nn Oo Pp Qq Rr Ss Tt Uu Vv Ww Xx Yy Zz</p><p>Aa Ąą Bb Cc Ćć Dd Ee Ęę Ff Gg Hh Ii Jj Kk Ll Łł Mm Nn Ńń Oo Óó Pp Qq Rr Ss Śś Tt Uu Vv Ww Xx Yy Zz Źź Żż</p><p>Аа Бб Вв Гг Дд Ее Ёё Жж Зз Ии Йй Кк Лл Мм Нн Оо Пп Рр Сс Тт Уу Фф Хх Цц Чч Шш Щщ Ъъ Ыы Ьь Ээ Юю Яя</p>' && return
[ $1 -eq 1 ] && EXAMPLE='<h1>Aa Bb Cc Dd Ee Ff Gg Hh Ii Jj Kk Ll Mm Nn Oo Pp Qq Rr Ss Tt Uu Vv Ww Xx Yy Zz</h1><h2>Aa Bb Cc Dd Ee Ff Gg Hh Ii Jj Kk Ll Mm Nn Oo Pp Qq Rr Ss Tt Uu Vv Ww Xx Yy Zz</h2><h3>Aa Bb Cc Dd Ee Ff Gg Hh Ii Jj Kk Ll Mm Nn Oo Pp Qq Rr Ss Tt Uu Vv Ww Xx Yy Zz</h3><h4>Aa Bb Cc Dd Ee Ff Gg Hh Ii Jj Kk Ll Mm Nn Oo Pp Qq Rr Ss Tt Uu Vv Ww Xx Yy Zz</h4><p>Aa Bb Cc Dd Ee Ff Gg Hh Ii Jj Kk Ll Mm Nn Oo Pp Qq Rr Ss Tt Uu Vv Ww Xx Yy Zz</p>' && return
[ $1 -eq 2 ] && EXAMPLE='<p>Aa Bb Cc Dd Ee Ff Gg Hh Ii Jj Kk Ll Mm Nn Oo Pp Qq Rr Ss Tt Uu Vv Ww Xx Yy Zz</p>' && return
[ $1 -eq 3 ] && EXAMPLE='<h1>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consequat diam tincidunt dui condimentum vestibulum.</h1><h4>Aa Bb Cc Dd Ee Ff Gg Hh Ii Jj Kk Ll Mm Nn Oo Pp Qq Rr Ss Tt Uu Vv Ww Xx Yy Zz</h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed mauris viverra, mollis diam et, vulputate felis. Aliquam lorem nisi, lobortis in eleifend et, commodo vitae neque. Sed convallis ornare augue, at maximus sem tempus aliquet. Interdum et malesuada fames ac ante ipsum primis in faucibus. Morbi rutrum, urna eu tempor pharetra, erat massa suscipit quam, nec semper ex ex quis lorem. Sed aliquet posuere metus, eu blandit odio tristique a. Etiam luctus blandit ipsum vel rutrum. Sed tempor vitae tellus in interdum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras turpis tortor, euismod non commodo vel, tincidunt id velit.</p>' && return
[ $1 -eq 4 ] && EXAMPLE='<h1>Aa Ąą Bb Cc Ćć Dd Ee Ęę Ff Gg Hh Ii Jj Kk Ll Łł Mm Nn Ńń Oo Óó Pp Qq Rr Ss Śś Tt Uu Vv Ww Xx Yy Zz Źź Żż</h1><h2>Aa Ąą Bb Cc Ćć Dd Ee Ęę Ff Gg Hh Ii Jj Kk Ll Łł Mm Nn Ńń Oo Óó Pp Qq Rr Ss Śś Tt Uu Vv Ww Xx Yy Zz Źź Żż</h2><h3>Aa Ąą Bb Cc Ćć Dd Ee Ęę Ff Gg Hh Ii Jj Kk Ll Łł Mm Nn Ńń Oo Óó Pp Qq Rr Ss Śś Tt Uu Vv Ww Xx Yy Zz Źź Żż</h3><h4>Aa Ąą Bb Cc Ćć Dd Ee Ęę Ff Gg Hh Ii Jj Kk Ll Łł Mm Nn Ńń Oo Óó Pp Qq Rr Ss Śś Tt Uu Vv Ww Xx Yy Zz Źź Żż</h4><p>Aa Ąą Bb Cc Ćć Dd Ee Ęę Ff Gg Hh Ii Jj Kk Ll Łł Mm Nn Ńń Oo Óó Pp Qq Rr Ss Śś Tt Uu Vv Ww Xx Yy Zz Źź Żż</p>' && return
[ $1 -eq 5 ] && EXAMPLE='<p>Aa Ąą Bb Cc Ćć Dd Ee Ęę Ff Gg Hh Ii Jj Kk Ll Łł Mm Nn Ńń Oo Óó Pp Qq Rr Ss Śś Tt Uu Vv Ww Xx Yy Zz Źź Żż</p>' && return
[ $1 -eq 6 ] && EXAMPLE='<h1>Litwo! Ojczyzno moja! ty jesteś jak zdrowie. Ile cię trzeba cenić</h1><h4>Aa Ąą Bb Cc Ćć Dd Ee Ęę Ff Gg Hh Ii Jj Kk Ll Łł Mm Nn Ńń Oo Óó Pp Qq Rr Ss Śś Tt Uu Vv Ww Xx Yy Zz Źź Żż</h4><h4>Litwo! Ojczyzno moja! Ty jesteś jak zdrowie. Nazywał się nie zarzuci, bym uchybił gospodarskiej, ważnej powinności udał się tłocz i niezgrabny. Zatem się nagłe, jej nie szpieg, a na urząd wielkie polowanie. I włos u wniścia alkowy i Obuchowicz Piotrowski, Obolewski, Rożycki, Janowicz, Mirzejewscy, Brochocki i świadki. I wnet sierpy gromadnie dzwoniąc we brzozowym gaju stał za stołem siadał i posiedzenie nasze na dzień postrzegam, jak żaczek przed nim trzy osoby na kształt deski.</h4>' && return
[ $1 -eq 7 ] && EXAMPLE='<h1>Аа Бб Вв Гг Дд Ее Ёё Жж Зз Ии Йй Кк Лл Мм Нн Оо Пп Рр Сс Тт Уу Фф Хх Цц Чч Шш Щщ Ъъ Ыы Ьь Ээ Юю Яя</h1><h2>Аа Бб Вв Гг Дд Ее Ёё Жж Зз Ии Йй Кк Лл Мм Нн Оо Пп Рр Сс Тт Уу Фф Хх Цц Чч Шш Щщ Ъъ Ыы Ьь Ээ Юю Яя</h2><h3>Аа Бб Вв Гг Дд Ее Ёё Жж Зз Ии Йй Кк Лл Мм Нн Оо Пп Рр Сс Тт Уу Фф Хх Цц Чч Шш Щщ Ъъ Ыы Ьь Ээ Юю Яя</h3><h4>Аа Бб Вв Гг Дд Ее Ёё Жж Зз Ии Йй Кк Лл Мм Нн Оо Пп Рр Сс Тт Уу Фф Хх Цц Чч Шш Щщ Ъъ Ыы Ьь Ээ Юю Яя</h4><p>Аа Бб Вв Гг Дд Ее Ёё Жж Зз Ии Йй Кк Лл Мм Нн Оо Пп Рр Сс Тт Уу Фф Хх Цц Чч Шш Щщ Ъъ Ыы Ьь Ээ Юю Яя</p>' && return
[ $1 -eq 8 ] && EXAMPLE='<p>Аа Бб Вв Гг Дд Ее Ёё Жж Зз Ии Йй Кк Лл Мм Нн Оо Пп Рр Сс Тт Уу Фф Хх Цц Чч Шш Щщ Ъъ Ыы Ьь Ээ Юю Яя</p>' && return
[ $1 -eq 9 ] && EXAMPLE='<h1>Алексей Федорович Карамазов был заплакать и могло совершиться и не в теперешнее поколение</h1><h4>Аа Бб Вв Гг Дд Ее Ёё Жж Зз Ии Йй Кк Лл Мм Нн Оо Пп Рр Сс Тт Уу Фф Хх Цц Чч Шш Щщ Ъъ Ыы Ьь Ээ Юю Яя</h4><h4>Алексей Федорович Карамазов был заплакать и могло совершиться и не в теперешнее поколение, но тотчас показался из довольно часто, однако, встречающийся, именно несогласия по тысяче, издержал на богомолье сходить. Извозчик он, допуская к этой болезни, встречаемой чаще напивался пьян, и начал почти весел в келье еще же он вдруг, дай, думаю, что не помнил, и годом смерти второй раз. Второй брак этот хранитель божьей правды ни мистицизму; а уж не бедные, сами сейчас изволили упомянуть, что его послушание</h4>' && return
echo "Incorrect example set!"
exit 1
}
EXAMPLENUM=${2:-"1"}
examplechoice "$EXAMPLENUM"

NUM=1
FONTS=$( find "$FONTDIR" -type f -name "*.ttf" -o -name "*.otf" -o -name "*.woff" )
FONTSNUM=$( echo "$FONTS" | wc -l )
[ "$FONTS" == '' ] && echo "No fonts found!" &&  exit
printf '<!DOCTYPE html><head><meta charset="UTF-8"><style>'  > FONTS.html
printf "body{max-width:1000px;background-color:#F0F7F4; margin-left:auto;margin-right:auto;padding:0 10px;}"  >> FONTS.html
printf "h6 {margin: 20px 0 0 0;padding: 5px 0 0 15px;background-color:#32292f;color:#99e1d9;}"  >> FONTS.html
printf "div {background-color:#32292F; color:#F0F7F4; padding: 15px;max-height:500px;overflow:clip;} div:nth-of-type(2n) {background-color:#99e1d9;color:black;}"  >> FONTS.html

echo "$FONTS" | while read LINE
do
	awk -v x="$NUM" -v l="$LINE" 'BEGIN { print "@font-face{font-family:\"" l "\";src: url(\"" l "\");}div:nth-of-type(" x "){font-family:\"" l "\";}" }' >> FONTS.html
	NUM=$( echo "1+$NUM" | bc )
done

printf "</style><body>"  >> FONTS.html

echo "$FONTS" | while read LINE
do
	awk -v font="$LINE" -v example="$EXAMPLE" 'BEGIN { print "<h6 class=\"fontname\">" font "</h6><div>" example "</div>" }' >> FONTS.html
done

printf "</body></html>"  >> FONTS.html
$BROWSER --version 2>/dev/null 2>&1
[ $? -eq 0 ] && $BROWSER FONTS.html >/dev/null 2>&1 &

