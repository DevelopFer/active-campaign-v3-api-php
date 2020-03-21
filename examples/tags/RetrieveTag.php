use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignTag;


$url = "<https://YOUR_USER.api-us1.com>";
$key = "<YOUR_TOKEN_KEY>";

$client = new ActiveCampaign();
$client->initialize($url, $key);


$tags = $client->tags();
try{
    $tagIdToRetrieve = 25;
    $response = $tags->retrieve($tagIdToRetrieve);
    
    if($response->success){
        echo "Tag found \n";
        var_dump($response->body->tag);
    }else{
        if(isset($response->body->message)){
            echo $response->body->message."\n";
        }
        if($response->body->error){
            echo $response->body->error."\n";
        }
    }
}catch(Exception $e){
    echo $e->getMessage();
}