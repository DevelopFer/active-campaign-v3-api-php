

use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignContact;

$url = "<https://YOUR_USER.api-us1.com>";
$key = "<YOUR_TOKEN_KEY>";

$client = new ActiveCampaign();
$client->initialize($url, $key);


$contacts = $client->contacts();
try {
    $response = $contacts->delete(4);
    var_dump($response);
    if ($response->success) {
        echo "Contact successfully deleted";
    } else {
        if ($response->body->message) {
            echo $response->body->message;
        }
        if ($response->body->errors) {
            foreach ($response->body->errors as $error) {
                echo $error->title . "\n";
                echo $error->detail . "\n";
                echo $error->code . "\n";
            }
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
