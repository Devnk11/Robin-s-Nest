<?php
require_once 'header.php';

echo "<div class='center'>Welcome to Robin's Nest,";
if ($loggedin) {
	echo "$user,you are loggedin";
}else{
	echo "please sign up or log in";
}



echo <<<_END
  </div><br>
  </div>
  <div>
  <div data-role="footer" class="footer">
  <h6>Thank you for visiting.All rights reserved &copy; 2020.</h6>
 </div>
 </body>
 </html>
_END;
?>