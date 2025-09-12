<?php
require 'AutoLoad.php';
require 'Db_connect.php';

// Fetch usernames in ascending order
$result = $mysqli->query("SELECT username FROM users ORDER BY username ASC");
if (!$result) {
    die('Query failed: ' . $mysqli->error);
}
echo"<h2>Registered Users</h2>";
$counter = 1;
while ($row = $result->fetch_assoc()) {
    echo $counter . '. ' . htmlspecialchars($row['username']) . "<br>";
    $counter++;
}

$result->free();
$mysqli->close();
