

use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignContactList;

$url = "<https://YOUR_USER.api-us1.com>";
$key = "<YOUR_TOKEN_KEY>";

$client = new ActiveCampaign();
$client->initialize($url, $key);

$contactList = new ActiveCampaignContactList;
$contactList->setList(1);
$contactList->setContact(1);
$contactList->setStatus(1);

$contacts = $client->contacts();

try {
    $response = $contacts->updateList($contactList);
    if ($response->success) {
        echo "List successfully updated";
        var_dump($response->body->contacts);
    } else {
        if (isset($response->body->message)) {
            echo $response->body->message;
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
