<?php

namespace WebforceHQ\ActiveCampaign\requesters;

use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignConnection;
use WebforceHQ\Exceptions\ParametersRequiredException;

class Connections extends ActiveCampaign{

    const MAIN_ENDPOINT = "/api/3/connections";
    private $mainUrl;
    private $token;

    public function __construct(ActiveCampaign $activeCampaignInstance)
    {
        $this->mainUrl  = $activeCampaignInstance->getBaseUrl();
        $this->token    = $activeCampaignInstance->getApiKey();
    }

    public function create(ActiveCampaignConnection $connection){
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient()
            ->post(self::MAIN_ENDPOINT, $connection->toArray())
            ->send();
        return $response;
    }

    public function retrieve($connectionId){
        if( ! $connectionId ){
            throw new ParametersRequiredException("Connection id is required");
        }
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient()
            ->get(self::MAIN_ENDPOINT . "/{$connectionId}")
            ->send();
            return $response;
    }

    public function update(ActiveCampaignConnection $connection){
        if( ! $connection->getId() ){
            throw new ParametersRequiredException("Tag id is required");
        }
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient()
            ->put(self::MAIN_ENDPOINT."/{$connection->getId()}", $connection->toArray())
            ->send();
        return $response;
    }

    public function delete($connectionId){
        if( ! $$connectionId ){
            throw new ParametersRequiredException("Tag id is required");
        }
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient()
            ->delete(self::MAIN_ENDPOINT."/{$connectionId}")
            ->send();
        return $response;
    }

    public function listAll(){
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient()
            ->get(self::MAIN_ENDPOINT)
            ->send();
        return $response;
    }

}