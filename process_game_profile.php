<?php

session_start();
if (!isset($_SESSION['id']))
    {
        print "";
    }
$sess_id = $_SESSION['id'];
$gameid = $_GET['gameid'];




function getContent($sess_id) 
{
    
    include_once "functions.php";
    $dbs = db_connection();
        
    
    
    
    
    //add a new item to DB
    if (isset($_GET['img'])) 
    {
        $u = $_GET['img'];
        
        
        
    if ($u == "true")
    {
            $target_dir = "upload/";
            $target_file = $target_dir . $_SERVER['REQUEST_TIME'] . "-" . basename($_FILES["fileToUpload"]["name"]);
            $target_file = str_replace(" ", "-", $target_file);
                $target_file = str_replace("_", "-", $target_file);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 2000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
            $filename = $_SERVER['REQUEST_TIME'] . "-" . $_FILES["fileToUpload"]["name"];
                $filename = str_replace(" ", "-", $filename);
                $filename = str_replace("_", "-", $filename);
    }
   
        
        
        
        
        
        
        
        
        
if ($u == "false")
{
    
        
    
        $headline = addslashes(strip_tags($_POST['headline']));
        $description = addslashes(strip_tags($_POST['description']));
        $genre = addslashes(strip_tags($_POST['genre']));
        $workers = addslashes(strip_tags($_POST['workers']));
        $start_month = addslashes(strip_tags($_POST['start_month']));
        $start_year = addslashes(strip_tags($_POST['start_year']));
        $end_month = addslashes(strip_tags($_POST['end_month']));
        $end_year = addslashes(strip_tags($_POST['end_year']));
        $engine = addslashes(strip_tags($_POST['engine']));
        $hiring=addslashes(strip_tags($_POST['hiring']));
    
    include_once "functions.php";
        $website = make_website(addslashes(strip_tags($_POST['website'])));
    
    
    
    
    
        $gameid = $_GET['gameid'];

        $query = "UPDATE games
                SET description = '$description', genre='$genre', workers='$workers', headline='$headline', start_month='$start_month', start_year='$start_year', end_month='$end_month', end_year='$end_year', engine='$engine', hiring='$hiring', website='$website'
                WHERE userid='$sess_id' AND id='$gameid'";
    
    
        
}
else
{
    $gameid = $_GET['gameid'];
        $image = $filename;
        $query = "UPDATE games SET image='$image' WHERE userid='$sess_id' AND id='$gameid'";
}
        //$query = "INSERT INTO `gamerstack`.`portfolio` (`id`, `userid`, `title`, `caption`, `description`, `image`, `date_added`) VALUES (NULL, '$sess_id', '$title', '$caption', '$description', '$image', CURRENT_TIMESTAMP);";
        $sql = $dbs->prepare($query);
        $sql->execute();
    }
    
    //finish updating this page to edit user profile and such
    //remove an item from DB
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        //
        $query = "UPDATE games SET image='default/default_game.jpg' WHERE userid='$sess_id' and id='$gameid'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        print "<br />";
    }
    
    
    
    
        $gameid = $_GET['gameid'];
        $query = "SELECT * FROM games WHERE userid='$sess_id' AND id='$gameid'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $row = $sql->fetchAll();
        return $row;
}
//add an X to it
    //get the data
    $data = getContent($sess_id);
    $i=0;
    //show the data
    
        print "
        <h1>User Profile</h1>
        ";

    $i=0;
//start the Unordered List (Thumbnails)
    foreach($data as $row) 
    {
        $id = $row['id'];
        $image = $row['image'];
        $description = $row['description'];
        $title = $row['title'];
        $headline = $row['headline'];
        $genre = $row['genre'];
        $workers = $row['workers'];
        $start_month = $row['start_month'];
        $start_year = $row['start_year'];
        $end_month = $row['end_month'];
        $end_year = $row['end_year'];
        $engine = $row['engine'];
        $hiring=$row['hiring'];
        $website = $row['website'];
        if ($image == '')
            $image = "upload/default/default.jpg";
        else
            $image = "upload/".$image;
        
        if ($end_year == 0)
        {
            $end_year="";
        }
        if ($start_year == 0)
        {
            $start_year="";
        }
        if ($start_month == 0)
        {
            $start_month="";
        }
        
        if ($end_month == 0)
        {
            $end_month="";
        }
        if ($hiring == 0)
            $hiring="";
        

        print "<div class='user'>
                            <div class='text-center'>
                                <img src='$image' class='img-circle sq200'>
                            </div>
                            <div class='user-head text-center' >
                                <h1>$title</h1>
                                <div class='hr-center'></div>
                                <h4>$headline </h4>
                                
                            </div>
                            
                            $description
                            <div class='hr-left'></div>";
        
        print "Your Profile Picture<br /><img src='$image' style='width:200px;'> (<a class='remove' id='$id' href='#'>X</a>)";
        

  
    }
    



    

?>

