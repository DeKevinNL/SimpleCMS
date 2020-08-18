<?php

function seconds($ISO8601){
    $interval = new \DateInterval($ISO8601);
    return ($interval->d * 24 * 60 * 60) +
        ($interval->h * 60 * 60) +
        ($interval->i * 60) +
        $interval->s;
}

if (!isset($_GET['id'])) {
	exit;
}

$Video = json_decode(file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=snippet,contentDetails&id=".$_GET["id"]."&key=AIzaSyDTPD0r_zaiITegdcLVmd7EQyCUCE9Rc4U"), true)['items'];

if (!$Video || !isset($Video[0])) {
	exit('null');
}

exit(json_encode(Array(
	'seconds' => seconds($Video[0]['contentDetails']['duration']),
	'title' => $Video[0]['snippet']['title']
)));

?>

