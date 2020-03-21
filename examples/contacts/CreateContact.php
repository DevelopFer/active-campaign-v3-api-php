use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignContact;


$url = "<https://YOUR_USER.api-us1.com>";
$key = "<YOUR_TOKEN_KEY>";

$client = new ActiveCampaign();
$client->initialize($url, $key);

$contact = new ActiveCampaignContact();
$contact->setEmail("jhon_doe@gmail.com");
$contact->setFirstName("Jhon");
$contact->setLastName("Doe");
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