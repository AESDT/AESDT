<?php
session_start();  
 $username = $_POST['username'];
 $password = $_POST['password'];


 try {
    $connect = new PDO('mysql:host=localhost;dbname=projet', 'root', '');  
     $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  

     try {

        $statement = $connect->prepare("SELECT * FROM authentification WHERE username = ? and password = ?"); 
        // var_dump($statement);
    //    var_dump($statement) ;
       $statement->execute(
            array(  
                $username ,
                $password
            )  
       );  

       
       $count = $statement->rowCount();  
       if($count > 0)  
       {  
           $userinfo = $statement->fetch();
            $_SESSION["id_auto"] =  $userinfo["id_auto"]; 
            $_SESSION["username"] = $userinfo["username"]; 
            $_SESSION["password"] = $userinfo["password"];  
            //  echo "succes";
            if($userinfo["nom_statut"]==1)
            {
                header("Location: pages/administration.php");
            }else
            {
                header("Location: ../contenue/accueil.html");
            }
              
       }  
        // var_dump($userinfo);
       else  
       {  
            $message = '<label>Wrong Data</label>';  
            echo "erreur";
            header("Location: login.html");
       }  

     
     } catch (\Throwable $th) {
        
     }
 } catch (\Throwable $th) {
    
 }
    
     
            //    $query = "SELECT * FROM authentification WHERE username = ? and password = ?";  

              








































// try
// {
//     $bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '');
// }
// catch (Exception $e)
// {
//         die('Erreur : ' . $e->getMessage());
// }
// session_start();
// $bdd = new PDO ('mysql:host=127.0.0.1; dbname=projet','root', '');

//  $username = $_POST['username'];
//  $password = $_POST['password'];

//  echo $username;
//  echo $password;

//  $resul = 

// if($bdd->prepare(" SELECT * FROM authentification WHERE username=$username AND password=$password"))
// {
//     echo "BIENVENUE";
//     echo $username;
//     echo $password;

// }else
// {
//     echo "erreur";

// }

// $sql= mysql_query(" SELECT * FROM authentification WHERE username= "'.$_POST['username'].'" AND password=$password");
// $sql = $bdd->query("SELECT * FROM authentification WHERE username = '".$_POST['username']."' and password = '".md5($_POST['password'])."'");
// $req= mysql_num_rows($sql);
 
// if( $req ==1)
// {
//     header('Location: welcome.php');
// } else
// {
//     echo "erreur";
// }
// if(! $req ) echo ('Requête invalide:'. mysql_error());
// if (mysql_num_rows($req)==0) header("Location:identification.php?erreur=login");
// if (mysql_num_rows($req)==1) header("parfait");


// $sql = " SELECT * FROM authentification WHERE username=$username AND password=$password";

// $req = mysql_query($sql) ;
// if(! mysql_result($req, 0, 'existe')) {
//     do_html_header(); 
//     die('<h3>Sorry</h3>Username or Password does not exist.');
//  }
//  do_html_header();
//  echo'<h3>Welcome </h3>'.$webUser;

// echo $data ;
// $r = $bdd->prepare(" SELECT * FROM authentification ");
// $r->execute(array($username , $password));





?>