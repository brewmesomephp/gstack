<?php
session_start();
if (!isset($_SESSION['id']))
    {
        print "";
    }
$sess_id = $_SESSION['id'];





function getContent($sess_id) 
{
    
    $servername = "localhost";    $username = "cm3rt"; $password = "Laceration6?"; $db = "gamerstack";
    
    
    

        try 
        {
            $dbs = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            // set the PDO error mode to exception
            $dbs->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
        
    
    
    //add a new item to DB
    if (isset($_POST['title'])) 
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

   
        
        
        
        
        
        
        
        
        
        //
        print "<br />";
        
        
        $caption = addslashes(strip_tags($_POST['caption']));
        $image = $filename;
        
        $title= addslashes(strip_tags($_POST['title']));
        $description= addslashes(strip_tags($_POST['description']));
       
        
        
        
        $query = "INSERT INTO `gamerstack`.`company_portfolio` (`id`, `userid`, `title`, `caption`, `description`, `image`, `date_added`) VALUES (NULL, '$sess_id',  '$title', '$caption', '$description', '$image', CURRENT_TIMESTAMP);";
        $sql = $dbs->prepare($query);
        $sql->execute();
    }
    
    //remove an item from DB
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        //
        $query = "DELETE FROM company_portfolio WHERE id=$id AND userid='$sess_id'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        print "<br />";
    }
    
    
    
    
    
        $query = "SELECT * FROM company_portfolio WHERE userid='$sess_id' ORDER BY date_added DESC";
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
        <h1>Add Portfolio</h1>
        ";

    
    $i=0;
//start the Unordered List (Thumbnails)
print "<ul class='thumbs'>";
    foreach($data as $row) 
    {
        $i++;
        $id = $row['id'];
        $image = $row['image'];
        $caption = $row['caption'];
        $title = $row['title'];
        $description= $row['description'];
        $date_added= $row['date_added'];
        //$image = "<img src='upload/$image'>";

        

        //$url=
        echo "<li style='width:300px;'><a href='#thumb$i' class='thumbnail' style=\"background-image: url('upload/$image')\">";
            print "<h4>$title</h4><span class='description'>$caption</span></a>";
        print "</li>
        ";

  
    }
print "</ul>"; // end the unordered list
    
    //part 2 of insertion
$i=0;
print "<div class='portfolio-content'>";
foreach($data as $row) 
    {
        $i++;
        $id = $row['id'];
        $image = $row['image'];
        $caption = $row['caption'];
        $title = $row['title'];
        $description= $row['description'];
        $date_added= $row['date_added'];
        $image = "<img src='upload/$image'>";

        
        print "
        <div id='thumb$i'>
            <div class='media'>$image</div>
            <h1>$title</h1>
            <p>$description (<a class='remove' id='$id' href='#'>X</a>)</p>
            
        </div>";
						        

  
    }
print "</div>";
//end part 2


    

?>

