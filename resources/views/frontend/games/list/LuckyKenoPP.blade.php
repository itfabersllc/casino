


	<!doctype html><html><head><meta charset="UTF-8">
	
	
			<title>{{ $game->title }}</title>
<base href="/games/{{ $game->name }}/">
	
		          <script type="text/javascript">

    if( !sessionStorage.getItem('sessionId') ){
        sessionStorage.setItem('sessionId', parseInt(Math.random() * 1000000));
    }
	var serverString='';

    var XmlHttpRequest = new XMLHttpRequest();
    XmlHttpRequest.overrideMimeType("application/json");
    XmlHttpRequest.open('GET', '/socket_config.json', false);
    XmlHttpRequest.onreadystatechange = function ()
    {
        if (XmlHttpRequest.readyState == 4 && XmlHttpRequest.status == "200")
        {
            var serverConfig = JSON.parse(XmlHttpRequest.responseText);
            serverString=serverConfig.prefix_ws+serverConfig.host_ws+':'+serverConfig.port;
          
        }
    }
    XmlHttpRequest.send(null);


</script><meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0"><style>* {
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }</style><meta name="apple-mobile-web-app-capable" content="yes"><meta name="mobile-web-app-capable" content="yes"><link rel="stylesheet" type="text/css" href="css/main.css"><link rel="stylesheet" type="text/css" href="css/cma/cma.css"><link rel="stylesheet" type="text/css" href="css/modal.css"><script src="src/bundle.js"></script><script>
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
</head><body onload="injectCSS()"  style="display:flex; justify-content: center;  align-items: center;"><div id="viewportMeasuringContainer"></div><div id="gameFullScreenContainer"><div id="orientationFullScreen"></div></div><div id="fingerUpGestureContainer"><div id="fingerUpGesture"></div></div><div id="orientation"></div></body><script rel="javascript" type="text/javascript" src="/games/{{ $game->name }}/device.js"></script>
<script rel="javascript" type="text/javascript" src="/games/{{ $game->name }}/addon.js"></script></html>