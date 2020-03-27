<?php

namespace WebforceHQ\ActiveCampaign\models;

use WebforceHQ\ActiveCampaign\ActiveCampaign;

class ActiveCampaignContactList extends ActiveCampaign{

    private $list;
    private $contact;
    private $status;
    private $source;

    public function setList($value){
        $this->list = $value;
    }

    public function getList(){
        return $this->list;
    }

    public function setContact($value){
        $this->contact = $value;
    }

    public function getContact(){
        return $this->contact;
    }   

    public function setStatus($value){
        $this->status = $value;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setSourceId(int $value){
        $this->source = $value;
    }

    public function getSourceId(){
        return $this->source;
    }

    public function toArray()
    {
        $ignore = ['api_url','api_key','id'];
        $tmpAttributes  = get_object_vars($this);
        $attributes     = array_diff_key($tmpAttributes, array_flip($ignore));
        $tmpContainer   = [
            'contactList' => $attributes
        ];
        return $tmpContainer;
    }

}