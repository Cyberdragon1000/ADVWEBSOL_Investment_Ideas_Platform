# Instructions to use:

### Prereq:
Php,xampp and git installed   
In php.ini in xampp config uncomment `extension=intl` (Just remove the `;` before it)  
In git config username and email id 
(optional)VS code with github extension for easier control   

## Setup

1.Open terminal in `\XAMPP\htdocs` folder and run the below command   
>   `git clone https://github.com/Cyberdragon1000/ADVWEBSOL_Investment_Ideas_Platform.git ideas_platform`   

2.Go to httpd.conf on XAMPP Config and in that find and change   
>   `DocumentRoot "<path to XAMPP installation>/XAMPP/htdocs"`   
>   :arrow_down:   
>   `DocumentRoot "<path to XAMPP installation>/XAMPP/htdocs`[**/ideas_platform/public**](## "You're adding this text")"   

3.Start apache server and mysql database and check if site is on `http://localhost/` as we've changed the base directory of XAMPP   

4.Open the database Admin page(phpmyadmin) and create a new database called _**ideas_platform**_   

5.Run this url once (no output but you can check in database if tables are created)   
>   `http://localhost/index.php/migration`

This creates 3 default users:

1.  Relationship Manager (named:Tester Alpha)
    - email : **tester1@<span/>email.com**
    - password : **password**
2.  Idea Giver (named:Tester Beta)
    - email : **tester2@<span/>email.com**
    - password : **password2**
3.  Investor(named:Tester Gamma)
    - email : **tester3@<span/>email.com**
    - password : **password3**
---
---
---
//-----------extra info dumped ---------------------------------------------------------------------------------

database name:ideas_platform
username 'root' and no password

chanes in .env file(if file is env change name to .env)
uncomment app.baseURL and set it as:
app.baseURL = 'http://localhost/'
uncomment CI_ENVIRONMENT and set it to
CI_ENVIRONMENT = development
uncomment first 5 lines of database section and set it to(password is blank):
database.default.hostname = localhost
database.default.database = ideas_platform
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi

[comment ## downloading base repo(optional only if direct cloning doesn't work) download zip release of code igniter on git page 4.3.1 and extract. placed in htdocs in xampp (just to make sure no dependencies are missing) site link(https://github.com/codeigniter4/framework/releases/tag/v4.3.1) direct zip file(https://github.com/codeigniter4/framework/archive/refs/tags/v4.3.1.zip) `http://localhost/ideas_platform/public/` will be location of site ]: #
