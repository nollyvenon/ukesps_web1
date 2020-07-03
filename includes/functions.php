<?php
//error_reporting(0);
function is_odd($n){
return (boolean) ($n % 2);
}
//echo is_odd(5);
function limit_text($text, $limit) {
      if (str_word_count($text, 0) > $limit) {
          $words = str_word_count($text, 2);
          $pos = array_keys($words);
          $text = substr($text, 0, $pos[$limit]) . '...';
      }
      return $text;
    }
	
function secondsToTime($seconds) {
    $dtF = new DateTime("@0");
    $dtT = new DateTime("@$seconds");
    //return $dtF->diff($dtT)->format('%a days, %h hours, %i minutes and %s seconds');
	return $dtF->diff($dtT)->format('%a days, %h hours, %i minutes');
	
}
	
// format money to have the comma per thousands
/*
echo formatMoney(1050); # 1,050
echo formatMoney(1321435.4, true); # 1,321,435.40
echo formatMoney(10059240.42941, true); # 10,059,240.43
echo formatMoney(13245); # 13,245
*/	
	function formatMoney($number, $fractional=false) {
    if ($fractional) {
        $number = sprintf('%.2f', $number);
    }
    while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
    return $number;
}

/*
**  Function:   convert_number
**  Arguments:  int
**  Returns:    string
**  Description:
**      Converts a given integer (in range [0..1T-1], inclusive) into
**      alphabetical format ("one", "two", etc.).
*/
function convert_number($number)
{
    if (($number < 0) || ($number > 999999999))
    {
        return "$number";
    }

    $Gn = floor($number / 1000000);  /* Millions (giga) */
    $number -= $Gn * 1000000;
    $kn = floor($number / 1000);     /* Thousands (kilo) */
    $number -= $kn * 1000;
    $Hn = floor($number / 100);      /* Hundreds (hecto) */
    $number -= $Hn * 100;
    $Dn = floor($number / 10);       /* Tens (deca) */
    $n = $number % 10;               /* Ones */

    $res = "";

    if ($Gn)
    {
        $res .= convert_number($Gn) . " Million";
    }

    if ($kn)
    {
        $res .= (empty($res) ? "" : " ") .
            convert_number($kn) . " Thousand";
    }

    if ($Hn)
    {
        $res .= (empty($res) ? "" : " ") .
            convert_number($Hn) . " Hundred";
    }

    $ones = array("", "One", "Two", "Three", "Four", "Five", "Six",
        "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen",
        "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen",
        "Nineteen");
    $tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty",
        "Seventy", "Eigthy", "Ninety");

    if ($Dn || $n)
    {
        if (!empty($res))
        {
            $res .= " and ";
        }

        if ($Dn < 2)
        {
            $res .= $ones[$Dn * 10 + $n];
        }
        else
        {
            $res .= $tens[$Dn];

            if ($n)
            {
                $res .= "-" . $ones[$n];
            }
        }
    }

    if (empty($res))
    {
        $res = "zero";
    }

    return $res;
}

// The purpose of this class is to convert numbers to word
// Extra features include: addition currency units / values - optional
// The thousand separator is limited to zillion, 
// additional word can be used if know 
// 
// echo number_word("3,452,455.00", "Dollar", "Cent");
// 
// femi.fapohunda@gmail.com +234 803 977 4040

class numberWord {
	
	// array of possible numbers => words
	private $word_array = array(1=>"One",2=>"Two",3=>"Three",4=>"Four",5=>"Five",6=>"Six",7=>"Seven",8=>"Eight",9=>"Nine",10=>"Ten",11=>"Eleven",12=>"Twelve",13=>"Thirteen",14=>"Fourteen",15=>"Fifteen",16=>"Sixteen",17=>"Seventeen",18=>"Eighteen",19=>"Nineteen",20=>"Twenty",21=>"Twenty-One",22=>"Twenty-Two",23=>"Twenty-Three",24=>"Twenty-Four",25=>"Twenty-Five",26=>"Twenty-Six",27=>"Twenty-Seven",28=>"Twenty-Eight",29=>"Twenty-Nine",30=>"Thirty",31=>"Thirty-One",32=>"Thirty-Two",33=>"Thirty-Three",34=>"Thirty-Four",35=>"Thirty-Five",36=>"Thirty-Six",37=>"Thirty-Seven",38=>"Thirty-Eight",39=>"Thirty-Nine",40=>"Forty",41=>"Forty-One",42=>"Forty-Two",43=>"Forty-Three",44=>"Forty-Four",45=>"Forty-Five",46=>"Forty-Six",47=>"Forty-Seven",48=>"Forty-Eight",49=>"Forty-Nine",50=>"Fifty",51=>"Fifty-One",52=>"Fifty-Two",53=>"Fifty-Three",54=>"Fifty-Four",55=>"Fifty-Five",56=>"Fifty-Six",57=>"Fifty-Seven",58=>"Fifty-Eight",59=>"Fifty-Nine",60=>"Sixty",61=>"Sixty-One",62=>"Sixty-Two",63=>"Sixty-Three",64=>"Sixty-Four",65=>"Sixty-Five",66=>"Sixty-Six",67=>"Sixty-Seven",68=>"Sixty-Eight",69=>"Sixty-Nine",70=>"Seventy",71=>"Seventy-One",72=>"Seventy-Two",73=>"Seventy-Three",74=>"Seventy-Four",75=>"Seventy-Five",76=>"Seventy-Six",77=>"Seventy-Seven",78=>"Seventy-Eight",79=>"Seventy-Nine",80=>"Eighty",81=>"Eighty-One",82=>"Eighty-Two",83=>"Eighty-Three",84=>"Eighty-Four",85=>"Eighty-Five",86=>"Eighty-Six",87=>"Eighty-Seven",88=>"Eighty-Eight",89=>"Eighty-Nine",90=>"Ninety",91=>"Ninety-One",92=>"Ninety-Two",93=>"Ninety-Three",94=>"Ninety-Four",95=>"Ninety-Five",96=>"Ninety-Six",97=>"Ninety-Seven",98=>"Ninety-Eight",99=>"Ninety-Nine",100=>"One Hundred",200=>"Two Hundred",300=>"Three Hundred",400=>"Four Hundred",500=>"Five Hundred",600=>"Six Hundred",700=>"Seven Hundred",800=>"Eight Hundred",900=>"Nine Hundred");
			
	// thousand array, 
	private $thousand = array("", "Thousand, ", "Million, ", "Billion, ", "Trillion, ", "Zillion, ");
	
	// variables
	private $val, $currency0, $currency1;	
	private $val_array, $dec_value, $dec_word, $num_value, $num_word;
	var $val_word;

	public function number_word($in_val = 0, $in_currency0 = "", $in_currency1 = "") {
		
		$this->val = $in_val;
		$this->currency0 = $in_currency0;
		$this->currency1 = $in_currency1;
		
		// remove commas from comma separated numbers
		$this->val = abs(floatval(str_replace(",","",$this->val)));
		
		if ($this->val > 0) {
		
			// convert to number format
			$this->val = number_format($this->val, '2', ',', ',');
			
			// split to array of 3(s) digits and 2 digit
			$this->val_array = explode(",", $this->val);
			
			// separate decimal digit
			$this->dec_value = intval($this->val_array[count($this->val_array) - 1]);
			
			if ($this->dec_value > 0) {
				
				// convert decimal part to word;
				$this->dec_word = $this->word_array[$this->dec_value]." ".$this->currency1;
			}
			
			// loop through all 3(s) digits in VAL array
			$t = 0;
			
			// initialize the number to word variable
			$this->num_word = "";
			
			for ($i = count($this->val_array) - 2; $i >= 0; $i--) {
				
				// separate each element in VAL array to 1 and 2 digits
				$this->num_value = intval($this->val_array[$i]);
				
				// if VAL = 0 then no word
				if ($this->num_value == 0) {
					$this->num_word = "".$this->num_word;
				} 
				
				// if 0 < VAL < 100 or 2 digits
				elseif (strlen($this->num_value."") <= 2) {
					$this->num_word = $this->word_array[$this->num_value]." ".$this->thousand[$t].$this->num_word;
					
					// add 'and' if not last element in VAL
					if ($i == 1) {
						$this->num_word = " and ".$this->num_word;
					}				
				} 
				
				// if VAL >= 100, set the hundred word
				else {
					$this->num_word = $this->word_array[substr($this->num_value, 0, 1)."00"]. (intval(substr($this->num_value, 1, 2)) > 0 ? " and " : "") .$this->word_array[intval(substr($this->num_value, 1, 2))]." ".$this->thousand[$t].$this->num_word;
				}
				$t++;
			}		
			
			// add currency to word
			if (!empty($this->num_word)) {
				$this->num_word .= " ".$this->currency0;
			}
		}
		
		// join the number and decimal words
		$this->val_word = $this->num_word." ".$this->dec_word;
	}
}

function truncate_str ($str, $len = 40, $delimiter = '...')
{
    return strlen($str) > $len ? substr($str, 0, strrpos($str, ' ', -(strlen($str) - $len))) . $delimiter : $str;
}

function leading_zero( $aNumber, $intPart, $floatPart=NULL, $dec_point=NULL, $thousands_sep=NULL) { 
//Note: The $thousands_sep has no real function because it will be "disturbed" by plain leading zeros -> the main goal of the function
 $formattedNumber = $aNumber;
 if (!is_null($floatPart)) { //without 3rd parameters the "float part" of the float shouldn't be touched
   $formattedNumber = number_format($formattedNumber, $floatPart, $dec_point, $thousands_sep);
   }
 //if ($intPart > floor(log10($formattedNumber)))
   $formattedNumber = str_repeat("0",($intPart + -1 - floor(log10($formattedNumber)))).$formattedNumber;
 return $formattedNumber;
 }

function mail_attachment($filename, $path, $mailto, $from_mail, $from_name, $replyto, $subject, $message) {
    $file = $path.$filename;
    $file_size = filesize($file);
    $handle = fopen($file, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $content = chunk_split(base64_encode($content));
    $uid = md5(uniqid(time()));
    $name = basename($file);
    $header = "From: ".$from_name." <".$from_mail.">\r\n";
    $header .= "Reply-To: ".$replyto."\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
//(THIS ENTIRE LINE HAS BEEN REMOVED)
    $nmessage = "--".$uid."\r\n";
    $nmessage .= "Content-type:text/plain; charset=iso-8859-1\r\n";
    $nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $nmessage .= $message."\r\n\r\n";
    $nmessage .= "--".$uid."\r\n";
    $nmessage .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"; 
    $nmessage .= "Content-Transfer-Encoding: base64\r\n";
    $nmessage .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
    $nmessage .= $content."\r\n\r\n";
    $nmessage .= "--".$uid."--";
error_reporting(E_ALL);
    if (mail($mailto, $subject, $nmessage, $header)) {
        echo "Mail Sent Successfully to " . $mailto ."<br/>"; // or use booleans here
    } else {
        echo "Mail NOT Sent to " .$mailto ."<br/>";
    }
}


function madSafety($string)
{
    $string = stripslashes($string);
    $string = strip_tags($string);
    $string = mysql_real_escape_string($string);
    return $string;
}

// This function extracts a number from a string.
// It takes a single string as a parameter, and returns either a number with sign (+/-) (if found in input string) or NULL (no number found in string).
//
// Known limitations:
// * Does not support French number formatting (spaces instead of commas, decimal point represented by a comma).
// * Only extracts the first number found in a string.
// * Does not support scientific notation (numbers with "e" or "E" in them).

function extractNumber($string)
{
    // Return NULL if input string is NULL:
    if (!$string) {
        return NULL;
    }
   
    // Break input string into an array of single characters:
    $chars = str_split($string);
   
    // Set up some arrays for later use:
    $all_num_chars = array(    "-",
                            "+",
                            ".",
                            "0",
                            "1",
                            "2",
                            "3",
                            "4",
                            "5",
                            "6",
                            "7",
                            "8",
                            "9");
                       
    $digits_and_decimal = array(".",
                                "0",
                                "1",
                                "2",
                                "3",
                                "4",
                                "5",
                                "6",
                                "7",
                                "8",
                                "9");
                           
    $just_digits = array(    "0",
                            "1",
                            "2",
                            "3",
                            "4",
                            "5",
                            "6",
                            "7",
                            "8",
                            "9");
   
    foreach ($chars as $key => $char) {
       
        if ($char == ",") {
           
            // If a comma is found before a number has been encountered in the input string, skip it and iterate to next char.
            if (!$number) {
                continue;               
            }
           
            // If a comma is found, make sure that it's preceded by a digit, followed by 3 digits and that the 4th digit is not a number, and that the comma is not found after a decimal:
            if (in_array($chars[$key-1], $just_digits)
            && in_array($chars[$key+1], $just_digits)
            && in_array($chars[$key+2], $just_digits)
            && in_array($chars[$key+3], $just_digits)
            && !in_array($chars[$key+4], $just_digits)
            && !$decimal_found) {
               
                continue; // $char is a "legit comma" and should be skipped, and the main loop should iterate to the next char.
               
            } else { // $char is a "rogue comma" and the number found up to the rogue comma is returned:
                return $number;
            }
           
        }
       
        if ($number && !in_array($char, $all_num_chars)) { // If a $number has been started and $char is a non-numerical char, return $number:
            return $number;
        }
       
        if (!$number && !in_array($char, $all_num_chars)) { // If a $number has not been started and $char is a non-numerical char, continue (iterate to next char):
            continue;
        }
           
        if (in_array($char, $just_digits)) { // $char is a digit, and should be appended to $number.               
            $number .= $char;
            continue;
        }
       
        if ($char == ".") {
           
            if ($decimal_found) { // $char is a "rogue decimal" and the number up to the rogue decimal is returned:
                return $number;
            }
           
            if (!in_array($chars[$key+1], $just_digits)) { // If the char following the decimal is not a number, return $number.
                return $number;
            }
           
            // $char is a "legit decimal" and should be appended to $number.
            $number .= $char;
            $decimal_found = true;
            continue;
           
           
        } else { // $char is a sign (+ or -):
           
            if (!$number && in_array($chars[$key + 1], $digits_and_decimal)) { // Sign occurs at beginning of number and should be added to $number.
               
                $number .= $char;
                continue;
               
            }
           
            if (!$number && !in_array($chars[$key + 1], $digits_and_decimal)) { // Sign occurs before the beginning of a number and should be ignored.
               
                continue;
               
            }
           
            if ($number) { // Sign occurs in the middle of a number. Number before the sign is returned.
           
                return $number;
               
            }
           
        }
       
    }
   
    return $number;
}

/**
 * String zeros from date
 * @param type $marked_string
 * @return type mixed $clean_string
 */
function strip_zeros_from_date( $marked_string="" ) {
  // first remove the marked zeros
  $no_zeros = str_replace('*0', '', $marked_string);
  // then remove any remaining marks
  $cleaned_string = str_replace('*', '', $no_zeros);
  return $cleaned_string;
}

/**
 * Redirects to a specified location
 * @param type $location
 */
function redirect_to( $location = NULL ) {
  if ($location != NULL) {
    header("Location: {$location}");
    exit;
  }
}

/**
 * 
 * @param type $message
 * @return string
 */
function output_message($message="") {
  if (!empty($message)) { 
    return "<p class=\"message\">{$message}</p>";
  } else {
    return "";
  }
}

/**
 * 
 * @param type $class_name
 */
function __autoload($class_name) {
    $class_name = strtolower($class_name);
    $path = LIB_PATH.DS."{$class_name}.php";
    if(file_exists($path)) {
    require_once($path);
  } else { 
      die("The file {$class_name}.php could not be found."); 
      }
}

/**
 * 
 * @param type $action
 * @param type $message
 */
function log_action($action, $message="") {
    $logfile = SITE_ROOT.DS.'admin-logs'.DS.'log.txt';
    $new = file_exists($logfile) ? false : true;
    if($handle = fopen($logfile, 'a')) { // append
        $timestamp = strftime("%Y-%m-%d %H:%M:%S", time());
        $content = "{$timestamp} | {$action}: {$message}\n";
        fwrite($handle, $content);
        fclose($handle);
        if($new) { chmod($logfile, 0755); }
    } else {
        echo "Could not open log file for writing.";
    }
}

/**
 * 
 * @param type $datetime
 * @return type
 */
function datetime_to_text($datetime="") {
  $unixdatetime = strtotime($datetime);
  return strftime("%B %d, %Y at %I:%M %p", $unixdatetime);
}

function datetime_to_text2($datetime="") {
  $unixdatetime = strtotime($datetime);
  return strftime("%B %d, %Y", $unixdatetime);
}

function date_to_text($datetime="") {
  $unixdatetime = strtotime($datetime);
  return strftime("%B %d, %Y", $unixdatetime);
}


// calculate time since an action occured
function time_since($since) {
    $since = time() - strtotime($since);
    $chunks = array(
        array(31536000, 'year'), //60 * 60 * 24 * 365
        array(2592000, 'month'), //60 * 60 * 24 * 30
        array(604800, 'week'), //60 * 60 * 24 * 7
        array(86400, 'day'), //60 * 60 * 24
        array(3600, 'hour'), //60 * 60
        array(60, 'minute'),
        array(1, 'second')
    );

    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];
        if (($count = floor($since / $seconds)) != 0) {
            break;
        }
    }

    $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
    $print = $print . " ago";
    return $print;
}

function generateHash($password) {
    if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
        $salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
        return crypt($password, $salt);
    }
}

function verify($password, $hashedPassword) {
    return crypt($password, $hashedPassword) == $hashedPassword;
}

function is_localhost() {
    $whitelist = array( '127.0.0.1', '::1' );
    if( in_array( $_SERVER['REMOTE_ADDR'], $whitelist) )
        return true;
}

 function remove_comma($a) {

     if(is_numeric($a)) {

     $a = preg_replace('/[^0-9,]/s', '', $a);
     }
	 $a = (preg_replace('/[^\d.]/', '', $a));
     return $a;

}

function encrypt($data, $key=NULL){
   // Remove the base64 encoding from our key
    $encryption_key = base64_decode($key);
    // Generate an initialization vector
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    // Encrypt the data using AES 256 encryption in CBC mode using our encryption key and initialization vector.
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
    // The $iv is just as important as the key for decrypting, so save it with our encrypted data using a unique separator (::)
    return base64_encode($encrypted . '::' . $iv);
}

function decrypt($data, $key=NULL){
    // Remove the base64 encoding from our key
    $encryption_key = base64_decode($key);
    // To decrypt, split the encrypted data from our IV - our unique separator used was "::"
    list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
}


function get_ip_address() {
    // check for shared internet/ISP IP
    if (!empty($_SERVER['HTTP_CLIENT_IP']) && validate_ip($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }

    // check for IPs passing through proxies
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // check if multiple ips exist in var
        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') !== false) {
            $iplist = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            foreach ($iplist as $ip) {
                if (validate_ip($ip))
                    return $ip;
            }
        } else {
            if (validate_ip($_SERVER['HTTP_X_FORWARDED_FOR']))
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED']) && validate_ip($_SERVER['HTTP_X_FORWARDED']))
        return $_SERVER['HTTP_X_FORWARDED'];
    if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
        return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && validate_ip($_SERVER['HTTP_FORWARDED_FOR']))
        return $_SERVER['HTTP_FORWARDED_FOR'];
    if (!empty($_SERVER['HTTP_FORWARDED']) && validate_ip($_SERVER['HTTP_FORWARDED']))
        return $_SERVER['HTTP_FORWARDED'];

    // return unreliable ip since all else failed
    return $_SERVER['REMOTE_ADDR'];
}

/**
 * Ensures an ip address is both a valid IP and does not fall within
 * a private network range.
 */
function validate_ip($ip) {
    if (strtolower($ip) === 'unknown')
        return false;

    // generate ipv4 network address
    $ip = ip2long($ip);

    // if the ip is set and not equivalent to 255.255.255.255
    if ($ip !== false && $ip !== -1) {
        // make sure to get unsigned long representation of ip
        // due to discrepancies between 32 and 64 bit OSes and
        // signed numbers (ints default to signed in PHP)
        $ip = sprintf('%u', $ip);
        // do private network range checking
        if ($ip >= 0 && $ip <= 50331647) return false;
        if ($ip >= 167772160 && $ip <= 184549375) return false;
        if ($ip >= 2130706432 && $ip <= 2147483647) return false;
        if ($ip >= 2851995648 && $ip <= 2852061183) return false;
        if ($ip >= 2886729728 && $ip <= 2887778303) return false;
        if ($ip >= 3221225984 && $ip <= 3221226239) return false;
        if ($ip >= 3232235520 && $ip <= 3232301055) return false;
        if ($ip >= 4294967040) return false;
    }
    return true;
}

function random_string($type = 'alnum', $len = 8)
	{
		switch ($type)
		{
			case 'basic':
				return mt_rand();
			case 'alnum':
			case 'numeric':
			case 'nozero':
			case 'alpha':
				switch ($type)
				{
					case 'alpha':
						$pool = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
						break;
					case 'alnum':
						$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
						break;
					case 'numeric':
						$pool = '0123456789';
						break;
					case 'nozero':
						$pool = '123456789';
						break;
				}
				return substr(str_shuffle(str_repeat($pool, ceil($len / strlen($pool)))), 0, $len);
			case 'unique': // todo: remove in 3.1+
			case 'md5':
				return md5(uniqid(mt_rand()));
			case 'encrypt': // todo: remove in 3.1+
			case 'sha1':
				return sha1(uniqid(mt_rand(), TRUE));
		}
	}
?>
