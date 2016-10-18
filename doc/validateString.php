<?php
/*

Use PHP 5.x

Task: 
Develop a function which validates string looking like this "[{}]"
Every opening bracket should have corresponding closing bracket of same type
"[{}]" is a correct string, "[{]}" is malformed one.


Usage: <your host>/validateString.php?i={input string}

Example: <your host>/validateString.php?i={[{{}

*/


function validateString($inputString) {
    // Your code here
	return true;
}

$inputString = $_GET['i'];

echo "'".$inputString."' is ";
echo validateString($inputString)?"correct":"incorrect";