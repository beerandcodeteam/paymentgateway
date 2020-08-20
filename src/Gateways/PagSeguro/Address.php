<?php

namespace BeerAndCodeTeam\PaymentGateway\Gateways\PagSeguro;

class Address
{
   private string $country;
   private string $region;
   private string $regionCode;
   private string $city;
   private string $postalCode;
   private string $street;
   private string $number;
   private string $locality;

   public function setCountry(string $country)
   {
      $this->country = $country;
   }

   public function getCountry()
   {
      return $this->country;
   }

   public function setRegion(string $region)
   {
      if (strlen($region) ==  0 || strlen($region) > 200) {
         throw new \Exception("Error: region must be 1-200 characters. It has " . strlen($region));
      }
      $this->region = $region;
   }

   public function getRegion()
   {
      return $this->region;
   }
}
