use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignConnection;


$url = "<https://YOUR_USER.api-us1.com>";
$key = "<YOUR_TOKEN_KEY>";

$client = new ActiveCampaign();
$client->initialize($url, $key);

$connection = new ActiveCampaignConnection;
$connection->setService("Demo Service 2");
$connection->setExternalId("democompany2");
$connection->setName("Demo Company 2");
$connection->setLogoUrl("https://picsum.photos/200/300");
$connection->setLinkUrl("https://picsum.photos/200/300");

$connections = $client->connections();
try{
    
    $response = $connections->create($connection);
    
    if($response->success){
        echo "Connection successfully created";
        var_dump($response->body->connection);
    }else{
        if(isset($response->body->message)){
            echo $response->body->message."\n";
        }
        if( isset($response->body->errors) ){
            foreach($response->body->errors as $error){
                echo $error->title."\n";
                echo $error->detail."\n";
                echo $error->code."\n";
            }
        }
    }
}catch(Exception $e){
    echo $e->getMessage();
}