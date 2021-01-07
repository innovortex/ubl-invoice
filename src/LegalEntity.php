<?php

namespace NumNum\UBL;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class LegalEntity implements XmlSerializable
{
    private $registrationName;
    private $registrationAddress;
    private $companyId;
    private $companyIdAttributes;

    /**
     * @return string
     */
    public function getRegistrationName()
    {
        return $this->registrationName;
    }

    /**
     * @param string $registrationName
     * @return LegalEntity
     */
    public function setRegistrationName(string $registrationName)
    {
        $this->registrationName = $registrationName;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @param string $companyId
     * @return LegalEntity
     */
    public function setCompanyId(string $companyId, $attributes = null)
    {
        $this->companyId = $companyId;
        if (isset($attributes)) {
            $this->companyIdAttributes = $attributes;
        }
        return $this;
    }

    /**
     * @return Address|null
     */
    public function getRegistrationAddress()
    {
        return $this->registrationAddress;
    }

    /**
     * @param Address $address
     * @return LegalEntity
     */
    public function setRegistrationAddress(Address $address)
    {
        $this->registrationAddress = $address;
        return $this;
    }

    /**
     * The xmlSerialize method is called during xml writing.
     *
     * @param Writer $writer
     * @return void
     */
    public function xmlSerialize(Writer $writer)
    {
        $writer->write([
            Schema::CBC . 'RegistrationName' => $this->registrationName,
        ]);

        if ($this->registrationAddress !== null) {
            $writer->write([
                Schema::CAC . 'RegistrationAddress' => $this->registrationAddress
            ]);
        }

        if ($this->companyId !== null) {
            $writer->write([
                [
                    'name' => Schema::CBC . 'CompanyID',
                    'value' => $this->companyId,
                    'attributes' => $this->companyIdAttributes,
                ],
            ]);
        }
    }
}
