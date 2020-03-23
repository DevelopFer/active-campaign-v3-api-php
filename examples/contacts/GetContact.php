

use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignContact;

$url = "<https://YOUR_USER.api-us1.com>";
$key = "<YOUR_TOKEN_KEY>";

$client = new ActiveCampaign();
$client->initialize($url, $key);
$contacts = $client->contacts();
try {
    $response = $contacts->retrieve(5);
    var_dump($response);
    if ($response->success) {
        echo "Contact successfully created";
    } else {
        if (isset($response->body->message)) {
            echo $response->body->message
        }
        if (isset($response->body->errors)) {
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
