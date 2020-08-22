<?php

namespace WebforceHQ\ActiveCampaign\requesters;

use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignOrder;
use WebforceHQ\Exceptions\ParametersRequiredException;

class Orders extends ActiveCampaign
{

    const MAIN_ENDPOINT = "/api/3/ecomOrders";
    private $mainUrl;
    private $token;

    public function __construct(ActiveCampaign $activeCampaignInstance)
    {
        $this->mainUrl  = $activeCampaignInstance->getBaseUrl();
        $this->token    = $activeCampaignInstance->getApiKey();
    }

    public function create(ActiveCampaignOrder $order)
    {
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient()
            ->post(self::MAIN_ENDPOINT, $order->toArray())
            ->send();
        return $response;
    }

    public function retrieve($orderId, $params = null)
    {
        if (!$orderId) {
            throw new ParametersRequiredException("Order id is required");
        }
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient($params)
            ->get(self::MAIN_ENDPOINT . "/{$orderId}")
            ->send();
        return $response;
    }

    public function update(ActiveCampaignOrder $order)
    {
        if (!$order->getId()) {
            throw new ParametersRequiredException("Order id is required");
        }
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient()
            ->put(self::MAIN_ENDPOINT . "/{$order->getId()}", $order->toArray())
            ->send();
        return $response;
    }

    public function delete($orderId)
    {
        if (!$orderId) {
            throw new ParametersRequiredException("Order id is required");
        }
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient()
            ->delete(self::MAIN_ENDPOINT . "/{$orderId}")
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

    public function products($orderId, $params = null)
    {
        if (!$orderId) {
            throw new ParametersRequiredException("Order id is required");
        }
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient($params)
            ->get(self::MAIN_ENDPOINT . "/{$orderId}/orderProducts")
            ->send();
        return $response;
    }
}
