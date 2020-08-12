<?php

namespace WebforceHQ\ActiveCampaign\requesters;

use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\Exceptions\ParametersRequiredException;

class OrderProducts extends ActiveCampaign
{

    const MAIN_ENDPOINT = "/api/3/ecomOrderProducts";
    private $mainUrl;
    private $token;

    public function __construct(ActiveCampaign $activeCampaignInstance)
    {
        $this->mainUrl  = $activeCampaignInstance->getBaseUrl();
        $this->token    = $activeCampaignInstance->getApiKey();
    }

    public function retrieve($productId)
    {
        if (!$productId) {
            throw new ParametersRequiredException("OrderProduct id is required");
        }
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient()
            ->get(self::MAIN_ENDPOINT . "/{$productId}")
            ->send();
        return $response;
    }

    public function order($orderId)
    {
        if (!$orderId) {
            throw new ParametersRequiredException("Order id is required");
        }
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient()
            ->get(self::MAIN_ENDPOINT . "/{$orderId}/orderProducts")
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
}
