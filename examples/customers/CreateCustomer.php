use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignCustomer;

$url = "<https://YOUR_USER.api-us1.com>";
$key = "<YOUR_TOKEN_KEY>";

$client = new ActiveCampaign();
$client->initialize($url, $key);

$customer = new ActiveCampaignCustomer();
$customer->setConnectionId("2");
$customer->setExternalId("56791");
$customer->setEmail("alice8@example.com");
$customer->setAcceptsMarketing(1);

$customers = $client->customers();
try{
    $response = $customers->create($customer);
    if($response->success){
        echo "Customer successfully created \n";
        var_dump($response->body->ecomCustomer);
    }else{
        if( isset($response->body->message) ){
            $response->body->message;
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