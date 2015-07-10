I first configured ELK on my laptop and then wrote a .conf file which parses 
the log file into querable way. It was done by logstsah. Since it was in apache
log file type ,I used Combined apache log from grok filter to parse that. On executing
the .conf file , the terminal went stale. So I opened another terminal and checked 
it using curl at port 9020. The data was parsed. Now i opened kibana in my browser and
used the parsed data to produce grahs which essentially did the task.
