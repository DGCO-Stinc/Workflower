<?php
//Login function 
session_start();
require_once("class.user");
$login = new USER(); // maak een object USER 

if($login->is_loggedin()!="")
{
	$login->redirect('index.php');
}

if(isset($_POST['btn-login']))
{
	$uname = strip_tags($_POST['txt_uname']);
	$upass = strip_tags($_POST['txt_password']);
		
	if($login->doLogin($uname,$upass))
	{
		$login->redirect('index.php');
	}
	else
	{
		$error = "Wrong Details !";
	}	
}
?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Falshtix Login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
crossorigin="anonymous">
<link rel="stylesheet" href="style.css" type="text/css"  />
</head>
<body>

<div class="signin-form">
	<div class="container">       
       <form class="form-signin" method="post" id="login-form">
      
        <h2 class="form-signin-heading">Flashtix</h2><hr />
        
        <div id="error">
        <?php
            if(isset($error)) {
	        ?>
                  <div class="alert alert-danger">
                     <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                  </div>
                <?php
	    }
        ?>
        </div>       
        <div class="form-group">
          <input type="text" class="form-control" name="txt_uname" placeholder="Gebruikers naam" required />
          <span id="check-e"></span>
        </div>   
        <div class="form-group">
            <input type="password" class="form-control" name="txt_password" placeholder="Password" />
        </div> 
     	<hr />      
        <div class="form-group">
            <button type="submit" name="btn-login" class="btn btn-default">
                <i class="glyphicon glyphicon-log-in"></i> &nbsp; LOGIN
            </button>
        </div>  
            <br/>
        </form>
    </div>   
</div>

</body>
</html>