
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">

 <title><?php echo e($game->title); ?></title>
<base href="/games/<?php echo e($game->name); ?>/">

  <!--http://www.html5rocks.com/en/mobile/mobifying/-->
  <meta name="viewport"
        content="width=device-width,user-scalable=no,initial-scale=1, minimum-scale=1,maximum-scale=1"/>

  <!--https://developer.apple.com/library/safari/documentation/AppleApplications/Reference/SafariHTMLRef/Articles/MetaTags.html-->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta name="format-detection" content="telephone=no">

  <!-- force webkit on 360 -->
  <meta name="renderer" content="webkit"/>
  <meta name="force-rendering" content="webkit"/>
  <!-- force edge on IE -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
  <meta name="msapplication-tap-highlight" content="no">

  <!-- force full screen on some browser -->
  <meta name="full-screen" content="yes"/>
  <meta name="x5-fullscreen" content="true"/>
  <meta name="360-fullscreen" content="true"/>

  <!-- force screen orientation on some browser -->
  <meta name="screen-orientation" content="landscape"/>
  <meta name="x5-orientation" content="landscape">

  <!--fix fireball/issues/3568 -->
  <!--<meta name="browsermode" content="application">-->
  <meta name="x5-page-mode" content="app">

  <!--<link rel="apple-touch-icon" href=".png" />-->
  <!--<link rel="apple-touch-icon-precomposed" href=".png" />-->

  <link rel="stylesheet" type="text/css" href="style-mobile.6e9cd.css"/>
  <link rel="icon" href="favicon.8de18.ico"/>
</head>
<body style="background-color:black;">

<div style="position:fixed;z-index:200;width:100%;height:100%; " id="loadHover">
<img src="loadbg.jpg" style="width:100%;height:100%;">
</div>

  <canvas id="GameCanvas" oncontextmenu="event.preventDefault()" tabindex="0"></canvas>



<script src="src/settings.7030b.js" charset="utf-8"></script>

<script src="main.03d7c.js" charset="utf-8"></script>

<script type="text/javascript">
//document.body.style="display:none;background-color:black;";
    if( !sessionStorage.getItem('sessionId') ){
        sessionStorage.setItem('sessionId', parseInt(Math.random() * 1000000));
    }
var GameName="<?php echo e($game->name); ?>";
var exitUrl="/";

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



(function () {
    // open web debugger console
    if (typeof VConsole !== 'undefined') {
        window.vConsole = new VConsole();
    }

    var debug = window._CCSettings.debug;

    function loadScript (moduleName, cb) {
      function scriptLoaded () {
          document.body.removeChild(domScript);
          domScript.removeEventListener('load', scriptLoaded, false);
          cb && cb();
      };
      var domScript = document.createElement('script');
      domScript.async = true;
      domScript.src = moduleName;
      domScript.addEventListener('load', scriptLoaded, false);
      document.body.appendChild(domScript);
    }

    loadScript(debug ? 'cocos2d-js.js' : 'cocos2d-js-min.3d992.js', function () {
      if (CC_PHYSICS_BUILTIN || CC_PHYSICS_CANNON) {
        loadScript(debug ? 'physics.js' : 'physics-min.a8149.js', window.boot);
      }
      else {
        window.boot();
      }
    });
})();
</script>
</body>
</html>
<?php /**PATH C:\OSPanel\domains\cas.loc\resources\views/frontend/games/list/BustinVegasPGT.blade.php ENDPATH**/ ?>