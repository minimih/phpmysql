<!DOCTYPE html>
<html>
	<head>
		<title>Submit us your Bug!</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Bootstrap -->
        <link rel="stylesheet" href="/lib/bootstrap/css/bootstrap.min.css" media="screen">
        <link rel="stylesheet" href="/lib/bootstrap/css/bootstrap-theme.min.css" media="screen">
        
        <link rel="stylesheet" href="css/style.css" media="screen">        
        
        <!-- JavaScript -->
        <!-- <script src="/lib/jquery/jquery-2.0.3.min.js"></script>
        <script src="/lib/bootstrap/js/bootstrap.min.js"></script> -->
    	
		 <script type="text/javascript">
         var RecaptchaOptions = {
            theme : 'clean'
         };
         </script>
	</head>
	<body>

        <div class="container">
		<h2>Please submit your bug report using this form</h2>

        <form class="form-horizontal" action="filebug.php" method="POST">
            <fieldset>

                <!-- Password input-->
                <div class="form-group">
                    <label class="col-lg-2" for="username">Username</label>
                    <div class="col-lg-5">
                        <input id="username" name="username" type="text" placeholder="Username" class="form-control" required>
                    </div>
                </div>

                <!-- Name input-->
                <div class="form-group">
                    <label class="col-lg-2" for="name">Name</label>
                    <div class="col-lg-5">
                        <input id="name" name="name" type="text" placeholder="John Doe" class="form-control" required>
                    </div>
                </div>

                <!-- Email input-->
                <div class="form-group">
                    <label class="col-lg-2" for="email">Email</label>
                    <div class="col-lg-5">
                        <input id="email" name="email" type="email" placeholder="john@example.com" class="form-control" required>
                    </div>
                </div>

                <!-- Website input-->
                <div class="form-group">
                    <label class="col-lg-2" for="website">Website</label>
                    <div class="col-lg-5">
                        <input id="website" name="website" type="url" placeholder="www.example.com" class="form-control" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-2" for="tel">Telephone</label>
                    <div class="col-lg-5">
                        <div class="input-append">
                            <input id="tel" name="tel" type="tel" placeholder="+41 00000000" class="form-control" required>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox">
                                    Check the checkbox if you wish to be called
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Select Basic -->
                <div class="form-group">
                    <label class="col-lg-2" for="bugtype">Type</label>
                    <div class="col-lg-5">
                        <select id="bugtype" name="bugtype" class="form-control" required>
                            <option value="1">Bug</option>
                            <option value="2">Feature</option>
                            <option value="3">Change</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2" for="priority">Priority</label>
                    <div class="col-lg-5">
                        <input type="range" name="priority" id="priority" min="1" max="5" class="form-control"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2" for="reproducible">Reproducible</label>
                    <div class="col-lg-5">
                        <label class="radio inline" for="reproducible-0">
                            <input type="radio" name="reproducible" id="reproducible-0" value="Yes" checked="checked">
                            Yes
                        </label>
                        <label class="radio inline" for="reproducible-1">
                            <input type="radio" name="reproducible" id="reproducible-1" value="No">
                            No
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2" for="priority">Date</label>
                    <div class="col-lg-5">
                        <input type="date" name="date" id="date" class="form-control"/>
                    </div>
                </div>
                
                <div class="form-group">
                  <label class="col-lg-2" for="filebutton">Upload Screenschot</label>
                  <div class="col-lg-5">
                    <input id="filebutton" name="filebutton" class="input-file" type="file">
                  </div>
                </div>

                <!-- Textarea -->
                <div class="form-group">
                    <label class="col-lg-2" for="description">Description</label>
                    <div class="col-lg-5">
                        <textarea id="description" name="description" rows="5" class="form-control">Description</textarea>
                    </div>
                </div>
                
                <!-- Captcha -->
                <div class="form-group">
                    <label class="col-lg-2" for="captcha"></label>
                    <div class="col-lg-5">
                    <?php
                    require_once('includes/recaptchalib.php');
                    
                    // Get a key from https://www.google.com/recaptcha/admin/create
                    $publickey = "6LfZH-gSAAAAANljNYU3IW0fBWt1kgPnwY1GNF_B";
                    
                    echo recaptcha_get_html($publickey);
                    ?>
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-lg-2" for="submit"></label>
                    <div class="col-lg-5">
                        <button type="submit" class="btn btn-success">Submit Form</button>
                        <button type="reset" class="btn btn-danger">Reset Form</button>
                    </div>
                </div>

            </fieldset>
        </form>
        </div>
	</body>
</html>