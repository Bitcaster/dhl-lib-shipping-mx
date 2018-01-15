<?php
/**
 * Dhl Shipping
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to
 * newer versions in the future.
 *
 * PHP version 7
 *
 * @package   Dhl\Shipping\Api
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2018 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Shipping\Api\Data;

/**
 * ServiceInterface
 *
 * @package  Dhl\Shipping\Api
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
interface ServiceInterface
{
    const INPUT_TYPE_CHECKBOX = 'checkbox';
    const INPUT_TYPE_RADIO = 'radio';
    const INPUT_TYPE_TEXT = 'text';
    const INPUT_TYPE_NUMBER = 'number';
    const INPUT_TYPE_SELECT = 'select';
    const INPUT_TYPE_DATE = 'date';
    const INPUT_TYPE_TIME = 'time';

    /**
     * Obtain service code.
     *
     * @return string
     */
    public function getCode();

    /**
     * Get the display type of the current service.
     *
     * @return string
     */
    public function getInputType();

    /**
     * Check if service is enabled for display.
     *
     * @return bool
     */
    public function isEnabled();

    /**
     * Check if service can be selected by customer.
     *
     * @return bool
     */
    public function isCustomerService();

    /**
     * Check if service can be selected by merchant.
     *
     * @return bool
     */
    public function isMerchantService();

    /**
     * Check if service was selected by customer or merchant.
     *
     * @return string
     */
    public function isSelected();

    /**
     * @return string[]
     */
    public function getOptions();
}