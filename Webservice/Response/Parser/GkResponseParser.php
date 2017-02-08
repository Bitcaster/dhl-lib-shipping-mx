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
namespace Dhl\Versenden\Webservice\Response\Parser;

use \Dhl\Versenden\Api\Webservice\Response\Parser\BcsResponseParserInterface;

/**
 * Geschäftskunden API response parser
 *
 * @category Dhl
 * @package  Dhl\Versenden\Api
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class GkResponseParser implements BcsResponseParserInterface
{
    /**
     * Convert BCS SOAP response to generic CreateShipmentResponse
     *
     * @param \Dhl\Versenden\Bcs\CreateShipmentOrderResponse $response
     * @return \Dhl\Versenden\Api\Data\Webservice\Response\Type\CreateShipmentResponseInterface
     */
    public function parseCreateShipmentResponse($response)
    {
        // TODO(nr): Implement parseCreateShipmentResponse() method.
    }

    /**
     * Convert BCS SOAP response to generic GetVersionResponse
     *
     * @param \Dhl\Versenden\Bcs\GetVersionResponse $response
     * @return \Dhl\Versenden\Api\Data\Webservice\Response\Type\GetVersionResponseInterface
     */
    public function parseGetVersionResponse($response)
    {
        // TODO(nr): Implement parseGetVersionResponse() method.
    }

    /**
     * Convert BCS SOAP response to generic DeleteShipmentResponse
     *
     * @param \Dhl\Versenden\Bcs\DeleteShipmentOrderResponse $response
     * @return \Dhl\Versenden\Api\Data\Webservice\Response\Type\DeleteShipmentResponseInterface[]
     */
    public function parseDeleteShipmentResponse($response)
    {
        // TODO(nr): Implement parseDeleteShipmentResponse() method.
    }
}
