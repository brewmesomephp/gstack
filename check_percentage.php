<?php
if(session_id() == ''){session_start();}
$servername = "localhost";    $username = "cm3rt"; $password = "Laceration6?"; $db = "gamerstack";
    
    
    
include_once "functions.php";
$query = array();

if (isset($_SESSION['id']))
    $sess_id = $_SESSION['id'];

if (isset($sess_id))
{
    print "<div  style='width: calc(100% - 30px); background-color:#CCCCCC;padding:20px 20px 20px 20px;border-color:#000000;border-radius:7px;'>";
    $user = get_user($sess_id); 
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
    //if it is a candidate
    $percent = 0;
    $empty = array();
    if ($user['account'] =='0')
    {
         if (!$user['bio'] == '')
        {
            $percent +=10;
        }
        else
            array_push($empty, "bio");

        if (!$user['skillset'] == '')
        {
            $percent +=10;
        }
        else
            array_push($empty, "skillset");
        if (!$user['image'] == '')
        {
            $percent +=20;
        }
        else
            array_push($empty, "image");
        
        
        $query[0] = "SELECT * FROM awards WHERE userid='$sess_id'";
        $query[1] = "SELECT * FROM education WHERE userid='$sess_id'";
        $query[2] = "SELECT * FROM experience WHERE userid='$sess_id'";
        $query[3] = "SELECT * FROM organizations WHERE userid='$sess_id'";
        $query[4] = "SELECT * FROM portfolio WHERE userid='$sess_id'";
        $query[5] = "SELECT * FROM skills WHERE userid='$sess_id'";
        
        for ($i = 0; $i < sizeof($query); $i++)
        {
            
            if (num_results($query[$i]) > 0)
            {
                $percent+=10;
            }
            else
            {
                array_push($empty, $i);
            }
            $empty = array_values($empty);
        
            
        }        
        if ($percent < 100)
        { ?>
            <div class="skillbar clearfix" data-percent="<?=$percent?>%">
            <div class="skillbar-title" style="background: #34495e;"><span> PROFILE </span></div>
            <div class="skillbar-bar" style="width: <?=$percent?>%; background: rgb(6, 21, 119);"></div>
            <div class="skill-bar-percent"><?=$percent?>%</div>
        </div>
           <?php
         print "Your profile is currently only <b>$percent% finished</b>, drastically reducing your views. Completing your profile will get you an estimated   <b>600% more views</b> than someone who hasn't completed theirs. Finish your profile before the end of beta and get free premium membership.<br />";
        }
        else
            print "Your profile is 100% complete. You are eligible for free premium membership when the stable version of GamerStack is released";
        print "<ul class='list-inline'>";
            for ($q = 0; $q < sizeof($empty); $q++)
            {
                
                if ($empty[$q] == "bio")
                {
                    print "<li><a href='php_profile_ajax.php'>Biography</a></li> ";
                }
                elseif ( $empty[$q] == "skillset")
                {
                    print "<li><a href='php_profile_ajax.php'>Skillset</a></li> ";
                }
                elseif ($empty[$q] == "image")
                {
                    print "<li><a href='php_profile_ajax.php'>Default image</a></li> ";
                }
                elseif ($empty[$q] == 0)
                {
                    print "<li><a href='awards_ajax.php'>Awards</a></li> ";
                }
                elseif ($empty[$q] == 1)
                {
                    print "<li><a href='edu_ajax.php'>Education</a></li> ";
                }
                elseif ($empty[$q] == 2)
                {
                    print "<li><a href='xp_ajax.php'>Experience</a></li> ";
                }
                elseif ($empty[$q] == 3)
                {
                    print "<li><a href='organizations_ajax.php'>Organizations</a></li> ";
                }
                elseif ($empty[$q] == 4)
                {
                    print "<li><a href='portfolio_ajax.php'>Portfolio</a></li> ";
                }
                elseif ($empty[$q] == 5)
                {
                    print "<li><a href='skill_ajax.php'>Skills</a></li>";
                }
                
                
            }
        print "</ul>";
        /*
        candidates
        {
            users (skillset, picture, bio ), awards, education, experience, organizations, portfolio, skills
        }
        */
    }
    elseif($user['account']=='1')
    {
        if (!$user['bio'] == '')
        {
            $percent +=10;
        }
        else
            array_push($empty, "bio");

        if (!$user['skillset'] == '')
        {
            $percent +=10;
        }
        else
            array_push($empty, "skillset");
        if (!$user['image'] == '')
        {
            $percent +=20;
        }
        else
            array_push($empty, "image");
        
        $query[0] = "SELECT * FROM company_achievements WHERE userid='$sess_id'";
        $query[1] = "SELECT * FROM company_portfolio WHERE userid='$sess_id'";
        $query[2] = "SELECT * FROM jobs WHERE userid='$sess_id'";
        $query[3] = "SELECT * FROM games WHERE userid='$sess_id'";
        $query[4] = "SELECT * FROM game_screenshots WHERE userid='$sess_id'";
        
        
        
        for ($i = 0; $i < sizeof($query); $i++)
        {
            if (num_results($query[0]) > 0)
            {
                if ($i == 0)
                    $percent+=5;
                if ($i == 1)
                    $percent+=15;
                if ($i == 2)
                    $percent+=10;
                if ($i == 3)
                    $percent+=20;
                if ($i == 4)
                    $percent+=10;
            }
            else
                array_push($empty, $i);
        }
        if ($percent < 100)
        {
            ?>
            <div class="skillbar clearfix" data-percent="<?=$percent?>%">
            <div class="skillbar-title" style="background: #34495e;"><span> Profile</span></div>
            <div class="skillbar-bar" style="width: <?=$percent?>%; background: rgb(6, 21, 119);"></div>
            <div class="skill-bar-percent"><?=$percent?>%</div>
        </div>
           <?php
            
            
            print "Your profile is currently only <b>$percent% finished</b>, drastically reducing your views. Completing your profile will get you an estimated  <b>600% more views</b> than someone who hasn't completed theirs. Finish your profile before the end of beta and get free premium membership.<br />";
        }
        else
            print "Your profile is 100% complete. You are eligible for free premium membership when the stable version of GamerStack is released";
        print "<ul class='list-inline'>";
        for ($q = 0; $q < sizeof($empty); $q++)
            {
                
                if ($empty[$q] == "bio")
                {
                    print "<li><a href='php_company_profile_ajax.php'>Biography</a></li> ";
                }
                elseif ( $empty[$q] == "skillset")
                {
                    print "<li><a href='php_company_profile_ajax.php'>Headline</a></li> ";
                }
                elseif ($empty[$q] == "image")
                {
                    print "<li><a href='php_company_profile_ajax.php'>Default image</a></li> ";
                }
                elseif ($empty[$q] == 0)
                {
                    print "<li><a href='company_achievements_ajax.php'>Achievements</a></li> ";
                }
                elseif ($empty[$q] == 1)
                {
                    print "<li><a href='company_portfolio_ajax.php'>Portfolio</a></li> ";
                }
                elseif ($empty[$q] == 2)
                {
                    print "<li><a href='jobs_ajax.php'>Jobs</a></li> ";
                }
                elseif ($empty[$q] == 3)
                {
                    print "<li><a href='game_listings.php'>Games</a></li> ";
                }
                elseif ($empty[$q] == 4)
                {
                    print "<li><a href='game_listings.php'>Screenshots</a></li> ";
                }
                
            }
        print "</ul>";
        /*
        companies
        {
        company_achievements, company_portfolio, company_workers, jobs
        }
        games
        {
        games, game_screenshots, game_updates
        }
        */
        
    }
    print "</div>";
}
?>