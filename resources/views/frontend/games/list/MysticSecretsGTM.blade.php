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

<body onload="injectCSS()"  style="display:flex;    justify-content: center;     align-items: center;margin:0px;background-color:black;overflow:hidden">

    <script src="/games/MysticSecretsGTM/js/lib/pixi.min.js"></script>
    <script src="/games/MysticSecretsGTM/js/lib/createjs.min.js"></script>

    <script src="/games/MysticSecretsGTM/js/classes/GameButton.js" type="text/javascript"></script>
    <script src="/games/MysticSecretsGTM/js/classes/GameBack.js" type="text/javascript"></script>
    <script src="/games/MysticSecretsGTM/js/classes/GameUI.js" type="text/javascript"></script>
    <script src="/games/MysticSecretsGTM/js/classes/GameView.js" type="text/javascript"></script>
    <script src="/games/MysticSecretsGTM/js/classes/GameReels.js" type="text/javascript"></script>
    <script src="/games/MysticSecretsGTM/js/classes/GameLines.js" type="text/javascript"></script>
    <script src="/games/MysticSecretsGTM/js/classes/GameCounters.js" type="text/javascript"></script>
    <script src="/games/MysticSecretsGTM/js/classes/GameRules.js" type="text/javascript"></script>
	
	
	@if ($slot->slotGamble)
		<script src="/games/MysticSecretsGTM/js/classes/GameGamble.js" type="text/javascript"></script>
	@endif
	
	@if ($slot->slotBonus)
		<script src="/games/MysticSecretsGTM/js/classes/GameBonus.js" type="text/javascript"></script>
	@endif
	
    <script src="/games/MysticSecretsGTM/js/classes/GameMessages.js" type="text/javascript"></script>
    <script src="/games/MysticSecretsGTM/js/core.js" type="text/javascript"></script>
    <script src="/games/MysticSecretsGTM/js/utils.js" type="text/javascript"></script>
    <script src="/games/MysticSecretsGTM/js/loader.js" type="text/javascript"></script>

    <script src="/games/MysticSecretsGTM/js/classes/Sounds.js" type="text/javascript"></script>


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
            wf.src = '/games/MysticSecretsGTM/js/lib/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'false';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);

                })();
		
		/*------------------------*/
		
		
		
		var taInter;
		
		
		function CheckTurn(){
			
			
		if(window.innerHeight>window.innerWidth){
			
		ShowTurnScreen();	
			
		}else{
			
		HideTurnScreen();	
			
		}	
			
			
		}
		
		function HideTurnScreen(){
		
         clearInterval(taInter);
	
		
		var tm=document.getElementById("turnOverlay");	
		 
		 		 
		 tm.style['display']='none';
			
		 
		
		
		};
		
		function ShowTurnScreen(){
		
         clearInterval(taInter);
		
		var frames=[' 50px -0px',' -30px -160px',' -30px -320px'];
		var framesCnt=0;
		
		var ta=document.getElementById("turnAnim");	
		var tm=document.getElementById("turnOverlay");	
		 
		 ta.style['background-position']=frames[framesCnt];
		 
		 tm.style['display']='';
			
		 
		taInter=setInterval(function(){
			
			ta.style['background-position']=frames[framesCnt];
			
			framesCnt++;
			if(framesCnt>2){framesCnt=0;}
			
			
		},600);
		
		};

    </script>
	
	<div id="turnOverlay" style="display:none;background-color:rgba(0, 0, 0, 0.8);position:fixed;width:100vw;height:100vh">
	<div id="turnAnim" style="-webkit-transform: scale(0.6,0.6);-ms-transform: scale(0.6,0.6); transform: scale(0.6,0.6);-webkit-transform-origin: 50% 50%; -ms-transform-origin: 50% 50%; transform-origin: 50% 50%;position:absolute;width:220px;height:160px;background-repeat: no-repeat;background-position: 50px  0px;background:url('/games/MysticSecretsGTM/turnscreen.png');  left:calc(50% - 110px); top:calc(50% - 160px);"  ></div>   
	<div id="turnAnimText" style="position:absolute;width:100vw;height:160px; text-align:center;top:calc(50% + 0px);color:white; font-size:21px;font-family:'Arial Regular';"  >Please turn your device to<br>  landscape mode! </div>    
	</div>
	
</body>

</html>