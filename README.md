# HackNYU

#Install MySQL Using Native Packages
1. Download https://dev.mysql.com/downloads/mysql/

2. Save the temporary pw generated for root@localhost. MySQL will expire this pw after inital login and requires to create a new pw.

3. 

2. Create a specific 'mysql' user to own the MySQL directory and data

#set PATH for mysql
touch ~/.bash_profile
open ~/.bash_profile
export PATH=${PATH}:/usr/local/mysql/bin
