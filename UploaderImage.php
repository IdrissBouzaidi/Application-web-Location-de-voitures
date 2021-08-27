<?php
   function UploaderImage($nameFile, $nameSubmit, $id){//nameFile : <input ... name = "..."
                                                   //id : le nom que l'image va prendre dans son répertoire.
      if(isset($_POST[$nameSubmit])){
         $MaxSize = 600000;
         $ValidFormats = array('.jpeg', '.jpg', '.png', '.gif');
         if($_FILES[$nameFile]['error'] > 0){
            echo "Une erreur s'est survenu lors du transfert";
            die;
         }
         $FileSize = $_FILES[$nameFile]['size'];
         if($FileSize > $MaxSize){
            echo "Le fichier est trop volumineux !!";
            die;
         }
         $FileName = $_FILES[$nameFile]['name'];
         $fileExt = "." . strtolower(substr(strrchr($FileName, "."), 1));
         if(!in_array($fileExt, $ValidFormats)){
            echo "Le fichier n'est pas une image !!";
            die;
         }
         $tmlName = $_FILES[$nameFile]['tmp_name'];
         $fileName = "Images/Voitures/" . $id . $fileExt;
         $resultat = move_uploaded_file($tmlName, $fileName);
         if(!$resultat){
            echo "Transfert terminé !!";
         }
      }
      return $fileName;
   }
   $x = 0;
   //UploaderImage("ImageUploaded", "SubmitPublicite", "IdrissYla Bgha y5dm");
?>
