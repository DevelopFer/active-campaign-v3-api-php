<?php

namespace WebforceHQ\ActiveCampaign\interfaces;

interface ActiveCampaignModel {

    public function setId(int $value);
    public function getId();
    public function toArray();

}