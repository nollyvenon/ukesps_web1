<?php
if (!session_id()) {
    session_start();
}
error_reporting(0);
include("../z_db.php");
if (isset($_REQUEST['action'])) {
    // var_dump($_POST);
    // die();
    if ($_REQUEST['action'] == "email_server_responce") {
        $ourMail = "info@ukesps.com"; //Insert your email address here
        $pre_messagebody_info = "Contact message";
        $errors = array();
        $data = array();
        parse_str($_REQUEST['values'], $data);

        $result = array(
            "is_errors" => 0,
            "info" => ""
        );

        if (!empty($errors)) {
            $result['is_errors'] = 1;
            $result['info'] = $errors;
            echo json_encode($result);
            exit;
        }

        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $headers .= "From: " . $data['email'] . "\r\n";
        $pre_messagebody_info .= "<strong>Name</strong>" . ": " . $data['name'] . "<br />";
        if (!empty($data['email'])) {
            $pre_messagebody_info .= "<strong>E-mail</strong>" . ": " . $data['email'] . "<br />";
        }
        if (!empty($data['phone'])) {
            $pre_messagebody_info .= "<strong>Phone</strong>" . ": " . $data['phone'] . "<br />";
        }
        if (!empty($data['url'])) {
            $pre_messagebody_info .= "<strong>URL</strong>" . ": " . $data['url'] . "<br />";
        }
        if (empty($data['subject'])) {
            $subject = "Website Contact Form";
        } else {
            $subject = $data['subject'];
        }
        $after_message = "\r\n<br />--------------------------------------------------------------------------------------------------\r\n<br /> This mail was sent via contact form";
        $contact = $zenta_operation->get_contact($data['email']);
        if (sizeof($contact) > 0) {
            $data['date'] = date('Y-m-d H:i:s');
            $zenta_operation->update_contact($data['email'], $data['name'], $data['phone'], $data['message'], $data['date']);
            $result["info"] = "success";
            echo json_encode($result);
            exit;
        }
        $add_contact = $zenta_operation->add_contact($data['email'], $data['name'], $data['phone'], $data['message']);
        mail($ourMail, $subject, $pre_messagebody_info .= $category . "<strong>Message</strong>" . ": " . $data['message'] . $after_message, $headers);
        $result["info"] = "success";
        echo json_encode($result);
        exit;
    } else if ($_REQUEST['action'] == "email_server_response") {
        $errors = array();
        $data = array();
        parse_str($_REQUEST['values'], $data);

        $result = array(
            "is_errors" => 0,
            "info" => ""
        );

        if (!empty($errors)) {
            $result['is_errors'] = 1;
            $result['info'] = $errors;
            echo json_encode($result);
            exit;
        }
        $subsc = $zenta_operation->get_subscriber($data['email']);
        if (sizeof($subsc) > 0) {
            $result["info"] = "success";
            echo json_encode($result);
            exit;
        }
        $add_subscriber = $zenta_operation->add_subscriber($data['email']);
        if ($add_subscriber) {
            $result["info"] = "success";
            echo json_encode($result);
            exit;
        } else {
            $result["info"] = "server_fail";
            echo json_encode($result);
            exit;
        }
    }
}
