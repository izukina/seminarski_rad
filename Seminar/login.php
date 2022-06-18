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

    

    <main>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                <form method ="post" action ="login.php" class="">
                    <label for ="username">
                    <input type ="text" name ="username" required>Korisničko ime: </input><br>
                    <br><br>

                    <label for ="password">
                    <input type ="password" name ="password" required>Lozinka: </input>
                    <br><br>

                    <input type ="submit" name ="submit"></input>
                </form>
                </div>
            </div>
        </div>
                        

                        
            
            
    </main>

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
            include 'connect.php';

            $username = $_POST['username'];
            $password = $_POST['password'];

            $uspjesna_prijava = FALSE;
            $admin = FALSE;

            $hashed_password = password_hash($password , CRYPT_BLOWFISH);

            session_start();
            
            $sql = "SELECT username, lozinka, razina FROM korisnik
            WHERE username = ?";

            $stmt = mysqli_stmt_init($dbc);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, 's', $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
            }

            mysqli_stmt_bind_result($stmt, $korisnicko_ime, $lozinka , $razina);
            mysqli_stmt_fetch($stmt);
            

            

            if(password_verify($_POST['password'] , $lozinka) && mysqli_stmt_num_rows($stmt) > 0)
            {
                $uspjesna_prijava = TRUE;
            }
            if($razina == 1)
            {
                $admin = TRUE;
            }
               

            if($admin && $uspjesna_prijava)
            {
                $_SESSION['username'] = $username;
                header('Location: administracija.php');
                   
            }

            elseif($uspjesna_prijava)
            {
                echo "<p>Dobrodošli " .$korisnicko_ime . ". Uspješno ste prijavljeni , ali niste administrator.</p>"; 
            }else{
                header('Location: registracija.php');
            }

                
        }     
            
                 
      ?>
</body>

</html>