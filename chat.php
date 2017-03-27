<? session_start();
$appName = "Chatbox"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Se connecter - <? echo $appName ?></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/f51a5e5d23.js"></script>

    <link rel="stylesheet" href="chat.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script>
        var messages;
        var newMessages;


        function sendMessage() {
            var dest = "http://localhost:8888/web/chat/sendMessage.php";
            console.log('sender='+$("#sender").val()+'&receiver='+$("#receiver").val()+'&content='+$("#content").val());
            $.ajax({
                type: "POST",
                url: dest,
                data: 'sender='+$("#sender").val()+'&receiver='+$("#receiver").val()+'&content='+$("#content").val(),
                success: function(result) {
                    console.log('Successful.');
                },
                error:function(exception, status, error){console.log('Exception:'+exception+' Status:'+status+' Error:'+error);}
            });
        }

        function updateMessageList() {
            var sender = $("#sender").val();
            var receiver = $("#receiver").val();
            var dest = "http://localhost:8888/web/chat/getMessageList.php";
            console.log('sender='+sender+'&receiver='+receiver);
            $.ajax({
                type: "POST",
                url: dest,
                data: 'sender='+sender+'&receiver='+receiver,
                dataType: 'json',
                success: function(data) {
                    newMessages = data;
                    if(newMessages && messages!=newMessages){
                        messages = data;
                        inner="<ul>";
                        data.forEach(function(row) {
                            console.log(row);
                            inner+="<li class='"+(row['pseudo_sender'] == sender ? 'sender' : 'receiver')+"'><span>"+(row['pseudo_sender']+":</span> "+row['content']+"</li>");
                        });
                        $("#messagesDisplay").html(inner);
                        $("#messagesDisplay ul").scrollTop($("#messagesDisplay ul")[0].scrollHeight);

                    }
                }
            });
        }

        function init() {
            updateMessageList();
            window.setInterval(updateMessageList, 5000);
        }
    </script>
</head>
<body onload="init()">
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="account-wall">
                <h1 class="text-center login-title">Conversation.</h1>
                <form class="form-signin" method="post">
                <input type="hidden" name="action" id="action" value="send-message">
                
                    <div class="col-md-6 col-xs-6">
                <input type="text" id="sender" name="sender" class="form-control" value=<? echo "'".$_POST['sender']."'" ?>></div>
                    <div class="col-md-6 col-xs-6">
                <input type="text" id="receiver" name="receiver" class="form-control" value=<? echo "'".$_POST['receiver']."'" ?>></div>

                <div id="messagesDisplay">
                </div>
                
                <input type="textarea"  id="content" name="content" class="form-control" placeholder="Your message" required>
                <button class="btn btn-lg btn-primary btn-block" onclick="sendMessage()">
                    Send</button>
                    <span class="clearfix"></span>
                </form>
            </div>
            <a href="?u=signup" class="text-center new-account">What is <? echo $appName ?> ? </a>
        </div>
    </div>
</div>
    
</body>
</html>