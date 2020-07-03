<?php
class paymentOperation {
    private $user_data;
    
    public function __construct($ifx_account = '', $email = '') {
        if(isset($email) && !empty($email)) {
            $this->user_data = $this->set_user_data($email);
        }
    } 
	
	
    public function paystack_payment($user_code, $reference=NULL, $trxref=NULL, $status=NULL, $amount=NULL, $email=NULL, $unique_id=NULL, $payment_category=NULL, $currency=NULL){
		$zentaOperation = new zentabooksOperation();
		$event_prov_object = new EventProviderUser();
		global $db_handle;
		if ($payment_category=='4'){//course subscription
            $query = "INSERT INTO payments SET user_code='".$user_code."', OrderID='".$trxref."', payer_email='".$email."', payment_status='1', payment_amount='".$amount."', txn_id='".$unique_id."', payment_currency='".$currency."', payment_category='$payment_category', gateway='2'";
            $db_handle->runQuery($query);
          //get the order item details and update them with the subscription periods
            $query = "SELECT * FROM course_subscription_orderitems WHERE session_id = '$unique_id'";
            $result = $db_handle->runQuery($query);
            $content = $db_handle->fetchAssoc($result);
            if(isset($content) && !empty($content)) { foreach ($content as $row) {
                $course_id = $row['pid'];
                $pquantity = $row['pquantity'];
                $course_fee_period = $zentaOperation->get_course_by_id($course_id)['fee_period'];
                $course_valid_until = date('Y-m-d H:i:s', time() + $pquantity*$course_fee_period*24*60*60);

                $query = "UPDATE course_subscription_orderitems SET course_valid_until='$course_valid_until' where session_id = '$unique_id' AND pid='$course_id'";
                $db_handle->runQuery($query);
				//SEND EMAIL TO COURSE PROVIDER
				$this->course_subscription_email($user_code, $course_id, $trxref);
          }}
                $query = "UPDATE course_subscription_orders SET orderstatus='1',paymentmode='paystack' where session_id = '$unique_id'";
                $db_handle->runQuery($query);

		}elseif ($payment_category=='1'){//recruiter subcription payment
			$query = "INSERT INTO payments SET recruiter_code='".$user_code."', OrderID='".$trxref."', payer_email='".$email."', payment_status='1', payment_amount='".$amount."', txn_id='".$unique_id."', payment_currency='".$currency."', payment_category='$payment_category', gateway='2'";
			$db_handle->runQuery($query);
			//get the order item details and update them with the subscription periods
            $query = "SELECT * FROM recruiting_plan_orderitems WHERE session_id = '$unique_id'";
            $result = $db_handle->runQuery($query);
            $content = $db_handle->fetchAssoc($result);
            if(isset($content) && !empty($content)) { foreach ($content as $row) {
                $plan_id = $row['pid'];
                $pquantity = $row['pquantity'];
                $plan_period = $zentaOperation->recruiting_plan_detail_by_id($plan_id)['plan_period'];
                $subsc_valid_until = date('Y-m-d H:i:s', time() + $pquantity*$plan_period*24*60*60);

               $query = "UPDATE recruiting_plan_orderitems SET valid_until='$subsc_valid_until' where session_id = '$unique_id' AND pid='$plan_id'";
                $db_handle->runQuery($query);
				//SEND EMAIL TO COURSE PROVIDER
				$this->recruiter_subscription_email($user_code, $plan_id, $trxref);
          	}}
                $query = "UPDATE recruiting_plan_orders SET orderstatus='1',paymentmode='paystack' where session_id = '$unique_id'";
                 $db_handle->runQuery($query);
		}elseif ($payment_category=='2'){//Search CV payment
			$query = "INSERT INTO payments SET recruiter_code='".$user_code."', OrderID='".$trxref."', payer_email='".$email."', payment_status='1', payment_amount='".$amount."', txn_id='".$unique_id."', payment_currency='".$currency."', payment_category='$payment_category', gateway='2'";
			$db_handle->runQuery($query);
			//get the order item details and update them with the subscription periods
            $query = "SELECT * FROM recruiting_cv_plan_orderitems WHERE session_id = '$unique_id'";
            $result = $db_handle->runQuery($query);
            $content = $db_handle->fetchAssoc($result);
            if(isset($content) && !empty($content)) { foreach ($content as $row) {
                $plan_id = $row['pid'];
                $pquantity = $row['pquantity'];
                $plan_period = $zentaOperation->recruiting_plan_detail_by_id($plan_id)['plan_period'];
                $subsc_valid_until = date('Y-m-d H:i:s', time() + $pquantity*$plan_period*24*60*60);

                $query = "UPDATE recruiting_cv_plan_orderitems SET valid_until='$subsc_valid_until' where session_id = '$unique_id' AND pid='$plan_id'";
	             $db_handle->runQuery($query);
				//SEND EMAIL TO COURSE PROVIDER
				$this->searchcv_subscription_email($user_code, $plan_id, $trxref);
          	}}
                $query = "UPDATE recruiting_cv_plan_orders SET orderstatus='1',paymentmode='paystack' where session_id = '$unique_id'";
                $db_handle->runQuery($query);
		}elseif ($payment_category=='5'){//Event host
			$query = "INSERT INTO payments SET event_prov_code='".$user_code."', OrderID='".$trxref."', payer_email='".$email."', payment_status='1', payment_amount='".$amount."', txn_id='".$unique_id."', payment_currency='".$currency."', payment_category='$payment_category', gateway='2'";
			$db_handle->runQuery($query);
			//get the order item details and update them with the subscription periods
            $query = "SELECT * FROM event_provider_plan_orderitems WHERE session_id = '$unique_id'";
            $result = $db_handle->runQuery($query);
            $content = $db_handle->fetchAssoc($result);
            if(isset($content) && !empty($content)) { foreach ($content as $row) {
                $plan_id = $row['pid'];
                $pquantity = $row['pquantity'];
                $plan_period = $event_prov_object->event_provider_plan_detail_by_id($plan_id)['plan_period'];
                $subsc_valid_until = date('Y-m-d H:i:s', time() + $pquantity*$plan_period*24*60*60);

                $query = "UPDATE event_provider_plan_orderitems SET valid_until='$subsc_valid_until' where session_id = '$unique_id' AND pid='$plan_id'";
	             $db_handle->runQuery($query);
				
				//UPDATE THE VALID DATE IN THIS ACCOUNT
				$event_provider_info = $event_prov_object->get_event_provider_detail($user_code);
				$subsc_valid_until = $event_provider_info['plan_valid_until'];
				$subsc_valid_until = date('Y-m-d H:i:s', time() + $pquantity*$plan_period*24*60*60);

                $query = "UPDATE event_providers SET valid_until='$subsc_valid_until',plan_valid_until='$subsc_valid_until where event_prov_code = '$user_code'";
	             $db_handle->runQuery($query);
				
				
				//SEND EMAIL TO COURSE PROVIDER
				$this->eventhost_subscription_email($user_code, $plan_id, $trxref);
          	}}
                $query = "UPDATE event_provider_plan_orders SET orderstatus='1',paymentmode='paystack' where session_id = '$unique_id'";
                $db_handle->runQuery($query);
		}
		$query = "UPDATE carrrt SET ordered='1' where code='$unique_id'";
        $db_handle->runQuery($query);

		unset($_SESSION['cart']);
		unset($_SESSION['unique']);
		
        return true;
	}
	
	public function get_payment_info($paymentID=NULL, $payment_email=NULL, $OrderID=NULL){
		global $db_handle;
		$con = (!empty($paymentID) && ($paymentID != 'NULL'))?" WHERE id = '$paymentID' ": "";
		if (!empty($con)){
			$con .= !empty($payment_email)?" AND payer_email = '$payment_email' ":"";
		}else{
        	$con .= !empty($payment_email) && ($payment_email != 'NULL')?" WHERE payer_email = '$payment_email' ":"";
		}
		if (!empty($con)){
			$con .= !empty($OrderID)?" AND OrderID = '$OrderID' ":"";
		}else{
        	$con .= !empty($OrderID) && ($OrderID != 'NULL')?" WHERE OrderID = '$OrderID' ":"";
		}
		if (!empty($limit)){
			$con .= "ORDER BY id DESC LIMIT $limit";
		}else{
			$con .= "ORDER BY id DESC";	
		}
		$query = "SELECT * FROM payments $con";
        	$result = $db_handle->runQuery($query);
		$categories = $db_handle->fetchAssoc($result);
            return $categories;
	}
	
	public function course_subscription_email($user_code, $course_id, $OrderID){
		global $db_handle;
		
		$zentaOperation = new zentabooksOperation();
		$courseProvUser = new CoursProvUser();
		$course_info = $zentaOperation->get_course_by_id($course_id);
		$course_name = $course_info['course_title'];
		$course_currency = $course_info['course_currency'];
		$course_name = $course_info['course_title'];
		$couprov_code = $course_info['couprov_code'];
		$course_provider_info = $courseProvUser->get_course_provider_detail($course_id);
		$course_provider_name = $course_provider_info['first_name'].' '.$course_provider_info['last_name'];
		$course_provider_email = $course_provider_info['email'];
		$payment_info = $this->get_payment_info('', '', $OrderID);
		$payment_amount = $payment_info['payment_amount'];
		$user_info = $zentaOperation->get_user_by_code($user_code);
		$subscriber_name = $user_info['first_name'].' '.$user_info['last_name'];
		$subscriber_email = $user_info['email'];
		
		 //SEND EMAIL TO COURSE PROVIDER
		$subject = "New Subscription on $course_name";
        $body = "
Dear " . $course_provider_name . "

You have a new subscriber for $course_name. 

Check your dashboard for details.
Course Name: $course_name
Amount Paid: $course_currency.$payment_amount
Subscriber Name: $subscriber_name


Best Regards,

UKESPS Admin Team
www.ukesps.com";
        
        $system_object->send_email($subject, $body, $course_provider_email, $course_provider_name);
		
		
         //SEND EMAIL TO COURSE SUBCRIBER
		$subject = "Your Subscription for $course_name";
        $body = "
Dear " . $subscriber_name . "

Thank you for subscribing for $course_name. 

Check your dashboard for details.
Course Name: $course_name
Amount Paid: $course_currency.$payment_amount
Course Provider: $course_provider_name


Best Regards,

UKESPS Admin Team
www.ukesps.com";
        
        $system_object->send_email($subject, $body, $subscriber_email, $subscriber_name);
	}
	
	public function recruiter_subscription_email($user_code, $plan_id, $OrderID){
		global $db_handle;
		
		$zentaOperation = new zentabooksOperation();
		$recruit_object = new RecruitUser();
		$recr_info = $zentaOperation->recruiting_plan_by_id($plan_id);
		$plan_name = $recr_info['plan_name'];
		$plan_currency = $recr_info['plan_currency'];
		$plan_period = $recr_info['plan_period'];
		$payment_info = $this->get_payment_info('', '', $OrderID);
		$payment_amount = $payment_info['payment_amount'];
		$user_info = $recruit_object->get_recruiter_detail($user_code);
		$subscriber_name = $user_info['first_name'].' '.$user_info['last_name'];
		$subscriber_email = $user_info['email'];
		
		
         //SEND EMAIL TO COURSE SUBCRIBER
		$subject = "Your Subscription for $plan_name";
        $body = "
Dear " . $subscriber_name . "

Thank you for subscribing for $plan_name. 

Check your dashboard for details.
Plan Name: $plan_name
Amount Paid: $plan_currency.$payment_amount
Period: $plan_period


Best Regards,

UKESPS Admin Team
www.ukesps.com";
        
        $system_object->send_email($subject, $body, $subscriber_email, $subscriber_name);
	}
    
	public function searchcv_subscription_email($user_code, $plan_id, $OrderID){
		global $db_handle;
		
		$recruit_object = new RecruitUser();
		$recr_info = $recruit_object->cvsearch_detail_by_id($plan_id);
		$plan_name = $recr_info['plan_name'];
		$plan_currency = $recr_info['plan_currency'];
		$plan_period = $recr_info['plan_period'];
		$payment_info = $this->get_payment_info('', '', $OrderID);
		$payment_amount = $payment_info['payment_amount'];
		$user_info = $recruit_object->get_recruiter_detail($user_code);
		$subscriber_name = $user_info['first_name'].' '.$user_info['last_name'];
		$subscriber_email = $user_info['email'];
		
		
         //SEND EMAIL TO COURSE SUBCRIBER
		$subject = "Your Subscription for $plan_name";
        $body = "
Dear " . $subscriber_name . "

Thank you for subscribing for $plan_name. 

Check your dashboard for details.
Plan Name: $plan_name
Amount Paid: $plan_currency.$payment_amount
Period: $plan_period


Best Regards,

UKESPS Admin Team
www.ukesps.com";
        
        $system_object->send_email($subject, $body, $subscriber_email, $subscriber_name);
	}
		
	public function eventhost_subscription_email($user_code, $plan_id, $OrderID){
		global $db_handle;
		
		$event_prov_object = new EventProviderUser();
		$recr_info = $event_prov_object->event_provider_plan_detail_by_id($plan_id);
		$plan_name = $recr_info['plan_name'];
		$plan_currency = $recr_info['plan_currency'];
		$plan_period = $recr_info['plan_period'];
		$payment_info = $this->get_payment_info('', '', $OrderID);
		$payment_amount = $payment_info['payment_amount'];
		$user_info = $event_prov_object->get_event_provider_detail($user_code);
		$subscriber_name = $user_info['first_name'].' '.$user_info['last_name'];
		$subscriber_email = $user_info['email'];
		
		
         //SEND EMAIL TO COURSE SUBCRIBER
		$subject = "Your Subscription for $plan_name";
        $body = "
Dear " . $subscriber_name . "

Thank you for subscribing for $plan_name. 

Check your dashboard for details.
Plan Name: $plan_name
Amount Paid: $plan_currency.$payment_amount
Period: $plan_period


Best Regards,

UKESPS Admin Team
www.ukesps.com";
        
        $system_object->send_email($subject, $body, $subscriber_email, $subscriber_name);
	}
   
}
$payment_object = new paymentOperation();