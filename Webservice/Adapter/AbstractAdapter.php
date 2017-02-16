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
 * @package   Dhl\Versenden\Api
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Versenden\Webservice\Adapter;

use \Dhl\Versenden\Api\Data\Webservice\Request;
use \Dhl\Versenden\Api\Data\Webservice\Response;
use \Dhl\Versenden\Api\Webservice\Adapter\AdapterInterface;

/**
 * Shipping API Adapter
 *
 * @category Dhl
 * @package  Dhl\Versenden\Api
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
abstract class AbstractAdapter implements AdapterInterface
{
    /**
     * @var AdapterInterface
     */
    private $successor;

    /**
     * @param AdapterInterface $adapter
     * @return $this
     */
    public function setSuccessor(AdapterInterface $adapter)
    {
        $this->successor = $adapter;
        return $this;
    }

    /**
     * @param Request\Type\CreateShipment\ShipmentOrderInterface $shipmentOrder
     * @return bool
     */
    abstract protected function canHandleShipmentOrder(Request\Type\CreateShipment\ShipmentOrderInterface $shipmentOrder);

    /**
     * @param Request\Type\CreateShipment\ShipmentOrderInterface[] $shipmentOrders
     * @return Response\Type\CreateShipment\LabelInterface[]
     */
    abstract protected function createShipmentOrders(array $shipmentOrders);

    /**
     * @param Request\Type\CreateShipment\ShipmentOrderInterface[] $shipmentOrders
     * @return Response\Type\CreateShipment\LabelInterface[]
     */
    public function createLabels(array $shipmentOrders)
    {
        $myOrders = [];
        $theirOrders = [];

        foreach ($shipmentOrders as $sequenceNumber => $shipmentOrder) {
            if ($this->canHandleShipmentOrder($shipmentOrder)) {
                $myOrders[$sequenceNumber] = $shipmentOrder;
            } else {
                $theirOrders[$sequenceNumber] = $shipmentOrder;
            }
        }

        $labels = $this->createShipmentOrders($myOrders);
        if ($this->successor !== null) {
            array_merge($labels, $this->successor->createLabels($theirOrders));
        }

        return $labels ? $labels : [] ;
    }
}
