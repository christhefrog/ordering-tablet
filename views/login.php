<?php
    include "inc/auth.php";

    $message = "";

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        if(empty($_POST["login"]) || empty($_POST["password"]))
        {
            $message = "All fields are required.";
        }
        else
        {
            $login = $_POST["login"];
            $password = $_POST["password"];

            $user = getUserAccount($con, $login, $password);
            if (gettype($user) == "string") {
                $message = $user;
            } else {
                $_SESSION["isLoggedIn"] = true;
                header("Location: " . $indexUrl);
            }
        }
    }
?>

<?php
    if(!empty($message)) {
        echo "
            <div class='alert alert-danger' role='alert'>
                $message
            </div>
        ";
    }
?>

<form action="login" method="post" class="container">
    <div class="form-group">
        <label for="login">Login: </label>
        <input type="text" name="login" id="login" class="form-control" <?php if(!empty($login)) echo "value='$login'" ?>>
    </div>
    
    <div class="form-group">
        <label for="password">Password: </label>
        <input type="password" name="password" id="password" class="form-control">
    </div>
    
    <button type="submit" class="btn btn-success my-2">Login</button>
</form>
