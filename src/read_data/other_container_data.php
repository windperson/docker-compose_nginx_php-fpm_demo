<?php

include( '../data/data.php' );
echo  "<html><style>
table, th, td {
    border: 1px solid black;
}
</style><body>This page shows reading data from other container that is mounted via volumes_from,<br/><hr/>";

echo "<table><tr><th><tr>Key</tr><tr>Value</tr></th>";
foreach ($container_data as $key => $value) {
  echo "<tr>";
  echo "<td>$key</td><td>$value</td>";
  echo "</tr>";
}
echo "</table><hr/>";
echo "</body></html>";
