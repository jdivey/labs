<?php
/**
 * Author: Jacob Ivey
 * Date: 11/1/2019
 * File: reset.class.php
 * Description:
 */

class Reset
{
    //display function to reset user password
    public function display(){

        //if loop to get cookie for user's username
        if (isset($COOKIE)) {
        ?>
         <div class="top-row">Password Reset</div>

        <!-- middle row -->
        <div class="middle-row">
            <h3>We are sorry, but an error has occurred.</h3>
            <p><?= $message ?></p>
</div>

<!-- bottom row for links  -->
<div class="bottom-row">
    <span style="float: left">Already have an account? <a href="index.php?action=login">Login</a></span>
    <span style="float: right">Don't have an account? <a href="index.php">Register</a></span>
</div>
<!-- page specific content ends -->
<?php }else{
            ?>
       <form method="post" >
        <div class="top-row">Password Reset</div>

        <!-- middle row -->
        <div class="middle-row">
            Username: <input type="text" name="username" required><br>
            New Password: <input type="password" name="password" minlength="5" required><br>
        </div>

        <!-- bottom row for links  -->
        <div class="bottom-row">
            <span style="float: left">Already have an account? <a href="index.php?action=login">Login</a></span>
            <span style="float: right">Don't have an account? <a href="index.php">Register</a></span>
        </div>
       </form>
        <!-- page specific content ends -->}
<?php
}
}