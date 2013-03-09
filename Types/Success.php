<?php
namespace TijsVerkoyen\DocDataPayments\Types;

use TijsVerkoyen\DocDataPayments\Base\Object;

/**
 * DocDataPayments Success class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class Success extends Object
{
    /**
     * @var string
     */
    protected $code;

    /**
     * @var array
     */
    protected $explanations = array(
        'SUCCESS' => 'The operation was generally successful.',
    );

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Get a decent explanation
     *
     * @return string
     */
    public function getExplanation()
    {
        return $this->explanations[$this->code];
    }
}
