<?php
/**
 * BCC email Hook Function to send Emergency ticket to all email addresses
 *
 * Please refer to the documentation @ http://docs.whmcs.com/Hooks for more information
 * The code in this hook is commented out by default. Uncomment to use.
 *
 * @package    WHMCS
 * @author     WHMCS Limited <development@whmcs.com>
 * @copyright  Copyright (c) WHMCS Limited 2005-2013
 * @license    http://www.whmcs.com/license/ WHMCS Eula
 * @version    $Id$
 * @link       http://www.whmcs.com/
 */

if (!defined("WHMCS"))
    die("This file cannot be accessed directly");

function hook_send_emergency_email($vars) {
  
  $criticaldept = 5; // id of emergency department
  $departmentid = $vars['deptid'];
  $company = $vars['companyname'];
	
	//if (in_array($vars['deptid'], $criticaldept)) {
	if (in_array($departmentid, $criticaldept)) {
        
 
 // Send email to admin
        $to = 'domemeailetc@gmail.com';
		  
        // e-mail subject
        $subject = "Emergency Ticket Alert";
    
        // e-mail message
        $message = "Hello Admin,\r\n"
        ."Emergency Ticket:\r\n"
        ."Company: $company\r\n";
    
        $headers = "From: Company <domemailetc@gmail.com>\n"
        ."Reply-To: domemailetc@gmail.com\n"
        ."X-Mailer: PHP/".phpversion();
    
        mail( $to, $subject, $message, $headers );       
}

}
 
add_hook("TicketOpen",1,"hook_send_emergency_email");
