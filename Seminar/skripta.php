<?php 
    if(isset($_POST['submit']))
    {
        include 'connect.php';

        $picture = $_POST['pphoto'];
        $title=$_POST['title'];
        $about=$_POST['about'];
        $content=$_POST['content'];
        $category=$_POST['category'];
        $date=date('d.m.Y.');
        
        if(isset($_POST['archive']))
        {
            $archive=1;

        }else{

            $archive=0;
        }

        
         $sql = "INSERT INTO clanak(datum , naslov , sazetak , tekst , slika , arhiva, kategorija )VALUES (? , ? , ? , ? , ? ,?, ? )";

         
         $result = mysqli_prepare($dbc , $sql);
         if($result)
         {
            mysqli_stmt_bind_param($result , 'sssssis' , $date , $title , $about , $content , $picture , $archive , $category);
            
            mysqli_stmt_execute($result);
         }
        
        
    }
?>