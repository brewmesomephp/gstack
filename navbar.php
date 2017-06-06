<?php
function navbar($userid, $account)
{
    if(session_id() == ''){session_start();}
    if (!isset($_SESSION['id']))
    {
        navbar_short();
    }
    else
    {
        include_once "functions.php";
        $notifications = get_notifications($_SESSION['id']);
        $new_mail = num_new_mail($_SESSION['id']);
        $m_n = "";
        $n_n = "";
        if ($new_mail > 0)
        {
            $m_n = "<b>($new_mail)</b>";
        }
        if ($notifications > 0)
        {
            $n_n = "<b>($notifications)</b>";
        }
        if ($account == '0')
        {
            print "
            <ul class='nav navbar-nav navbar-left'>
                
                <li class='page-scroll'><img src='gg_small.png'></li>
                <li class='page-scroll'><a href='php_splash_candidate.php'>Home</a></li>
                <li class='page-scroll'><a href='php_profile.php?id=$userid'>Me</a></li>
                <li class='page-scroll'><a href='php_profile_ajax.php'>Edit</a></li>
                <li class='page-scroll'><a href='job_listings.php'>Positions</a></li>
                <li class='page-scroll'><a href='messages.php'>Messages <b><i id='msgs'>$m_n</i></b> </a></li>
                <li class='page-scroll'><a href='notifications.php'>Notifications $n_n </a></li>
                <li class='page-scroll'><a href='search.php'>Search</a></li>
                <li class='page-scroll'><a href='invitation_ajax.php'>Invite</a></li>
                <li class='page-scroll'><a href='logout.php'>&#10005</a></li>

            </ul>";
        }
        else if ($account == '1')
        {
            print "
            <ul class='nav navbar-nav navbar-left'>
                
                <li class='page-scroll'><img src='gg_small.png'></li>
                <li class='page-scroll'><a href='php_splash_company.php'>Home</a></li>
                <li class='page-scroll'><a href='php_company.php?id=$userid'>Me</a></li>
                <li class='page-scroll'><a href='game_listings.php'>My Games</a></li>
                <li class='page-scroll'><a href='php_company_profile_ajax.php'>Edit</a></li>
                <li class='page-scroll'><a href='company_job_listings.php'>Positions</a></li>
                <li class='page-scroll'><a href='messages.php'>Messages <b><i id='msgs'>$m_n</i></b> </a></li>
                <li class='page-scroll'><a href='notifications.php'>Notifications $n_n </a></li>
                <li class='page-scroll'><a href='search.php'>Search</a></li>
                <li class='page-scroll'><a href='invitation_ajax.php'>Invite</a></li>
                <li class='page-scroll'><a href='logout.php'>&#10005</a></li>
            </ul>";
        }
    }
}




function navbar_short()
{
    
        print "
        <ul class='nav navbar-nav navbar-left'>
            <li class='page-scroll'><img src='gg_small.png'></li>
            <li class='page-scroll'><a href='php_splash_main.php'>Dash</a></li>
            <li class='page-scroll'><a href='login_ajax.php'>Login</a></li>
            <li class='page-scroll'><a href='search.php'>Search</a></li>
            <li class='page-scroll'><a href='index.php'>GamerStack Home</a></li>
            <li class='page-scroll' style='background-color:red'><a href='register.php'>Register</a></li>
        </ul>";
   
}
?>