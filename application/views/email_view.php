 <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/style_1.css" title="" charset="utf-8">
  <title>Login</title>
<div id="content">
  
	
		<form action="/Codeigniter_first/index.php/auth/verify" method="POST" id="login-form">
		
			<fieldset>

				<p>
					<label for="email">Email id</label>
					<input type="text" id="uname" name="email" class="round full-width-input"  /><?php if(isset($_POST['email']) && $_POST['email'] == ''){ echo 'Please enter the email'; } ?>
				</p>
                                <input type="submit" value="submit" class="button round blue image-right ic-right-arrow"/>
                                
				
                        
			</fieldset>


		</form>
		
	</div>