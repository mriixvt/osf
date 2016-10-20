<!-- META -->
<META HTTP-EQUIV="Content-Type" Content="text/html; Charset=utf-8">

<!-- CSS -->
	<link rel="stylesheet" href='style.css' />

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>




<link rel="stylesheet" href="./minified/themes/square.min.css" type="text/css" media="all" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="./minified/jquery.sceditor.bbcode.min.js"></script>
<script src="./js/bootbox.min.js"></script>

<script>
	// Source: http://www.backalleycoder.com/2011/03/20/link-tag-css-stylesheet-load-event/
	var loadCSS = function(url, callback){
		var link = document.createElement('link');
		link.type = 'text/css';
		link.rel = 'stylesheet';
		link.href = url;
		link.id = 'theme-style';

		document.getElementsByTagName('head')[0].appendChild(link);

		var img = document.createElement('img');
		img.onerror = function(){
			if(callback) callback(link);
		}
		img.src = url;
	}

	$(document).ready(function() {
		var initEditor = function() {
			$("textarea").sceditor({
				plugins: 'xhtml',
				style: "minified/jquery.sceditor.default.min.css"
			});
		};

		$("#theme").change(function() {
			var theme = "minified/themes/" + $(this).val() + ".min.css";

			$("textarea").sceditor("instance").destroy();
			$("link:first").remove();
			$("#theme-style").remove();

			loadCSS(theme, initEditor);
		});

		initEditor();
	});

</script>




<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


