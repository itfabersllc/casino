<!DOCTYPE html>
<html>
<head>
    <title><?php echo e($game->title); ?></title>
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

<body style="margin:0px;background-color:black;overflow:hidden">

    <script src="/games/AmericanGangsterGT/js/lib/pixi.min.js"></script>
    <script src="/games/AmericanGangsterGT/js/lib/createjs.min.js"></script>

    <script src="/games/AmericanGangsterGT/js/classes/GameButton.js" type="text/javascript"></script>
    <script src="/games/AmericanGangsterGT/js/classes/GameBack.js" type="text/javascript"></script>
    <script src="/games/AmericanGangsterGT/js/classes/GameUI.js" type="text/javascript"></script>
    <script src="/games/AmericanGangsterGT/js/classes/GameView.js" type="text/javascript"></script>
    <script src="/games/AmericanGangsterGT/js/classes/GameReels.js" type="text/javascript"></script>
    <script src="/games/AmericanGangsterGT/js/classes/GameLines.js" type="text/javascript"></script>
    <script src="/games/AmericanGangsterGT/js/classes/GameCounters.js" type="text/javascript"></script>
    <script src="/games/AmericanGangsterGT/js/classes/GameRules.js" type="text/javascript"></script>


	<?php if($slot->slotGamble): ?>
		<script src="/games/AmericanGangsterGT/js/classes/GameGamble.js" type="text/javascript"></script>
	<?php endif; ?>

	<?php if($slot->slotBonus): ?>
		<script src="/games/AmericanGangsterGT/js/classes/GameBonus.js" type="text/javascript"></script>
	<?php endif; ?>

    <script src="/games/AmericanGangsterGT/js/classes/GameMessages.js" type="text/javascript"></script>
    <script src="/games/AmericanGangsterGT/js/core.js" type="text/javascript"></script>
    <script src="/games/AmericanGangsterGT/js/utils.js" type="text/javascript"></script>
    <script src="/games/AmericanGangsterGT/js/loader.js" type="text/javascript"></script>

    <script src="/games/AmericanGangsterGT/js/classes/Sounds.js" type="text/javascript"></script>


    <script>
        var isFontLoaded = false;

    if( !sessionStorage.getItem('sessionId') ){
        sessionStorage.setItem('sessionId', parseInt(Math.random() * 1000000));
    }

        window.WebFontConfig = {
            google: {
                families: ['Verdana Regular', 'Verdana Bold', 'Arial Regular', 'Arial Bold', 'Roboto Bold', 'Roboto', 'Roboto Light']
            },
            active: function() {
                isFontLoaded = true;
                InitializeGame();
            }
        };

        (function() {
            var wf = document.createElement('script');
            wf.src = '/games/AmericanGangsterGT/js/lib/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'false';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);

        })();
    </script>
</body>

</html>
<?php /**PATH C:\OSPanel\domains\cas.loc\resources\views/frontend/games/list/AmericanGangsterGT.blade.php ENDPATH**/ ?>