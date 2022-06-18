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
        <?php
            session_start();
        ?>
        <?php
            include 'connect.php';
            if(isset($_POST['update'])){
                $picture = $_POST['pphoto'];
                $title=$_POST['title'];
                $about=$_POST['about'];
                $content=$_POST['content'];
                $category=$_POST['category'];
                $date=date('d.m.Y.');
                if(isset($_POST['archive'])){
                    $archive=1;
                }else{
                    $archive=0;
                }
                $id = $_POST['id'];
                //IZBRISAO SI SLIKU IZ UDATEA
                 $query = "UPDATE clanak SET naslov='$title', sazetak='$about', tekst='$content', slika='$picture' ,kategorija='$category', arhiva='$archive' WHERE id=$id ";
                $result = mysqli_query($dbc, $query);
                                       
            }
            
            if(isset($_POST['delete'])){
                $id=$_POST['id'];
                $query = "DELETE FROM clanak WHERE id=$id ";
                $result = mysqli_query($dbc, $query);

             }
        
        ?>

        
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

    </body>

    <main>
        <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                       
                        <?php

                            echo " <h1>Dobrodošli " . $_SESSION['username']." </h1>";
                            include 'connect.php';
                            $query = "SELECT * FROM clanak";
                            $result = mysqli_query($dbc, $query);
                            while($row = mysqli_fetch_array($result)) {
                            echo '<form enctype="multipart/form-data" action="" method="POST">
                            <div class="form-item">
                            <label for="title">Naslov vjesti:</label>
                            <div class="form-field">
                            <input type="text" name="title" class="form-field-textual"
                            value="'.$row['naslov'].'">
                            </div>
                            </div>
                            <div class="form-item">
                            <label for="about">Kratki sadržaj vijesti (do 50
                            znakova):</label>
                            <div class="form-field">
                            <textarea name="about" id="" cols="30" rows="10" class="form-
                            field-textual">'.$row['sazetak'].'</textarea>
                            </div>
                            </div>
                            <div class="form-item">
                            <label for="content">Sadržaj vijesti:</label>
                            <div class="form-field">
                            <textarea name="content" id="" cols="30" rows="10" class="form-
                            field-textual">'.$row['tekst'].'</textarea>
                            </div>
                            </div>
                            <div class="form-item">
                            <label for="pphoto">Slika:</label>
                            <div class="form-field">
                            14
                            <input type="file" class="input-text" id="pphoto"
                            value="'.$row['slika'].'" name="pphoto"/> <br><img src="img/' .
                            $row['slika'] . '" width=100px>
                            // pokraj gumba za odabir slike pojavljuje se umanjeni prikaz postojeće slike
                            </div>
                            </div>
                            <div class="form-item">
                            <label for="category">Kategorija vijesti:</label>
                            <div class="form-field">
                            <select name="category" id="" class="form-field-textual"
                            value="'.$row['kategorija'].'">
                            <option value="sport">Sport</option>
                            <option value="kultura">Kultura</option>
                            </select>
                            </div>
                            </div>
                            <div class="form-item">
                            <label>Spremiti u arhivu:
                            <div class="form-field">';
                            if($row['arhiva'] == 0) {
                            echo '<input type="checkbox" name="archive" id="archive"/>
                            Arhiviraj?';
                            } else {
                            echo '<input type="checkbox" name="archive" id="archive"
                            checked/> Arhiviraj?';
                            }
                            echo '</div>
                            </label>
                            </div>
                            </div>
                            <div class="form-item">
                            <input type="hidden" name="id" class="form-field-textual"
                            value="'.$row['id'].'">
                            <button type="reset" value="Poništi">Poništi</button>
                            <button type="submit" name="update" value="Prihvati">
                            Izmjeni</button>
                            <button type="submit" name="delete" value="Izbriši">
                            Izbriši</button>
                            </div>
                            </form>';
                            }
                        ?>
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

</html>