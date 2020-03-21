use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignContact;


$url = "https://webforcehq55689.api-us1.com";
$key = "deb5b7d7d1eca58523dcd81ad5f91881dae00c1c00d8a155569d53adadcb5d900add1de9";

$client = new ActiveCampaign();
$client->initialize($url, $key);

$contact = new ActiveCampaignContact();
$contact->setEmail("aferogobs20@gmail.com");
$contact->setFirstName("Fernando");
$contact->setLastName("Ordoñez");
$contact->setPhone("+529985656464");

$contacts = $client->contacts();
try{
    $response = $contacts->create($contact);
    if($response->success){
        echo "Contact successfully created \n";
        var_dump($response->body->contact);
    }else{
        if($response->body->message){
            echo $message;
        }
        if($response->body->errors){
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