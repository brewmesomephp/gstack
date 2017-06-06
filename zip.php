<?php
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  */
/*  Selection of points within specified radius of given lat/lon      (c) Chris Veness 2008-2014  */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  */

    /*$servername = "localhost";    $username = "cm3rt"; $password = "Laceration6?"; $db = "gamerstack";
    
    
    $dbs = "test";

        try 
        {
            $db = new PDO("mysql:host=$servername;dbname=$dbs", $username, $password);
            // set the PDO error mode to exception
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
*/
//print run_zip_query('07747', '5', $db);

function run_zip_query($zip, $radius, $db, $table)
{
    
    
            $q_zip = "SELECT * FROM zip WHERE zip='$zip'";
            $coordinates = $db->prepare($q_zip);
            $coordinates->execute();
            $result = $coordinates->fetchAll();

        foreach($result as $rows) 
            {
                $lat = $rows['latitude'];
                $lon = $rows['longitude'];
            }


            $dlat = ((double)$lat) / 57.29577951;
            $dlon = ((double)$lon) / 57.29577951;

            $sql = "SELECT *
                    FROM zip
                    WHERE 3963.0 * acos(sin(latitude / 57.29577951) * sin($dlat) + cos(latitude / 57.29577951) * cos($dlat) * cos($dlon - longitude / 57.29577951)) < $radius
                    ORDER BY acos(sin(latitude / 57.29577951) * sin($dlat) + cos(latitude / 57.29577951) * cos($dlat) * cos($dlon - longitude / 57.29577951))
                    ";
            $points = $db->prepare($sql);
            $points->execute();
            $result2 = $points->fetchAll();

        
        //need to join userid with id and change id to userid in some cases
        //might as well just do 3 different cases.
    
        if ($table == "users")
        {
            $q = "SELECT id FROM users WHERE zip IN (";
        }
        else if ($table == "jobs")
        {
            $q = "SELECT id FROM jobs WHERE zip IN (";
        }
        else if ($table == "company")
        {
            
        }
        foreach($result2 as $zips) 
            {
                $zip = $zips['zip'];
                $q = $q . "'$zip', ";
            }
        $q = $q.")";
        $q = str_replace(", )", ")", $q);
        return $q;

                /*$sql = $db->prepare($q);
                $sql->execute();
                $row = $sql->fetchAll();

        foreach($row as $row) 
            {
                $id = $row['id'];
                $image = $row['picture'];
                $bio = $row['bio'];
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $skillset = $row['skillset'];
                $role = $row['role'];
                if ($image == '')
                    $image = "upload/default/default.jpg";
                else
                    $image = "upload/".$image;

                $first_name =strtoupper($first_name);
                $last_name = strtoupper($last_name);


                print "<div class='user'>
                                    <div class='text-center'>
                                        <img src='$image' width='300' class='img-circle sq200'>
                                    </div>
                                    <div class='user-head text-center' >
                                        <h1>$first_name $last_name</h1>
                                        <div class='hr-center'></div>
                                        <h4>$skillset ($role) </h4>

                                    </div>

                                    $bio
                                    <div class='hr-left'></div>";




            }*/
}


?>