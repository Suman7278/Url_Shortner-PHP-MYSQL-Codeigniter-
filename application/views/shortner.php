<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="gencyolcu" />

	<title>Url Shortener</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/global.css">
</head>

<body>

<div class="container">
 <h1 class="title">Shorten a URL</h1>

 <!--checking of validation in form -->
 <?php if (validation_errors()) : ?>
        <?php echo validation_errors(); ?>
      <?php endif ; ?>
 <?php echo form_open('create') ; ?>
 <input type="text" class="form-control" name="url_address" placeholder="Enter url Address">
 <input type="submit"  value="Shorten"/>
 <br/>
 <br/>
  <?php echo form_close() ; ?>
  <?php if ($encoded_url == true) : ?>
      <?php 
      
      $url=explode('/',$encoded_url);
     
      ?>
      <!--sending the main url to the controller -->
      <a href="<?php echo site_url('go/index/'.$url[4])?>"><?php echo $encoded_url ; ?></a>
      <?php endif ; ?>
 </div>
 
 
</body>
</html>