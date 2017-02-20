<?php
require_once("../vendor/autoload.php");

use MicrosoftAzure\Storage\Common\ServicesBuilder;
use MicrosoftAzure\Storage\Common\ServiceException;
use MicrosoftAzure\Storage\Table\Models\BatchOperations;
use MicrosoftAzure\Storage\Table\Models\Entity;
use MicrosoftAzure\Storage\Table\Models\EdmType;


$connectionString = 'DefaultEndpointsProtocol=https;AccountName=lendingsquare;AccountKey=9Ul3JMOWEgGGWkFTUnh1C6lkMeAfFawrB5DeBPf53qYIwOo2EvuepTI5oP/Xdr2d8IfxXRoiDzaTkYz+pb5bYQ==';
$tableClient = ServicesBuilder::getInstance()->createTableService($connectionString);

// function createTableSample($tableClient)
// {
//     global $tableClient;
//     try {
//         // Create table.
//         $tableClient->createTable("users");
//     } catch(ServiceException $e){
//         $code = $e->getCode();
//         $error_message = $e->getMessage();
//         echo $code.": ".$error_message.PHP_EOL;
//     }
// }

// createTableSample();
$phone = '020778966';
$email = 'mail@mail.com';

function insertEntitySample($tableClient)
{
    global $phone; global $email;
    global $tableClient;
    $entity = new Entity();
    $entity->setPartitionKey("pk");
    $entity->setRowKey($email);
    $entity->addProperty("PropertyName", EdmType::STRING, $phone);
    
    try{
        $tableClient->insertEntity("lendingsquare", $entity);
    } catch(ServiceException $e){
        $code = $e->getCode();
        $error_message = $e->getMessage();
        echo $code.": ".$error_message.PHP_EOL;
    }
}
 insertEntitySample($tableClient);

function batchInsertEntitiesSample($tableClient)
{
    global $tableClient;
    $batchOp = new BatchOperations();
    for ($i = 2; $i < 10; ++$i)
    {
        $entity = new Entity();
        $entity->setPartitionKey("pk");
        $entity->setRowKey(''.$i);
        $entity->addProperty("PropertyName", EdmType::STRING, "Sample".$i);
        
        $batchOp->addInsertEntity("lendingsquare", $entity);
    }
    
    try {
        $tableClient->batch($batchOp);
    } catch(ServiceException $e){
        $code = $e->getCode();
        $error_message = $e->getMessage();
        echo $code.": ".$error_message.PHP_EOL;
    }
}

// batchInsertEntitiesSample($tableClient);

function queryEntitiesSample($tableClient)
{
    $filter = "RowKey ne '3'";
    
    try {
        $result = $tableClient->queryEntities("mytable", $filter);
    } catch(ServiceException $e){
        $code = $e->getCode();
        $error_message = $e->getMessage();
        echo $code.": ".$error_message.PHP_EOL;
    }
    
    $entities = $result->getEntities();
    
    foreach($entities as $entity){
        echo $entity->getPartitionKey().":".$entity->getRowKey().PHP_EOL;
    }
}




?>