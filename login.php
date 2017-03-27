<? session_start();
$appName = "Chatbox"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Se connecter - <? echo $appName ?></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/f51a5e5d23.js"></script>

    <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="account-wall">
                <h1 class="text-center login-title">Start a new <? echo $appName ?></h1>
                <div class="profile-img">
                    <i class="fa fa-power-off" aria-hidden="true"></i>
                </div>
                <form class="form-signin" method="post" action="chat.php">
                <input type="hidden" name="action" id="action" value="login">
                <input type="text" id="sender" name="sender" class="form-control" placeholder="Your pseudo" required autofocus>
                <input type="password" id="receiver" name="receiver" class="form-control" placeholder="Someone else's pseudo" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Begin to chat</button>
                <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">
                    Remember me
                </label>
                <a href="#" class="pull-right need-help">Need Help? </a><span class="clearfix"></span>
                </form>
            </div>
            <a href="?u=signup" class="text-center new-account">What is <? echo $appName ?> ? </a>
        </div>
    </div>
</div>
    
</body>
</html>