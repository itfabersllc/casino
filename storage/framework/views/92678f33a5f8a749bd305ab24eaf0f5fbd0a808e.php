<!DOCTYPE html>
<html>
<head>
	<base href="/games/<?php echo e($game->name); ?>/platform/">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="msapplication-tap-highlight" content="no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, target-densitydpi=device-dpi, user-scalable=no, viewport-fit=cover"
          id="meta-viewport">
     <title><?php echo e($game->title); ?></title>
    <script>
        var startTime = new Date();

		var qstr='/?game=agoeg&preferedmode=real&session=';

		if(document.location.href.split("#")[1]!=undefined){
		document.location.href=document.location.href.split("#")[0];
		}

        var uparts=document.location.href.split("?");
		var exitUrl='';
		if(document.location.href.split("?")[1]==undefined){
		document.location.href=document.location.href+qstr;
		}else if(document.location.href.split("?api_exit")[1]!=undefined){

		document.location.href=uparts[0]+qstr+'&'+uparts[1];
		}
		var exitUrl='';
		if(document.location.href.split("api_exit=")[1]!=undefined){
		exitUrl=document.location.href.split("api_exit=")[1].split("&")[0];
		}



    </script>
    <link type="text/css" rel="stylesheet" href="css/normalize.css"/>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>

    <script src="js/cookie.js" language="javascript"></script>
    <script src="js/gls_config.js" language="javascript"></script>
    <script type="text/javascript" src="js/gls.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/viewportJs.js"></script>
    <script type="text/javascript" src="js/viewportCss.js"></script>
    <script type="text/javascript" src="js/lib/modernizr-animations.min.js"></script>
    <!--swipe-up already minified in npm registry, leading to errors during release profile compilation into script.js-->
    <!--<script type="text/javascript" src="js/swipe-up.js"></script>-->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/chat-wrapper.js"></script>
    <script type="application/json" src="version.json"></script>
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
<body onload="injectCSS()"  style="display:flex;    justify-content: center;     align-items: center;background: url(/frontend/Default/ico/AgeOfEgyptPT.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    background-position: center center;overflow:hidden;" class="noBranding" onunload="CloseGame();">
<div id="size-handler"></div>
<div id='app' style="background-color: #000;overflow:hidden;">
    <div class='scalable' id="viewport">
        <div id="size-reader"></div>
        <div id="wrapper" style="background-color: #000;overflow:hidden;"></div>
        <div id="system-place" style="display: none;"></div>
        <div id="modals"></div>
        <div id="tooltips" class="tooltipsWrapper"></div>
        <div id="overlays"></div>
        <div id="rotate"></div>
        <div id="split"></div>
        <div id="devTools"></div>
    </div>
</div>
<div id="hidden-content" class="hidden-content"></div>
<noscript>
    <div class="noscript">
        Your web browser must have JavaScript enabled in order for this application to display correctly.
    </div>
</noscript>
<script type="text/javascript">





                        bootPlatform();

	function CloseGame(){


document.location.href=exitUrl;
var isFramed = false;
try {
	isFramed = window != window.top || document != top.document || self.location != top.location;
} catch (e) {
	isFramed = true;
}

if(isFramed ){
window.parent.postMessage('CloseGame',"*");
}



		}

    if( !sessionStorage.getItem('sessionId') ){
        sessionStorage.setItem('sessionId', parseInt(Math.random() * 1000000));
    }

localStorage.setItem('SESSIONS_PLAYER', 'bs=<?php echo e($game->name); ?>');

addEventListener('message',function(ev){

if(ev.data=='CloseGame'){
document.location.href=exitUrl;
var isFramed = false;
try {
	isFramed = window != window.top || document != top.document || self.location != top.location;
} catch (e) {
	isFramed = true;
}

if(isFramed ){
window.parent.postMessage('CloseGame',"*");
}
}

	});

</script>
<script type="text/javascript" src="platform/platform.nocache.js"></script>
</body>
</html>
<?php /**PATH /home/itfabers/casino.dev.itfabers.com/resources/views/frontend/games/list/AgeOfEgyptPT.blade.php ENDPATH**/ ?>