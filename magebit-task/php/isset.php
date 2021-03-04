<?php
require 'DBmethods.php';
$data = new Databases;
if (isset($_GET['searchBtn'])) //if pressed seach button send to $search variable.
{
    $search = $_GET['search'];
    $data->search = $search;
}
if (isset($_GET["sortBy"])) { //if pressed sortBy,take value from URL wiht sort option and send it to $order variable.
    $order = ($_GET['sortBy']);
    $data->order = $order;
} else {
    $order = "date";
}
if (isset($_GET["delete"])) // if delete btn is pressed works delete function.
{
    $where = $_GET["id"];
    $data->delete($where);
}
$post_data = $data->fetchdata('emails', "$order"); //fetching data,witouth domain sorting.
foreach ($post_data as $post) //pushing email to the $domain array.
{
    array_push($data->domain, $post['email']);
}
$data->getDomainName(); //getting domain name(example:gmail)
if (isset($_GET["domain"])) //if is pressed domain name button.
{
    $search = $_GET['domain'];
    $data->search = $search;
    $post_data = $data->fetchdata('emails', "$order"); //fetching new table with domain sort.
}
