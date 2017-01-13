<?php
/**
 * Dhl Versenden
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
 * @category  Dhl
 * @package   Dhl\Versenden\Bcs\Api
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Versenden\Bcs\Api\Service\Filter;

use \Dhl\Versenden\Bcs\Api\Service\BulkyGoods;
use \Dhl\Versenden\Bcs\Api\Service\Cod;
use \Dhl\Versenden\Bcs\Api\Service\Insurance;
use \Dhl\Versenden\Bcs\Api\Service\ParcelAnnouncement;
use \Dhl\Versenden\Bcs\Api\Service\PreferredDay;
use \Dhl\Versenden\Bcs\Api\Service\PreferredLocation;
use \Dhl\Versenden\Bcs\Api\Service\PreferredNeighbour;
use \Dhl\Versenden\Bcs\Api\Service\PreferredTime;
use \Dhl\Versenden\Bcs\Api\Service\PrintOnlyIfCodeable;
use \Dhl\Versenden\Bcs\Api\Service\ReturnShipment;
use \Dhl\Versenden\Bcs\Api\Service\ServiceInterface;
use \Dhl\Versenden\Bcs\Api\Product as ApiProduct;
use \Dhl\Versenden\Bcs\Api\Service\VisualCheckOfAge;

/**
 * Product filter
 *
 * @category Dhl
 * @package  Dhl\Versenden\Bcs\Api\Service
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class ProductFilter extends AbstractFilter implements FilterInterface
{
    /**
     * @var string[]
     */
    private $allowedServices;

    public function __construct($data)
    {
        $allowedServices = [
            ApiProduct::CODE_PAKET_NATIONAL => [
                BulkyGoods::CODE,
                Cod::CODE,
                Insurance::CODE,
                ParcelAnnouncement::CODE,
                PreferredLocation::CODE,
                PreferredNeighbour::CODE,
                PrintOnlyIfCodeable::CODE,
                ReturnShipment::CODE,
                VisualCheckOfAge::CODE,
                PreferredDay::CODE,
                PreferredTime::CODE
            ],
            ApiProduct::CODE_WELTPAKET => [
                BulkyGoods::CODE,
                Insurance::CODE,
                ParcelAnnouncement::CODE,
                PrintOnlyIfCodeable::CODE,
            ],
            ApiProduct::CODE_EUROPAKET => [
                Insurance::CODE,
                ParcelAnnouncement::CODE,
                PrintOnlyIfCodeable::CODE,
            ],
            ApiProduct::CODE_KURIER_TAGGLEICH => [
                Insurance::CODE,
                ParcelAnnouncement::CODE,
                PrintOnlyIfCodeable::CODE,
                ReturnShipment::CODE,
            ],
            ApiProduct::CODE_KURIER_WUNSCHZEIT => [
                Insurance::CODE,
                ParcelAnnouncement::CODE,
                PrintOnlyIfCodeable::CODE,
                ReturnShipment::CODE,
            ],
            ApiProduct::CODE_PAKET_AUSTRIA => [
                BulkyGoods::CODE,
                Cod::CODE,
                Insurance::CODE,
                ParcelAnnouncement::CODE,
                PrintOnlyIfCodeable::CODE,
            ],
            ApiProduct::CODE_PAKET_CONNECT => [
                BulkyGoods::CODE,
                Cod::CODE,
                Insurance::CODE,
                ParcelAnnouncement::CODE,
                PrintOnlyIfCodeable::CODE,
            ],
            ApiProduct::CODE_PAKET_INTERNATIONAL => [
                BulkyGoods::CODE,
                Insurance::CODE,
                ParcelAnnouncement::CODE,
                PrintOnlyIfCodeable::CODE,
            ],
        ];

        if (!isset($data['code']) || !is_string($data['code']) || !isset($allowedServices[$data['code']])) {
            $this->allowedServices = [];
        } else {
            $this->allowedServices = $allowedServices[$data['code']];
        }
    }

    /**
     * @param ServiceInterface $service
     * @return bool
     */
    public function isAllowed(ServiceInterface $service)
    {
        return in_array($service->getCode(), $this->allowedServices);
    }
}
