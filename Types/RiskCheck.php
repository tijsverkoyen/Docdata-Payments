<?php
namespace TijsVerkoyen\DocDataPayments\Types;

/**
 * DocDataPayments RiskCheck class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class RiskCheck extends BaseObject
{
    /**
     * @var string
     */
    protected $check;

    /**
     * @var int
     */
    protected $score;

    /**
     * @param string $check
     */
    public function setCheck($check)
    {
        $this->check = $check;
    }

    /**
     * @return string
     */
    public function getCheck()
    {
        return $this->check;
    }

    /**
     * @param int $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * @return int
     */
    public function getScore()
    {
        return $this->score;
    }
}
