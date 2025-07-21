<!DOCTYPE html>
<html>
    <?php include("framework/kepala.html");?>
    <body>
        <?php include("framework/header.php");?>
        <div class="container-fluid">
            <section>
            <?php
                $content;
                $mod="";
                if(isset($_GET['page'])) $mod = $_GET['page'];
                switch ($mod) {
                case "topanime" : $content="topanime.php"; break;
                case "form" : $content="formanime.php"; break;
                case "detail" : $content="animedetail.php"; break; 
                case "watch" : $content="watch.php"; break;
                case "aboutme" : $content="about.php"; break;
                case "signup" : $content="signup.php"; break;
                case "login" : $content="login.php"; break;
                case "promote" : $content="promote.php"; break;
                case "news" : $content="news.php"; break;
                case "newsdetail" : $content="news_detail.php"; break;
                case "contactus" : $content="contactus.php"; break;
                case "logout" : $content="logout.php"; break;
                default : $content="homepage.php";
            }
            include($content);
            ?>
            </section>
        </div>
        <?php include("framework/footer.php");?>
    </body>
</html>