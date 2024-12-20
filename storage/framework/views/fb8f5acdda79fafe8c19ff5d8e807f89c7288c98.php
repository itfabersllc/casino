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
   </head>

<body style="margin:0px;background-color:black;overflow:hidden">

    <script src="/games/GorgeousGoddessGT/js/lib/pixi.min.js"></script>
    <script src="/games/GorgeousGoddessGT/js/lib/createjs.min.js"></script>

    <script src="/games/GorgeousGoddessGT/js/classes/GameButton.js" type="text/javascript"></script>
    <script src="/games/GorgeousGoddessGT/js/classes/GameBack.js" type="text/javascript"></script>
    <script src="/games/GorgeousGoddessGT/js/classes/GameUI.js" type="text/javascript"></script>
    <script src="/games/GorgeousGoddessGT/js/classes/GameView.js" type="text/javascript"></script>
    <script src="/games/GorgeousGoddessGT/js/classes/GameReels.js" type="text/javascript"></script>
    <script src="/games/GorgeousGoddessGT/js/classes/GameLines.js" type="text/javascript"></script>
    <script src="/games/GorgeousGoddessGT/js/classes/GameCounters.js" type="text/javascript"></script>
    <script src="/games/GorgeousGoddessGT/js/classes/GameRules.js" type="text/javascript"></script>
	
	
	<?php if($slot->slotGamble): ?>
		<script src="/games/GorgeousGoddessGT/js/classes/GameGamble.js" type="text/javascript"></script>
	<?php endif; ?>
	
	<?php if($slot->slotBonus): ?>
		<script src="/games/GorgeousGoddessGT/js/classes/GameBonus.js" type="text/javascript"></script>
	<?php endif; ?>
	
    <script src="/games/GorgeousGoddessGT/js/classes/GameMessages.js" type="text/javascript"></script>
    <script src="/games/GorgeousGoddessGT/js/core.js" type="text/javascript"></script>
    <script src="/games/GorgeousGoddessGT/js/utils.js" type="text/javascript"></script>
    <script src="/games/GorgeousGoddessGT/js/loader.js" type="text/javascript"></script>

    <script src="/games/GorgeousGoddessGT/js/classes/Sounds.js" type="text/javascript"></script>


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
            wf.src = '/games/GorgeousGoddessGT/js/lib/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'false';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);

        })();
    </script>
</body>

</html><?php /**PATH /var/www/casino/resources/views/frontend/games/list/GorgeousGoddessGT.blade.php ENDPATH**/ ?>