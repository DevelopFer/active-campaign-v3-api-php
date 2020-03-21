use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignListGroup;


$url = "<https://YOUR_USER.api-us1.com>";
$key = "<YOUR_TOKEN_KEY>";

$client = new ActiveCampaign();
$client->initialize($url, $key);

$listId = 1;
$groupId = 3;
$listGroup = new ActiveCampaignListGroup;
$listGroup->setListId($listId);
$listGroup->setGroupId($groupId);

$lists = $client->lists();
try{
    $listId = 4;
    $response = $lists->createListGroup($listGroup);
    
    if($response->success){
        echo "List group created \n";
        var_dump($response->body->listGroup);
    }else{
        if( isset( $response->body->message) ){
            echo $response->body->message."\n";
        }
        if( isset($response->body->error) ){
            echo $response->body->error."\n";
        }
    }
}catch(Exception $e){
    echo $e->getMessage();
}