<?php

namespace WebforceHQ\ActiveCampaign\models;

use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\ActiveCampaign\interfaces\ActiveCampaignModel;

class ActiveCampaignConnection extends ActiveCampaign implements ActiveCampaignModel{

    private $id;
    private $service;
    private $externalid;
    private $name;
    private $logoUrl;
    private $linkUrl;

    public function setService($value){
        $this->service = $value;
    }

    public function getService(){
        return $this->service;
    }

    public function setExternalId($value){
        $this->externalid = $value;
    }

    public function getExternalId(){
        return $this->externalid;
    }

    public function setName($value){
        $this->name = $value;
    }

    public function getName(){
        return $this->name;
    }

    public function setLogoUrl($value){
        $this->logoUrl = $value;
    }

    public function getLogoUrl(){
        return $this->logUrl;
    }

    public function setLinkUrl($value){
        $this->linkUrl = $value;
    }

    public function getLinkUrl(){
        return $this->linkUrl;
    }

    public function setId(int $value){
        $this->id = $value;
    }

    public function getId(){
        return $this->id;
    }

    public function toArray(){
        $ignore = ['api_url','api_key','id'];
        $tmpAttributes  = get_object_vars($this);
        $attributes     = array_diff_key($tmpAttributes, array_flip($ignore));
        $tmpContainer   = [
            'connection' => $attributes
        ];
        return $tmpContainer;
    }
}

