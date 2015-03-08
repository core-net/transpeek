#!/bin/sh

while read line; do
 
		wget -O - "http://apps.transpeek.com/move.php?q=$line&mark=1"

done < /dev/ttyACM0

