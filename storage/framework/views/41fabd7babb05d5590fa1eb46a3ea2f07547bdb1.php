<html>

<head>


    <meta charset="UTF-8">
  	<base href="/games/AfricanKingNG/app/africanKing.1/">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="robots" content="noindex, nofollow">
    <title><?php echo e($game->title); ?></title>
	 <script type="text/javascript" src="index.js?6fb2e03a5abed8994180"></script><script>
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


		var qstr='/?launcher=true&sfx_496475945=1616496911181&commonVersion=(build%2088)&game=254&userId=003403186056&wshost=&quality=high&lang=en&noframe=yes';

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

     <body onload="injectCSS()"  style="display:flex;    justify-content: center;     align-items: center;background: url(/frontend/Default/ico/AfricanKingNG.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    background-position: center center;">
         <script>var gameVersion = '(build 3 commit e1feb23ab3a186950e547139bca7651f893ea6a2)';
      (function(){var a=document.createElement("script");a.setAttribute("type","text/javascript");a.setAttribute("src","../../js/loader.js?r="+Math.random());"undefined"!==typeof a&&document.getElementsByTagName("head")[0].appendChild(a);})();
    </script>
    </body>
	<script rel="javascript" type="text/javascript" src="/games/<?php echo e($game->name); ?>/device.js"></script>
<script rel="javascript" type="text/javascript" src="/games/<?php echo e($game->name); ?>/addon.js"></script>
</html>
<?php /**PATH /home/itfabers/casino.dev.itfabers.com/resources/views/frontend/games/list/AfricanKingNG.blade.php ENDPATH**/ ?>