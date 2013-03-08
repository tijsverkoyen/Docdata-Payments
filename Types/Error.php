<?php
namespace TijsVerkoyen\DocDataPayments\Types;

/**
 * DocDataPayments Error class
 *
 * @author		Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class Error extends BaseObject
{
    /**
     * @var string
     */
    protected $code;

	/**
	 * @var array
	 */
	protected $explanations = array(
        'UNKNOWN_ERROR' => 'The reason of error is unknown.',
        'REQUEST_DATA_MISSING' => 'Request data is missing.',
        'REQUEST_DATA_INCORRECT' => 'Request data is incorrect.',
        'SECURITY_ERROR' => 'Error related to security violations such as login failure or not allowed IP.',
        'INTERNAL_ERROR' => 'Payment system error.',
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
