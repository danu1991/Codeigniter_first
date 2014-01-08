
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Admin Home</title>

        <!-- Stylesheets -->
        <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
        <link rel="stylesheet" href="/Codeigniter_first/css/style_1.css">
        <!-- Optimize for mobile devices -->

        <!-- jQuery & JS files -->

    </head>
    <body  >
<!--        <div id="loading" style="position:absolute; width:100%; text-align:center;
             top:300px;">
            <img src="/Codeigniter_first/images/ajaxloader.gif" border=0></div>-->
        <!-- TOP BAR -->
        <div id="top-bar">

            <div class="page-full-width cf">
                <nav id="nav">
                    <ul id="nav" class="fl">
                        <li class="v-sep"><a  href="/Codeigniter_first/index.php/adminHome/flagQuestion" class="round button dark ic-left-arrow image-left">Flag Questions</a></li>

                        <li class="v-sep"><a  href="/Codeigniter_first/index.php/adminHome/requests" class="round button dark ic-left-arrow image-left">Tutor Requests</a></li>
                        <li class="v-sep"><a href="/Codeigniter_first/index.php/profile/loadView?user=<?php echo $user_name ?>" class="round button dark menu-user image-left" id="user_name" id='user_name' name='user_name'><?php echo $user_name ?> </a>

                        </li>

                        <li><a href="/Codeigniter_first/index.php/adminHome/auth/" class="round button dark menu-logoff image-left"><?php echo $login ?></a></li>

                    </ul> <!-- end nav -->

                </nav>


            </div> <!-- end full-width -->	

        </div> <!-- end top-bar -->



        <!-- HEADER -->
        <div id="header-with-tabs">
            <div id="serach_view" class="center">

                <input type="text" size="100" name='search_keyword' id="search_keyword"  class="round button dark ic-search image-right" placeholder="Search..." />

                <p>

                    <label for="catagory ">Choose </label>
                    <select name="catogaty" id="catogaty" class="round full-width-input" >

                        <option value="1">user</option>
                        <option value="2">Question</option>

                    </select>
                </p>
                <input type="submit" value='Search' class="button round blue image-right ic-right-arrow" id="search_button"/>

            </div>



        </div> 

        <div class="datagrid table">

            <table class="table table-bordered table-condensed table-striped" id="records_table" width="80%" >

              
            </table> 
        </div>


        <!--                              
                      
                               
        <!-- end content-module -->

        <!-- end content -->



        <!-- FOOTER -->
        <div id="footer">



        </div> <!-- end footer -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="/Codeigniter_first/js/admin_home.js"></script>  


    </body>

</html>