<?php
  //chatbot using php using github and heroku
$method = $_SERVER['REQUEST_METHOD'];

if($method == 'POST')
{
    $json = json_decode(file_get_contents('php://input'), true);
    $text = $json->results->metadata->intentName;
    set_time_limit(0);
    $content = file_get_contents("http://dummy.restapiexample.com/api/v1/employees");
    $obj = json_decode($content);
    switch ($text) {
        case 'toatl_emp_count':
            $speech = "".count($obj);
            break;   
    }

    $response = new \stdClass();
    $response->speech = $speech;
    $response->displayText = $speech;
    $response->source = "webhook";
    echo json_encode($response);
}
else
{
    echo "Method not allowed";
}

?>
