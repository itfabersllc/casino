<html>
   <head>
      <title>{{ $game->title }}</title>
      <meta charset="utf-8">
      <meta name="apple-mobile-web-app-capable" content="yes" />
      <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
      <link href='/games/Asian/css/fonts.css' rel='stylesheet' type='text/css'>
      <script src="/games/Asian/js/lib/createjs-2015.11.26.min.js" type="text/javascript"></script>
      <script src="/games/Asian/js/classes/GameButton.js" type="text/javascript"></script>
      <script src="/games/Asian/js/classes/GameBack.js" type="text/javascript"></script>
      <script src="/games/Asian/js/classes/GameUI.js" type="text/javascript"></script>
      <script src="/games/Asian/js/classes/GameView.js" type="text/javascript"></script>
      <script src="/games/Asian/js/classes/GameReels.js" type="text/javascript"></script>
      <script src="/games/Asian/js/classes/GameLines.js" type="text/javascript"></script>
      <script src="/games/Asian/js/classes/GameCounters.js" type="text/javascript"></script>
      <script src="/games/Asian/js/classes/GameRules.js" type="text/javascript"></script>
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
	@if ($slot->slotGamble)
      <script src="/games/Asian/js/classes/GameGamble.js" type="text/javascript"></script>
	@endif

	@if ($slot->slotBonus)
      <script src="/games/Asian/js/classes/GameBonus.js" type="text/javascript"></script>
	@endif
      <script src="/games/Asian/js/classes/GameMessages.js" type="text/javascript"></script>
      <script src="/games/Asian/js/utils.js" type="text/javascript"></script>
      <script src="/games/Asian/js/loader.js" type="text/javascript"></script>
      <script src="/games/Asian/js/core.js" type="text/javascript"></script>
      <script src="/games/Asian/js/classes/Sounds.js" type="text/javascript"></script>
	<script>

    if( !sessionStorage.getItem('sessionId') ){
        sessionStorage.setItem('sessionId', parseInt(Math.random() * 1000000));
    }

	</script>
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
   <body onload="injectCSS()"  onload="InitializeGame()" style="margin:0px;background-color:black">
      <canvas id="game" width="750" height="630" cstyle="position: absolute;"></canvas>
   </body>
</html>
