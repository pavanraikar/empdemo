
<?php
$input = json_decode(file_get_contents('php://input'), true);
$messageId = $input['result']['resolvedQuery'];
$text = print_r($input,true);
file_put_contents('output.txt', var_export($text, TRUE));
$url = "https://autoremotejoaomgcd.appspot.com/sendmessage?key=APAue83jLrt7xFeQoGjgKq&message=" . $messageId;  

    $data = array("result" => "resolvedQuery");
    $ch = curl_init($url);
    $data_string = json_encode($messageId);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, array("resolvedQuery"=>$data_string));
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER,
               array('Content-Type:application/json',
                      'Content-Length: ' . strlen($data_string))
               );

    $result = curl_exec($ch);
    curl_close($ch);
?>
