@ECHO OFF

set TIMESTAMP=%DATE:~10,4%%DATE:~4,2%%DATE:~7,2%

REM Export all databases into file C:\path\backup\databases.[year][month][day].sql
"C:\wamp\bin\mysql\mysql5.6.17\bin\mysqldump.exe" gamerstack --result-file="C:\wamp\www\gamerstack.%TIMESTAMP%.sql" --user=cm3rt --password=Laceration6?

REM Change working directory to the location of the DB dump file.
C:
CD C:\wamp\www\