<?php

namespace NumNum\UBL;

use Sabre\Xml\Service;

class Generator
{
    public static $currencyID;

    public static function invoice(Invoice $invoice, $currencyId = 'EUR')
    {
        self::$currencyID = $currencyId;

        $xmlService = new Service();

        $xmlService->namespaceMap = [
            'urn:oasis:names:specification:ubl:schema:xsd:Invoice-2' => '',
            'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2' => 'cbc',
            'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2' => 'cac',
            'urn:oasis:names:specification:ubl:schema:xsd:QualifiedDatatypes-2' => 'qdt',
            'urn:oasis:names:specification:ubl:schema:xsd:CoreComponentParameters-2' => 'ccts',
            'urn:oasis:names:specification:ubl:schema:xsd:DocumentStatusCode-1.0' => 'stat',
            'urn:un:unece:uncefact:data:draft:UnqualifiedDataTypesSchemaModule:2' => 'udt',
            'urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2' => 'cec',
            'urn:AIFE:Facture:Extension' => 'aife'
        ];

        return $xmlService->write('Invoice', [
            $invoice
        ]);
    }
}
