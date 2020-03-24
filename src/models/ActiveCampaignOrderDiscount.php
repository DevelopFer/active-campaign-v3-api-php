<?php

namespace WebforceHQ\ActiveCampaign\models;

use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\ActiveCampaign\interfaces\ActiveCampaignModel;

class ActiveCampaignOrderDiscount extends ActiveCampaign implements ActiveCampaignModel{

    private $id;
    private $name;
    private $type;
    private $discountAmount;

    public function setName($value){
        $this->name = $value;
    }

    public function getName(){
        return $this->name;
    }

    public function setType($value){
        $this->type = $value;
    }

    public function getType(){
        return $this->type;
    }

    public function setDiscountAmount($value){
        $this->discountAmount = $value;
    }

    public function getDiscountAmount(){
        return $this->discountAmount;
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
        return $attributes;
    }

}