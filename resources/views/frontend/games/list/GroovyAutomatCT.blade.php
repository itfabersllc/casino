<!DOCTYPE html>
<html>
<head>
    <title>{{ $game->title }}</title>
    <meta charset="utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
      <style>
         body,
         html {
         position: fixed;
         } 
      </style>
   <script>
        function injectCSS() {
            var iframe = document.getElementById('game');
            var iframeDocument = iframe.contentDocument || iframe.contentWindow.document;

            var style = document.createElement('style');
            style.type = 'text/css';
            var css = `
                html, body {
                    background-color: transparent;
                }
                #Desktop, #Desktop body {
                    display:flex;
                    align-items: center;
                    justify-content: center;
                }
                canvas {
                   max-width: 1300px;
                   height: auto
                }
            `;

            style.appendChild(document.createTextNode(css));

            // Append <style> element to iframe's <head>
            iframeDocument.head.appendChild(style);
        }
    </script>
</head>

<script>

    if( !sessionStorage.getItem('sessionId') ){
        sessionStorage.setItem('sessionId', parseInt(Math.random() * 1000000));
    }


var exitUrl='';
		if(document.location.href.split("api_exit=")[1]!=undefined){
		exitUrl=document.location.href.split("api_exit=")[1].split("&")[0];
		}
addEventListener('message',function(ev){
	
if(ev.data=='CloseGame'){
var isFramed = false;
try {
	isFramed = window != window.top || document != top.document || self.location != top.location;
} catch (e) {
	isFramed = true;
}

if(isFramed ){
window.parent.postMessage('CloseGame',"*");	
}
document.location.href=exitUrl;	
}
	
	});
</script>

<body onload="injectCSS()"  style="display:flex;    justify-content: center;     align-items: center;margin:0px;width:100%;background-color:black;overflow:hidden">



<iframe id='game' style="margin:0px;border:0px;width:1300px;height:100vh;max-width:100%" src='/games/GroovyAutomatCT/latest-stable/GroovyAutomat/app.html?serverurl=/game/GroovyAutomatCT/server&neon_interface=All&token=Ad20ffb08dbbee539fb00efa1ac952ce2&gamename=MainGroovyAutomat_1024&lang=%24LANG&ic=cd7a7d98ce9fbd2bb5a7289b470305ee&loaderimgurl=/games/GroovyAutomatCT/latest-stable/MainGroovyAutomat_1024_background_1920.jpg&ss=d30ba881b4b6931609e690c3f141e4b8&ica=demo1&' allowfullscreen>


</iframe>




</body>

<script>
function ResizeHandler(){
	
var d=document.getElementById('game');	
d.style.height=window.innerHeight+'px';	
window.scrollTo(0,0);	
}
	
window.addEventListener('resize', function(){
ResizeHandler();	
}, true);	

window.addEventListener("orientationchange", function() {
ResizeHandler();	
}, false);	
	
	
setTimeout(function(){ResizeHandler();},2000);	
	
</script>

</html>
