<!DOCTYPE html>
<html>
   <head>
      
        <meta charset = "utf-8">
        <title>Naslovna stranica</title>
        <link rel ="stylesheet" type="text/css" href="style.css?v=<?php echo time();?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
   </head>

   <body>

        <div class="container">
            <div class="row">
                    <header class="col-lg-12 col-12">
                        <div class="col-12" id="welt">
                            <h1>WELT</h1>
                        </div>
                        <div id="navigacija">
                            <nav class="col-lg-12 col-md-12 col-12">
                                <ul>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-12 col-12">
                                            <li><a href="index.php">Home</a></li>
                                        </div>
                                       
                                        <div class="col-lg-3 col-md-12  col-12">
                                            <li><a href="unos.html">Unos</a></li>
                                        </div>
                                        <div class="col-lg-3 col-md-12  col-12">
                                            <li><a href="login.php">Administracija</a></li>
                                        </div>
                                        <div class="col-lg-3 col-md-12  col-12">
                                            <li><a href="sport.php">Sport</a></li>
                                        </div>
                                        <div class="col-lg-3 col-md-12  col-12">
                                            <li><a href="hrana.php">Hrana</a></li>
                                        </div>
                                    </div>
                                </ul>
                            </nav>
                        </div>
                    </header>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                <h3>Niste prijavljeni. Tu se možete registrirati :</h3>
                    <form method ="post" action ="" class="forma">
                        
                        <label for ="ime">
                        <input type ="text" name ="ime" required> ime: </input><br>
                        <br><br>

                        <label for ="prezime">
                        <input type ="text" name ="prezime" required>Prezime: </input>
                        <br><br>

                        <label for ="username">
                        <input type ="text" name ="username" required>Korisničko ime: </input><br>
                        <br><br>

                        <label for ="lozinka">
                        <input type ="password" name ="lozinka" required>Lozinka: </input><br>
                        <br><br>

                        <label for ="lozinka2">
                        <input type ="password" name ="lozinka2" required>Ponovite lozinku: </input><br>
                        <br><br>

                        <input type ="submit" name ="submit"></input>
                    </form>
                </div>
            </div>
        </div>
        




        <div class="container">
            <div class="row">
                <footer class="col-lg-12" id="podnozje">
                    <h1>WELT</h1>
                </footer>
            </div>
        </div>

        <?php
     
            if(isset($_POST['submit']))
            {

                $ime= $_POST['ime'];
                $prezime = $_POST['prezime'];
                $username = $_POST['username'];
                $lozinka = $_POST['lozinka'];
                $lozinka2 = $_POST['lozinka2'];


                $dbc = mysqli_connect('localhost' , 'root' , '' , 'seminarska_baza')
                or die('Error connecting to mysql server' . mysqli_connect_error());

                if($lozinka == $lozinka2)
                {
                    $hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
                    
                    $sql="INSERT INTO korisnik (ime , prezime , username , lozinka)
                    VALUES (? , ? , ? , ?)";


                    $stmt=mysqli_stmt_init($dbc);



                    if (mysqli_stmt_prepare($stmt, $sql)){
                
                        mysqli_stmt_bind_param($stmt,'ssss',$ime, $prezime, $username , $hashed_password);
                        mysqli_stmt_execute($stmt);
                    }
                }else{
                    echo "Lozinka i ponovljena lozinka nisu iste. Pokusajte ponovo.";
                }
                

        


            }
        ?>

   </body>
</html>