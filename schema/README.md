
Database backup notes

* Create file ~/.my.cnf
```
[mysqldump]
user = mysqluser
password = secret
```

* chmod 600 ~/.my.cnf
* crontab -e
```
0 0 * * * mysqldump -u mysqluser -h localhost -p database_name | gzip -9  > alldb.sql.gz > /dev/null 
```

* To extract the .gz file, use:
```
gumzip backup.gz
```

