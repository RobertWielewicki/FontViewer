# FontViewer

Usage:
Prefferably add this script to your PATH.
fonttesterFull.sh
This will recursively search for every font file (.ttf .odt and .woff for now) and include them into ./FONTS.html
fonttesterFull.sh ~/fonts
This will recursively search for fonts in said directory, but FONTS.html will still output in current directory. 
I suggest using Firefox for big fonts sets (like the one from Google https://github.com/google/fonts).

fonttester.sh outputs smaller blocks of text

#TODO
Add included text into variables for easier editing
Merge scripts into one with 0,1,2 etc. flag in cli
