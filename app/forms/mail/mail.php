<?php
// contact 
$sql3 = "SELECT * FROM contact";
$query3 = mysqli_query($conn, $sql3);
$result3 = mysqli_fetch_array($query3);
$email = $result3['email'];


$msg = 'hello this is a test mail';


mail("dennisdon678@gmail.com", "A text mail from php", $msg);