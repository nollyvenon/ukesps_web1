<?php

/*
 * Table: user_deposit
 * Column: status
 */
function status_user($status) {
    switch ($status) {
        case '0': $message = "Unactivated"; break;
        case '1': $message = "Active"; break;
        case '2': $message = "Pending"; break;
        case '3': $message = "Suspended/Blocked"; break;
        default: $message = "Status Unknown"; break;
    }
    return $message;
}

function payment_status($status) {
    switch ($status) {
        case '0': $message = "Uncompleted"; break;
		case '1': $message = "Completed"; break;
        default: $message = "Status Unknown"; break;
    }
    return $message;
}

function gender_status($status) {
    switch ($status) {
        case '1': $message = "Male"; break;
		case '2': $message = "Female"; break;
        default: $message = "Status Unknown"; break;
    }
    return $message;
}

function payment_category($status) {
    switch ($status) {
        case '0': $message = "None"; break;
        case '1': $message = "Recruitment"; break;
        case '2': $message = "Search CV"; break;
        case '3': $message = "Courses"; break;
        default: $message = "Status Unknown"; break;
    }
    return $message;
}

function applicant_status($status) {
    switch ($status) {
        case '0': $message = "Submitted"; break;
        case '1': $message = "Processing"; break;
        case '2': $message = "Approved"; break;
        case '3': $message = "interviewed"; break;
        case '4': $message = "Chosen"; break;
        default: $message = "Status Unknown"; break;
    }
    return $message;
}

function tax_rate_type($status) {
    switch ($status) {
        case '1': $message = "Percentage"; break;
        case '2': $message = "Fixed"; break;
        default: $message = "Status Unknown"; break;
    }
    return $message;
}

function support_status($status) {
    switch ($status) {
        case '1': $message = "New"; break;
        case '2': $message = "Running"; break;
        case '3': $message = "In Progress"; break;
        case '4': $message = "Answered"; break;
        default: $message = "Status Unknown"; break;
    }
    return $message;
}

function testi_status($status) {
    switch ($status) {
        case '1': $message = "Sent but not yet approved"; break;
        case '2': $message = "Approved"; break;
        case '3': $message = "Not Approved"; break;
        default: $message = "Status Unknown"; break;
    }
    return $message;
}


/*
 * Table: admin
 * Column: status
 */
function status_admin($status) {
    switch ($status) {
        case '1': $message = "Active"; break;
        case '2': $message = "Inactive"; break;
        case '3': $message = "Suspended"; break;
        default: $message = "Status Unknown"; break;
    }
    return $message;
}

function user_account_status($status) {
    switch ($status) {
        case '0': $message = "Unactivated/Inactive"; break;
        case '1': $message = "Active"; break;
        case '2': $message = "Pending"; break;
        case '3': $message = "Blocked"; break;
        case '4': $message = "Suspended"; break;
        default: $message = "Status Unknown"; break;
    }
    return $message;
}

function notify_status($status) {
    switch ($status) {
        case '0': $message = "Unread"; break;
        case '1': $message = "Read"; break;
        default: $message = "Status Unknown"; break;
    }
    return $message;
}
