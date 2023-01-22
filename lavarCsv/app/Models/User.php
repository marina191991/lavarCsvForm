<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    private string $firstName;
    private string $lastName;
    private string $city;
    private string $country;
    private string $age;
    private string $phone;
    private string $seniority;

    /**
     * @param string $firstName
     * @param string $lastName
     * @param string $city
     * @param string $country
     * @param string $age
     * @param string $phone
     * @param string $seniority
     */
    public function __construct(string $firstName, string $lastName, string $age, string $country, string $city, string $phone, string $seniority)
    {
        //First Name,Second Name,Age,Country,City,Phone Number,Seniority
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
        $this->country = $country;
        $this->city = $city;
        $this->phone = $phone;
        $this->seniority = $seniority;
    }


    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getAge(): string
    {
        return $this->age;
    }

    /**
     * @param string $age
     */
    public function setAge(string $age): void
    {
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }


    /**
     * @return string
     */
    public function getSeniority(): string
    {
        return $this->seniority;
    }

    /**
     * @param string $seniority
     */
    public function setSeniority(string $seniority): void
    {
        $this->seniority = $seniority;
    }

}
