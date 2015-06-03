#!usr/bin/env python
#This Script creates 2 new scripts and sets up a cron job
#Script1-->To CREATE a database,table & a column
#Script2-->TO insert the curren time into the database
#The Program is done as a root user.
import os
import sys
from crontab import CronTab


p1 = open('%s/script1.py'%sys.argv[1],'a+')
p1.write("#!usr/bin/env python")
p1.write("\nimport MySQLdb")
p1.write("\ndb=MySQLdb.connect(host='localhost',user='root',passwd='*****')")
p1.write("\ncursor=db.cursor()")
p1.write("\ncursor.execute('CREATE DATABASE data')")
p1.write("\ndb=MySQLdb.connect(host='localhost',user='root',passwd='*****',db='data')")
p1.write("\ncursor=db.cursor()")
p1.write("\ncursor.execute('CREATE TABLE log(TimeSheet VARCHAR(40))')")
p1.write("\ndb.close()")
p1.close()

os.system('python %s/script1.py'%sys.argv[1])

p2 = open('%s/script2.py'%sys.argv[1],'a+')
p2.write("#!usr/bin/env python")
p2.write("\nimport time")
p2.write("\nimport MySQLdb")
p2.write("\ndb=MySQLdb.connect(host='localhost',user='root',passwd='*****',db='data')")
p2.write("\ncursor=db.cursor()")
p2.write("\nclock=time.ctime()")
p2.write("\ncursor.execute('''INSERT INTO log(TimeSheet) VALUES ('%s')'''%(clock))")
p2.write("\ndb.commit()")
p2.write("\ndb.close()")
p2.close()

cron = CronTab(user=True)
job  = cron.new('/usr/bin/python %s/script2.py'%sys.argv[1])
job.minute.every(10)
cron.write()
