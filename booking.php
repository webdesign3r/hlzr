<?php
	require('introform.php');
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>Ferienhaus Holzer</title>

	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">

	<link href="css/custom.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Helper Styles -->
	<link href="css/loaders.css" rel="stylesheet">
	<link href="css/swiper.css" rel="stylesheet">
	<link href="css/animate.min.css" rel="stylesheet">
	<link href="css/nivo-lightbox.css" rel="stylesheet">
	<link href="css/nivo_themes/default/default.css" rel="stylesheet">
	<link href="css/bootstrap-datepicker.css" rel="stylesheet">

	<link rel="stylesheet" href="css/w3r.css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- 	<div class="loader loader-bg">
		<div class="loader-inner ball-clip-rotate-pulse">
			<div></div>
			<div></div>
		</div>
	</div> -->

<!-- #######################################################
		Navigation
############################################################ -->
	<div class="custom-navbar">
	<nav class="navbar navbar-toggleable-md mb-4 top-bar navbar-static-top custom-menu">
		<div class="container">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse1" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand" href="index.html">
				<img src="/img/logo_dark.png">
			</a>
			<div class="collapse navbar-collapse" id="navbarCollapse1">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"> <a class="nav-link" href="index.html#myCarousel">Start</a> </li>
					<li class="nav-item"> <a class="nav-link" href="index.html#ueberuns">Über Uns</a> </li>
					<li class="nav-item"> <a class="nav-link" href="index.html#dashaus">Das Haus</a> </li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Wohnungen
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="index.html#wohnungen">Übersicht</a>
							<a class="dropdown-item" href="/wohnungen/details_01.html">Wohnung 1</a>
							<a class="dropdown-item" href="/wohnungen/details_02.html">Wohnung 2</a>
							<a class="dropdown-item" href="/wohnungen/details_03.html">Wohnung 3</a>
							<a class="dropdown-item" href="/wohnungen/details_04.html">Wohnung 4</a>
							<a class="dropdown-item" href="/wohnungen/details_05.html">Wohnung 5</a>
							<a class="dropdown-item" href="/wohnungen/details_06.html">Wohnung 6</a>
						</div>
					</li>
					<!-- <li class="nav-item"> <a class="nav-link" href="#">Die Umgebung</a> </li> -->
					<li class="nav-item"> <a class="nav-link" href="events.html">Veranstaltungen</a> </li>
					<li class="nav-item"> <a class="nav-link" href="booking.php">Buchen</a> </li>
				</ul>
			</div>
		</div>
	</nav>
	</div>


<!-- #######################################################
		Booking Section
############################################################ -->
	<section class="booking-sec">
		<div class="container">
			<div class="row">

				<div class="col-xs-12 col-sm-8 offset-sm-2">

					<form id="booking-form" method="post" action="bookingform.php" role="form">

					    <div class="messages"></div>

					    <div class="controls">

							<div class="row">
							    <div class="col-md-3">
							        <div class="form-group">
							            <label for="checkin_date">Anreise</label>
							            <input id="checkin_date" type="text" name="checkin" class="form-control input-date" required="required" data-error="Bitte geben Sie ihr gewünschtes Anreisedatum an." value="<?= $intro_checkin ?>">
							            <div class="help-block with-errors"></div>
							        </div>
							    </div>
							    <div class="col-md-3">
							        <div class="form-group">
							            <label for="checkout_date">Abreise</label>
							            <input id="checkout_date" type="text" name="checkout" class="form-control input-date" required="required" data-error="Bitte geben Sie ihr gewünschtes Anreisedatum an." value="<?= $intro_checkout ?>">
							            <div class="help-block with-errors"></div>
							        </div>
							    </div>
							    <div class="col-md-2" style="white-space:nowrap;">
							        <div class="form-group">
							            <label for="form_personen">bevorz. Wohnung</label>
							            <select class="form-control form-control" id="form_wohnung" name="wohnung">
							            	<option <?php if($wohnung == '1'){echo("selected");}?> >1</option>
							            	<option <?php if($wohnung == '2'){echo("selected");}?> >2</option>
							            	<option <?php if($wohnung == '3'){echo("selected");}?> >3</option>
							            	<option <?php if($wohnung == '4'){echo("selected");}?> >4</option>
							            	<option <?php if($wohnung == '5'){echo("selected");}?> >5</option>
							            	<option <?php if($wohnung == '6'){echo("selected");}?> >6</option>
							            </select>
							            <div class="help-block with-errors"></div>
							        </div>
							    </div>
							    <div class="col-md-2">
							        <div class="form-group">
							            <label for="form_personen">Personen</label>
							            <select class="form-control form-control" id="form_personen" name="personen">
							            	<option <?php if($intro_personen == '1'){echo("selected");}?> >1</option>
							            	<option <?php if($intro_personen == '2'){echo("selected");}?> >2</option>
							            	<option <?php if($intro_personen == '3'){echo("selected");}?> >3</option>
							            	<option <?php if($intro_personen == '4'){echo("selected");}?> >4</option>
							            	<option <?php if($intro_personen == '5'){echo("selected");}?> >5</option>
							            	<option <?php if($intro_personen == '6'){echo("selected");}?> >6</option>
							            	<option <?php if($intro_personen == '7'){echo("selected");}?> >7</option>
							            	<option <?php if($intro_personen == '8'){echo("selected");}?> >8</option>
							            	<option <?php if($intro_personen == '9'){echo("selected");}?> >9</option>
							            	<option <?php if($intro_personen == '10'){echo("selected");}?> >10</option>
							            	<option <?php if($intro_personen == '11'){echo("selected");}?> >11</option>
							            	<option <?php if($intro_personen == '12'){echo("selected");}?> >12</option>
							            </select>
							            <div class="help-block with-errors"></div>
							        </div>
							    </div>
							    <div class="col-md-2" style="white-space:nowrap;">
							        <div class="form-group">
							            <label for="form_kinder" class="children">davon Kinder unter 6</label>
							            <select class="form-control form-control" id="form_kinder" name="kinde>"
							            	<option>0</option>
							            	<option>1</option>
							            	<option>2</option>
							            	<option>3</option>
							            	<option>4</option>
							            	<option>5</option>
							            	<option>6</option>
							            	<option>7</option>
							            	<option>8</option>
							            	<option>9</option>
							            	<option>10</option>
							            	<option>11</option>
							            	<option>12</option>
							            </select>
							            <div class="help-block with-errors"></div>
							        </div>
							    </div>
							</div>

					        <div class="row">
					            <div class="col-md-6">
					                <div class="form-group">
					                    <label for="form_name">Vorname *</label>
					                    <input id="form_name" type="text" name="name" class="form-control" required="required" data-error="Bitte geben Sie Ihren Vornamen an.">
					                    <div class="help-block with-errors"></div>
					                </div>
					            </div>
					            <div class="col-md-6">
					                <div class="form-group">
					                    <label for="form_lastname">Nachname *</label>
					                    <input id="form_lastname" type="text" name="surname" class="form-control" required="required" data-error="Bitte geben Sie Ihren Nachnamen an.">
					                    <div class="help-block with-errors"></div>
					                </div>
					            </div>
					        </div>

					        <div class="row">
					            <div class="col-md-6">
					                <div class="form-group">
					                    <label for="form_email">Email *</label>
					                    <input id="form_email" type="email" name="email" class="form-control" required="required" data-error="Bitte geben Sie eine gültige Email-Adresse an.">
					                    <div class="help-block with-errors"></div>
					                </div>
					            </div>
					            <div class="col-md-6">
					                <div class="form-group">
					                    <label for="form_phone">Telefon</label>
					                    <input id="form_phone" type="tel" name="phone" class="form-control">
					                </div>
					            </div>
					        </div>

					        <div class="row">
					            <div class="col-md-6">
					                <div class="form-group">
					                    <label for="form_address">Anschrift</label>
					                    <input id="form_address" type="text" name="address" class="form-control">
					                </div>
					            </div>
					            <div class="col-md-2">
					                <div class="form-group">
					                    <label for="form_postcode">PLZ</label>
					                    <input id="form_postcode" type="text" name="postcode" class="form-control">
					                </div>
					            </div>
					            <div class="col-md-4">
					                <div class="form-group">
					                    <label for="form_city">Ort</label>
					                    <input id="form_city" type="text" name="city" class="form-control">
					                </div>
					            </div>
					        </div>

					        <div class="row">
					            <div class="col-md-12">
					                <div class="form-group">
					                    <label for="form_message">Möchten Sie noch etwas loswerden?</label>
					                    <textarea id="form_message" name="message" class="form-control" rows="4"></textarea>
					                </div>
					            </div>
					            <div class="col-md-12">
					                <input type="submit" class="btn btn-success btn-send" value="Anfrage abschicken">
					            </div>
					        </div>

					        <div class="row">
					            <div class="col-md-12">
					                <p class="text-muted"><strong>*</strong> Diese Angaben werden benötigt.</p>
					            </div>
					        </div>

					    </div>

					</form>

				</div>

			</div>

		</div>
	</section>


<!-- #######################################################
		Footer
############################################################ -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-xs-12">
					<img src="/img/logo_white.png">
				</div>
				<div class="col-md-3 col-xs-12">
					<p>
	                	Ferienhaus Holzer<br>
						Waubergweg 12b<br>
						A-9580 Drobollach<br>
					</p>
				</div>
				<div class="col-md-3 col-xs-12">
					<p>
						<i class="fa fa-phone"></i>&nbsp; +43 425 4373 9<br>
						<i class="fa fa-envelope"></i>&nbsp; <a href="mailto:info@ferienhaus-holzer.at">info@ferienhaus-holzer.at</a><br>
						&nbsp;<br>
						made with <i class="fa fa-heart"></i> by <a href="http://webdesign3r.de" target="_blank">webdesign3r</a>
					</p>
				</div>
				<div class="col-md-3 col-xs-12">
					<i class="fa fa-sitemap"></i>&nbsp; <a href="#">Impressum</a>
				</div>
			</div>
		</div>
	</footer>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/scrollPosStyler.js"></script>
	<script src="js/swiper.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/nivo-lightbox.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/core.js"></script>
	<script src="js/w3r.js"></script>
	<script src="js/validator.js"></script>
	<script src="js/booking.js"></script>
	<script src="js/bootstrap-datepicker.min.js"></script>
	<script src="js/bootstrap-datepicker.de.min.js"></script>
	<script>
		$('.input-date').datepicker({
			clearBtn: true,
			todayHighlight: true,
			language: 'de'
		});
	</script>
	<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
	<script>
		window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
		ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
	</script>
	<script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>
</html>
