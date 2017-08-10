<?php
// Create a 100*30 image
$im = imagecreate(600, 400);

// White background and blue text
$bg = imagecolorallocate($im, 255, 255, 255);
$textcolor = imagecolorallocate($im, 0, 0, 0);

// Write the string at the top left
imagestring($im, 5, 5, 0, 'Hello fuck you!', $textcolor);

// Output the image
header('Content-type: image/png');

imagepng($im);
imagedestroy($im);
?>
<?php
session_start();
function getContent() 
{
    
    include_once "functions.php";
    $dbs = db_connection();
        
    
    
    //add a new item to DB
    if (true == true) 
    {
        //
        $email = "admin@gamerstack.io";
        $first_name = "Joe";
        $last_name = "Alai";
        $pass = "napster";
        $pass2= "napster";
        $role = "Gamer";
        include_once "functions.php";
        if (!validate_email($email))
        {
            return "fail_email";
        }
        
        if (!validate_name($first_name . $last_name))
            return "fail_name";
        
        
        $query = "SELECT * FROM users WHERE email='$email'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $row = $sql->fetchAll();
        if (sizeof($row) == 0)
        {
                if ($pass == $pass2)
                {
                    if (isset($_POST['company']))
                    {
                        $company = 1;
                        $company_name = "Company";
                        if (!validate_alphanumeric_punct($company_name))
                        {
                            return "fail_name";
                        }
                        $hash = md5( rand(0,1000) );
                        $query = "INSERT INTO users (email, password, account, added, role, first_name, last_name, company, hash, bio, verified, skillset) VALUES ('$email', '$pass', '$company', CURRENT_TIMESTAMP, '$role', '$first_name', '$last_name', '$company_name', '$hash', '', 1, '')";
                    }
                    else
                    {
                        $hash = md5( rand(0,1000) );
                        $company = 0;
                        $query = "INSERT INTO users (email, password, account, added, role, first_name, last_name, hash, bio, verified, skillset, company) VALUES ('$email', '$pass', '$company', CURRENT_TIMESTAMP, '$role', '$first_name', '$last_name', '$hash', '', 1, '', '')";
                        
                        
                    }
                    
                    $sql = $dbs->prepare($query);
                    $sql->execute();
                    
                    
                    
                }
                else
                {
                    return "fail_pass";
                }
        }
        else
        {
            return "fail_email";
        }
    
    
        $query = "SELECT * FROM users WHERE email='$email'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $row = $sql->fetchAll();
        
        $email_link = "http://www.gamerstack.io/verify.php?id={$row[0][0]}&hash=$hash";
        $to = $email;
        $subject = "GamerStack Email Verification";
        
        $headers = "From: Joe@gamerstack.io\r\n";
        $headers .= "Reply-To: Joe@gamerstack.io\r\n";
        $headers .= "BCC: Joe@gamerstack.io\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        
        
        //use this email
        
        include "email/verification.php";
        
        ob_start();
        send_mail($row[0][0], $hash);
        $msg = ob_get_clean();
        mail($to, $subject, $msg, $headers);
        
        return $row[0][0];
}
}
    //get the data
    $data = getContent();
    print $data;


    

?>