<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die(); ?>
<form  action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">  
    <div> 
    <input required type="text" name="login" placeholder="login"> 
    </div>   
    <div> 
    <input required type="password" name="password" placeholder="password"> 
    </div> 
    <button type="submit" name='submit' class="form">Авторизоваться</button>
    </div> 
</form>
<a href="/">Вернуться на главную</a>
<?
if(isset($_POST['submit']))
{
    global $USER;
    if (!is_object($USER)) $USER = new CUser;
    $arAuthResult = $USER->Login($_POST['login'], $_POST['password'], "Y");
    if($arAuthResult === true)
    {
        $USER->Authorize();
        LocalRedirect("/");
    }else{
        ShowMessage($arAuthResult);
    }
}
?>