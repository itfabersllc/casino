<!DOCTYPE html>
<html>
<head>
    <title>{{ $game->name }}</title>
    <meta id="metaToken" name="csrf-token" content="VPB4XRBUqmjcJlKQsL46EU913fLg6XMOokxyfJho">
    <meta charset="utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
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

    if (!sessionStorage.getItem('sessionId')) {
        sessionStorage.setItem('sessionId', parseInt(Math.random() * 1000000));
    }
    sessionStorage.setItem('Curr', 'EUR'); 
    

    var exitUrl = '';
    if (document.location.href.split("api_exit=")[1] != undefined) {
        exitUrl = document.location.href.split("api_exit=")[1].split("&")[0];
    }

    addEventListener('message', function (ev) {

        if (ev.data == 'CloseGame') {
            var isFramed = false;
            try {
                isFramed = window != window.top || document != top.document || self.location != top.location;
            } catch (e) {
                isFramed = true;
            }

            if (isFramed) {
                window.parent.postMessage('CloseGame', "*");
            }
            document.location.href = exitUrl;
        }

    });
</script>

<body onload="injectCSS()"  style="display:flex;    justify-content: center;     align-items: center;margin:0px;width:100%;background-color:black;overflow:hidden">


<iframe id='game' style="margin:0px;border:0px;width:1300px;height:100vh;max-width:100%"
        src='/games/BookoftheFallen/gs2c/html5Game.html?extGame=1&symbol=vs10bookoftut&gname=Sweet%20Bonanza%20Xmas&jurisdictionID=UK&lobbyUrl=https%3A%2F%2Fwww.socialtournaments.com&mgckey=stylename@generic~SESSION@09d71088-f53c-4c20-b376-f882fffd995c'
        allowfullscreen>


</iframe>

</body>

<script rel="javascript" type="text/javascript" src="/games/{{ $game->name }}/device.js"></script>
<script rel="javascript" type="text/javascript" src="/games/{{ $game->name }}/addon.js"></script>
</html>
