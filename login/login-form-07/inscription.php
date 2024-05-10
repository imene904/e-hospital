<?php
    $host="localhost";
    $user="root";
    $pw="";
    $db="ehospital";
    $conx=mysqli_connect($host,$user,$pw,$db);
    if($conx==false){
    echo "error connexion";
    }
   
      if($_SERVER["REQUEST_METHOD"]=="POST"){
        session_start();
        $_SESSION['mail']=$_POST["email"];
        $name=$_POST['username'];
        $prenom=$_POST['prenom'];
        $email=$_POST['email'];
        $tel=$_POST['num_tel'];
        $psw=$_POST['password'];
        $nc=$_POST['nc'];
        $adresse=$_POST['adresse'];
        $date_nais=$_POST['date_nais'];
        if(isset($_POST['d'])){
          $role="docteur";
        }
        else if(isset($_POST['p'])){
          $role="patient";
        }
         
         
        $sql1="select *  FROM `patient` where Email='$email'";  
        $res2=mysqli_query($conx,$sql1);
        $num2=mysqli_num_rows($res2);
           if ($num2>0)
             { echo " client deja existe ." ;  } 
           else{
              $sql="INSERT INTO `patient`(`nom`, `prenom`, `num_tel`, `adresse`, `Email`, `date_nais`, `mdp`, `cin`,`role`)
               VALUES  ('$name','$prenom','$tel','$adresse','$email','$date_nais','$psw','$nc','$role');";
  mysqli_query($conx,$sql);
 
    header('location:accueil.php');
  
         }}
  ?>
  
















<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/3.png" />
    <title>E-hospital</title>
  </head>
  <body>
  

  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3 > INSCRIPTION  </h3>
              
            </div>
            <form  name="form1" action="#" method="post">
              <div>
              <div class="form-group first">
                <label for="username">Nom :</label>
                <input type="text" name="username" class="form-control" id="username">

              </div>
              
              <div class="form-group first">
                <label for="prenom">Prenom :</label>
                <input type="text"  name="prenom" class="form-control" id="prenom">

              </div>
              
              <div class="form-group first">
                <label for="email">Email :</label>
                <input type="Email" name="email"  class="form-control" id="email">

        </div>
        <div class="form-group first">
                <label for="nc">N°CIN :</label>
                <input type="nc" name="nc" type="number" class="form-control" id="nc" onchange="Validate(document.form1.nc)" onkeypress="return isNumberKey(event)">
              </div>
            
              <div class="form-group first">
                <label for="adresse">Adresse :</label>
                <input type="text" name="adresse" class="form-control" id="adresse">
              </div>
              <div class="form-group first">
                <label for="num_tel">Num tel :</label>
                <input type="num_tel" name="num_tel" class="form-control" id="num_tel" onchange="Validate(document.form1.num_tel)" onkeypress="return isNumberKey(event)">
              </div>
              <div class="form-group first">
                <label for="password">mot de passe :</label>
                <input type="password" name="password" class="form-control" id="password">
              </div>
              <div class="form-group last mb-4">
               
                <input type="Date"  name="date_nais" class="form-control" id="date_nais">
                
              </div>
        
              <div class="form-group first">
                <label class="control control--checkbox mb-0" id="d" name="d" value="d"><span class="caption">Docteur </span>
                  <input type="checkbox" />
                  <div class="control__indicator"></div>
                </label>
              </div>
              <div class="form-group first">
                <label class="control control--checkbox mb-0" id="p" name="p" value="p"><span class="caption">Patient</span>
                  <input type="checkbox" />
                  <div class="control__indicator"></div>
                </label>
              </div>
              
             
              
        </div>
             
        <br>
              
             
             
             
             
             
              
            

              <input type="submit" value="CONTINUER" class="btn btn-block btn-primary">
                    
               
              <span class="d-block text-left my-4 text-muted">&mdash; où se connecter avec &mdash;</span>
              
              <div class="social-login">
                <a href="https://www.facebook.com" class="facebook">
                  <span class="icon-facebook mr-3"></span> 
                </a>
                <a href="https://twitter.com/login?lang=fr" class="twitter">
                  <span class="icon-twitter mr-3"></span> 
                </a>
                <a href="https://www.google.com/?hl=fr" class="google">
                  <span class="icon-google mr-3"></span> 
                </a>
              </div>
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/validation.js"></script>
  </body>
</html>