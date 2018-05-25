<?php

require_once('../functions.php');

$validFunctions = array("abcAddUser");

$functionName = $_POST['function'];
$arguments = $_POST['arguments'];

if(in_array($functionName,$validFunctions))
{
    $functionName($arguments);
    echo "Success";
}else{
    echo "You don't have permission to call that function!";
    exit();
}


?>