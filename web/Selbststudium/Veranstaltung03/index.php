<!DOCTYPE HTML>
<html>
<head>
		<title>Webform</title>

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
    <form id="contact" action="includes/mail.inc.php" method="post">
        <div class="formEmail">
            <p>
                <label for="email">Email*</label>
                <input id="email" name="email" type="email" value="" required />
            </p>
            <p>
                <label for="subject">Subject*</label>
                <input id="subject" name="subject" type="text" value="" required />
            </p>
            <p>
                <label for="message">Nachricht*</label>
                <textarea id="message" name="message" rows="4" cols="50" required ></textarea>
            </p>
        </div>
        <div class="formButtons">
            <p>
                <input id="sendForm" class="css3button" name="submit" value="Abschicken" type="submit" />
                <input id="resetForm" class="css3button" name="reset" value="Löschen" type="reset" />
            </p>
        </div>
        <p>*Pflichtfelder</p>
    </form>
</body>
</html>