#!/bin/bash
echo Enter the full path
read path
cd $path
sudo mkdir folder{1..100}
sudo touch folder{1..100}.txt
ls -1 | grep -v ..txt|xargs -I {} sudo mv {}.txt {}
cd ..
sudo chmod -R 700 .
sudo -k
