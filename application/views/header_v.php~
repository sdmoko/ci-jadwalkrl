<!DOCTYPE html>
<html>
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?PHP echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?PHP echo base_url(); ?>assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
        <style type="text/css">
			.navbar, .jumbotron, .well
			{
				margin: 0;
			}
        </style>
    </head>
    
    <body>
		<nav class="navbar navbar-inverse" role="navigation">
        	<div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        InfoKRL
                    </a>
                    
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu">
                    	<span class="sr-only">Toggle Button</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="menu">
                	<ul class="nav navbar-nav">
                    	<li<?PHP if($this->uri->segment(1) == '') echo ' class="active"'; ?>>
                        	<a href="<?PHP echo site_url(); ?>beranda">
                            Beranda
                            </a>
                        </li>
                        				                 	
                        <li<?PHP if($this->uri->segment(1) == 'jadwal_krl') echo ' class="active"'; ?>>
                        	<a href="<?PHP echo site_url(); ?>jadwal_krl">
                            Jadwal KRL
                            </a>
                        </li>
                                                
                    </ul>
                	<ul class="nav navbar-nav navbar-right">
                    	
						<?PHP
                        	if($this->session->userdata('username') == "")
							{
						?>
                    	
                        <li>
                        	<a href="<?php echo site_url();?>sign_in/login">
                            	<i class="glyphicon glyphicon-log-in"></i> Sign In
                            </a>
                        </li>
                        <li>
                        	<a href="<?PHP echo site_url();?>sign_up">
                            	<i class="glyphicon glyphicon-user"></i> Sign Up
                            </a>
                        </li>
                        <?PHP
							}
							else
							{
						?>
                        
                        <li>
                        	<a href="#">
                            	<i class="glyphicon glyphicon-user"></i> <?PHP echo $this->session->userdata('username');?>
                            </a>
                        </li>
                        <li>
                        	<a href="<?PHP echo site_url(); ?>sign_in/logout">
                            <i class="glyphicon glyphicon-log-out"></i> Sign Out
                            </a>
                        </li>
                        
                        <?PHP
                        	}
						?>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="jumbotron">
        	<div class="container">
            	<h1>Jadwal KRL</h1>
                    <p>Infoo Jadwal Commuter Line</p>
            </div>        
        </div>