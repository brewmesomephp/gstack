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
    if (isset($_POST['skill_name'])) 
    {
        print "<br />";
        
        
        $skill_name = addslashes(strip_tags($_POST['skill_name']));
        $percent = addslashes(strip_tags($_POST['percent']));
        
        $query = "SELECT * FROM skills WHERE userid='$sess_id' AND lcase(skill_name)=lcase('$skill_name')";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $skillrepeat = $sql->fetchAll();
        if (sizeof($skillrepeat) <= 0)
        {
            
            if ($percent > 100)
                $percent = 100;
            elseif ($percent < 0)
                $percent = 0;
            $query = "INSERT INTO skills VALUES ('', '$sess_id', '$skill_name', '$percent')";
            $sql = $dbs->prepare($query);
            $sql->execute();
        }
        else
            print "<h5>Skill Already Exists</h5>";
        
        
        
        $query = "SELECT * FROM skills WHERE userid='$sess_id'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $row = $sql->fetchAll();
        $total_skill = "";
        foreach($row as $skill)
        {
            $cur_skill = $skill['skill_name'];
            $total_skill = $total_skill . ", " . $cur_skill;
        }
        
        $query = "UPDATE users SET totalskills = '$total_skill' WHERE id='$sess_id'";
        $sql = $dbs->prepare($query);
        $sql->execute();
    }
    
    //remove an item from DB
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        //
        $query = "DELETE FROM skills WHERE skill=$id AND userid='$sess_id'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        print "<br />";
        
        
        $query = "SELECT * FROM skills WHERE userid='$sess_id'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $row = $sql->fetchAll();
        $total_skill = "";
        foreach($row as $skill)
        {
            $cur_skill = $skill['skill_name'];
            $total_skill = $total_skill . ", " . $cur_skill;
        }
        
        $query = "UPDATE users SET totalskills = '$total_skill' WHERE id='$sess_id'";
        $sql = $dbs->prepare($query);
        $sql->execute();
    }
    
    
    
    
    
        $query = "SELECT * FROM skills WHERE userid='$sess_id' ORDER BY percent DESC";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $row = $sql->fetchAll();
        return $row;
}
    //get the data
    $data = getContent($sess_id);
    $i=0;
    //show the data
    foreach($data as $row) 
    {
        $id = $row['skill'];
       // print $id . "<br />";
        $skill_name = $row['skill_name'];
        $percent = $row['percent'];
        /*iterate through these colors for bar
        #1abc9c
        #3498db
        #2c3e50
        #e74c3c
        #34495e
        #2ecc71
        #f1c40f
        */
        
        
        //skill bar
        print"
        <!--add new skill end-->
            <div class='skillbar clearfix' data-percent='$percent%' style='margin-top:20px;'>
            <div class='skillbar-title' style='background: #34495e;'><span><a class='remove' id='$id' href='#'>&#10005;</a> $skill_name</span></div>
            <div class='skillbar-bar' style='background: #061577;'></div>
            <div class='skill-bar-percent'>$percent%</div>
        </div> <!-- End Skill Bar -->
";
       /* 
        print "<div class='progress'>$skill_name:
  <div class='progress-bar progress-bar-info' role='progressbar' aria-valuenow='$percent'
  aria-valuemin='0' aria-valuemax='100' style='width:$percent%; text-align:left;'>
    $percent%  <a class='remove' id='$id' href='#'>&#10005;</a>
  </div>
</div>";*/
    }




    

?>

