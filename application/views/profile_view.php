<!doctype html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html">
        <title>Profile </title>


        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/styles_profile.css" title="" charset="utf-8">
     
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    </head>

    <body>
        
        
<!--        <div id="topbar">
             <div id="header">
    <div id="top-bar">

         <div id="top-bar">

            <div class="page-full-width cf">

                <ul id="nav" class="fl">

                  
                    <li class="v-sep"><a href="/Codeigniter_first/index.php/profile/loadView?user=<?php echo $user_name  ?>" class="round button dark menu-user image-left" id="user_name" id='user_name' name='user_name'><?php echo $user_name  ?> </a>

                    </li>

                   
                    <li><a href="/Codeigniter_first/index.php/welcome/logout" class="round button dark menu-logoff image-left"><?php echo $login  ?></a></li>

                </ul>  end nav 




            </div>  end full-width 	

        </div>
     </div>
          </div>

        </div>-->

        <div id="w">
            <div id="content" class="clearfix">
                <div id="userphoto"><img src="/Codeigniter_first/images/avatar.png" alt="default avatar"></div>
                <h1 id ="profile_username"></h1>
                <div>
                    <label for="type_lable " id="gender-lable">User type</label>  
                    <label for="type " id="user_type"></label>   
                </div>
                <div>
                    <label for="gender_lable " id="gender-lable">Gender</label>   
                    <label for="gender " id="gender"></label>   
                </div>
                <div>
                    <label for="Email " id="email-lable">Email</label>  
                    <label for="email " id="emial_id"></label>   
                </div>
                <div>
                    <label for="loyality " id="loyality-lable">loyality</label>  
                    <label for="loyality " id="loyality"></label>   
                </div>
                <div>
                    <label for="reputation_lable " id="reputation-lable">reputation</label>  
                    <label for="reputation " id="reputation"></label>   
                </div>
                <nav id="profiletabs">
                    <ul class="clearfix">

                        <li><a href="#ask_quest" class="sel" id ="ask">Ask Question</a></li>
                        <li><a href="#answer_quest" class="hidden" id="answer">Answers</a></li>
                        <li><a href="#settings" class="hidden" id="setting">Settings</a></li>
                    </ul>
                </nav>



                <section id="ask_quest" >
                    <div class="datagrid table">
                    <table id="profile_question_table" width="100%" >
                  
                       
<!--                        <thead>
                            <tr>
                                <th>Questions</th>

                            </tr>
                        </thead>-->
                        <tbody>
                            <tr>

                            </tr>
                        </tbody>
                    </table> 
                       </div>
                </section>

                <section id="answer_quest" class="hidden">
                    <div class="datagrid table">
                    <table id="answer_question" width="100%" >
                       
                   
                        <tbody>
                            <tr>

                            </tr>
                        </tbody>
                    </table> 
                        </div>
                </section>
                <section id="settings" class="hidden">
                    <p>Edit your user settings:</p>

                    <div id="content-setting">


                        <form action="" method="POST" id="setting-form">

                            <fieldset>

                                <p>
                                    <label for="uername">username</label>
                                    <input type="text" id="uname" name="uname"  /><?php
                                    if (isset($_POST['uname']) && $_POST['uname'] == '') {
                                        echo 'Please enter the user name';
                                    }
                                    ?>
                                </p>

                                <p>
                                    <label for="currnt_password">current password</label>
                                    <input type="password" id="current_pword"  name="current_pword" class="round full-width-input" /><?php
                                    if (isset($_POST['pword']) && $_POST['pword'] == '') {
                                        echo 'Please enter the password';
                                    }
                                    ?>
                                </p>
                                <p>
                                    <label for="password"> new password</label>
                                    <input type="password" id="new_pword"  name="new_pword" class="round full-width-input" /><?php
                                    if (isset($_POST['pword']) && $_POST['pword'] == '') {
                                        echo 'Please enter the password';
                                    }
                                    ?>
                                </p>
                                <p>
                                    <label for="password"> confirm new password</label>
                                    <input type="password" id="confirm_new_pword"  name="confirm_new_pword" class="round full-width-input" /><?php
                                    if (isset($_POST['pword']) && $_POST['pword'] == '') {
                                        echo 'Please enter the password';
                                    }
                                    ?>
                                </p>
                                <input type="submit" value="Subimt" class="button round blue image-right ic-right-arrow"/>


                            </fieldset>


                        </form>

                    </div>
                </section>
            </div><!-- @end #content -->
        </div><!-- @end #w -->
       
     

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="/Codeigniter_first/js/profile.js"></script> 
    </body>
</html>