<?php

include( './data/data.php' );
include( './data/sub/another.php' );

$output = array('d1'=> $container_data, 'd2' => $container_data2);

header('Content-type: application/json');
echo json_encode($output); 