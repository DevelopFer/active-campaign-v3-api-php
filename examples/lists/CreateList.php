use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignList;


$url = "https://webforcehq55689.api-us1.com";
$key = "deb5b7d7d1eca58523dcd81ad5f91881dae00c1c00d8a155569d53adadcb5d900add1de9";

$client = new ActiveCampaign();
$client->initialize($url, $key);

$list = new ActiveCampaignList;
$list->setName("Demo Name List 1");
$list->setStringId("demo1-name-list");
$list->setSenderUrl("https://webforcehq.com");
$list->setSenderReminder("You are receiving this email as you subscribed to a newsletter when making an order on our site.");
$list->setSendLastBroadcast(false);
$list->setCarbonCopy("aferogobs@gmail.com");
$list->setSubscriptionNotify("");
$list->setUnsubscriptionNotify("");
$list->setUser(1);


$lists = $client->lists();
try{
    
    $response = $lists->create($list);
    
    if($response->success){
        echo "List successfully created \n";
        var_dump($response->body->list);
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