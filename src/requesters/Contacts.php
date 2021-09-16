<?php

namespace WebforceHQ\ActiveCampaign\requesters;

use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignContact;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignContactList;
use WebforceHQ\Exceptions\ParametersRequiredException;

class Contacts extends ActiveCampaign
{
    const SYNC_ENDPOINT = "/api/3/contact/sync";
    const MAIN_ENDPOINT = "/api/3/contacts";
    const CONTACT_LIST_ENDPOINT = "/api/3/contactLists";
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
        $client = new Client($this->mainUrl, $this->token);
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
            ->post(self::SYNC_ENDPOINT, $contact->toArray())
            ->send();
        return $response;
    }

    public function retrieve($contactId, $params = null)
    {
        if (!$contactId) {
            throw new ParametersRequiredException("Contact id is required to retrieve contact info");
        }
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient($params)
            ->get(self::MAIN_ENDPOINT . "/{$contactId}")
            ->send();
        return $response;
    }

    public function update(ActiveCampaignContact $contact)
    {
        if (!$contact->getId()) {
            throw new ParametersRequiredException("Contact Id is required");
        }
        if (!$this->validateRequiredParameters($contact)) {
            throw new ParametersRequiredException("Email contact is required");
        }
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient()
            ->put(self::MAIN_ENDPOINT . "/{$contact->getId()}", $contact->toArray())
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
            ->delete(self::MAIN_ENDPOINT . "/{$contactId}")
            ->send();
        return $response;
    }

    public function listAll($params = null)
    {
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient($params)
            ->get(self::MAIN_ENDPOINT)
            ->send();
        return $response;
    }

    public function listAutomations($contactId)
    {
        if (!$contactId) {
            throw new ParametersRequiredException("Contact id is required for listing automations");
        }
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient()
            ->get(self::MAIN_ENDPOINT . "/{$contactId}/contactAutomations")
            ->send();
        return $response;
    }

    public function updateList(ActiveCampaignContactList $contactList)
    {
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient()
            ->post(self::CONTACT_LIST_ENDPOINT, $contactList->toArray())
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
            ->get(self::MAIN_ENDPOINT . "/{$contactId}/scoreValues")
            ->send();
        return $response;
    }

    public function contactData($contactId)
    {
        if (!$contactId) {
            throw new ParametersRequiredException("Contact id is required for getting it's data");
        }
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient()
            ->get(self::MAIN_ENDPOINT . "/{$contactId}/contactData")
            ->send();
        return $response;
    }
}
