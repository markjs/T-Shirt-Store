<?php

$result = mysql_query("SELECT * FROM users");

while ($row = mysql_fetch_array($result)) {
  echo $row['email'];
  echo "<br>";
}