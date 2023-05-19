<form method="post" action="send_notification.php">
Title<input type="text" name="title">
Message<input type="text" name="message">
<!--Icon path<input type="text" name="icon">-->
Token<input type="text" name="token">
<input type="submit" value="Send notification">
</form>

<?php
function sendNotification(){
    $url ="https://fcm.googleapis.com/fcm/send";

    $fields = array(
        "to" => $_REQUEST['token'],
        "notification" => array(
            "body" => "New message: " . $_REQUEST['message'],
            "title" => "Notification: " . $_REQUEST['title'],
            "icon" => "https://example.com/notification-icon.png",
            "click_action" => "https://example.com"
        )
    );
    

    $headers=array(
        'Authorization: key=AAAA8xXxMtM:APA91bGw2tWC5c_tjMy_jrujz0QsC3xYfcCGFGg8VNoB0ajaEKwcriOp3AwOTGiNES2pm16d_pQejDs9en0Buf2BMaTax9tiFLTHhgz5AstqVanit1NofrlCWnqF5_NWCg6t807ePUaM',
        'Content-Type:application/json'
    );

    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_POST,true);
    curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($fields));
    $result=curl_exec($ch);
    print_r($result);
    curl_close($ch);
}
sendNotification();