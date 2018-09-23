<html>
	<head>
	<title>Tasker</title>
	<link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
	</head>
	<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="<?php echo base_url(); ?>">Tasker</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
      </li>

      <?php if($this->session->userdata('logged_in')) : ?>


            <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>tasks">Tasks</a>
            </li>

      <?php endif; ?>
      <?php if($this->session->userdata('logged_in') && $this->session->userdata('admin') == 1)  : ?>

         <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>tasks/create">Create Task</a>
          </li>
      <?php endif; ?>
    </ul>
    
        <ul class="nav navbar-nav navbar-right">
        <?php if(!$this->session->userdata('logged_in')) : ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>users/register">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>users/login">Login</a>
            </li>
        <?php endif; ?>
        <?php if($this->session->userdata('logged_in')) : ?>
          <li class="nav-item">
              <a class="nav-link" >Hello, <?php echo $this->session->userdata('name') ?></a>
          <li class="nav-item">
             <a class="nav-link" href="<?php echo base_url(); ?>users/logout">Logout</a>
      </li>
        <?php endif; ?>
    </ul>
  </div>
</nav>
<br>
<div class="container">
