<?php
session_start();

echo <<<_INIT

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width,intial-scale=1'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-mobile/1.4.5/jquery.mobile.min.css" integrity="sha512-z2AFOVKBqcloFCT+Ugs0icqTfC8fBoGq2zP60MlESnL9CdusjEyVnNvHgs3RWtdMJxGkP0FDWfNp/puIP9CctA==" crossorigin="anonymous" />
<link rel='stylesheet' href='styles.css'>
<script src='javascript.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js" integrity="sha512-DUC8yqWf7ez3JD1jszxCWSVB0DMP78eOyBpMa5aJki1bIRARykviOuImIczkxlj1KhVSyS16w2FSQetkD4UU2w==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mobile/1.4.1/jquery.mobile.min.js" integrity="sha512-wSacGPS/KRyVB67O4xD+Eh1OX4/dq4juZj9DKTokRt81BzLbfsSMtNgR9Pu8FLr4kLbk5oNr9Hq+5PeWLCX8mA==" crossorigin="anonymous"></script>


_INIT;

require_once 'functions.php';
$userstr='Welcome guest';

if(isset($_SESSION['user'])){
    $user=$_SESSION['user'];
    $loggedin=TRUE;
    $userstr="Logged in as :$user";
}else{
    $loggedin=FALSE;
}

echo <<<_MAIN
<title> Robin s Nest:$userstr </title>
</head>
<body class=' ui-bar-b'>
 <div data-role='page' class=' ui-bar-b'>
    <div data-role='header'>    
      <div id='logo'class='center'>
        R <img id="robin" class="nest" src='robin.png'>bin's Nest
      </div>
    <div class='username'>$userstr</div>
 </div>
 <div data-role='content'>
_MAIN;

 if($loggedin){

    echo <<<_LOGGEDIN
     <div class='center'>
     <a data-role='button' data-inline='ture' data-icon='home' data-trasition="flow" href='members.php?view=$user'>HOME</a>
     <a data-role='button' data-inline='ture' data-icon='user' data-trasition="flow" href='members.php'>Members</a>
     <a data-role='button' data-inline='ture' data-icon='heart' data-trasition="flow" href='friends.php'>Friends</a>
     <a data-role='button' data-inline='ture' data-icon='comment' data-trasition="flow" href='messages.php'>Messages</a>
     <a data-role='button' data-inline='ture' data-icon='edit' data-trasition="flow" href='profile.php'>Edit Profile</a>
     <a data-role='button' data-inline='ture' data-icon='forward' data-trasition="flow" href='logout.php'>Logout</a>
     </div>
    _LOGGEDIN;

 }else{
    echo <<<_GUEST
           <div class='center'>
           <a data-role='button' data-inline='true' data-icon='home' data-trasition='flow' href="index.php">Home</a>
           <a data-role='button' data-inline='true' data-icon='plus' data-trasition='flow' href="signup.php">Sign Up</a>
           <a data-role='button' data-inline='true' data-icon='check' data-trasition='flow' href="login.php">Login</a>
           </div>
           <p class='info'>(You must be logged in to use this app)</p>

    _GUEST;
 }


?>