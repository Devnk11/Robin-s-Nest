<?php
require_once 'header.php';

$error = $user = $pass = "";

if (isset($_POST['user'])) {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString(($_POST['pass']));

    if ($user == "" || $pass == "") {
        $error = "Please fill all the feilds";
    } else {
        $result = queryMysql("SELECT user,pass FROM members WHERE user='$user' AND pass='$pass' ");
        if ($result->num_rows == 0) {
            $error = "Username or passowrd incorrect";
        } else {
            $_SESSION['user'] = $user;
            $_SESSION['pass'] = $pass;
            die("You are now logged in. Please <a data-trasition='slide' href='members.php?view=$user'>Click here </a> to Continue.
            </div>
            </body>
            </html>");
        }
    }
}
?>
<form method='post' action='login.php'>
    <div data-role='fieldcontain'>
        <label></label>
        <span class='error'><?php echo $error ?></span>
    </div>
    <div data-role='fieldcontain'>
        <label></label>
        <h4 class="center"> Enter your details to log in</h4>
    </div>
    <div data-role='fieldcontain'>
        <label>Username</label>
        <input type='text' maxlength='16' name='user' value='<?php echo $user ?>'>
      
    </div>
    <div data-role='fieldcontain'>
        <label>Password</label>
        <input type='password' maxlength='16' name='pass' value='<?php echo $pass ?>'>
    </div>
    <div data-role='fieldcontain'>
        <label></label>
        <input data-transition='flow' data-theme="b" type='submit' value='Login'>
    </div>
</form>
</div>
</body>

</html>