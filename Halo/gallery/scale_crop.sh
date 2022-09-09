#!/bin/sh
# $0 is the script name, $1 id the first ARG, $2 is second...
#FILE_IN="$1"
#FILE_OUT="$2"
mogrify -resize 500x600 $1 && convert $1 -crop 290x245+110+75 $1
