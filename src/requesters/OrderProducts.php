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

    public function retrieve($productId, $params = null)
    {
        if (!$productId) {
            throw new ParametersRequiredException("OrderProduct id is required");
        }
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient($params)
            ->get(self::MAIN_ENDPOINT . "/{$productId}")
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
