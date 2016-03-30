<?php

include( '../data/data.php' );
$data_str=var_export($container_data, true);
echo sprintf(
    "<html><body>This page shows reading data from other container that is mounted via volumes_from,<br/>\$data=%s</body></html>",
    $data_str
);
