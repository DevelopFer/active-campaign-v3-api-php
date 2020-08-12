<?php

namespace WebforceHQ\ActiveCampaign\requesters;

use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignList;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignListGroup;
use WebforceHQ\Exceptions\ParametersRequiredException;

class Lists extends ActiveCampaign
{

    const MAIN_ENDPOINT = "/api/3/lists";
    const GROUPS_ENDPOINT = "/api/3/listGroups";
    private $mainUrl;
    private $token;

    public function __construct(ActiveCampaign $activeCampaignInstance)
    {
        $this->mainUrl  = $activeCampaignInstance->getBaseUrl();
        $this->token    = $activeCampaignInstance->getApiKey();
    }

    public function create(ActiveCampaignList $list)
    {
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient()
            ->post(self::MAIN_ENDPOINT, $list->toArray())
            ->send();
        return $response;
    }

    public function retrieve($listId)
    {
        if (!$listId) {
            throw new ParametersRequiredException("List id is required");
        }
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient()
            ->get(self::MAIN_ENDPOINT . "/{$listId}")
            ->send();
        return $response;
    }

    public function delete($listId)
    {
        if (!$listId) {
            throw new ParametersRequiredException("List id is required");
        }
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient()
            ->delete(self::MAIN_ENDPOINT . "/{$listId}")
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

    public function createListGroup(ActiveCampaignListGroup $listGroup)
    {
        $client = new Client($this->mainUrl, $this->token);
        $response = $client->getClient()
            ->post(self::GROUPS_ENDPOINT, $listGroup->toArray())
            ->send();
        return $response;
    }
}
