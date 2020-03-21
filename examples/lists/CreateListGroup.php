use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignListGroup;


$url = "https://webforcehq55689.api-us1.com";
$key = "deb5b7d7d1eca58523dcd81ad5f91881dae00c1c00d8a155569d53adadcb5d900add1de9";

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
        if($response->body->message){
            echo $response->body->message."\n";
        }
        if($response->body->error){
            echo $response->body->error."\n";
        }
    }
}catch(Exception $e){
    echo $e->getMessage();
}