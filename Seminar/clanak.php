<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Članak</title>
        <link rel ="stylesheet" type="text/css" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    </head>

    <body>
        <?php
            include 'connect.php';
            $id = $_GET['id'];
        ?>
        <div class="container">
            <div class="row">
                    <header class="col-lg-12 col-12">
                        <div class="col-12" id="welt">
                            <h1>WELT</h1>
                        </div>
                        <div id="navigacija">
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
                                            <li><a href="administracija.php">Administracija</a></li>
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
                        </div>
                    </header>
            </div>
        </div>


        <main>
           

            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-12" id="naslov">
                      <h1>
                        <?php
                        include 'connect.php';
                            $query = "SELECT * FROM clanak WHERE arhiva=0 AND id=$id ";
                            $result = mysqli_query($dbc, $query);
                            $i=0;
                            while($row = mysqli_fetch_array($result))
                            {
                                echo $row['naslov'];  
                            }
                        ?>
                      </h1>
                    </div>
                    <hr> 
                </div>   
            </div>
            <div class="container" id="ukratko_clanak">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                       
                        <h2>
                            <?php
                            $query = "SELECT * FROM clanak WHERE arhiva=0   AND id=$id ";
                            $result = mysqli_query($dbc, $query);
                            $i=0;
                            while($row = mysqli_fetch_array($result))
                            { 
                                echo $row['sazetak'];
                            }
                            ?>
                        </h2>
                        <p>Date: 16.5.2022</p>
                        
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-12" id="slika_clanka">
                    <?php
                        $query = "SELECT * FROM clanak WHERE arhiva=0  AND id=$id  ";
                        $result = mysqli_query($dbc, $query);
                        $i=0;
                        while($row = mysqli_fetch_array($result))
                        {
                            echo "<div class='image'>";
                            echo "<img id ='popravak' src='img/" . $row['slika']."'>";
                            echo "</div>";
                        }
                    ?>
                       
                    </div>
                    <div class="paragraf">
                        <p>
                        <?php
                        $query = "SELECT * FROM clanak WHERE arhiva=0 AND id=$id ";
                        $result = mysqli_query($dbc, $query);
                        $i=0;
                        while($row = mysqli_fetch_array($result))
                        {
                           
                            echo $row['tekst'];
                        } 
                    ?>
                           
                           
                        </p>
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

        </main>
    </body>
</html>
