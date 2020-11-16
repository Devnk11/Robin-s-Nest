<?php

require_once 'header.php';

?>
 <script>
 function checkUser(user){
    if(user.value==''){
        $('#used').html('&nbsp;')
        return

    }
    $.post('checkuser.php',{user:user.value},function(data){ $('#used').html(data) })

 }

 </script>
<?php

$error = $user = $pass = "";

if (isset($_SESSION['user'])) {
    destroySession();
}

if (isset($_POST['user'])) {

    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    if ($user == '' || $pass == '') {
        $error = 'Not all feilds were entered<br><br>';
    } else {
        $result = queryMysql("SELECT * FROM members WHERE user='$user'");
        if ($result->num_rows) {
            $error = 'User with Username '.$user.' Already Exists<br><br>';
        } else {
            queryMysql("INSERT INTO members VALUES ('$user','$pass')");
            die('<h4 class="available">Account created</h4>Please login.</div></body></html>');
        }
    }
}

?>

  <form  method="post" action="signup.php"><div class="center taken"> <?php echo $error ?> </div>
      <div data-role='fieldcontain'>
      <label></label>
      <h4 class="center">Please Enter your details to sign up</h4>
      </div>
     
      <div data-role='fieldcontain'>
      <label >Username</label>
      <input type="text" maxlength="16" name="user" value="<?php echo $user ?>" onBlur="checkUser(this)">
      <label></label><div id='used'>&nbsp;</div>
    </div>

      <div data-role='fieldcontain'>
      <label>Password</label>
      <input type="text" maxlength="16" name="pass" value="<?php echo $pass ?>">
      </div>

      <div data-role='fieldcontain'>
      <label></label>
      <input data-transition="flow" type="submit" data-theme="b" value="Sign Up">
      </div>

      
  </form>

  </body>
  </html>



