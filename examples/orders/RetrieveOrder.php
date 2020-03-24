

use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignCustomer;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignOrder;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignOrderDiscount;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignOrderProduct;

$url = "<https://YOUR_USER.api-us1.com>";
$key = "<YOUR_TOKEN_KEY>";

$client = new ActiveCampaign();
$client->initialize($url, $key);

$orders = $client->orders();

try{
    $response = $orders->retrieve(3);
    if($response->success){
        echo "Order found \n";
        var_dump($response->body->ecomOrder);
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