<?php
namespace TijsVerkoyen\DocDataPayments\Types;

/**
 * DocDataPayments Shopper class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class Shopper extends BaseObject
{
    /**
     * Shopper's full name.
     * @var Name
     */
    private $name;

    /**
     * Shopper's e-mail address.
     * @var string
     */
    private $email;

    /**
     * Shopper's preferred language.
     * @var Language
     */
    private $language;

    /**
     * Shopper's gender.
     * @var string
     */
    private $gender = 'U';

    /**
     * Shopper's date of birth.
     * @var string
     */
    private $dateOfBirth;

    /**
     * Shopper's phone number.
     * @var string
     */
    private $phoneNumber;

    /**
     * Shopper's mobile phone number.
     * @var string
     */
    private $mobilePhoneNumber;

    /**
     * @var string
     */
    private $id;

    /**
     * @param string $dateOfBirth
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    /**
     * @return string
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * @param string $emailAddress
     */
    public function setEmail($emailAddress)
    {
        $this->email = $emailAddress;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\Language $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\Language
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $mobilePhoneNumber
     */
    public function setMobilePhoneNumber($mobilePhoneNumber)
    {
        $this->mobilePhoneNumber = $mobilePhoneNumber;
    }

    /**
     * @return string
     */
    public function getMobilePhoneNumber()
    {
        return $this->mobilePhoneNumber;
    }

    /**
     * @param \TijsVerkoyen\DocDataPayments\Types\Name $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return \TijsVerkoyen\DocDataPayments\Types\Name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
}
