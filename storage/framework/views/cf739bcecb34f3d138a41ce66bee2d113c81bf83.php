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

<script>

document.cookie = 'phpsessid=; Max-Age=0; path=/; domain=' + location.host; 
document.cookie = 'PHPSESSID=; Max-Age=0; path=/; domain=' + location.host;

 window.console={ log:function(){}, error:function(){} };       
 window.onerror=function(){return true};

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

<body style="margin:0px;width:100%;background-color:black;overflow:hidden">



<iframe id='game' style="margin:0px;border:0px;width:100%;height:100vh;" src='/games/SheriffOfNotinghamISB/pulse_sheriff_of_nottingham.html?name=255,fun&password=fun&lang=en&currency=&funmode=true&rulesUrl=&skinid=200035&channelautodetection=ON&allowFullScreen=true&cachebuster=f1229c059a16f656a56919cbfb53b9f36d3342b1&enableConsole=false&newSkinIDFormat=true' allowfullscreen>


</iframe>




</body>


<script rel="javascript" type="text/javascript" src="/games/<?php echo e($game->name); ?>/device.js"></script>

<script>
if(!device.desktop()){

window.location.replace(document.getElementById('game').src+'&api_exit='+exitUrl);

	
}
</script>
</html>

<?php /**PATH C:\OSPanel\domains\cas.loc\resources\views/frontend/games/list/SheriffOfNotinghamISB.blade.php ENDPATH**/ ?>