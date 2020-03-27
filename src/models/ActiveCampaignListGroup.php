<?php

namespace WebforceHQ\ActiveCampaign\models;

use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\ActiveCampaign\interfaces\ActiveCampaignModel;

class ActiveCampaignListGroup extends ActiveCampaign{

    
    private $listid;
    private $groupid;

    public function setListId(int $value){
        $this->listid = $value;
    }

    public function getListId(){
        return $this->listid;
    }

    public function setGroupId(int $value){
        $this->groupid = $value;
    }

    public function getGroupId(){
        return $this->groupid;
    }

    public function toArray(){
        $ignore = ['api_url','api_key','id'];
        $tmpAttributes  = get_object_vars($this);
        $attributes     = array_diff_key($tmpAttributes, array_flip($ignore));
        $tmpContainer   = [
            'listGroup' => $attributes
        ];
        return $tmpContainer;
    }
    


}