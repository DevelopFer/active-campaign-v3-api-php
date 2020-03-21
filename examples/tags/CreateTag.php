use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignTag;


$url = "<https://YOUR_USER.api-us1.com>";
$key = "<YOUR_TOKEN_KEY>";

$client = new ActiveCampaign();
$client->initialize($url, $key);

$tag = new ActiveCampaignTag();
$tag->setTag("My Demo Tag 6");
$tag->setType("Contact");
$tag->setDescription("Demo Description");

$tags = $client->tags();
try{
    
    $response = $tags->create($tag);
    
    if($response->success){
        echo "Tag successfully created";
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