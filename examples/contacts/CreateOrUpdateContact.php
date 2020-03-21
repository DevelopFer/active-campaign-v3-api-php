

use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignContact;

$url = "<https://YOUR_USER.api-us1.com>";
$key = "<YOUR_TOKEN_KEY>";

$client = new ActiveCampaign();
$client->initialize($url, $key);

$client = new ActiveCampaign();
$client->initialize($url, $key);
$contact = new ActiveCampaignContact();
$contact->setEmail("jhon_doe8@gmail.com");
$contact->setFirstName("Jhon");
$contact->setLastName("Doe");
$contact->setPhone("+52989898645");

$contacts = $client->contacts();
try {
    $response = $contacts->createOrUpdate($contact);
    var_dump($response);
    if ($response->contact) {
        echo "Contact successfully sync";
    } else {
        if ($response->message) {
            echo $response->message;
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
