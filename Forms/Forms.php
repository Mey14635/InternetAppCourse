<?php
//require 'Sender.php';
class forms {
    public function signup() {
?>        
        <form action='Submit.php' method='post'>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required><br><br>
            
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            
            <input type="submit" value="Sign In">
            <a href="Login.php">Already have an account? Login In</a>
        </form>
<?php
    }      

    public function signin() {
?>        
        <form action='Submit.php' method='post'>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            
            <input type="submit" value="Login">
            <a href="./">Don't have an account? Sign Up</a>
        </form>
<?php
    }
}
?>
