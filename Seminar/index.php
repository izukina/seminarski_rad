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
        <?php
            include 'connect.php'; 
        ?>
            <section class="container">
                <div class="row">
                    <div class="col-12 col-lg-12" id="naslov">
                        <p>Sport</p>
                    </div>
                    <?php
                        $query = "SELECT * FROM clanak WHERE arhiva=0 AND kategorija='sport' LIMIT 3";
                        $result = mysqli_query($dbc, $query);
                        $i=0;
                        while($row = mysqli_fetch_array($result))
                        {
                            echo "<article class='col-12 col-lg-4 ' id='artikl'>";
                            echo "<div class='image'>";
                            echo "<img id ='popravak' src='img/" . $row['slika']."'>";
                            echo "</div>";
                            echo "<div class='text'>";
                            echo "<a href='clanak.php?id=" . $row['id'] . "'>";
                            echo "<h1>";
                            echo $row['naslov'];
                            echo "</h1>";
                            echo "</a>";
                            echo "<p>";
                            echo $row['sazetak'];
                            echo "</p>";
                            echo "</div>";
                            echo "</article>";
                        }
                    ?>

                </div>

                
                
            </section>
           

            <section class="container">
                <div class="row">
                    <div class="col-12 col-lg-12" id="naslov">
                        <p>Food</p>
                    </div>
                    <?php
                        $query = "SELECT * FROM clanak WHERE arhiva=0 AND kategorija='hrana' LIMIT 3";
                        $result = mysqli_query($dbc, $query);
                        $i=0;
                        while($row = mysqli_fetch_array($result))
                        {
                            echo "<article class='col-12 col-lg-4 ' id='artikl'>";
                            echo "<div class='image'>";
                            echo "<img id ='popravak' src='img/" . $row['slika']."'>";
                            echo "</div>";
                            echo "<div class='text'>";
                            echo "<a href='clanak.php?id=" . $row['id'] . "'>";
                            echo "<h1>";
                            echo $row['naslov'];
                            echo "</h1>";
                            echo "</a>";
                            echo "<p>";
                            echo $row['sazetak'];
                            echo "</p>";
                            echo "</div>";
                            echo "</article>";
                        }
                    ?>
                   
                    
                </div>

 
                
            
                
            </section>

       </main>

        
           
            <div class="container">
                <div class="row">
                    <footer class="col-lg-12" id="podnozje">

                        <h1>WELT</h1>
                       
                    </footer>
                   
                </div>
            </div>

        




    </body>
</html>