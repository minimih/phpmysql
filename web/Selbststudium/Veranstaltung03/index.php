<!DOCTYPE HTML>
<html>
<head>
		<title>Webform</title>

		<meta charset='utf-8'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />

		<!-- Styles -->
		<link href="/css/reset.css" rel="StyleSheet" type="text/css" media="screen">
		<!--[if lt IE 7]><link href="" rel="StyleSheet" type="text/css" media="screen"><![endif]-->

        <link href='http://fonts.googleapis.com/css?family=Oleo+Script+Swash+Caps:700' rel='stylesheet' type='text/css'>

		<!-- Scripts -->
		<!--[if IE]><script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script><![endif]-->
</head>
<body>
    <form id="contact" action="includes/formvalidation.inc.php" method="post">
       <div class="formAddress">
            <p>
                <label for="firstname">Vorname*</label>
                <input class="validate[required,length[0,100]]" id="firstname" name="firstname" maxlength="255" type="text" value="" />
            </p>
            <p>
                <label for="lastname">Nachname*</label>
                <input class="validate[required,length[0,100]]" id="lastname" name="lastname" maxlength="255" type="text" value="" />
            </p>
            <p>
                <label for="street">Strasse*</label>
                <input class="validate[required,length[0,100]]" id="street" name="street" maxlength="255" type="text" value="" />
            </p>
            <p>
                <label for="zipcode">PLZ*</label>
                <input class="validate[required,custom[onlyNumber],length[0,10]]" id="zipcode" name="zipcode" maxlength="6" type="text" value="" />
            </p>
            <p>
                <label for="city">Ort*</label>
                <input class="validate[required,length[0,100]]" id="city" name="city" maxlength="255" type="text" value="" />
            </p>
            <p>
                <label for="email">Email</label>
                <input class="validate[optional,custom[email],length[0,255]]" id="email" name="email" maxlength="255" type="text" value="" />
            </p>
        </div>
        <div class="formButtons">
            <p>
                <input id="saveForm" name="submit" value="Abschicken" type="submit" />
                <input id="resetForm" name="reset" value="Löschen" type="reset" />
            </p>
        </div>
        <p>*Pflichtfelder</p>
    </form>
</body>
</html>