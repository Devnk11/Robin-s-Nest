<?php

$serverName="localhost";
$dbUsername="root";
$password="";
$dbName="robinsnest";

$conn = new mysqli($serverName,$dbUsername,$password,$dbName);

if($conn -> connect_error) {
       die("connction failed:".$conn -> connect_error);
}


function createTable($name,$query){

    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table $name created or already exists.<br>";
}
	
function queryMysql($query){
	global $conn;
	$result=$conn -> query($query);
	if(!$result){
		die("Fatal error");
	}else{
		return $result;
	}
}

function destroySession(){
	$_SESSION = array();
	if(session_id()!= "" || isset($_COOKIE[session_name()])){
		setcookie(session_name(),'',time()-20,'/');
	}else{
		session_destroy();
	}
}

 function sanitizeString($var)
 {
 global $conn;
 $var = strip_tags($var);
 $var = htmlentities($var);
 if (get_magic_quotes_gpc())
$var = stripslashes($var);
 return $conn->real_escape_string($var);
 }


 function showProfile($user){
	$result=queryMysql("SELECT * FROM profiles WHERE user='$user'");

 	if(file_exists("profiles/$user.jpg")){
		header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
		if($result -> num_rows){
			$row=$result -> fetch_array(MYSQLI_ASSOC);
		 echo "<div class=' flex-container' >";
 		echo "<div class=' flex-item-left'><div class='ui-bar ui-bar-b' style=' height:400px;'><img   src='profiles/$user.jpg' style='object-fit:contain; border:none;  height:400px; width:100%'  ". time() ."/></div><p>".stripslashes($row['text'])."</p></div>";
		
			
		}
	}

 

 	if($result -> num_rows){
 		$row=$result -> fetch_array(MYSQLI_ASSOC);
		 echo  "<div class=' flex-item-right '><div class='ui-bar ui-bar-b' style='height:450px; overflow-y: auto; '>".stripslashes($row['text'])."</p>";
	
		 
 	}else{
		 echo "<p>Nothing to see here , yet </p><br>";
		 echo "</div></div></div>";
 	}
 }


 ?></div>
 

 
 