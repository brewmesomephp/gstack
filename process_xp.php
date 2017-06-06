<?php
include_once "functions.php";
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
    if (isset($_POST['company_name'])) 
    {
        //
        print "<br />";
        $company_name = strip_tags($_POST['company_name']);
        $title = strip_tags($_POST['job_title']);
        $location= strip_tags($_POST['location']);
        if (isset($_POST['remote']))
            $remote = 1;
        else
            $remote = 0;
        $description= strip_tags($_POST['description']);
        $start_month= strip_tags($_POST['start_month']);
        $start_year= strip_tags($_POST['start_year']);

        $end_month= strip_tags($_POST['end_month']);
        $end_year= strip_tags($_POST['end_year']);

        $current= strip_tags($_POST['current']);
        if (isset($_POST['current']))
            $current = 1;
        else
            $current = 0;
        
        $company_name = addslashes($company_name);
            $title = addslashes($title);
            $location = addslashes($location);
            $description = addslashes($description);
            $start_month = addslashes($start_month);
            $start_year = addslashes($start_year);
            $end_month = addslashes($end_month);
            $end_year = addslashes($end_year);


        $query = "INSERT INTO experience VALUES ('', '$sess_id', '$company_name', '$title', '$location', '$remote', '$description', '$start_month', '$start_year', '$end_month', '$end_year', '$current')";
        $sql = $dbs->prepare($query);
        $sql->execute();
    }
    
    //remove an item from DB
    if(isset($_GET['id']))
    {
        $id = addslashes(strip_tags($_POST['id']));
        //
        $query = "DELETE FROM experience WHERE id='{$_GET['id']}' AND userid='$sess_id'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        print "<br />";
    }
    if(isset($_POST['end']))
    {

        
        $end = addslashes(strip_tags($_POST['end']));
        $end_year = addslashes(strip_tags($_POST['end_year']));
        if (!validate_year($end_year))
        {
            return "fail_year";   
        }
        $end_month= $_POST['end_month'];
        
            
        if ($_POST['end_year'] != '')
        {
            $query = "UPDATE experience SET current='0', end_month='$end_month', end_year='$end_year' WHERE id='$end'";
            $sql = $dbs->prepare($query);
            $sql->execute();
        }
    }
    
    
    
    
    
        $query = "SELECT * FROM experience WHERE userid='$sess_id' ORDER BY end_year DESC,end_month DESC";
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
        $company_name = $row['company'];
        $title = $row['title'];
        $location= $row['location'];
        $remote= $row['remote'];
        $description= $row['description'];
        $start_month= $row['start_month'];
        $start_year= $row['start_year'];
        $end_month= $row['end_month'];
        $end_year= $row['end_year'];
        $current= $row['current'];
        $id = $row['id'];
        
        $end_cur = "";
        if ($current == 1)
        {
            $current = "Still Here";
            $end_cur = "                       
            <div class='row'>
            <form class='end_date'> 
            <div class='col-md-2 '>
            
                                                <label for='end_month'>Left Date</label>
                                                <select class='form-control' id='end_month$id' name='end_month'>
                                                  <option>1</option>
                                                  <option>2</option>
                                                  <option>3</option>
                                                  <option>4</option>
                                                  <option>5</option>
                                                  <option>6</option>
                                                  <option>7</option>
                                                  <option>8</option>
                                                  <option>9</option>
                                                  <option>10</option>
                                                  <option>11</option>
                                                  <option>12</option>
                                                </select>
                                        </div>
                                        <div class='col-md-2 '>
                                            
                                       <label for='date'></label>
                                                <input class=' form-control' id='end_year$id' name='end_year'>
                                        </div>
                                        
                                        <div class='col-md-1'>
                                        <button type='button' class='btn btn-lg btn-primary btn-success btn-block end' id='$id'>End</button>
                                        </div>
                                        </div>
                                        </form>";
            
        }
        else
        {
            $current = "$end_month/$end_year";
        }
        if ($remote == 1)
        {
            $remote = "(Remote)";
        }
        else
        {
            $remote = "";   
        }
        
        //print "$company_name, $title, $location, $remote, $description, $start_month, $start_year, $end_month, $end_year, $current";
        print "
        <div class='hr-left'></div>
            <div class='work-experience'>
                <h3>$title: $company_name (<a class='remove' id='$id' href='#'>X</a>)</h3>
                <small><i class='fa fa-calendar'></i> $start_month/$start_year - $current, $location $remote</small>
                <p>$description</p>
                $end_cur
            </div>";
  
    }




    

?>

