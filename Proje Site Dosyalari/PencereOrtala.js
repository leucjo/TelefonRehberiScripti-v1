function PencereOrtala(url,w,h) {
var Pencerem;
var soldan = parseInt((screen.availWidth/2) - (w/2));
var ustten = parseInt((screen.availHeight/2) - (h/2));	
var detaylar = "width="+w+",height="+h+",left="+soldan+",top="+ustten+",screenX=" + soldan + ",screenY=" + ustten;
Pencerem = window.open(url, "pnc", detaylar);
}