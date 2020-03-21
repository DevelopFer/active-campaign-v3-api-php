use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignTag;


$url = "<https://YOUR_USER.api-us1.com>";
$key = "<YOUR_TOKEN_KEY>";

$client = new ActiveCampaign();
$client->initialize($url, $key);

$tag = new ActiveCampaignTag();
$tag->setTag("My Demo Tag 225");
$tag->setType("Contact");
$tag->setDescription("Demo Description 225");
$tag->setId(25);

$tags = $client->tags();
try{
    
    $response = $tags->update($tag);
    
    if($response->success){
        echo "Tag successfully updated \n";
        var_dump($response->body->tag);
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