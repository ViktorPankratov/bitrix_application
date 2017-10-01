<style type="text/css">
    .reg_form{
        height: 200px;
        margin-bottom: 10px;
    }
    h1{
        font-size: 20px;
    }
    .reg_form div input, button{
        margin-top: 10px;
        margin-left: 230px;
        width: 200px;
    }
</style>
<div class="wrapper">
    <form  action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="reg_form"> 
        <h1>Регистрация</h1>
        <div> 
        <input required type="text" name="name" placeholder="Имя"> 
        </div> 
        <div> 
        <input required type="text" name="login" placeholder="Логин"> 
        </div>  
        <div> 
        <input required type="email" name="email" placeholder="email адрес"> 
        </div> 
        <div> 
        <input required type="password" name="password" placeholder="пароль"> 
        </div> 
        <button type="submit" name='submit' class="form">Зарегистрироваться</button>
        </div> 
    </form>
</div>