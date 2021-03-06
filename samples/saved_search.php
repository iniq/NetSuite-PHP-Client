<?php

namespace NetSuite\WebServices;
require_once '../PHPToolkit/NetSuiteService.php';

$service = new NetSuiteService();
$service->setPassport($nsaccount = 'MYACCT1', $nsemail = 'jDoe@netsuite.com', $nsrole = '3', $nspassword = 'mySecretPwd');

$search = new CustomRecordSearchAdvanced();
$search->savedSearchId = "63";

$request = new SearchRequest();
$request->searchRecord = $search;

$searchResponse = $service->search($request);

if (!$searchResponse->searchResult->status->isSuccess) {
    echo "SEARCH ERROR";
} else {
    echo "SEARCH SUCCESS, records found: " . $searchResponse->searchResult->totalRecords . "\n";
    $records = $searchResponse->searchResult->searchRowList->searchRow;
    foreach ($records as $record)  {
        echo "Name: " . $record->basic->name->searchValue . "\n";
    }

}

?>

