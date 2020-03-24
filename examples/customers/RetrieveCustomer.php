use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignCustomer;

$url = "<https://YOUR_USER.api-us1.com>";
$key = "<YOUR_TOKEN_KEY>";

$client = new ActiveCampaign();
$client->initialize($url, $key);

$customers = $client->customers();
try{
    $response = $customers->retrieve(7);
    if($response->success){
        echo "Customers found \n";
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