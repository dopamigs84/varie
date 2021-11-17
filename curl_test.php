<?php

//$data_json = file_get_contents('AS400.json');

$data_json = array(
  "Usrname" => "GLOBALB",
  "Password" => "SG567_g!99",
  "id" => 519,
  "stagione" => 2022,
  "nome" => "ANGELA",
  "cognome" => "PALAMARA",
  "nominativo" => "PALAMARA ANGELA",
  "cf" => "",
  "telefono" => "3497833707",
  "email" => "angelapalamara46@gmail.com",
  "nazione" => "I",
  "regione" => "Toscana",
  "provincia" => "FI",
  "localita" => "FIRENZE",
  "cap" => "50132",
  "indirizzo" => "VIA LA FARINA 2",
  "ritornato" => 1,
  "agenzia_codice" => "",
  "agenzia_identificativo" => "",
  "agenzia_cliente" => 0,
  "stagionale" => 0,
  "pax" => 4,
  "animali" => 0,
  "rimessaggio" => 0,
  "vaucher" => "",
  "caparra" => 0.00,
  "data_caparra" => "0000-00-00",
  "data_rest_caparra" => "0000-00-00",
  "sistema" => "gestionale",
  "tipo_pagamento" => "bonifico",
  "invio_dati_pagamento" => "0000-00-00",
  "vecchio_codice" => 0,
  "vecchio_prg" => 0,
  "vecchio_anno_sogg" => 0,
  "note_1" => "055242397 non cambiare",
  "note_2" => "",
  "note_3" => "",
  "next" => 0,
  "stato" => 1,
  "inserimento" => "2021-11-11",
  "scadenza" => "2021-11-19",
  "ultimo_utente" => "M.Marseglia",
  "STR_1_tipo" => "CAD",
  "STR_1_codice" => 68,
  "STR_1_dal" => "2022-07-22",
  "STR_1_al" => "2022-08-05",
  "STR_2_tipo" => "",
  "STR_2_codice" => 0,
  "STR_2_dal" => "0000-00-00",
  "STR_2_al" => "0000-00-00",
  "STR_3_tipo" => "",
  "STR_3_codice" => 0,
  "STR_3_dal" => "0000-00-00",
  "STR_3_al" => "0000-00-00",
  "OMB_1_tipo" => "",
  "OMB_1_codice" => 0,
  "OMB_1_dal" => "0000-00-00",
  "OMB_1_al" => "0000-00-00",
  "OMB_1_prezzo" => 0,
  "OMB_2_tipo" => "",
  "OMB_2_codice" => 0,
  "OMB_2_dal" => "0000-00-00",
  "OMB_2_al" => "0000-00-00",
  "OMB_2_prezzo" => 0,
  "OMB_3_tipo" => "",
  "OMB_3_codice" => 0,
  "OMB_3_dal" => "0000-00-00",
  "OMB_3_al" => "0000-00-00",
  "OMB_3_prezzo" => 0,
  "SER_1_tipo" => "",
  "SER_1_codice" => 0,
  "SER_1_dal" => "0000-00-00",
  "SER_1_al" => "0000-00-00",
  "SER_2_tipo" => "",
  "SER_2_codice" => 0,
  "SER_2_dal" => "0000-00-00",
  "SER_2_al" => "0000-00-00",
  "SER_3_tipo" => "",
  "SER_3_codice" => 0,
  "SER_3_dal" => "0000-00-00",
  "SER_3_al" => "0000-00-00",
  "SER_4_tipo" => "",
  "SER_4_codice" => 0,
  "SER_4_dal" => "0000-00-00",
  "SER_4_al" => "0000-00-00",
  "SER_5_tipo" => "",
  "SER_5_codice" => 0,
  "SER_5_dal" => "0000-00-00",
  "SER_5_al" => "0000-00-00");

$data_json = json_encode($data_json,JSON_NUMERIC_CHECK);



//$data_json = substr($data_json, 1, strlen($data_json) - 2);

//var_export($data_json);

$url_as = "http://192.168.2.245:10010/web/services/SetPrenotazione/";
$curl = curl_init($url_as);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_json);
curl_setopt($curl, CURLOPT_HTTPHEADER,array("Content-type: application/json; charset=utf-8"));

$json_response = curl_exec($curl);

if($json_response === false)
	echo curl_error($curl);
	
if(curl_errno($curl))
	echo curl_error($curl);

$status = curl_getinfo($curl);

curl_close($curl);

//var_dump($status);

echo '<pre>';
	var_export($status);
echo '</pre>';


//http_response_code($status);

?>
