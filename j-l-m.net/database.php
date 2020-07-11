<?php
$user = 'root';
$pass = '';
$db = new PDO('mysql:host=localhost;dbname=jlm_net', $user, $pass, array(
    PDO::ATTR_PERSISTENT => true
));
?>
