# Build on
 - PHP5.6 (PHP7 ready)
 - Laravel PHP Framework
 - Composer
 - PHPUnit
 - LaraDock (docker-compose)

#Install: 
_env/install.txt 
 
#RUN
 1st install docker-compose
 
 build docker ``cmd/install/docker-install.sh``
 
 or just run already built ``cmd/up.sh``

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

