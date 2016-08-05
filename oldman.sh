#!/bin/bash
echo "running"
echo $(ls /)
#FILES=$(man -w -s 1 -K "HISTORY")
FILES=$(man -w -s 1 -K "Copyright")
for i in $FILES; do
    echo item: $i
    echo $(zcat $i | grep "Copyright")
done
#echo $FILES

