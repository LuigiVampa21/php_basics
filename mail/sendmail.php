<?php
$headers = "From: nmteissier@gmail.com";
$sent = mail("teissierteissier@yahoo.fr", "Subject", "Content", $headers);
if($sent){
    echo "Sent";
}else{
    echo "Failed";
}

?>