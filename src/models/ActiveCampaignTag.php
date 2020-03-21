<?php

namespace WebforceHQ\ActiveCampaign\models;

use WebforceHQ\ActiveCampaign\ActiveCampaign;

class ActiveCampaignTag extends ActiveCampaign{

    private $description;
    private $tag;
    private $tagType;
    private $id;

    public function setId(int $value){
        $this->id = $value;
    }

    public function getId(){
        return $this->id;
    }


    public function setTag($value){
        $this->required($value,'setTag');
        $this->tag = $value;
    }

    public function getTag(){
        return $this->tag;
    }

    public function setType($value){
        $this->required($value, 'setType');
        $this->tagType = $value;
    }

    public function getType(){
        return $this->tagType;
    }

    public function setDescription($value){
        $this->required($value, 'setDescription');
        $this->description = $value;
    }

    public function getDescription(){
        return $this->description;
    }

    public function toArray(){
        $ignore = ['api_url','api_key','id'];
        $tmpAttributes  = get_object_vars($this);
        $attributes     = array_diff_key($tmpAttributes, array_flip($ignore));
        $tmpContainer   = [
            'tag' => $attributes
        ];
        return $tmpContainer;
    }

}