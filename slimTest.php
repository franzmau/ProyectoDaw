<?php
$name = "kim";
$url = "http://localhost/REPOMA/vendor/slim/slim/index.php/helloss/$name"; //Route to the REST web service
$c = curl_init($url);
$response = curl_exec($c);
curl_close($c);

?>
