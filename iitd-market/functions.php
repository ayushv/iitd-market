<?php

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}


function create_hash($password)
{
    // format: algorithm:iterations:salt:hash
  $salt = base64_encode(mcrypt_create_iv(24, MCRYPT_DEV_URANDOM));

//var_dump($salt);
return array(hash('sha256', $password.$salt),$salt);

        
}


function verify_pwd($pwd, $salt, $hash){
$newhash=hash('sha256', $pwd.$salt);
echo "$pwd*********";
return $hash===$newhash;


}


?>