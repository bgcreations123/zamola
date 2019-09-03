<?php

include 'conn_1.php';

$name = $_POST['name'];

$textarea = $_POST['textarea'];

echo "<br>";
"<br>";

if($_POST){
	if(!empty($_POST['name']) AND !empty($_POST['textarea'])){
		$query = "INSERT INTO timo(comment, name) VALUES('$textarea', '$name')";
		$query_run= mysqli_query($conn, $query);

		if(!$query_run){
			echo 'insert not successful.'; 
		}else{
			echo "Please enter empty spaces.";
		}
	}
            
}



@$textarea =  $_POST["textarea"];
@$name =  $_POST["name"];

echo "<br>";
$query= "SELECT comment,name FROM timo";

$query_run=mysqli_query($conn, $query);

$result = mysqli_num_rows($query_run);


if($result>0){

while($rowname=mysqli_fetch_array($query_run,MYSQLI_ASSOC)){

echo $rowname['comment'];
echo '</br>';
echo $rowname['name'];
echo '</br>';

}

}





?>