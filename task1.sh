echo Enter the full path
read path
cd $path
for i in {1..100} ;
	do
	mkdir folder$i
        chmod 700 folder$i
	cd folder$i
        touch folder$i.txt
	chmod 700 folder$i.txt
	cd ..
	done
