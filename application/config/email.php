<?php

/*
 * What protocol to use?
 * mail, sendmail, smtp
 */
$config['protocol'] = 'smtp';

/*
 * SMTP server address and port
 */
$config['smtp_host'] = 'mx1.serversfree.com';
$config['smtp_port'] = '110';

/*
 * SMTP username and password.
 */
$config['smtp_user'] = 'info@alnourahmed.tk';
$config['smtp_pass'] = 'UBNPfWPKPW';

/*
 * Heroku Sendgrid information.
 */
/*
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'smtp.sendgrid.net';
$config['smtp_port'] = 587;
$config['smtp_user'] = $_SERVER['SENDGRID_USERNAME'];
$config['smtp_pass'] = $_SERVER['SENDGRID_PASSWORD'];
*/
