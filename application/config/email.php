<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//mailtrap.io
// $config = Array(
// 	'protocol' => 'smtp',
// 	'smtp_host' => 'smtp.mailtrap.io',
// 	'smtp_port' => 2525,
// 	'smtp_user' => '2003dd6eda8098',
// 	'smtp_pass' => '1f8ba7cceae3e3',
// 	'crlf' => "\r\n",
// 	'newline' => "\r\n"
//   );

  //gmail.com
  $config = [
	'mailtype'  => 'html',
	'charset'   => 'utf-8',
	'protocol'  => 'smtp',
	'smtp_host' => 'smtp.gmail.com',
	'smtp_user' => 'karyonodeveloper@gmail.com',  // Email gmail
	'smtp_pass'   => 'Bersyukur21',  // Password gmail
	'smtp_crypto' => 'ssl',
	'smtp_port'   => 465,
	'crlf'    => "\r\n",
	'newline' => "\r\n"
];