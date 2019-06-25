<?php
 $connect = new PDO('mysql:host=localhost;dbname=projet', 'root', '');
 session_start();  
 if(isset($_SESSION["id_auto"]))
 {
        $s =$_SESSION["id_auto"];
 }

 try {
    $connect = new PDO('mysql:host=localhost;dbname=projet', 'root', '');  
     $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  

     try {

        $statement = $connect->prepare("SELECT * FROM personnes INNER JOIN type_personne WHERE id_authentification = ? and personnes.type_personne= id_type_personne"); 
        // var_dump($statement);
    //    var_dump($statement) ;
       $statement->execute(
            array(  
                    $s
            )     
       ); 
       
       $count = $statement->rowCount();  
       if($count > 0)  
       {  
           $userinfo = $statement->fetch();
            $_SESSION["id_personne"] =  $userinfo["id_personne"]; 
            $_SESSION["nom"] = $userinfo["nom"];    
    }

    
    } catch (\Throwable $th) {
        
    }
} catch (\Throwable $th) {
   
}


 
//  echo $userinfo["nom"];
//  $t = $userinfo["nom"];



if( isset($_REQUEST['action']) ){


switch( $_REQUEST['action'] ){



    case "SendMessage":

        

        $query = $connect->prepare("INSERT INTO discution SET id_pseudo=?, messages=?");

        $query->execute([
            
            $userinfo["id_personne"], 
            $_REQUEST['message']
            
            ]);
    break;

    case "getChat":


			$query = $connect->prepare("SELECT nom,messages  FROM personnes  INNER JOIN discution WHERE id_personne=id_pseudo ");
			$query->execute();

            $NbreData = $query->rowCount();

            $rowAll = $query->fetchAll();
            // $chat = '';
            if ($NbreData != 0) 
                {
                    foreach ( $rowAll as $row ) 
	                {
                        echo '<div class="siglemessage"><strong>'.$row['nom'].':  </strong>'.$row['messages'].'</div>';
                        // echo $row['messages'];
                        
                 	// $chat .=  '<div class="siglemessage"><strong>'.$row->id_personne.':  </strong>'.$row->messages.'</div>';

                        
                       }
            }

			// $rs = $query->fetchAll(PDO::FETCH_OBJ);
			

			// $chat = '';
			// foreach( $rs as $r ){

			// 	$chat .=  '<div class="siglemessage"><strong>'.$r['nom'].':  </strong>'.$r['message'].'</div>';

			// }

			// echo $chat;


		break;
}
}

?>





