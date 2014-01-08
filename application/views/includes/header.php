<html >
    <head>
          <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!--<title>united</title>-->

        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/style_1.css" title="" charset="utf-8">


    </head>
    <div id="header">
        <div id="top-bar">

            <div id="top-bar">

                <div class="page-full-width cf ">
                   
                    <nav id="nav">
                         <input type="text" size="70" name='search_keyword' id="search_keyword"  class="round button dark ic-search image-right center" placeholder="Search..." />
                     <!--<input type="submit" value='Search' class="button round blue image-right ic-right-arrow" href ="#"id="search_button"/>-->
                    <a href="javascript:makeURL()" class="button round blue image-right ic-right-arrow">Search</a>
                  
                    <ul id="nav" class="fl">



                        <li><a href="/Codeigniter_first/index.php" class="round button dark menu-logoff image-left">Home</a></li>


                        <li class="v-sep"><a href="/Codeigniter_first/index.php/profile/loadView?user=<?php echo $user_name ?>" class="round button dark menu-user image-left" id="user_name" id='user_name' name='user_name'><?php echo $user_name ?> </a>

                        </li>


                        <li><a href="/Codeigniter_first/index.php/welcome/logout" class="round button dark menu-logoff image-left"><?php echo $login ?></a></li>

                    </ul>
                    </nav><!-- end nav -->




                </div> <!-- end full-width -->	

            </div> <!-- end top-bar -->
            
            <script>
               

                function makeURL() {
                    if (!document.getElementById('search_keyword').value == '') {
                        window.location = "/Codeigniter_first/index.php/search/searchbar?searchkey=" +
                                document.getElementById('search_keyword').value.trim();
                    } else {
    document.getElementById('errorSearch').style.display = "block";   
            $('#errorSearch').delay(500).fadeOut('slow');
    }
                }

            </script>
            
          
<!--            <script  src="/Codeigniter_first/js/ask_question.js"></script>-->

        </div>
<div id ="errorSearch"  class="alert-box error" style="display: none;width:400px; margin:0 auto;"><span>error: </span>Enter the key word first .</div>
</html>
