<!DOCTYPE HTML>
<html>
	<head>
      <meta charset="utf-8">
    	<title>{block name="title"}{/block}</title>
    	<link href="{Router::assets('css/bootstrap.css')}" rel="stylesheet"/>  
    	<link rel="shortcut icon" href="{Router::assets('img/favicon.ico')}" type="image/x-icon">
  	</head>
  	<body bgcolor="#FF0000">
  		<div class="container row">
    		<br>
    		<!-- head -->
  			<div align="center">
    			<img src="{Router::assets('img/head.jpg')}" alt="head">
  			</div>
  			<br>
  			<div class="navbar navbar-inverse"> <!-- menu -->
  				<div class="navbar-inner">
  					<div class="container">
  						<ul class="nav">
  							<li><a href=""><i class="icon-home" style="background-image:#999999" ></i> Home</a></li>
  							<li class="divider-vertical"></li>
  							<li><a href="{Router::url('/home/faq')}">FAQ</a></li>
  							<li class="divider-vertical"></li>
  							<li><a href="{Router::url('/home/admin/panelAdmin')}"> Panel Admin</a></li>
                <li class="divider-vertical"></li>
  						</ul>
  						<ul class="nav pull-right">
  							<li class="divider-vertical"></li>
  							{if (Session::Get('nombre')=="")}
                            	<li><a href="{Router::url('/home/signup')}">Iniciar Sesion</a></li>
                        	{else}
                            	<li><a href="{Router::url('/home/logout')}">Cerrar Sesion</a></li>
                        	{/if}
  							
  						</ul>
  					</div>
  				</div>
  			</div>


    		<div class="container"> <!-- Body -->
    			{block name="slide"}

                {/block}

    			<div class="row-fluid"> <!-- Tools -->
	    			<div class="span3" style="max-width:100%; margin:left">
	    				<div class="well">
		    				<ul class="nav nav-list">
							  	<li class="nav-header">Links de interes</li>
							  	<li class="divider"></li>
							  	<li><a href="http://www.exa.unrc.edu.ar/">Facultad</a></li>
							  	<li><a href="http://sisinfo.unrc.edu.ar/">SIAL</a></li>
							  	<li><a href="http://www.unrc.edu.ar/">UNRC</a></li>
							</ul>
						</div>
						<br>
						<div class="well">
		    				<ul class="nav nav-list">
							  	<li class="nav-header">Links de interes</li>
							  	<li class="divider"></li>
							  	<li><a href="http://www.exa.unrc.edu.ar/">Facultad</a></li>
							  	<li><a href="http://sisinfo.unrc.edu.ar/">SIAL</a></li>
							  	<li><a href="http://www.unrc.edu.ar/">UNRC</a></li>
							</ul>
						</div>
	    			</div>
	    			<div class="span9" style="max-width:100%"> <!-- Body Main -->
	    				{block name ="body"}


	                    {/block}
	    			</div>
	    		</div>	
    		</div>
    		
        	 <!-- Footer -->
        	<hr class="featurette-divider">
        	<footer>
			    <p class="pull-right"><a href="#">Back to top</a></p>
			    <p>&copy; 2014 Company, Inc. &middot; 
			    	<a href="/inmobiliaria/index.php/privacy">Privacy</a> &middot; <a href="/inmobiliaria/index.php/terms">Terms</a>
			    </p>
			</footer>
    		
    	</div>
  </body>
</html>


