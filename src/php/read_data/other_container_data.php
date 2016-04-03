<?php

include( '../data/data.php' );
include( '../data/sub/another.php' );
echo  "<html><style>
table, th, td {
    border: 1px solid black;
}
</style><body>This page shows reading data from other container that is mounted via volumes_from,<br/><hr/>";

echo "<table><tr><th>Key</th><th>Value</th></tr>";
foreach ($container_data as $key => $value) {
  echo "<tr>";
  echo "<td>$key</td><td>$value</td>";
  echo "</tr>";
}
echo "</table><hr/>";
echo "Another File:<br/>";
echo "<table><tr><th>Key</th><th>Value</th></tr>";
foreach ($container_data2 as $key => $value) {
  echo "<tr>";
  echo "<td>$key</td><td>$value</td>";
  echo "</tr>";
}
echo "</table><hr/>";

echo "</body></html>";
