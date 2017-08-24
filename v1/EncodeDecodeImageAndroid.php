<?php
 header('Content-type : bitmap; charset=utf-8');
 
 if(isset($_POST["encoded_string"])){
 	
	$encoded_string = $_POST["encoded_string"];
	$image_name = $_POST["image_name"];
	
	$decoded_string = base64_decode($encoded_string);
	
	$path = 'images/'.$image_name;
	
	$file = fopen($path, 'wb');
	
	$is_written = fwrite($file, $decoded_string);
	fclose($file);
     
     //A ce niveau l'image va etre stocké dans le serveur
	
	if($is_written > 0) {  //si le fichier a été érit sur le serveur alors uen connection sera ouverte
		
		$connection = mysqli_connect('mysql:host=localhost;dbname=test', $user, $pass);
		$query = "INSERT INTO photos(name,path) values('$image_name','$path');";
		
		$result = mysqli_query($connection, $query) ;
		
        
         $sql  = "SELECT * FROM  WHERE image_name'=? and path=?";
            $stmt = $pdo->prepare($sql);
           $result= $stmt->execute(array(
                $image_name,
                $path
            ));
        
        
		if($result){
			echo "success";
		}else{
			echo "failed";
		}
		
		mysqli_close($connection);
	}
 }
?>