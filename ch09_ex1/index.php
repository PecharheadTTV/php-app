<?php
//set default values
$name = '';
$email = '';
$phone = '';
$message = 'Enter some data and click on the Submit button.';

//process
$action = filter_input(INPUT_POST, 'action');

switch ($action) {
       case 'process_data':
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');

        /* validate and process the name */
        $name = trim($name);
        if (empty($name)) {
            $message = 'You must enter a name.';
            break;
        }
        $name = ucwords(strtolower($name));
        $i = strpos($name, ' ');
        if ($i === false) {
            $first_name = $name;
        } else {
            $first_name = substr($name, 0, $i);
        }

        /* validate and process the email address */
        $email = trim($email);
        if (empty($email)) {
            $message = 'You must enter an email address.';
            break;
        }
        if (strpos($email, '@') === false || strpos($email, '.') === false) {
            $message = 'The email address must contain an @ sign and a dot character.';
            break;
        }

        /* validate and process the phone number */
        $phone = trim($phone);
        $digits = str_replace(array('-', ' ', '(', ')', '.'), '', $phone);
        if (strlen($digits) < 7) {
            $message = 'The phone number must contain at least seven digits.';
            break;
        }

        /* build the message */
        $message = "Hello $first_name,\n\n" .
                   "Thank you for entering this data:\n\n" .
                   "Name: $name\n" .
                   "Email: $email\n" .
                   "Phone: $phone";
        break;}
        include 'string_tester.php';