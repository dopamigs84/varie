<?php

//$path_allegato = $_SERVER['DOCUMENT_ROOT'].'/importfile/';
$path_allegato = '';

include 'php-image-resize/lib/ImageResize.php';

if(isset($_FILES['importfile'])){

    echo '<p>Esporto gli elementi.....</p>';

    //if(!move_uploaded_file($file_now["tmp_name"][$i],$path_allegato.basename($file_now["name"][$i]))){

    //$file_import = 'test.csv';
    $file_import = $_FILES['importfile']['name'];

    move_uploaded_file($_FILES['importfile']['tmp_name'],$path_allegato.basename($file_import));

    $read_file = fopen($file_import,'r');

    $zip_file = 'tutti_file_esportati.zip';

    $zip = new ZipArchive;

    if ($zip->open($zip_file, ZipArchive::CREATE) === TRUE){

        while ( ($dati = fgetcsv($read_file,0,',')) != FALSE ) {

            if($dati[0]!='Variant SKU'){

                $FILE_CODICE = $dati[0].'.txt';
                $FILE_CODICE_DESCRIZIONE = $dati[0].'_descrizione.txt';

                $file_codice = fopen($FILE_CODICE,'w');
                fputs($file_codice,$dati[1]);
                fclose($file_codice);
                $zip->addFile($FILE_CODICE);

                $file_codice_desc = fopen($FILE_CODICE_DESCRIZIONE,'w');
                fputs($file_codice_desc,$dati[2]);
                fclose($file_codice_desc);
                $zip->addFile($FILE_CODICE_DESCRIZIONE);

                if($dati[3]!=''){

                    $img = explode("/",$dati[3]);

                    $nome_foto = $img[count($img)-1];

                    if(copy($dati[3],$path_allegato.$nome_foto)){

                        $image = new \Gumlet\ImageResize($path_allegato.$nome_foto);
                        $image->resizeToWidth(200);
                        $image->save($path_allegato.'res_'.$nome_foto.'');

                        $explode_nome = explode('?',$nome_foto);

                        rename($path_allegato.'res_'.$nome_foto,$path_allegato.'res_'.$explode_nome[0]);
                        
                        $zip->addFile('res_'.$explode_nome[0]);
                    }

                }

                echo '<p>'.$dati[0].' esportato</p>';

            }

        }

        $zip->close();
    }

    echo '<p></p><a href="'.$zip_file.'">'.$zip_file.'</a></p>';

}

?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<center>
    <form action="" enctype="multipart/form-data" method="POST">
        <input type="file" name="importfile" id="importfile" accept=".csv">
        <button type="submit">Clicca per esportare il file</button>
    </form>
</center>