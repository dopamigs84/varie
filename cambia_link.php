<?php

function pulisci_stringa_permalink($stringa,$nolower = 0){

	$stringa = trim($stringa);
	
	if($nolower==0)
	$stringa = strtolower($stringa);

	$stringa = str_replace("?","",$stringa);
	$stringa = str_replace("!","",$stringa);
	$stringa = str_replace("#","",$stringa);
	$stringa = str_replace("+","-",$stringa);
	$stringa = str_replace("'","_",$stringa);
	$stringa = str_replace("\"","_",$stringa);
	$stringa = str_replace(":","_",$stringa);
	$stringa = str_replace("/","",$stringa);
    $stringa = str_replace(" ","+",$stringa);
	$stringa = str_replace(" - ","-",$stringa);

	$stringa = str_replace(".","",$stringa);
	$stringa = str_replace(",","",$stringa);
	$stringa = str_replace("(","",$stringa);
	$stringa = str_replace(")","",$stringa);
	$stringa = str_replace("Ø","",$stringa);
	$stringa = str_replace("--","-",$stringa);
	$stringa = str_replace("à", "a", $stringa);
	$stringa = str_replace("è", "e", $stringa);
	$stringa = str_replace("ò", "o", $stringa);
	$stringa = str_replace("ì", "i", $stringa);
	$stringa = str_replace("ù", "u", $stringa);
	$stringa = str_replace("&amp;", "e", $stringa);
	$stringa = str_replace("&agrave;", "a", $stringa);
	$stringa = str_replace("&egrave;", "e", $stringa);
	$stringa = str_replace("&igrave;", "i", $stringa);
	$stringa = str_replace("&ograve;", "o", $stringa);
	$stringa = str_replace("&ugrave;", "u", $stringa);
	$stringa = str_replace("&quot;", "", $stringa);
	$stringa = str_replace("&","-",$stringa);
	
    return $stringa;
	
}

$url = isset($_POST['url']) ? $_POST['url'] : '';
$tag = isset($_POST['tag']) ? $_POST['tag'] : '';

if($url!=''){

    $date = new DateTime();
    $quid = $date->getTimestamp();

    if(!preg_match("/\?/",$url))
        $new_url = $url.'?quid='.$quid;
    else
        $new_url = $url.'&quid='.$quid;

    if($tag!='')
        $new_url .= '&keywords='.pulisci_stringa_permalink($tag);

        echo '<p><strong>Nuovo url</strong><br> '.$new_url.'</p>';

}

?>

<p>&nbsp;</p>
<p>&nbsp;</p>

<center>
    <form action="" enctype="multipart/form-data" method="POST">
        <label for="url">Url</label>
        <input type="text" name="url" id="url" value="<?php echo $url; ?>">

        <label for="tag">Tag</label>
        <input type="text" name="tag" id="tag" >
        <button type="submit">Clicca per ricreare l'url</button>
    </form>
</center>