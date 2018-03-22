# HackNYU

# Install MySQL Workbench
1. Download https://dev.mysql.com/downloads/file/?id=474219

2. Create a new Connection if necessary;

3. 
# Install MySQL Using Native Packages
1. Download https://dev.mysql.com/downloads/mysql/

2. Save the temporary pw generated for root@localhost. MySQL will expire this pw after inital login and requires to create a new pw.

(3. Set PATH for mysql)
touch ~/.bash_profile
open ~/.bash_profile
export PATH=${PATH}:/usr/local/mysql/bin

4. Enable the launchd service (either use MySQL Preference Pane or manually load)

(5. Remove some ProgramArguments in plist)

# Initialize the Data Directory
1. Create a directory 'mysql-files' and grant ownership of the directory to the User and Group: _mysql
(User is required only for ownership purposes, not login purposes)

2. Start mysqld from the system root account using log in account: sudo bin/mysqld --initialize-insecure --user=_mysql

(Superuser account: 'root'@'localhost')

# Start the Server
1. Start the server: bin/mysqld_safe --user=_mysql &

# Test the Server
