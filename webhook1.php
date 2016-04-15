<?php 
 
$hostname = '{empleo@auto.doersdf.com}INBOX';
$username = 'auto.doersdf.com';
$password = 'Arteria123';
 
 
$inbox = imap_open($hostname,$username,$password) or die('Ha fallado la conexión: ' . imap_last_error());
 
$emails = imap_search($inbox,'ALL');
 
if($emails) {
   
  $salida = '';
   
  foreach($emails as $email_number) {    
    $overview = imap_fetch_overview($inbox,$email_number,0);
    $salida.= '<p-->Tema: '.$overview[0]->subject.'';
    $salida.= 'De: '.$overview[0]->from.'<p></p>';    
  }
   
  echo $salida;
} 
 
imap_close($inbox);
?>