<?php 
// adding a new customer
require_once '../../includes/php/client.php';
require_once '../../includes/php/id.php';

$client = new client();
$id = new Id();

$step = $_POST["step"];

if ($step == "basic") {
    $client->type = $_POST["type"];
    $client->vp_id = $_POST["vp_id"];
    $client->title = $_POST["title"];
    $client->first_name = $_POST["first_name"];
    $client->last_name = $_POST["last_name"];
    $client->gender = $_POST["gender"];
    $client->birth_date = $_POST["birth_date"];
    
    $id->generateId($step);
    //$client->newClient($step);
	echo $client->client_id;
    
} elseif ($step == "contact") {
    $client->client_id = $_POST["client_id"];
    $client->phone = $_POST["phone"];
    $client->fax = $_POST["fax"];
    $client->mobile = $_POST["mobile"];
    $client->email = $_POST["email"];
    $client->contact_method = $_POST["contact_method"];
    $client->contact_timing = $_POST["contact_timing"];
    
    $client->newClient($step);
	echo "contact_added";
    
} elseif ($step == "address") {
    for ($i=0; $i <= $address_count; $i++) { 
        $id->generateId("address");
        $client->client_id = $_POST["client_id"];
        $client->street = $_POST["street"];
        $client->house_no = $_POST["house_no"];
        $client->postal_code = $_POST["postal_code"];
        $client->city = $_POST["city"];
        $client->contract_partner = $_POST["contract_partner"];
        $client->address_type = $_POST["address_type"];
        $client->newClient($step);
        
        for ($i=0; $i <= $meter_count; $i++) { 
            $client->meter_type = $_POST["meter_type"];
            $client->meter_no = $_POST["meter_no"];
            $client->newClient("meter");
        } 
    }
	echo "address_added";
} elseif ($step == "bank") {
    $client->client_id = $_POST["client_id"];
    $client->account_owner = $_POST["account_owner"];
    $client->iban = $_POST["iban"];
    $client->bic = $_POST["bic"];
    $client->newClient($step);
    
} elseif ($step == "order") {
    $client->contract_type = $_POST["contract_type"];
    $client->client_id = $_POST["client_id"];
    $client->sending_method = $_POST["sending_method"];
    
    $id->generateId("order");
    $client->newClient($step);
    
}


?>