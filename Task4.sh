#!/bin/bash
#This Script manages the log file with standard output
path="/home/venkkatesh/Desktop/access.txt"
echo "No of occurences : Unique IP"
cat $path |cut -d ' ' -f 1|grep -v '^$'|sed 's/^S//'|sort|uniq -c
sleep 2
echo "No of unique IP's:"
cat access.txt |cut -d ' ' -f 1|grep -v '^$'|sed 's/^S//'|sort|uniq -c|wc -l
sleep 2
echo "No of occurences : Unique Status Code"
cat $path |grep -o '[ ][0-9][0-9][0-9][ ]'|sort|uniq -c


