<html>
    <head>
        <title>Send Notification</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width,initial-scale=1" />


    </head>
    <body style="width: 100%; height: 100%">

<?php

try{
    $title = $_POST["title"];
    $body = $_POST["message"];
    $key = $_POST["key"];


    $registrationIDs = array($key);

    $ch = curl_init("https://fcm.googleapis.com/fcm/send");

    //Creating the notification array.
    $notification = array('title' =>$title , 'body' => $body);

    //This array contains, the token and the notification. The 'to' attribute stores the token.
    //$arrayToSend = array('to' => $token, 'notification' => $notification);
    $arrayToSend = array('registration_ids' => $registrationIDs, 'notification' => $notification);
    //$arrayToSend = array('notification' => $notification);

    //Generating JSON encoded string form the above array.
    $json = json_encode($arrayToSend);

    //Setup headers:
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Authorization: key=AAAAwQ4xv2Y:APA91bEPQP_Z-WFKBhJbWAi7ULvQJRnXAGP4SwDH7tSjAaFTtPNjJ1phdLLpXgynbZMrDzZmIkksnlfDTiabFYx64soc1WxuZs03ydTSVxrm9r5y1Vf7un69ROVi4B4_k12I0RN40UJ_';

    //Setup curl, add headers and post parameters.
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 0); 
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);       

    //Send the request
    $result = curl_exec($ch);

    $obj = json_decode($result);
    if($obj->success == 1){
        echo '<div id="divContainer" class="container" style="width: 100%; height: 100%">
            <form method="post" action="sendNotification.php" style="width: 90%; margin: 0 auto;">
                <div style="margin-top: 50px; text-align: center;">
                    <div class="alert alert-success" role="alert">
                        Mensagem enviada com sucesso!
                    </div>
                </div>
            </form>
        </div>';
    }else{
        echo '<div id="divContainer" class="container" style="width: 100%; height: 100%">
            <form method="post" action="sendNotification.php" style="width: 90%; margin: 0 auto;">
                <div style="margin-top: 50px; text-align: center;">
                    <div class="alert alert-danger" role="alert">
                        Erro ao enviar mensagem!
                    </div>
                </div>
            </form>
        </div>';
    }



    //Close request
    curl_close($ch);
}catch(Exception $e){
        echo 'Caught exception: ',  $e->getMessage(), "\n";
}


?>
    </body>
</html>