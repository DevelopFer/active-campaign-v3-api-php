use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignTag;


$url = "<https://YOUR_USER.api-us1.com>";
$key = "<YOUR_TOKEN_KEY>";

$client = new ActiveCampaign();
$client->initialize($url, $key);


$tags = $client->tags();
try{
    $tagIdToDelete = 29;
    $response = $tags->delete($tagIdToDelete);
    
    if($response->success){
        echo "Tag successfully deleted";
    }else{
        if(isset($response->body->message)){
            echo $response->body->message."\n";
        }
        if(isset($response->body->error)){
            echo $response->body->error."\n";
        }
    }
}catch(Exception $e){
    echo $e->getMessage();
}