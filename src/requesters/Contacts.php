<?php

namespace WebforceHQ\ActiveCampaign\requesters;

use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignContact;
use WebforceHQ\Exceptions\ParametersRequiredException;

class Contacts extends ActiveCampaign
{

    const MAIN_ENDPOINT = "/api/3/contacts";
    private $mainUrl;
    private $token;

    public function __construct(ActiveCampaign $activeCampaignInstance)
    {
        $this->mainUrl  = $activeCampaignInstance->getBaseUrl();
        $this->token    = $activeCampaignInstance->getApiKey();
    }

    private function validateRequiredParameters(ActiveCampaignContact $contact)
    {
        return !is_null($contact->getEmail());
    }

    public function create(ActiveCampaignContact $contact)
    {
        if (!$this->validateRequiredParameters($contact)) {
            throw new ParametersRequiredException("Email contact is required");
        }
        $client = new  Client($this->mainUrl, $this->token);
        $response = $client->getClient()
            ->post(self::MAIN_ENDPOINT, $contact->toArray())
            ->send();
        return $response;
    }

    public function createOrUpdate(ActiveCampaignContact $contact)
    {
        if (!$this->validateRequiredParameters($contact)) {
            throw new ParametersRequiredException("Email contact is required");
        }
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient()
            ->post(self::MAIN_ENDPOINT."/sync", $contact->toArray())
            ->send();
        return $response;
    }

    public function retrieve($contactId)
    {
        if (!$contactId) {
            throw new ParametersRequiredException("Contact id is required for deleting action");
        }
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient()
            ->get(self::MAIN_ENDPOINT . "/{$contactId}")
            ->send();
            return $response;
    }

    // public function updateListStatus(){
    //     if (!$this->validateRequiredParameters($contact)) {
    //         throw new ParametersRequiredException("Email contact is required");
    //     }
    //     $client = new Client($this->mainUrl);
    //     $response = $client->getClient()
    //         ->put(self::MAIN_ENDPOINT,(array)$contact)
    //         ->send();
    //     var_dump($response);
    // }    

    public function update(ActiveCampaignContact $contact)
    {
        if( ! $contact->getId() ){
            throw new ParametersRequiredException("Contact Id is required");
        }
        if (!$this->validateRequiredParameters($contact)) {
            throw new ParametersRequiredException("Email contact is required");
        }
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient()
            ->put(self::MAIN_ENDPOINT."/{$contact->getId()}", $contact->toArray())
            ->send();
        return $response;
    }

    public function delete($contactId)
    {
        if (!$contactId) {
            throw new ParametersRequiredException("Contact id is required for deleting action");
        }
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient()
            ->delete(self::MAIN_ENDPOINT."/{$contactId}")
            ->send();
        return $response;
    }

    public function listAll()
    {
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient()
            ->get(self::MAIN_ENDPOINT)
            ->send();
        return $response;
    }

    public function listAutomations($contactId)
    {
        if (!$contactId) {
            throw new ParametersRequiredException("Contact id is required for deleting action");
        }
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient()
            ->get(self::MAIN_ENDPOINT."/{$contactId}/contactAutomations")
            ->send();
        return $response;
    }

    public function score($contactId)
    {
        if (!$contactId) {
            throw new ParametersRequiredException("Contact id is required for deleting action");
        }
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient()
            ->get(self::MAIN_ENDPOINT."/{$contactId}/scoreValues")
            ->send();
        return $response;
    }
}
