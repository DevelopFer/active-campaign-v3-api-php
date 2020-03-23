<?php

namespace WebforceHQ\ActiveCampaign\models;

use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\ActiveCampaign\interfaces\ActiveCampaignModel;

class ActiveCampaignList extends ActiveCampaign implements ActiveCampaignModel{

    private $id;
    private $name;
    private $stringid;
    private $sender_url;
    private $sender_reminder;
    private $send_last_broadcast;
    private $carboncopy;
    private $subscription_notify;
    private $unsubscription_notify;
    private $user;

    public function setId(int $value){
        $this->id = $value;
    }

    public function getId(){
        return $this->id;
    }

    public function setName($value){
        $this->name = $value;
    }

    public function getName(){
        return $this->name;
    }

    public function setStringId($value){
        $this->stringid = $value;
    }

    public function getStringId(){
        return $this->stringid;
    }

    public function setSenderUrl($value){
        $this->sender_url = $value;
    }

    public function getSenderUrl(){
        return $this->sender_url;
    }

    public function setSenderReminder($value){
        $this->sender_reminder = $value;
    }

    public function getSenderReminder(){
        return $this->sender_reminder;
    }

    public function setSendLastBroadcast(bool $value){
        $this->send_last_broadcast = $value;
    }

    public function getSendLastBroadcast(){
        return $this->send_last_broadcast;
    }

    public function setCarbonCopy($value){
        $this->carboncopy = $value;
    }

    public function getCarbonCopy(){
        return $this->carboncopy;
    }

    public function setSubscriptionNotify($value){
        $this->subscription_notify = $value;
    }

    public function getSubscriptionNotify(){
        return $this->subscription_notify;
    }

    public function setUnsubscriptionNotify($value){
        $this->unsubscription_notify = $value;
    }

    public function getUnsubscriptionNotify(){
        return $this->unsubscription_notify;
    }

    public function setUser(int $value){
        $this->user = $value;
    }

    public function getUser(){
        return $this->user;
    }

    public function toArray()
    {
        $ignore = ['api_url','api_key','id'];
        $tmpAttributes  = get_object_vars($this);
        $attributes     = array_diff_key($tmpAttributes, array_flip($ignore));
        $tmpContainer   = [
            'list' => $attributes
        ];
        return $tmpContainer;
    }
}
