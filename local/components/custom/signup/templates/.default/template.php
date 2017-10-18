<div class="wrapper">
    <form  action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="reg_form"> 
        <b>Регистрация</b>
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