<?
require( "../include/commonlogin.php3");
require( "../include/getvalues.php3");
require( "../include/freshports.php3");
?>

<HTML>
<HEAD>
<meta name="Phorum Version" content="<?PHP echo $phorumver; ?>">
<meta name="Phorum DB" content="<?PHP echo $DB->type; ?>">
<meta name="PHP Version" content="<?PHP echo phpversion(); ?>">
<TITLE>phorum - <?PHP if(isset($ForumName)) echo $ForumName; ?><?PHP echo $title; ?></TITLE>
</HEAD>
<BODY BGCOLOR="#FFFFFF" LINK="#0000CC">
<? include("../include/header.inc") ?>
<table width="100%" border="0">
<tr><td colspan="2">
<font size="+2">forum
<?PHP 
if ($ForumName != '') {
   echo " - $ForumName";
}
?></b></font>
</td></tr>
<tr><td valign="top" width="100%">

