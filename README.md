# active-campaign-v3-api-php
Implementation for consuming ActiveCampaign's v3 API


#Note:
This is a beta version for this library, the main goal is to consume the ActiveCampaign's V3 API. 

#Required
An ActiveCampaign's account is required. You can sign up https://www.activecampaign.com/

#Models Implemented
<ul>
  <li>
    Contacts
  </li>
  <li>
    Tags
  </li>
  <li>
    Lists
  </li>
  <li>
    Group List
  </li>
</ul>

#Example of using this library

```php

//YOUR ACTIVE CAMPAIGN CREDENTIALS
$url = "<https://YOUR_USER.api-us1.com>";
$key = "<YOUR_TOKEN_KEY>";

//Initialize a new instance of active campaign library class
$client = new ActiveCampaign();
$client->initialize($url, $key);

/* 
Instanciate a contact model and add values to the attributes specified on:

https://developers.activecampaign.com/reference#contact 

*/
$contact = new ActiveCampaignContact();
$contact->setEmail("jhon_doe@gmail.com");
$contact->setFirstName("Jhon");
$contact->setLastName("Doe");
$contact->setPhone("+529985656464");

//Fetch contacts class and perform the create request
$contacts = $client->contacts();

try{
    //Perform create request sending the contact model
     $response = $contacts->create($contact);
    
    //If response success var_dump all content
    if($response->success){
    
        echo "Contact successfully created \n";
        var_dump($response->body->contact);
        
    }else{
        //If any error or message is present print it out
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
```
#For more examples go to examples folder inside the project




