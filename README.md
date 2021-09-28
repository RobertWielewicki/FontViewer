# FontViewer

FontViewer is simple shell script that creates FONTS.html file with import syntax in css that allows you to view all fonts in directory (via recursive search, so no need to extract fonts first).

Linux only. I suppose you can get it to work on mac, but I dont guarantee it yet. I have no access to even an old mac to test.

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
- Add macOS support
