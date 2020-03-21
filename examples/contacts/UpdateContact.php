

use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignContact;

$url = "<https://YOUR_USER.api-us1.com>";
$key = "<YOUR_TOKEN_KEY>";

$client = new ActiveCampaign();
$client->initialize($url, $key);

$client = new ActiveCampaign();
$client->initialize($url, $key);
$contact = new ActiveCampaignContact();
$contact->setEmail("aferogobs8s@gmail.com");
$contact->setFirstName("Fernandos");
$contact->setLastName("Ordoñezs");
$contact->setPhone("529988510858");
$contact->setId(5);

$contacts = $client->contacts();
try {
    $response = $contacts->update($contact);
    if ($response->success) {
        echo "Contact successfully updated";
        var_dump($response->body->contact);
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
