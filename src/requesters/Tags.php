<?php

namespace WebforceHQ\ActiveCampaign\requesters;

use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\Exceptions\ParametersRequiredException;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignTag;

class Tags extends ActiveCampaign
{

    const MAIN_ENDPOINT = "/api/3/tags";
    private $mainUrl;
    private $token;

    public function __construct(ActiveCampaign $activeCampaignInstance)
    {
        $this->mainUrl  = $activeCampaignInstance->getBaseUrl();
        $this->token    = $activeCampaignInstance->getApiKey();
    }

    public function create(ActiveCampaignTag $tag)
    {
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient()
            ->post(self::MAIN_ENDPOINT, $tag->toArray())
            ->send();
        return $response;
    }

    public function retrieve($tagId)
    {
        if (!$tagId) {
            throw new ParametersRequiredException("Tag id is required");
        }
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient()
            ->get(self::MAIN_ENDPOINT . "/{$tagId}")
            ->send();
        return $response;
    }

    public function update(ActiveCampaignTag $tag)
    {
        if (!$tag->getId()) {
            throw new ParametersRequiredException("Tag id is required");
        }
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient()
            ->put(self::MAIN_ENDPOINT . "/{$tag->getId()}", $tag->toArray())
            ->send();
        return $response;
    }

    public function delete($tagId)
    {
        if (!$tagId) {
            throw new ParametersRequiredException("Tag id is required");
        }
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient()
            ->delete(self::MAIN_ENDPOINT . "/{$tagId}")
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
