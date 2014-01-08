<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Home</title>

        <!-- Stylesheets -->
        <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
        <link rel="stylesheet" href="/Codeigniter_first/css/style_1.css">
        <!-- Optimize for mobile devices -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
     	<script type="text/javascript" src="/Codeigniter_first/js/jquery.simplePagination.js"></script>
		<link type="text/css" rel="stylesheet" href="/Codeigniter_first/css/simplePagination.css"/>
        <!-- jQuery & JS files -->

    </head>
    <body  >
        <!--<div id="loading" style="position:absolute; width:100%; text-align:center;
         top:300px;">
        <img src="/Codeigniter_first/images/ajaxloader.gif" border=0></div>-->
        <!-- TOP BAR -->
        <table style="width:800px; margin:0 auto;">
          <tr>
            <td align="left">
              <a href="#" id="user_name" id='user_name' name='user_name'><?php echo $user_name ?> 
            </td>
            <td>
              <a  href="/Codeigniter_first/index.php/question/loadview" >Ask a Question</a>
            </td>
            <td>
            </td>
            <td align="right">
              <a href="/Codeigniter_first/index.php/welcome/auth" class="round button dark menu-logoff image-left"><?php echo $login ?></a>
            </td>
          </tr>         
          <tr>
            <td align="left">
              <input type="text" size="75" name='search_keyword' id="search_keyword"  class="round button dark ic-search image-right" placeholder="Search..." />
            </td>          
            <td>
              <input type="text" name='tag'id="tags" size="20" length="20"placeholder="" >
            </td>    
            <td>    
               <select name="catogaty" id="catogaty" class="round " style="float:right;" >
                  <option value="0">select category</option>
                  <option value="1">Java</option>
                  <option value="2">Web</option>
                </select>
            </td>  
            <td align="right">   
                <input type="submit" value='Search' class="button round blue image-right ic-right-arrow" id="search_button"/>
            </td>
            
          </tr>
		    
                <ul id="tabs">
                    <li><a onclick="" id="new-tab" ></a></li>
                    <li><a onclick=""id="popular-tab"></a></li>
                    <li><a onclick=""id="old-tab"></a></li>
                </ul> 
           

 <tr>
            <td align="center" colspan="5">
            

          

                <!-- Change this image to your own company's logo -->
                <!-- The logo will automatically be resized to 30px height. -->



        <!-- MAIN CONTENT -->
        <div id="content" >
<div id ="error"  class="alert-box error" style="display: none;width:400px; margin:0 auto;"><span>error: </span></div>
         

                    <!--<div id="ajax-content-container">-->
                    <div id="contentAll" style="width:800px; margin:0 auto;" >
                 

                  
                </div>
         </td></tr><tr>
            <td align="center" colspan="5">       
                
                    <!--                              
                                  
                                           
                    <!-- end content-module -->

                    <!-- end content -->


<div id="page-selection">Pagination goes here</div>
   
   
                    <!-- FOOTER -->
                    <div id="footer" style="align: center">



                    </div> <!-- end footer --> </td></tr>
</table>                 
                    <script src="/Codeigniter_first/js/main.js"></script>  
                  
                    </body>

                    </html>