# FontViewer

Prefferably add this script to your PATH.

Usage:
```
fonttesterFull.sh
```
This will recursively search for every font file (.ttf .odt and .woff for now) and include them into ./FONTS.html
```
fonttesterFull.sh ~/fonts
```
This will recursively search for fonts in said directory, but FONTS.html will still output in current directory. 
__I suggest using Firefox for big fonts sets (like the one from Google https://github.com/google/fonts).__

Example output from fonttesterFull.sh
![fonttesterFull output](screen.png)

Example output from fonttester.sh
![fonttesterFull output](screen2.png)
fonttester.sh just outputs smaller blocks of text

# TODO
- Add example text into variables for easier editing for other languages
- Merge scripts into one with 0,1,2 etc. flag in cli
