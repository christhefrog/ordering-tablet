<?php

function getUserAccount($con, $login, $password)
{
    $sql = "SELECT id, login, password FROM Users WHERE login = '$login'";
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