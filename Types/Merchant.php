<?php
namespace TijsVerkoyen\DocDataPayments\Types;

/**
 * DocDataPayments Merchant class
 *
 * @author		Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class Merchant extends BaseObject
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $password;

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
}
