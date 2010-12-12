<?php
/**
 * PayPal successfull payment return
 *
 * @version 1.0
 * @author Martin Maly - http://www.php-suit.com
 * @copyright (C) 2008 martin maly
 */
 
 /*
* Copyright (c) 2008 Martin Maly - http://www.php-suit.com
* All rights reserved.
*
* Redistribution and use in source and binary forms, with or without
* modification, are permitted provided that the following conditions are met:
*     * Redistributions of source code must retain the above copyright
*       notice, this list of conditions and the following disclaimer.
*     * Redistributions in binary form must reproduce the above copyright
*       notice, this list of conditions and the following disclaimer in the
*       documentation and/or other materials provided with the distribution.
*     * Neither the name of the <organization> nor the
*       names of its contributors may be used to endorse or promote products
*       derived from this software without specific prior written permission.
*
* THIS SOFTWARE IS PROVIDED BY MARTIN MALY ''AS IS'' AND ANY
* EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
* WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
* DISCLAIMED. IN NO EVENT SHALL MARTIN MALY BE LIABLE FOR ANY
* DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
* (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
* LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
* ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
* (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
* SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*/

require_once('./class/paypal.php'); //when needed
require_once('./class/httprequest.php'); //when needed

//Use this form for production server 
//$r = new PayPal(true);

//Use this form for sandbox tests
$r = new PayPal();

$final = $r->doPayment();

if ($final['ACK'] == 'Success') {
	echo 'Succeed!';
	print_r($r->getCheckoutDetails($final['TOKEN']));
/* Details example:
Array
(
    [TOKEN] => EC-46K253307T956310E
    [TIMESTAMP] => 2010-12-12T09:38:01Z
    [CORRELATIONID] => cbf9ed77f3dbe
    [ACK] => Success
    [VERSION] => 52.0
    [BUILD] => 1613703
    [EMAIL] => buyer1_1292145548_per@maly.cz
    [PAYERID] => ZMU92MM4SPBHS
    [PAYERSTATUS] => verified
    [FIRSTNAME] => Test
    [LASTNAME] => User
    [COUNTRYCODE] => US
    [CUSTOM] => 10|USD|
)
*/	
	
	
} else {
	print_r($final);
}
?>