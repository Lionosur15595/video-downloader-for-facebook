<?php 

$js = '{
  "description": "what the hell you have typed",
    "picture": "error.jpg"
}';

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

	 if(isset($array['error'])) {

	return false;	

	 }
	 else {
	 	return $json;
	 }


}



if (isset($_POST['url'])) {

	if (!empty($_POST['url'])) {


		$url = $_POST['url'];


$String = parse_url($url, PHP_URL_PATH);


$arr = explode('videos/', $String);

if (isset($arr[1])) {
	$id = $arr[1];
	$slash = substr($id, -1);
	if ($slash == "/") {
	   $id = substr($id, 0,-1);
	   echo $json = getSourceUrl($id);
	}



}

elseif(get_string_between($url, "https://m.facebook.com/story.php?story_fbid=", "&id")) {

  $id = get_string_between($url, "https://m.facebook.com/story.php?story_fbid=", "&id");
  echo $json = getSourceUrl($id);

}

else {
echo $js;
}
























}

}


?>