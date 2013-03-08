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
     *
     * @var \TijsVerkoyen\DocDataPayments\Types\Name
     */
    protected $name;

    /**
     * Shopper's e-mail address.
     *
     * @var string
     */
    protected $email;

    /**
     * Shopper's preferred language.
     *
     * @var \TijsVerkoyen\DocDataPayments\Types\Language
     */
    protected $language;

    /**
     * Shopper's gender.
     *
     * @var string
     */
    protected $gender = 'U';

    /**
     * Shopper's date of birth.
     *
     * @var string
     */
    protected $dateOfBirth;

    /**
     * Shopper's phone number.
     *
     * @var string
     */
    protected $phoneNumber;

    /**
     * Shopper's mobile phone number.
     *
     * @var string
     */
    protected $mobilePhoneNumber;

    /**
     * @var string
     */
    protected $id;

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
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
    public function setLanguage(Language $language)
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
    public function setName(Name $name)
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
