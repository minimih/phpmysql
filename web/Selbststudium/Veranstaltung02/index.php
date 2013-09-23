<!DOCTYPE HTML>
<html>
<head>
		<title>HTML Responsive Website</title>

		<meta charset='utf-8'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />

		<!-- Styles -->
		<link href="css/reset.css" rel="StyleSheet" type="text/css" media="screen">
		<!--[if lt IE 7]><link href="" rel="StyleSheet" type="text/css" media="screen"><![endif]-->

        <link href='http://fonts.googleapis.com/css?family=Oleo+Script+Swash+Caps:700' rel='stylesheet' type='text/css'>

		<link href="css/main.css" rel="StyleSheet" type="text/css" media="screen">
		
		<!-- Scripts -->
		<!--[if IE]><script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script><![endif]-->
</head>
<body>
	<header>
		<h1>h1.title</h1>
		<nav>
			<ul>
				<li><a class="css3button" href="#">nav ul li a</a></li>
				<li><a class="css3button" href="#">nav ul li a</a></li>
				<li><a class="css3button" href="#">nav ul li a</a></li>
			</ul>
		</nav>
	</header>
	
	<div id="contentWrapper">
    	<article>
    		<header>
    			<h1>article header h1</h1>
    			<p>Bacon ipsum dolor sit amet pork belly tri-tip fatback ball tip tenderloin flank pig beef ribs filet mignon sirloin ham shoulder frankfurter. Kielbasa prosciutto rump, tongue ground round beef turducken shank spare ribs jowl sirloin ham hock beef ribs frankfurter. Pastrami ham sausage frankfurter strip steak jowl. Pork loin pastrami brisket tri-tip capicola. Ball tip hamburger short ribs, ham beef tongue corned beef tri-tip bacon andouille strip steak pancetta jowl shankle prosciutto.</p>
    		</header>
    	
    		<section>
    			<h2>Teh Video</h2>
    			<video width="640" height="360" controls>
    				<source src="http://upload.wikimedia.org/wikipedia/commons/a/a7/Tears_of_Steel_clip.ogg" type="video/ogg">
    			</video>
    		</section>
    
            <?php
                for ($i=0; $i < 5; $i++) { 
                    include 'includes/section.inc.php';
                }
            ?>
    
    		<footer>
    			<h3>article footer h3</h3>
    			<p>Strip steak fatback ham prosciutto bacon sausage tenderloin. Ball tip salami meatball meatloaf ham hock. Ham brisket short ribs tri-tip pork turducken jowl bresaola tongue tail hamburger tenderloin chuck. Fatback flank ball tip short loin tail turkey rump.</p>
    		</footer>
    	</article>
    	<aside>
    		<h3>aside h3</h3>
    		<p>T-bone pork chop pancetta, beef ribs boudin doner flank pork pastrami chicken ribeye ball tip. Prosciutto pork belly chuck kevin, doner pig drumstick flank shank turkey. Tenderloin tail shoulder, ground round ribeye chicken salami cow frankfurter jerky. Pork loin jowl sausage, pancetta spare ribs salami chicken shoulder pork chop meatloaf bacon turkey filet mignon strip steak pig. Strip steak rump pork, ribeye chicken turkey kielbasa brisket pig boudin short loin turducken shank. Chuck tri-tip capicola shankle t-bone pastrami. Tri-tip hamburger strip steak chuck leberkas kielbasa.</p>
    	</aside>
	</div>
	
	<div class="cf"></div>
	
	<?php
	include 'includes/footer.inc.php';
    ?>
</body>
</html>