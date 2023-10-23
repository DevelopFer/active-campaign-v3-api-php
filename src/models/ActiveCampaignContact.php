<?php

namespace WebforceHQ\ActiveCampaign\models;

use WebforceHQ\ActiveCampaign\ActiveCampaign;

class ActiveCampaignContact extends ActiveCampaign
{
    private $email;
    private $firstName;
    private $lastName;
    private $phone;
    private $id;
    private $deleted;

    public function setId(int $value){
        $this->required($value, 'setId');
        $this->id = $value;
    }

    public function getId(){
        return $this->id;
    }

    public function setEmail($value)
    {
        $this->required($value, 'setEmail');
        $this->email = $value;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setFirstName($value)
    {
        $this->required($value, 'setFirstName');
        $this->firstName = $value;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setLastName($value)
    {
        $this->required($value, 'setLastName');
        $this->lastName = $value;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setPhone(string $value)
    {
        $this->required($value, 'setPhone');
        $this->phone = $value;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setDeleted(bool $value){
        $this->deleted = $value;
    }

    public function getDeleted(){
        return $this->deleted;
    }

    public function toArray()
    {
        $ignore = ['api_url','api_key','id'];
        $tmpAttributes  = get_object_vars($this);
        $attributes     = array_diff_key($tmpAttributes, array_flip($ignore));
        $tmpContainer = [
            'contact' => $attributes
        ];
        return $tmpContainer;
    }
}
