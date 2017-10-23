<?php session_start(); ?>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/font.css">
<link rel="stylesheet" type="text/css" href="css/materialize.css">
<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
<link rel="icon" type="image/x-icon" href="../img/logo.jpg">
<title>LIONOSUR FACEBOOK VIDEO DOWNLOADER | LIONOSUR AUTOLIKER SERVICES</title>
<div class="col-xs-12 text-center blue darken-4" style="color: white;">
<h4><i class="fa fa-paw"></i>&nbsp;LIONOSUR FACEBOOK VIDEO DOWNLOADER
</h4>
</div>
<style type="text/css">
	@font-face {
		font-family: ubu;
		src: url("fonts/ubuntu.ttf");
	}
	body {
		font-family: ubu;
	}
</style>
<script type="text/javascript" src="dist/sweetalert.min.js"></script>
<div class="col-xs-2"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ad2 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6054708674491134"
     data-ad-slot="2778597209"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></div>
<div class="col-xs-8 text-left" style="margin-top: 7em;">



	<div class="panel panel-primary">

	<div class="panel panel-heading blue darken-2">

	<h5><b><i class="fa fa-pencil"></i>&nbsp;paste the url here</b>
</h6>


	</div>

	<div class="panel panel-body">

	<form method="POST">
	<div class="text-center">

<br/><br/>
	<div id="data"></div>
	<input type="text" name="url" placeholder="https://www.facebook.com/VideoMemesOfficial/videos/1909452742659781/" id="input">

<br/><br/>
	<div class="text-center">
	<br/><br/>
	
<br/><br/><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ad2 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6054708674491134"
     data-ad-slot="2778597209"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
	<input type="submit" class="btn btn-large red" value="DOWNLOAD">
	</div>
	</div>

	</form>

	</div>


	</div>



</div>

<div class="col-xs-2"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ad2 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6054708674491134"
     data-ad-slot="2778597209"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></div>


<div class="col-xs-12 text-center">
<br/><br/><br/><br/>

<br/><br/><br/>
<br/><br/>
</div>

<div class="col-xs-12 text-center blue darken-4" style="color: white;">
<h6><b>&copy;<?php echo date('Y'); ?> LIONOSUR.COM | CODED BY DARK KNIGHT</b>
</div>


<?php


function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}




function getSourceUrl($id) {

	$ch = curl_init();

	$url = "https://graph.facebook.com/$id?access_token=EAAAAUaZA8jlABAP1gyF3a7CWObvzpT7C1ACyw27GYf1RPZCNYISDrZA2AnOR8LdIU5IFqU2M1t7rS1NeXLXhrBZCGINRhIbQkZBHXdjd4c5xxZCyKlJNMTjHKzKBYMvysZBsEYCaEixjYNKXjYxQ6Blo8HOrYJHhEQovzZAM2PjUl7c3HiPkiC9ZByzwdY3jQmcwZD";

	$url = trim($url);

	curl_setopt_array($ch, array(CURLOPT_URL=>$url, CURLOPT_RETURNTRANSFER=>1));

	$json = curl_exec($ch);

	$array = json_decode($json, true);

	if (isset($array['error'])) {

		return false;

	}
	else {
		return $source = $array['source'];
	}
}



if (isset($_POST['url'])) {

	if (!empty($_POST['url'])) {


		$url = $_POST['url'];


$String = parse_url($url, PHP_URL_PATH);


$arr = explode('videos/', $String);

if (isset($arr[1])) {
	$id = $arr[1];
}


elseif (get_string_between($url, "https://m.facebook.com/story.php?story_fbid=", "&id")) {

 $id = get_string_between($url, "https://m.facebook.com/story.php?story_fbid=", "&id");

}


else {
	echo '<script>
	swal({
  title: "Error in URL?",
  text: "the url entered is invalid, make sure it is in format of https://www.facebook.com/pagename/videos/video_id/ or https://m.facebook.com/story.php?story_fbid=200207863818874&id=164710247368636",
  type: "error",

  confirmButtonColor: "#DD6B55",
  confirmButtonText: "enter a valid url!",
  closeOnConfirm: false
},
function(){
window.location = "index.php";
});

</script>';
	exit();
}


$slash = substr($id, -1);

if ($slash == "/") {


	$id = substr($id, 0,-1);

	 $source = getSourceUrl($id);

	 if ($source != false) {


$_SESSION['url'] = $source;

	 header("location: download.php");




	}






}



	elseif (get_string_between($url, "https://m.facebook.com/story.php?story_fbid=", "&id")) {

		

			 $source = getSourceUrl($id);

	 if ($source != false) {


$_SESSION['url'] = $source;

	 header("location: download.php");




	}


	}
	else {


		echo '<script>
	swal({
  title: "Error in URL?",
  text: "the url entered is invalid, make sure it is in format of https://www.facebook.com/pagename/videos/video_id/",
  type: "error",

  confirmButtonColor: "#DD6B55",
  confirmButtonText: "enter a valid url!",
  closeOnConfirm: false
},
function(){
window.location = "index.php";
});

</script>';

exit();
		
	}













	}


}


?>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function r() {
url = $('#input').val();


if ($.trim(url).length > 0) {
$.post("ajax.php", {url: url},  function(data) {

	
	var json = $.parseJSON(data);

	var des  = json.description;
	var pic = json.picture;

	
	$('#data').html("<div class='text-center'><h5>" + des + "</h5></div><img src=" + pic + ">");

} );

}


setTimeout(r, 100);


});
</script>