<?php
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$filename=$_FILES['image']['name'];
$fileext=explode('.',$filename);
$filetempname=$_FILES['image']['tmp_name'];
$fileactext=strtolower(end($fileext));
$filenewname=uniqid('',true).".".$fileactext;
$filedir='uploads/'.$filenewname;
move_uploaded_file($filetempname, $filedir);


$comm = $_POST['comment'];
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "city";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else 
    {
     $sql = "INSERT Into register (name, phone, email, image,comment) values('$name','$phone','$email','$imgData','$comm')";
    if($conn->query($sql))
    	    echo "<script>
alert('Your complaint has been registered');
window.location.href='form.html';
</script>";
    $conn->close();
    }

?>