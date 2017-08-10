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
        
        $youtube = addslashes($_POST['youtube']);
        if (substr($youtube, -1) != '/'){
            $youtube.="/";
        }
       
        
        
        $gameid = $_GET['gameid'];
        $query = "INSERT INTO `gamerstack`.`game_screenshots` (`id`, `userid`, `gameid`, `title`, `caption`, `description`, `image`, `youtube`, `date_added`) VALUES (NULL, '$sess_id', '$gameid', '$title', '$caption', '$description', '$image', '$youtube', CURRENT_TIMESTAMP);";
        $sql = $dbs->prepare($query);
        $sql->execute();
    }
    
    //remove an item from DB
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        //
        $query = "DELETE FROM game_screenshots WHERE id=$id AND userid='$sess_id'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        print "<br />";
    }
    
    
    
    
    
        $query = "SELECT * FROM game_screenshots WHERE userid='$sess_id' AND gameid='{$_GET['gameid']}' ORDER BY date_added DESC";
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
        <h1>Add Game Development Pictures</h1>
        ";

    
    $i=0;
//start the Unordered List (Thumbnails)
print "<ul class='thumbs'>";
    foreach($data as $row) 
    {
        $i++;
        $id = $row['id'];
                $image = "upload/".$row['image'];
        $caption = $row['caption'];
        $title = $row['title'];
        $description= $row['description'];
        $date_added= $row['date_added'];
        //$image = "<img src='upload/$image'>";
        
        $youtube = "";
        $youtube = $row['youtube'];
        if (strlen($youtube) > 1){
            clean_youtube_link($youtube);
             make_embed_youtube($youtube);
             make_thumbnail_youtube($youtube);
            $image = make_thumbnail_youtube($youtube);
            $title.= "<img src='https://www.youtube.com/yt/brand/media/image/YouTube-icon-full_color.png' style='padding-left:20px;max-height:20px;width:auto;'>";

        }

        //$url=
        echo "<li style='width:300px;'><a href='#thumb$i' class='thumbnail' style=\"background-image: url('$image')\">";
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
        $image = "upload/".$row['image'];
        $caption = $row['caption'];
        $title = $row['title'];
        $description= $row['description'];
        $date_added= $row['date_added'];
        $image = "<img src='$image'>";

        
        $youtube = "";
        $youtube = $row['youtube'];
    
    if (strlen($youtube) > 1){
            clean_youtube_link($youtube);
             $image = make_embed_youtube($youtube);
             make_thumbnail_youtube($youtube);
            $title.= " <img src='https://www.youtube.com/yt/brand/media/image/YouTube-icon-full_color.png' style='padding-left:20px;max-height:40px;width:auto;'>";
        }
        
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