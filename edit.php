<?php
if (isset($_POST['url'])){
	$acx = array('ssl' => array('verify_peer' => false,),);
	$b64 = 'data:image/image/jpeg;base64,' . base64_encode(file_get_contents($_POST['url'],false,stream_context_create($acx)));
	echo $b64;
	exit;
}
$mg=glob("./foto/*.{gif,png,jpg,jpeg}",GLOB_BRACE);
$fli=$mg[array_rand($mg,1)];
?>
<!DOCTYPE html>
<html>
<head>
<title>WoW Sc4n</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{background-image:url(<?=$fli?>);height:100%;font: medium calibri;}
.sep{clear:both;width:100%}
#up{
	object-fit: contain;
	margin:10% auto;
	background:rgba(131, 51, 4, 0.3);
	border: 3px solid #a50;
	height: 15vh;
	width: 100%;
}
#pix{width:100%;display:inline-block;color:#fa8;background-color:rgba(0,0,0, 0.8);text-align:center}
.bg{height:100vh;background-image:url(<?=$fli?>);filter: blur(5px);-webkit-filter: blur(5px);}
#popup {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 90%;
            height: 80%;
            text-align: center;
            background-color: #222;
            box-sizing: border-box;
            padding: 10px;
            z-index: 100;
            display: none;
        }
.ptex {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
}
button{background-image: linear-gradient(-7deg, #f33, #f83 57%);}
#button{display:none}
#wrapp{position:fixed;width:80%;left: 50%;transform: translate(-50%, -90%);text-align: center;}
#image {display: block;width: 100%;}
#right{background:#000;padding:2px;height:85vh}
#left{top:0;left:0;padding:10px}
#button{margin: 0 auto;width:20%;font-size:1rem;text-align:center}
@media only screen and (max-width: 100px) {
	#button{width:12%;}
}
</style>
<script src="cropper.min.js"></script>
<script src="jquery.min.js"></script>
<script src="jquery-ui.min.js"></script>
<link rel="stylesheet" href="cropper.min.css"/>
</head>
<body>
<div class="bg"><div id='right'><img id="image" src="<?=$fli?>"/></div>
<div class="sep"></div><span id="pix"></span>
<div id='left'>
<div id='button'>
<div id='scan' style='cursor:pointer;width:20%;padding-bottom:20%;display:inline-block;background:url(data:image/png;base64,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) no-repeat center;background-size: cover;'></div>
<div id='crop' style='cursor:pointer;width:20%;padding-bottom:20%;display:inline-block;background:url(data:image/png;base64,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) no-repeat center;background-size: contain;'></div>
<div id='new' style='cursor:pointer;width:20%;padding-bottom:20%;display:inline-block;background:url(data:image/png;base64,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) no-repeat center;background-size: contain;'></div>
</div>
</div>
</div>
</div>
<div id='wrapp'>
<div id='up' contenteditable='true' ondrop='drop(event)' ondragover='allowDrop(event)' >
<div style="display:none;z-index:999999;width:100%;height:100%;background:#000 url('https://user-images.githubusercontent.com/13696193/54483119-cdc87600-4824-11e9-8c64-65211669755e.gif') no-repeat center;position:absolute;top:0;left:0;opacity:0.9" id='ads'></div>
<input type="file" name="st" id="st" accept="image/*"></input>
<div class='ptex'>DRAG or PASTE YOUR PICTURE HERE</div>
</div>
</div>

<div id='popup'/>
<script>
function popup() {
	$("#popup").toggle();
}
function allowDrop(ev) {
  ev.preventDefault();
}
function drop(e) {
	$('#up').fadeOut();
	e.preventDefault();
	e.stopPropagation();
	var items = e.dataTransfer.items;
	for( var i = items.length-1, len = 0; i >= len; --i ) {
		var item = items[i];
		if( item.type.indexOf('image') === 0 ) {
			var blob = item.getAsFile();
			window.URL = window.URL || window.webkitURL;
			var imgs = window.URL.createObjectURL(blob);
			$('#image').attr('src',imgs);
			crop();
			break;
		}
		// else if(item.kind === "string" && item.type==="text/plain") {
		else if(item.kind === "string") {
			var imgs = e.dataTransfer.getData('Text');
			$('#ads').fadeIn(50);
			setTimeout(function(){
					$.post(window.location, {url: imgs}, function(data) {
					$('#image').attr('src',data);
					crop();
					});
			},0);
			break;
		}
	}
};
/////
	function crop(){
		/////
		var pix = document.getElementById('pix');
		var options = {viewMode: 1,
		  crop(event) {
			pix.innerHTML = Math.round(event.detail.height)+'px x '+Math.round(event.detail.width)+'px';
		},};

		/////
		const image = document.getElementById('image');
		const cropper = new Cropper(image,options);
		$('#image').fadeOut(500);
		$('#ads').fadeOut(1500);
		$('#button').fadeIn(500);
		$('#crop').on('click', function () {
			var res = cropper.getCroppedCanvas().toDataURL("image/jpeg");
			// $('<div></div>').append('body').dialog({width: "80vw",modal:"true",position:{my: "center", at:"top", of: window }}).html("<a href='"+res+"' download='foto'><button>Download</button></a><img id='imgs' src="+res+" width=100% />");
			$('#popup').html("<div style='position:absolute'><a href='"+res+"' download='foto'><button>Download</button></a><button onclick='popup()'>Close</button></div><img id='imgs' src="+res+" height=100% />").toggle();
		});
		$('#scan').on('click', function () {
			cropper.rotate(-45);
		});$('#new').on('click', function () {
			cropper.destroy();
			location.reload();
		});
	}
//////
	
$(document).ready(function(){
	$('#st').change(function(){
		$('#ads').fadeIn(500);
		$('#up').fadeOut();
		$(document).off('keydown');
		var imgs=$(this).prop('files')[0];
		var fr = new FileReader;
		fr.onloadend = function() {
			$('#image').attr('src',fr.result);
			crop();
		};
		fr.readAsDataURL(imgs);
	});
	document.getElementById('up').onpaste = function (e) {
		$('#wrapp').fadeOut();
		$('.bg').css({'filter':'blur(0)','-webkit-filter':'blur(0)','height':'0px'});
		e.preventDefault();
		e.stopPropagation();
		var items = e.clipboardData.items;
		// for( var i = 0, len = items.length; i < len; ++i ) {
		for( var i = items.length-1, len = 0; i >= len; --i ) {
			var item = items[i];
			if( item.type.indexOf('image') === 0 ) {
				var blob = item.getAsFile();
				window.URL = window.URL || window.webkitURL;
				var imgs = window.URL.createObjectURL(blob);
				$('#image').attr('src',imgs);
				crop();
				break;
			}
			else if(item.kind === "string" && item.type==="text/plain") {
				var imgs = e.clipboardData.getData('Text');
				$('#ads').fadeIn(500);
				setTimeout(function(){
						$.post(window.location, {url: imgs}, function(data) {
						$('#image').attr('src',data);
						crop();
						});
				},0);
				break;
			}
		}
	};
});
</script>
</body>
</html> 