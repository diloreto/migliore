<?
if (isset($_POST['action']))
    {
    $action=$_POST['action'];
    }
else
     {
     print "<h1>Under construction!!!!!!!</h1>";
     exit;
     }
if ($action=="test")
     {
     print "test_ok";
     exit;
     }
if ($action=="send")
     {
     $realname         = $_POST['realname'];
     $from             = $_POST['from'];
     $replyto          = $_POST['replyto'];
     $contenttype      = $_POST['contenttype'];
     
     $subject          = $_POST['subject'];
     $message          = $_POST['message'];
     
     $to                      = $_POST['to'];
     $cccopy                 = $_POST['cc'];
     $bcccopy                = $_POST['bcc'];
     
    $to = ereg_replace(" ", "", $to);
    $message = ereg_replace("&email&", $to, $message);
    $subject = ereg_replace("&email&", $to, $subject);
     
     if ($contenttype=='html') 
          {     
          $headers= "MIME-Version: 1.0\r\n";
          $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
          }
          
     if ($from != '') 
          {     $headers .= "From: ".$from."\r\n";}
          
     if ($cccopy != '') 
          {     $headers .= "Cc: ".$cccopy."\r\n";}
          
     if ($bcccopy != '') 
          {     $headers .= "Bcc: ".$bcccopy."\r\n";}     
          
          
    //$header = 
     
     if ($headers != '') {mail($to, $subject, $message, $headers);}
     else { mail($to, $subject, $message);}
    
     print "-=ok=-";
     }
?>