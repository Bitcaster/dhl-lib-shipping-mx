<?php

namespace Dhl\Shipping\Webservice\Schema\Bcs;

class GetVersionResponse
{

    /**
     * @var Version $Version
     */
    protected $Version = null;

    /**
     * @param Version $Version
     */
    public function __construct($Version)
    {
        $this->Version = $Version;
    }

    /**
     * @return Version
     */
    public function getVersion()
    {
        return $this->Version;
    }

    /**
     * @param Version $Version
     *
     * @return \Dhl\Shipping\Webservice\Schema\Bcs\GetVersionResponse
     */
    public function setVersion($Version)
    {
        $this->Version = $Version;
        return $this;
    }

}
