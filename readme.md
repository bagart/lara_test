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

code: [lara_test\app\Helpers\ValidateString.php](lara_test\app\Helpers\ValidateString.php)

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


