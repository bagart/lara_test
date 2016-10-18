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
 - install docker-compose (detail in _env/install.txt) or custom laravel environment
 - download this project: ``git clone https://github.com/bagart/lara_test.git``
 - run environment
 
    docker-commpose:
    
    1st time or full upgrade: ``cmd/install/docker-install.sh``
    
    just run with auto-connect: ``cmd/up.sh``
 - `` composer update `` 1st time or if needed
 - check at http://localhost

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

