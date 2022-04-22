<?php

namespace WebforceHQ\ActiveCampaign\models;

use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\ActiveCampaign\interfaces\ActiveCampaignModel;

class ActiveCampaignOrderProduct extends ActiveCampaign implements ActiveCampaignModel{

    private $id;
    private $name;
    private $price;
    private $quantity;
    private $externalId;
    private $category;
    private $sku;
    private $description;
    private $imageUrl;
    private $productUrl;

    public function setName($value){
        $this->name = $value;
    }

    public function getName(){
        return $this->name;
    }

    public function setPrice($value){
        $this->price = $value;
    }

    public function getPrice(){
        return $this->price;
    }

    public function setQuantity($value){
        $this->quantity = $value;
    }

    public function getQuantity(){
        return $this->quantity;
    }

    public function setExternalId($value){
        $this->externalId = $value;
    }

    public function getExternalId(){
        return $this->externalId;
    }

    public function setCategory($value){
        $this->category = $value;
    }   

    public function getCategory(){
        return $this->category;
    }   

    public function setSku($value){
        $this->sku = $value;
    }

    public function getSku(){
        return $this->sku;
    }

    public function setDescription($value){
        $this->description = $value;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setImgUrl($value){
        $this->imageUrl = $value;
    }

    public function getImgUrl(){
        return $this->imageUrl;
    }

    public function setProductUrl($value){
        $this->productUrl = $value;
    }

    public function getProductUrl(){
        return $this->productUrl;
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

