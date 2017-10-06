<style type="text/css">
	.auth_form{
		height: 150px;
		margin-bottom: 10px;
	}
	h1{
		font-size: 20px;
	}
	.auth_form div input, button{
		margin-top: 10px;
		margin-left: 230px;
		width: 200px;
	}
</style>
<div class="wrapper">
	<form  action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="auth_form">  
		<h1>Авторизация</h1>
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