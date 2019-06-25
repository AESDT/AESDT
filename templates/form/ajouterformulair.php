<?php

$connect = new PDO('mysql:host=localhost;dbname=projet', 'root', '');


//image 
$target_dir = "../../img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file);

if ($_FILES["fileToUpload"]["size"] > 50000000000) {
    echo "Sorry, your file is too large.";
   
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}






//

$name = $_POST['name'];
$prenom = $_POST['prenom'];
$naissance =$_POST['naissance'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];


$adresse = $_POST['adresse'];
$gouvernorat = $_POST['gouvernorat'];
$adressecomplet = $adresse.'-'.$gouvernorat ;


$statut =$_POST['statut'];
$etablissement = $_POST['etablissement'];
$filiere = $_POST['filiere'];
$annee = $_POST['annee'];


$username = $_POST['username'];
$password = $_POST['password'];


$numstatut = 0;

if($statut=='medecine')
{
  $numstatut = 1 ;
}else if($statut=='etudiant')
{
  $numstatut = 2 ;
}else
{
  $numstatut = 3 ;
}




try {
  $statement = $connect->prepare("SELECT * FROM authentification WHERE username = ? and password = ?"); 
  $statement->execute(
  array(  
      $username ,
      $password
  )  
); 

$count = $statement->rowCount();  
if($count <= 1)  
{ 
  $req = $connect->prepare('INSERT INTO authentification(username,password) VALUES(?,?)');
  $req->execute(array(
  $username,
  $password
   
)); 

$statement = $connect->prepare("SELECT * FROM authentification WHERE username = ? and password = ?"); 
$statement->execute(
  array(  
      $username ,
      $password
  )  
);

$userinfo = $statement->fetch();
$_SESSION["id_auto"] =  $userinfo["id_auto"]; 

// echo  $userinfo["id_auto"]; 

$req = $connect->prepare('INSERT INTO personnes(nom,prenom,telephone,email,adresse,type_personne,etablissement,filiere,an_univ,photo,id_authentification,naissance ) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)');
                $req->execute(array(
                  $name,
                  $prenom,
                  $telephone,
                  $email,
                  $adressecomplet,
                  $numstatut,
                  $etablissement,
                  $filiere,
                  $annee,
                  $target_file, 
                  $userinfo["id_auto"],
                  $naissance
                ));

                header("Location: ../login/login.html");            


  

 }else {
  $message = "Desole cet Nom Utilisateur et mot de passe EXISTE Deja ";
  echo "<script type='text/javascript'>alert('$message');</script>";
  
  }
 
} catch (\Throwable $th) {
  //throw $th;
}
               

?>