<?php
session_start();
if (!isset($_SESSION['id']))
    {
        print "";
    }
$sess_id = $_SESSION['id'];




function getContent($sess_id) 
{
    
    include_once "functions.php";
    $dbs = db_connection();
        
    
    
    //add a new item to DB
    if (isset($_POST['school'])) 
    {
        //
        print "<br />";
        
        include_once "functions.php";
        
        $school = addslashes(strip_tags($_POST['school']));
        $gpa = addslashes(strip_tags($_POST['gpa']));
        $major= addslashes(strip_tags($_POST['major']));
        
        $degree= addslashes(strip_tags($_POST['degree']));
        $description= addslashes(strip_tags($_POST['description']));
        $start_month= addslashes(strip_tags($_POST['start_month']));
        $start_year= addslashes(strip_tags($_POST['start_year']));

        $end_month= addslashes(strip_tags($_POST['end_month']));
        $end_year= addslashes(strip_tags($_POST['end_year']));

        if (!isset($_POST['current']))
        {
            $current = 0;
        }
        else
            $current = 1;
        
        

        $query = "INSERT INTO education VALUES ('', '$sess_id', '$school', '$start_month', '$start_year', '$end_month', '$end_year', '$current', '$major', '$degree', '$gpa',  '$description')";
        $sql = $dbs->prepare($query);
        $sql->execute();
    }
    
    //remove an item from DB
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        //
        $query = "DELETE FROM education WHERE id=$id AND userid='$sess_id'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        print "<br />";
    }
    
    
    
    
    
        $query = "SELECT * FROM education WHERE userid='$sess_id' ORDER BY end_year DESC,end_month DESC";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $row = $sql->fetchAll();
        return $row;
}
    //get the data
    $data = getContent($sess_id);
    $i=0;
    //show the data
    
        print "
        <h1>Add Experience</h1>
        ";
    foreach($data as $row) 
    {
        $id = $row['id'];
        $gpa = $row['gpa'];
        $school = $row['school'];
        $major= $row['major'];
        $degree = $row['degree'];
        $description= $row['description'];
        $start_month= $row['start_month'];
        $start_year= $row['start_year'];
        $end_month= $row['end_month'];
        $end_year= $row['end_year'];
        $current= $row['current'];
        $id = $row['id'];
        if ($current == 1)
        {
            $current = "Still Here";
        }
        else
        {
            $current = "$end_month/$end_year";
        }

        
        //print "$school, $title, $location, $remote, $description, $start_month, $start_year, $end_month, $end_year, $current";
        print "
        <div class='hr-left'></div>
            <div class='work-experience'>
                <h2>$school: $major ($gpa Average) (<a class='remove' id='$id' href='#'>X</a>)</h2>
                <h3>$degree</h3>
                <small><i class='fa fa-calendar'></i> $start_month/$start_year - $current</small>
                <p>$description</p>
            </div>";
  
    }




    

?>

