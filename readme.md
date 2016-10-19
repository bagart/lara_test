# Build on
 - PHP5.6 (PHP7 ready)
 - Laravel PHP Framework
 - Composer
 - PHPUnit
 - LaraDock (docker-compose, support: linux, windows, mac)

#Install: 
_env/install.txt 
 
#RUN
 - install git, optional: php, composer
 - prepare environment [_env/install.md](_env/install.md) docker-compose or custom laravel environment
 - download this project: 
 
    ``git clone https://github.com/bagart/lara_test.git``
    
 - @todo fix permission for typical laravel cache path
 
 - run environment
 
    docker-compose:
    
    1st time or full upgrade: ``cmd/install/docker-install.sh``
    
    just run with auto-connect: ``cmd/up.sh``
 - 1st time: `` composer install && php artisan migrate``  
    update: `` composer update ``
 - check 
    at http://localhost
    phpunit ``composer test``

###Task original:
doc/*

#Task1: ValidateString

```
Use PHP 5.x
Develop a function which validates string looking like this "[{}]"
Every opening bracket should have corresponding closing bracket of same type
"[{}]" is a correct string, "[{]}" is malformed one.
Usage: <your host>/validateString.php?i={input string}
Example: <your host>/validateString.php?i={[{{}
<?
$inputString = $_GET['i'];
echo "'".$inputString."' is ";
echo validateString($inputString)?"correct":"incorrect";
```

code: [lara_test/app/Helpers/ValidateString.php](lara_test/app/Helpers/ValidateString.php)

full self-made just for fun

## Task test
brackets:
- correct [1[2{3}4]5](http://localhost/validateString.php?i=1[2{3}4]5)
- incorrect [{[}]](http://localhost/validateString.php?i={[}])

quotes:
- correct [1'2"3"4'5]( http://localhost/validateString.php?q=1'2"3"4'5)
- incorrect ['""](http://localhost/validateString.php?q='"")

both
- correct [i={{[]}}&q="''"]( http://localhost/validateString.php?i={{[]}}&q="''")
- incorrect [i=0{0{0[0}0]0}0&q=0'0"0'0"0]( http://localhost/validateString.php?i=0{0{0[0}0]0}0&q=0'0"0'0"0)





#Task2: CustomAuth

```
Need to implement complex multipoint authentication for web application.

Two tables should be used: ‘users’ and ‘as_users’.
Only users with ‘user_type_id’ = 6 from ‘users’ should be used. Users from this table gather role GSM Admin.
For users from ‘as_users’ roles described in ‘as_user_types’ table.

There are 3 entry points for different roles:
1.	/admin/login
2.	/sales/login
3.	/site/login/pid/”hash” (where hash is client specific hash from corresponding table, like - site/login/pid/RVM1G5621DGYHI)

Restrictions by roles:
1.	Only GSM Admins are allowed to login
2.	GSM Admins, Sales Users/Admins, Sales Users/Admins are allowed to login.
3.	All user roles are allowed, but Client Admins are allowed to login only using own client hash (as_clients->hash).
	Any Client Admin has relation to Client table by ‘clientId’ field.

Find in authDB.sql SQL dump for task.
Feel free to use any encrypt password mechanism you prefer. You don’t need to use current password values.

For implementation use PHP 5.x
No any framework restrictions.
```

