<?php
ini_set("display_errors",1);
$conn = mysqli_connect("localhost","root","root","test_me");
if(isset($_POST['submit_image']))
{
  $uploadfile=$_FILES["upload_file"]["tmp_name"];
  $folder="images/";

 
  move_uploaded_file($_FILES["upload_file"]["tmp_name"], $folder.$_FILES["upload_file"]["name"]);
	$sql = "INSERT INTO users (firstname, lastname, email, image)
VALUES ('John', 'Doe', 'john@example.com', '".$_FILES["upload_file"]["name"]."')";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
  echo '<img src="'.$folder."".$_FILES["upload_file"]["name"].'">';
  exit();
}
?>
