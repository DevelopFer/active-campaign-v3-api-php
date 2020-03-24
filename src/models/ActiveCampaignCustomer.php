<?php

namespace WebforceHQ\ActiveCampaign\models;

use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\ActiveCampaign\interfaces\ActiveCampaignModel;

class ActiveCampaignCustomer extends ActiveCampaign implements ActiveCampaignModel{

    private $id;
    private $connectionid;
    private $externalid;
    private $email;
    private $acceptsMarketing;

    public function setConnectionId($value){
        $this->connectionid = $value;
    }

    public function getConnectionId(){
        return $this->connectionid;
    }

    public function setExternalId($value){
        $this->externalid = $value;
    }

    public function getExternalId(){
        return $this->externalid;
    }

    public function setEmail($value){
        $this->email = $value;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setAcceptsMarketing($value){
        $this->acceptsMarketing = $value;
    }

    public function getAcceptsMarketing(){
        return $this->acceptsMarketing;
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
            'ecomCustomer' => $attributes
        ];
        return $tmpContainer;
    }

}