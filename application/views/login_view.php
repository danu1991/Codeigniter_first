  <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/style_1.css" title="" charset="utf-8">
  <title>Login</title>
<div id="content">  
		<form action="/Codeigniter_first/index.php/auth/authenticate" method="POST" id="login-form">
			<table>
				<tr>
					<td>
						<label for="uername">Username</label>
					</td>
					<td>
						<input type="text" id="uname" name="uname"   /><?php if(isset($_POST['uname']) && $_POST['uname'] == '') ?>
					</td>
				</tr>
				<tr>
					<td>
						<label for="password">Password</label>
					</td>
					<td>
						<input type="password" id="pword"  name="pword"  /><?php if(isset($_POST['pword']) && $_POST['pword'] == '') ?>
				    </td>
				</tr>
                <tr>
					<td>                
                        <input type="submit" value="Log in" />
                    </td>
                </tr>                              
				<tr>
					<td> 
					   <a href="/Codeigniter_first/index.php/auth/verifyAccout">Forgot password</a>
					</td>
					<td>
				 	   <a href="/Codeigniter_first/index.php/auth/register">Sign up</a>
                     </td>
				</tr>    
		</form>		
	</div>