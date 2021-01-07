<?php

namespace NumNum\UBL;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;
use DateTime;

class PaymentMeans implements XmlSerializable
{
    private $paymentMeansCode = 1;
    private $paymentMeansCodeAttributes = [
        'listID' => 'UN/ECE 4461',
        'listName' => 'Payment Means',
        'listURI' => 'http://docs.oasis-open.org/ubl/os-UBL-2.0-update/cl/gc/default/PaymentMeansCode-2.0.gc'];
    private $paymentDueDate;
    private $instructionId;
    private $instructionNote;
    private $paymentId;
    private $payeeFinancialAccount;

    /**
     * @return string
     */
    public function getPaymentMeansCode()
    {
        return $this->paymentMeansCode;
    }

    /**
     * @param string $paymentMeansCode
     * @return PaymentMeans
     */
    public function setPaymentMeansCode(?int $paymentMeansCode, $attributes = null)
    {
        $this->paymentMeansCode = $paymentMeansCode;
        if (isset($attributes)) {
            $this->paymentMeansCodeAttributes = $attributes;
        }
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getPaymentDueDate()
    {
        return $this->paymentDueDate;
    }

    /**
     * @param DateTime $paymentDueDate
     * @return PaymentMeans
     */
    public function setPaymentDueDate(?DateTime $paymentDueDate)
    {
        $this->paymentDueDate = $paymentDueDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getInstructionId()
    {
        return $this->instructionId;
    }

    /**
     * @param string $instructionId
     * @return PaymentMeans
     */
    public function setInstructionId(?string $instructionId)
    {
        $this->instructionId = $instructionId;
        return $this;
    }

    /**
     * @return string
     */
    public function getInstructionNote()
    {
        return $this->instructionNote;
    }

    /**
     * @param string $instructionNote
     * @return PaymentMeans
     */
    public function setInstructionNote(?string $instructionNote)
    {
        $this->instructionNote = $instructionNote;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }

    /**
     * @param string $paymentId
     * @return PaymentMeans
     */
    public function setPaymentId(?string $paymentId)
    {
        $this->paymentId = $paymentId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPayeeFinancialAccount()
    {
        return $this->payeeFinancialAccount;
    }

    /**
     * @param mixed $payeeFinancialAccount
     * @return PaymentMeans
     */
    public function setPayeeFinancialAccount(?PayeeFinancialAccount $payeeFinancialAccount)
    {
        $this->payeeFinancialAccount = $payeeFinancialAccount;
        return $this;
    }

    public function xmlSerialize(Writer $writer)
    {
        $writer->write([
            'name' => Schema::CBC . 'PaymentMeansCode',
            'value' => $this->paymentMeansCode,
            'attributes' => $this->paymentMeansCodeAttributes
        ]);

        if ($this->getPaymentDueDate() !== null) {
            $writer->write([
                Schema::CBC . 'PaymentDueDate' => $this->getPaymentDueDate()->format('Y-m-d')
            ]);
        }

        if ($this->getInstructionId() !== null) {
            $writer->write([
                Schema::CBC . 'InstructionID' => $this->getInstructionId()
            ]);
        }

        if ($this->getInstructionNote() !== null) {
            $writer->write([
                Schema::CBC . 'InstructionNote' => $this->getInstructionNote()
            ]);
        }

        if ($this->getPaymentId() !== null) {
            $writer->write([
                Schema::CBC . 'PaymentID' => $this->getPaymentId()
            ]);
        }

        if ($this->getPayeeFinancialAccount() !== null) {
            $writer->write([
                Schema::CAC . 'PayeeFinancialAccount' => $this->getPayeeFinancialAccount()
            ]);
        }
    }
}
