<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/style_1.css" title="" charset="utf-8">
  <title>Register</title>
<!--<div id="header">
    <div id="top-bar">

        <div class="page-full-width cf">

            <div id="login-intro" class="fl">

                <h1>Register </h1>
                <h5>Enter your details below</h5>

            </div>  login-intro 

             Change this image to your own company's logo 
             The logo will automatically be resized to 39px height. 
            <a href="/Codeigniter_first/index.php" id="company-branding" class="fr"><img src="" alt="Home" /></a>

        </div>  end full-width 	

    </div>  end top-bar 	


</div>-->



<div id="content">

<div id ="error"  class="alert-box error" style="display: none;width:400px; margin:0 auto;"><span>error: </span></div>

    <form action="/Codeigniter_first/index.php/auth/createaccount" method="POST" id="login-form" onsubmit="return checkform(this);">

        <fieldset>

            <p>
                <label for="uername">Username</label>
                <input type="text" name='uname' length="10"  class="round full-width-input"><?php if(isset($_POST['uname']) && $_POST['uname'] == ''){ echo 'Please choose a user name'; } ?>

            </p>

            <p>
                <label for="password">Password</label>
                <input type="password" name='pword' length="15" class="round full-width-input" /><?php if(isset($_POST['pword']) && $_POST['pword'] == ''){ echo 'Please choose a password'; } ?>
            </p>
            <p>
                <label for="password">Confirm password</label>
                 <input type="password" name='conf_pword' length="15" class="round full-width-input" /><?php if(isset($_POST['conf_pword']) && $_POST['pword'] != $_POST['conf_pword']){ echo 'Password does not match'; } ?>
            </p>
            
            <p>
                <label for="password"> Email</label>
                <input type="text" name='email' length="15"     class="round full-width-input" /><?php if(isset($_POST['email']) && $_POST['email'] == ''){ echo 'Please choose youer email'; } ?>
            </p>
         
            <p>
                <select name="gender" class="round full-width-input" >
                    <option value="1"<?php echo(isset($_POST['gender']) && ($_POST['gender'] == '1') ? ' selected="selected"' : ''); ?>>Male</option>
                    <option value="2"<?php echo(isset($_POST['gender']) && ($_POST['gender'] == '2') ? ' selected="selected"' : ''); ?>>Female</option>

                </select>
            </p>
               <p>
                <label for="sign up as">User type</label>
                <select name="usertype" class="round full-width-input">
                <option value="1"<?php echo(isset($_POST['usertype']) && ($_POST['usertype'] == '1') ? ' selected="selected"' : ''); ?>>Student</option>
                <option value="0"<?php echo(isset($_POST['usertype']) && ($_POST['usertype'] == '0') ? ' selected="selected"' : ''); ?>>Tutor</option>

            </select> </p>
               <p>
            <label for="code">Type > <span id="txtCaptchaDiv" style="color:#F00"></span>
	      <input type="hidden" id="txtCaptcha" /></label>
	      <input type="text" name="txtInput" id="txtInput" class="round full-width-input" size="30" />
              </p>
              
            <input type="submit" value='Register' class="button round blue image-right ic-right-arrow"/>

              <div id="contentWrapper">
 <span style="color: red" class="imgframe"><?php echo $errmsg ?></span> <br>
   
</div>
        </fieldset>
 </form>
 <script type="text/javascript">
//Generates the captcha function    
	var a = Math.ceil(Math.random() * 9)+ '';
	var b = Math.ceil(Math.random() * 9)+ '';       
	var c = Math.ceil(Math.random() * 9)+ '';  
	var d = Math.ceil(Math.random() * 9)+ '';  
	var e = Math.ceil(Math.random() * 9)+ '';  
	  
	var code = a + b + c + d + e;
	document.getElementById("txtCaptcha").value = code;
	document.getElementById("txtCaptchaDiv").innerHTML = code;	
</script>
<script type="text/javascript">
function checkform(theform){
	var why = "";
	 
	if(theform.txtInput.value == ""){
		why += "Security code should not be empty.\n";
                
            
	}
	if(theform.txtInput.value != ""){
		if(ValidCaptcha(theform.txtInput.value) == false){
			why += "Security code did not match.\n";
		}
	}
	if(why != ""){
		//alert(why);
                document.getElementById('error').style.display = "block";
                        document.getElementById('error').innerHTML = why;
                        $('#error').delay(2000).fadeOut('slow');     
		return false;
	}
}
	
// Validate the Entered input aganist the generated security code function   
function ValidCaptcha(){
	var str1 = removeSpaces(document.getElementById('txtCaptcha').value);
	var str2 = removeSpaces(document.getElementById('txtInput').value);
	if (str1 == str2){
		return true;	
	}else{
		return false;
	}
}

// Remove the spaces from the entered and generated code
function removeSpaces(string){
	return string.split(' ').join('');
}
	
</script>

</div>

