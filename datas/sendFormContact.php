		<?php
				$nom = strip_tags($_POST['nom']);
				$mail = strip_tags($_POST['mail']);
				$message = strip_tags($_POST['message']);
				$checkRobot = strip_tags($_POST['checkRobot']);
				$newsletter = strip_tags($_POST['newsletter']);

				// text to send
				$texte = "Hi there,<br /><br />";
				$texte = $texte . "Message from varietypack.band<br />";
				$texte = $texte . "Thanks for contacting Variety Pack. We will get back to you ASAP!<br />";
				$texte = $texte . "Name : $nom<br />";
				$texte = $texte . "Email :  $mail<br /><br />";
				$texte = $texte . "Message : $message<br /><br />";
				$texte = $texte . "Newsletter subscription : $newsletter<br /><br />";
				$texte = $texte . "This is an automatic message, do not reply to it.";

				$texte = stripslashes($texte);

				// Recipient and subject of the message
				$destinataire = "contact@varietypack.band"; // input your email here
				$objet = "Message from your varietypack.band"; // input your domain name here

				// Headers
	      $headers = array(
	                      'Content-type' => 'text/html',
	                      'From' => 'contact@varietypack.band', // input your email from here
	                      'X-Mailer' => 'PHP/' . phpversion()
	                  );

				// Send the message then return data to current page with ajax
				if ($checkRobot == 7) {
					$conf = ini_set('mail', 'ragav.venkatesan.gmail.com'); // update yours informations here
					$sending_ok = mail($destinataire, $objet, $texte, $headers);
					if ($sending_ok) {
							echo "<p class=\"hardLight\">Thanks for your message !<br /><br />We will get back to you very soon.</p>";
						}
					else {
							echo "<p class=\"hardLight\">There seems to be a problem ...</p>";
						}

				} else {
					echo "<p class=\"hardLight\">There seems to be a problem with the anti robot control ...</p>";
				}
