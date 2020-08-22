<?php

namespace WebforceHQ\ActiveCampaign\requesters;

use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignCustomer;
use WebforceHQ\Exceptions\ParametersRequiredException;

class Customers extends ActiveCampaign
{

    const MAIN_ENDPOINT = "/api/3/ecomCustomers";
    private $mainUrl;
    private $token;

    public function __construct(ActiveCampaign $activeCampaignInstance)
    {
        $this->mainUrl  = $activeCampaignInstance->getBaseUrl();
        $this->token    = $activeCampaignInstance->getApiKey();
    }

    public function create(ActiveCampaignCustomer $customer)
    {
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient()
            ->post(self::MAIN_ENDPOINT, $customer->toArray())
            ->send();
        return $response;
    }

    public function retrieve($customerId, $params = null)
    {
        if (!$customerId) {
            throw new ParametersRequiredException("Customer id is required");
        }
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient($params)
            ->get(self::MAIN_ENDPOINT . "/{$customerId}")
            ->send();
        return $response;
    }

    public function update(ActiveCampaignCustomer $customer)
    {
        if (!$customer->getId()) {
            throw new ParametersRequiredException("Customer id is required");
        }
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient()
            ->put(self::MAIN_ENDPOINT . "/{$customer->getId()}", $customer->toArray())
            ->send();
        return $response;
    }

    public function delete($customerId)
    {
        if (!$customerId) {
            throw new ParametersRequiredException("Customer id is required");
        }
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient()
            ->delete(self::MAIN_ENDPOINT . "/{$customerId}")
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
}
