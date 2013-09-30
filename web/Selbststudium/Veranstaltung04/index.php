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
		<script src="/lib/js/jquery/jquery-2.0.3.min.js"></script>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="/lib/js/html5shiv.js"></script>
        <script src="/lib/js/respond.min.js"></script>
        <![endif]-->

		<script type="text/javascript">
			var RecaptchaOptions = {
				theme : 'clean'
			};
		</script>
	</head>
	<body>
		<?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
		?>

		<div class="container">
			<div class="page-header">
				<h1>Bugreport
				<br/>
				<small>Please submit your bug report using this form</small></h1>
			</div>

			<form class="form-horizontal" enctype="multipart/form-data" action="filebug.php" method="POST">
                <?php
                if(isset($_GET['status'])){
                    $status = htmlspecialchars($_GET['status']);
                    
                    if($status=="ok") {
                        echo '
                            <div class="alert alert-success">
                                <strong>Thank you</strong> Your bug has been reported.
                            </div>
                        ';
                    }else if($status == "captchaerror"){
                        echo '
                            <div class="alert alert-danger">
                                <strong>Error</strong> The Captcha you entered was not correct. Please try again.
                            </div>
                        ';                    
                    }else if($status == "fileerror"){
                        echo '
                            <div class="alert alert-danger">
                                <strong>Error</strong> Please select a file to upload.
                            </div>
                        ';                    
                    }else{
                        echo '
                            <div class="alert alert-danger">
                                <strong>Error</strong> Unknown error.
                            </div>
                        ';                    
                    }
                }
                ?>
				<fieldset>
					<!-- Username input-->
					<div class="form-group">
						<label class="col-lg-2" for="username">Gmail Username</label>
						<div class="col-lg-5">
							<input id="username" name="username" type="text" placeholder="Username" class="form-control" required>
						</div>
					</div>

					<!-- Password input-->
					<div class="form-group">
						<label class="col-lg-2" for="password">Gmail Password</label>
						<div class="col-lg-5">
							<input id="password" name="password" type="password" placeholder="Password" class="form-control" required>
						</div>
					</div>
					
					<hr>
					
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
							<input id="website" name="website" type="url" placeholder="http://example.com" class="form-control" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-2" for="tel">Telephone</label>
						<div class="col-lg-5">
							<div class="input-append">
								<input id="tel" name="tel" type="tel" placeholder="+41223334455" class="form-control" required>
								<div class="checkbox">
									<label>
										<input id="callback" name="callback" value="Yes" type="checkbox">
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
								<option value="Bug">Bug</option>
								<option value="Feature">Feature</option>
								<option value="Change">Change</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-2" for="priority">Priority</label>
						<div class="col-lg-5">
							<input id="priority" name="priority" type="range" min="1" max="5" class="form-control"/>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-2" for="reproducible">Reproduible</label>
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
						<label class="col-lg-2" for="date">Date</label>
						<div class="col-lg-5">
							<input id="date" name="date" type="datetime" placeholder="Date" class="form-control"/>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-2" for="upload">Upload file</label>
						<div class="col-lg-5">
    						 <input name="upload" id="upload" type="file" required>
						</div>
					</div>

					<!-- Textarea -->
					<div class="form-group">
						<label class="col-lg-2" for="description">Description</label>
						<div class="col-lg-5">
							<textarea id="description" name="description" rows="5" placeholder="Description" class="form-control"></textarea>
						</div>
					</div>
					
					<!-- Captcha -->
					<div class="form-group">
						<label class="col-lg-2" for="captcha">Captcha</label>
						<div class="col-lg-5">
							<?php
                            require_once ($_SERVER['DOCUMENT_ROOT'] . '/lib/php/rechapcha/recaptchalib.php');

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
							<button type="submit" class="btn btn-success">
								Submit Form
							</button>
							<button type="reset" class="btn btn-danger">
								Reset Form
							</button>
						</div>
					</div>

				</fieldset>
			</form>
		</div>
	</body>
</html>