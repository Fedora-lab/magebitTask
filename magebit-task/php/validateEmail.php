<?php
function validate($email)
{
    if (empty($email)) {
        Databases::$errors = "Email address is required";
        return null;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // if Email is not correct,we are returning null,else we return true,and parsing $email to the fecth function
        Databases::$errors = "Please provide a valid e-mail address";
        return null;
    } elseif (preg_match('/.co$/', $email)) {
        Databases::$errors = "We are not accepting subscriptions from Colombia emails";
        return null;
    }
    return true;
}
