# Instructions to use:

## Downloading base repo(Optional only if direct cloning doesn't work)

download zip release of code igniter on git page 4.3.1 and extract.
placed in htdocs in XAMPP (Just to make sure no dependencies are missing)
[Site link](https://github.com/codeigniter4/framework/releases/tag/v4.3.1)
[Direct zip file](https://github.com/codeigniter4/framework/archive/refs/tags/v4.3.1.zip)

## Clone Repository

git clone the repo into htdocs folder in XAMPP

## Getting site ready

Rename that folder in htdocs to _**ideas_platform**_ and `http://localhost/ideas_platform/public/` will be location of site

go to httpd.conf on XAMPP and in that find

- DocumentRoot `"<path to XAMPP installation>/XAMPP/htdocs"`
  and change it to
- DocumentRoot `"<path to XAMPP installation>/XAMPP/htdocs/ideas_platform/public"`

now the site is on `http://localhost/` as we've changed the base directory of XAMPP

## Getting Database ready
First open mySQL Admin page and create a database called _**ideas_platform**_

Run this url once (no output, can check in database if tables are created)
`http://localhost/index.php/migration`

3 default users:

1.  Relationship Manager (named:Tester Alpha)

    email : **tester1@email.com**
    password : **password**

2.  Idea Giver (named:Tester Beta)

    email : **tester2@email.com**
    password : **password2**

3.  Investor(named:Tester Gamma)

    email : **tester3@email.com**
    password : **password3**

//-----------extra info ---------------------------------------------------------------------------------

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
