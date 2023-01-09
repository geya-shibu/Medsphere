<?php
$con= mysqli_connect("localhost", "root", "", "portal");
if($con->connect_error)
{
    echo "Failed". mysqli_connect_error();
}

