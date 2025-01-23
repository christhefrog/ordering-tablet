<?php
    include_once("inc/user.php");

    $userLogin = $_SESSION["loggedUser"]["login"];
?>

<div class="container my-3 h3">
    Welcome, <?php echo $userLogin ?>! 
    <a href="<?php echo $indexUrl . "logout"?>">Logout</a>
</div>

<?php if($_SESSION["loggedUser"]["userType"] == "Admin") {?>
<div class="container my-2 p-4 border">
    <h3>Users</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Login</th>
                <th>Type</th>
                <th>Last login</th>
                <th>Added</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach(listUsers($con) as $user)
                {
                    $login = $user["login"];
                    $type = $user["userType"];
                    $created = $user["createdAt"];
                    $lastLogin = $user["lastLogin"];
                    echo "<tr>
                        <td>$login</td>
                        <td>$type</td>
                        <td>$lastLogin</td>
                        <td>$created</td>
                    </tr>";
                }
            ?>
        </tbody>
    </table>
    <button class="btn btn-success">Add user</button>
</div>

<?php }?>