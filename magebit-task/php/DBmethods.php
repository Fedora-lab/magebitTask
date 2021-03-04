<?php
session_start();
include_once 'php/DbConnection.php';
include_once 'php/validateEmail.php';
class Databases extends DbConnection
{
    public static $errors;
    public $con;
    public $order;
    public $search;
    public $domain = array();
    public $dom = array();
    public function __construct()
    {

        parent::__construct();
    }
    public function fetchdata($table_name, $order)
    { // takes all datafrom DB and fetches into table(essential)
        $search = ($this->search);
        if (empty($search)) {
            $query = "SELECT * FROM " . $table_name . " ORDER BY " . $order . ""; // if $search is empty,then we take all emails.
        } else {
            $query = "SELECT * FROM emails WHERE email LIKE '%$search%'"; //if $search not emtpy,then then fecth all emails wiht $search.
        }
        $array = array();
        $result = mysqli_query($this->connection, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
        return $array;
    }
    public function getDomainName()
    { // getting domain name
        foreach ($this->domain as $dn) { // geting domain or $data['email'] from DB
            $parts = explode('@', $dn); // exploding @ from $dn
            $domainName = array_pop($parts); //pop $parts(email) from array(now left only domain part)
            $filearr = explode(".", $domainName); //explode . from $domainName
            $filewithoutextension = $filearr[0];
            array_push($this->dom, $filewithoutextension); // pushing domain part into array.
        }
        $this->dom = array_unique($this->dom);
    }
    public function insertdata($table_name, $data)
    { // inserting data into html(essential)
        if (validate($data) === true) {
            $email = validate($data);
        } else {
            array_push($this->errors, validate($data));
        }
        if (isset($email)) {
            $query = "INSERT INTO emails (email) VALUES( '$data')";
            if (mysqli_query($this->connection, $query)) {
                return true;
            }
        } else {
            echo mysqli_error($this->connection);
        }
    }
    public function delete($where_condition)
    {
        $del = mysqli_query($this->connection, "delete from emails where id = '$where_condition'");
        if ($del) {
            return true;
        }
    }
}
session_unset();
session_destroy();
