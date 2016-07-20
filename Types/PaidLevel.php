<?php
namespace TijsVerkoyen\DocDataPayments\Types;

/**
 * Class PaidLevel
 * @package TijsVerkoyen\DocDataPayments\Types
 * @author Theo den Hollander
 *
 * Docdata document: 733126_Integration_manual_Order_Api_1-1.pdf
 * Chapter: 7.4 Determining whether an order is paid
 * Determining whether an order is paid
 * Different merchants can have different ways of determining when they consider an order “paid”,
 * the totals in the status report are there to help make this decision. Keep in mind that the status report
 * never reports about money actually having been transferred to a merchant, so it is not a complete guarantee
 * that a payment has been finished in that sense.
 * Using the totals to determine a level of confidence:
 */
abstract class PaidLevel
{
    const NotPaid = 0;


    /**
     * Quick Route:
     * Another option is to see whether the sum of “total shopper pending”, “total acquirer pending”
     * and “total acquirer authorized” matches the “total registered sum”.
     * This implies that everyone responsible has indicated that they are going to make the payment
     * and that the merchant is trusting that everyone will indeed make this.
     * While this route will be faster, it does also have the risk that some payments
     * will actually not have been made.
     */
    const QuickRoute = 1;

    /**
     * Balanced route: Depending on the merchant's situation, it can be a good option to only refer to certain totals.
     * For instance, if the merchant only makes use of credit card payments it could be a good route to only look at
     * “Total acquirer approved”, since this will be rather safe but quicker than looking at the captures.
     * If the merchant does not want to rely on the supplied totals, they can of course also define their
     * decision making on the actual authorization, capture and refund data which is also supplied in the
     * status report and look at the payment method used.
     */
    const BalancedRoute = 2;

    /**
     * Safe Route:
     * The safest route to check whether all payments were made is for the merchants to refer to the
     * “Total captured” amount to see whether this equals the “Total registered amount”.
     * While this may be the safest indicator, the downside is that it can sometimes
     * take a long time for acquirers or shoppers to actually have the money transferred and it can be captured.
     */
    const SafeRoute = 3;

}