<?php
namespace TijsVerkoyen\DocDataPayments\Types;

/**
 * DocDataPayments MenuPreferences class
 *
 * @author Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class MenuPreferences extends BaseObject
{
    /**
     * The id of the CSS file that should be used in the payment menu.
     * @var mixed
     */
    protected $css;

    /**
     * Determines if the cancel button is shown (true) or not shown (false),
     * only applicable to the old payment menu.
     * @var bool
     */
    protected $showCancelButton;

    /**
     * Determines if the user can choose the country to pay from (false) or
     * not (true), only applicable to the old payment menu. Default is false.
     * @var boolean
     */
    protected $forceCountry;

    /**
     * @param mixed $css
     */
    public function setCss($css)
    {
        $this->css = $css;
    }

    /**
     * @return mixed
     */
    public function getCss()
    {
        return $this->css;
    }

    /**
     * @param boolean $forceCountry
     */
    public function setForceCountry($forceCountry)
    {
        $this->forceCountry = $forceCountry;
    }

    /**
     * @return boolean
     */
    public function getForceCountry()
    {
        return $this->forceCountry;
    }

    /**
     * @param boolean $showCancelButton
     */
    public function setShowCancelButton($showCancelButton)
    {
        $this->showCancelButton = $showCancelButton;
    }

    /**
     * @return boolean
     */
    public function getShowCancelButton()
    {
        return $this->showCancelButton;
    }
}
