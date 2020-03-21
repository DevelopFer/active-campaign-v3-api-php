

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
    if ($response->contact) {
        echo "Contact successfully created";
    } else {
        if ($response->message) {
            echo $message;
        }
        if ($response->errors) {
            foreach ($response->errors as $error) {
                echo $error->title . "\n";
                echo $error->detail . "\n";
                echo $error->code . "\n";
            }
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
