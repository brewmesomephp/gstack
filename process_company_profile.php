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
    
        $first_name = addslashes(strip_tags($_POST['first_name']));
        
        $last_name= addslashes(strip_tags($_POST['last_name']));
    
        $headline= addslashes(strip_tags($_POST['headline']));
        $bio= addslashes(strip_tags($_POST['bio']));
        $address= addslashes(strip_tags($_POST['address']));
        $city= addslashes(strip_tags($_POST['city']));
        $state= addslashes(strip_tags($_POST['state']));
            $fail = "";
        include_once "functions.php";
        $zip = addslashes(strip_tags($_POST['zip']));

        $country= addslashes(strip_tags($_POST['country']));
        $website= make_website(addslashes(strip_tags($_POST['website'])));
        


        $query = "UPDATE users SET bio = '$bio', first_name='$first_name', last_name='$last_name', zip='$zip', 
        address='$address', city='$city', state='$state', country='$country', skillset='$headline', website='$website' WHERE id='$sess_id'";
    
        $query1 = "UPDATE jobs SET zip='$zip' WHERE userid='$sess_id'";
        $sql = $dbs->prepare($query1);
        $sql->execute();
}
else
{
    
        $image = $filename;
        $query = "UPDATE users SET picture='$image' WHERE id='$sess_id'";
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
        $query = "UPDATE users SET picture='default/default.jpg' WHERE id='$sess_id'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        print "<br />";
    }
    
    
    
    
    
        $query = "SELECT * FROM users WHERE id='$sess_id'";
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
        <h1>Company Profile Image</h1>
        ";

    $i=0;
//start the Unordered List (Thumbnails)
    foreach($data as $row) 
    {
        $i++;
        $id = $row['id'];
        $image = $row['picture'];
        $bio = $row['bio'];
        $company_name = $row['company'];
        $headline = $row['skillset'];
        $role = $row['role'];
        if ($image == '')
            $image = "upload/default/default.jpg";
        else
            $image = "upload/".$image;

        

        
        print "<img src='$image' style='width:200px;'> (<a class='remove' id='$id' href='#'>X</a>)";
        

  
    }
    



    

?>

