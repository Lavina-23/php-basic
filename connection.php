<?php

$conn = mysqli_connect("localhost", "root", "", "db_practice_web");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
