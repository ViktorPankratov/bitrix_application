<div class="wrapper">
	<form  action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="auth_form">  
		<b>Авторизация</b>
	    <div> 
	    <input required type="text" name="login" placeholder="login"> 
	    </div>   
	    <div> 
	    <input required type="password" name="password" placeholder="password"> 
	    </div> 
	    <button type="submit" name='submit' class="form">Авторизоваться</button>
	    </div>
	</form>
</div>