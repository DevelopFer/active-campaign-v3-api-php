<?php

namespace WebforceHQ\ActiveCampaign\models;

use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\ActiveCampaign\interfaces\ActiveCampaignModel;

class ActiveCampaignOrder extends ActiveCampaign implements ActiveCampaignModel{

    private $id;
    private $externalid;
    private $externalcheckoutid;
    private $source;
    private $email;
    private $totalPrice;
    private $shippingAmount;
    private $taxAmount;
    private $discountAmount;
    private $currency;
    private $connectionid;
    private $customerid;
    private $orderUrl;
    private $externalCreatedDate;
    private $externalUpdatedDate;
    private $abandonedDate;
    private $shippingMethod;
    private $orderNumber;
    
    private $orderProducts;
    private $orderDiscounts;

    public function setOrderProducts(array $products){
        if( ! $this->orderProducts ){
            $this->orderProducts = [];
        }
        foreach($products as $product){
            if($product instanceof ActiveCampaignOrderProduct){
                $this->orderProducts[] = $product->toArray();
            }
        }
    }

    public function setOrderDiscounts(array $discounts){
        if( ! $this->orderDiscounts ){
            $this->orderDiscounts = [];
        }
        foreach($discounts as $discount){
            if($discount instanceof ActiveCampaignOrderDiscount){
                $this->orderDiscounts[] = $discount->toArray();
            }
        }
    }

    public function setExternalId($value){
        $this->externalid = $value;
    }

    public function getExternalId(){
        return $this->externalid;
    }

    public function setExternalcheckoutid($value){
        $this->externalcheckoutid = $value;
    }

    public function getExternalcheckoutid(){
        return $this->externalcheckoutid;
    }

    public function setSource($value){
        $this->source = $value;
    }

    public function getSource(){
        return $this->source;
    }

    public function setEmail($value){
        $this->email = $value;
    }   

    public function getEmail(){
        return $this->email;
    }

    public function setTotalPrice($value){
        $this->totalPrice = $value;
    }

    public function getTotalPrice(){
        return $this->totalPrice;
    }

    public function setShippingAmount($value){
        $this->shippingAmount = $value;
    }

    public function getShippingAmount(){
        return $this->shippingAmount;
    }

    public function setTaxAmount($value){
        $this->taxAmount = $value;
    }

    public function getTaxAmount(){
        return $this->taxAmount;
    }

    public function setDiscountAmount($value){
        $this->discountAmount = $value;
    }

    public function getDiscountAmount(){
        return $this->discountAmount;
    }

    public function setCurrency($value){
        $this->currency = $value;
    }

    public function getCurrency(){
        return $this->currency;
    }

    public function setConnectionid($value){
        $this->connectionid = $value;
    }

    public function getConnectionid(){
        return $this->connectionid;
    }

    public function setCustomerid($value){
        $this->customerid = $value;
    }

    public function getCustomerid(){
        return $this->customerid;
    }

    public function setOrderUrl($value){
        $this->orderUrl = $value;
    }

    public function getOrderUrl(){
        return $this->orderUrl;
    }

    public function setExternalCreatedDate($value){
        $this->externalCreatedDate = $value;
    }

    public function getExternalCreatedDate(){
        return $this->externalCreatedDate;
    }

    public function setExternalUpdatedDate($value){
        $this->externalUpdatedDate = $value;
    }

    public function getExternalUpdatedDate(){
        return $this->externalUpdatedDate;
    }

    public function setAbandonedDate($value){
        $this->abandonedDate = $value;
    }

    public function getAbandonedDate(){
        return $this->abandonedDate;
    }

    public function setShippingMethod($value){
        $this->shippingMethod = $value;
    }

    public function getShippingMethod(){
        return $this->shippingMethod;
    }

    public function setOrderNumber($value){
        $this->orderNumber = $value;
    }

    public function getOrderNumber(){
        return $this->orderNumber;
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
            'ecomOrder' => $attributes
        ];
        return $tmpContainer;
    }

}