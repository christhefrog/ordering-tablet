<?php

function getUserAccount($con, $login, $password)
{
    $sql = "SELECT * FROM Users WHERE login = '$login'";
    $res = $con->query($sql);

    if($res->num_rows > 0) 
    {
        $row = $res->fetch_assoc();

        if($row["password"] == hash("sha256", $password))
        {
            return $row;
        }
        else
        {
            return "Wrong password.";
        }
    }
    else
    {
        return "The account doesn't exist.";
    }
}

function updateUserLastLogin($con, $user)
{
    $id = $user["id"];
    $sql = "UPDATE Users SET lastLogin = NOW() WHERE id = $id";
    $con->query($sql);
}

function listUsers($con)
{
    $sql = "SELECT * FROM Users";
    $res = $con->query($sql);

    return $res->fetch_all(MYSQLI_ASSOC);
}
