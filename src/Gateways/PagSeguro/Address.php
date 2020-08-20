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

   public function setRegionCode(string $regionCode)
   {
      if (strlen($regionCode) ==  0 || strlen($regionCode) > 2) {
         throw new \Exception("Error: regionCode must be 2 characters. It has " . strlen($regionCode));
      }
      $this->regionCode = $regionCode;
   }

   public function getRegionCode()
   {
      return $this->regionCode;
   }

   public function setCity(string $city)
   {
      if (strlen($city) ==  0 || strlen($city) > 100) {
         throw new \Exception("Error: city must be 1-100 characters. It has " . strlen($city));
      }
      $this->city = $city;
   }

   public function getCity()
   {
      return $this->city;
   }

   public function setPostalCode(string $postalCode)
   {
      if (strlen($postalCode) ==  0 || strlen($postalCode) > 8) {
         throw new \Exception("Error: PostalCode must be 8 characters. It has " . strlen($postalCode));
      }
      $this->postalCode = $postalCode;
   }

   public function getPostalCode()
   {
      return $this->postalCode;
   }

   public function setStreet(string $street)
   {
      if (strlen($street) ==  0 || strlen($street) > 100) {
         throw new \Exception("Error: street must be 100 characters. It has " . strlen($street));
      }
      $this->street = $street;
   }

   public function getStreet()
   {
      return $this->street;
   }
}
