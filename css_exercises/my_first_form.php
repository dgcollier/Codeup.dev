<?php
  var_dump($_GET);
  var_dump($_POST);
?>

<!DOCTYPE html>
<html>
<head>
	<title>My First HTML Form</title>
</head>
<body>
	<main>
		<section>
			<form method="POST" action="/my_first_form.php">
			    <fieldset>
			    	<legend>Leave a Comment</legend>

			        <p><label for="name">Your Name</label>
			        <input id="name" name="name" placeholder="first last" type="text" autofocus></p>
			    
			        <p><label for="email">Your Email</label>
			        <input id="email" name="email" placeholder="example@domain.com" type="email"></p>

			        <p><label for="codeup">Are you a Codeup Student?</label>
			        <input id="codeup" name="codeup" type="checkbox" value="Codeup_Student" checked></p>

			        <p><label for="comment">Your Comment</label>
			        <input id="comment" name="comment" placeholder="your comment" type="text"></p>

			        <p><button type="submit" name="submit_button">Sacrifice Personal Security</button></p>
			    </fieldset>
		    </form>
		</section>

		<section>
		    <form>
		    	<fieldset>
			    	<legend>Compose an Email</legend>

			    	<p><label for="to">To:</label>
			    	<input id="to" name="to" placeholder="example@email.com" type="email"></p>

			    	<p><label for="from">From:</label>
			    	<input id="from" name="from" placeholder="youremail@email.com" type="email"></p>

			    	<p><label for="subject">Subject:</label>
			    	<input id="subject" name="subject" placeholder="email subject" type="text"></p>

			    	<p><label for="email_body">Email:</label>	
			    	<textarea id="email_body" name="email_body" rows="5" col="100"></textarea></p>

			    	<p><label for="addtosent">Add to sent folder?</label>
			    	<input id="addtosent" name="addtosent" type="checkbox" value="Copied_to_sent" checked></p>

			    	<p><button type="submit" name="send_button">Send Email to Spam</button></p>
			    </fieldset>
			</form>
		</section>

		<section>
			<form>
				<fieldset>
					<legend>Quick Survey</legend>

					<p>What is your favorite pizza topping?</p>
						<p><label>
							<input type="radio" name="q1" value="pepperoni">
							Pepperoni
						</label></p>

						<p><label>
							<input type="radio" name="q1" value="sausage">
							Sausage
						</label></p>

						<p><label>
							<input type="radio" name="q1" value="cheese">
							Cheese
						</label></p>

						<p><label>
							<input type="radio" name="q1" value="veggie">
							Veggies
						</label></p>

						<p><button type="submit" name"send_quiz">Order Pizza</button></p>
				</fieldset>
			</form>
		</section>

		<section>
			<form>
				<fieldset>
					<legend>Multiple Choice Test</legend>

					<p>Who led the Texas Longhorns in receiving yards in 2014-15?</p>
						<P><label>
							<input type="radio" name="mct1" value="Jaxon_Shipley">
							Jaxon Shipley
						</label></p>

						<P><label>
							<input type="radio" name="mct1" value="John_Harris">
							John Harris
						</label></p>

						<P><label>
							<input type="radio" name="mct1" value="Daje_Johnson">
							Daje Johnson
						</label></p>

						<P><label>
							<input type="radio" name="mct1" value="Marcus_Johnson">
							Marcus Johnson
						</label></p>

					<p>Who was the starting quarterback in Texas' opening game in 2014-15?</p>
						<P><label>
							<input type="radio" name="mct2" value="Tyrone_Swoopes">
							Tyrone Swoopes
						</label></p>

						<P><label>
							<input type="radio" name="mct2" value="Jerrod_Heard">
							Jerrod Heard
						</label></p>

						<P><label>
							<input type="radio" name="mct2" value="Logan_Vinklarek">
							Logan Vinklarek
						</label></p>

						<P><label>
							<input type="radio" name="mct2" value="David_Ash">
							David Ash
						</label></p>

					<p>Which of the following running backs were on Texas' roster in 2014-15?</p>
						<P><label>
							<input type="radio" name="mct3" value="Malcolm_Brown">
							Malcolm Brown
						</label></p>

						<P><label>
							<input type="radio" name="mct3" value="J_Gray">
							Jonathan Gray
						</label></p>

						<P><label>
							<input type="radio" name="mct3" value="Alex_DeLaTorre">
							Alex De la Torre
						</label></p>

						<P><label>
							<input type="radio" name="mct3" value="All1">
							All of the Above
						</label></p>

					<p><label for="allconf"></label>Which players will be Big XII All-Conference in 2015-16?</p>
						<p><select id="allconf" name="allconf" multiple>
							<option value="jgray">Jonathan Gray RB</option>
							<option value="mjohn">Marcus Johnson WR</option>
							<option value="jheard">Jerrod Heard QB</option>
							<option value="mjeff">Malik Jefferson LB</option>
							<option value="dthom">Duke Thomas CB</option>
							<option value="hridge">Hassan Ridgeway DE</option>
						</select></p>

						<p><button type="submit" name="Prove_Ignorance">Prove Ignorance</button></p>
				</fieldset>
			</form>
		</section>

		<section>
			<form>
				<fieldset>
					<legend>Another Survey</legend>

					<p>Which social media sites do you use?</p>
					<p><label><input type="checkbox" id="sm1" name="sm[]" value="facebook">Facebook</label></p>
					<p><label><input type="checkbox" id="sm2" name="sm[]" value="twitter">Twitter</label></p>
					<p><label><input type="checkbox" id="sm3" name="sm[]" value="instagram">Instagram</label></p>
					<p><label><input type="checkbox" id="sm4" name="sm[]" value="linkedin">LinkedIn</label></p>
					<p><label><input type="checkbox" id="sm5" name="sm[]" value="pinterest">Pinterest</label></p>

					<p><button type="submit" name="overshare">Over-share on Social Media</button></p>
				</fieldset>	
			</form>
		</section>
		<section>
			<form>
				<fieldset>
					<legend>Select Testing</legend>

					<p>
					<label for="ping">Can you beat Isaac at ping pong?</label>
					<select id="ping" name="ping">
						<option value="blank"></option>
						<option value="yes">Yes</option>
						<option value="no">No</option>
						<option value="maybe">Maybe</option>
						<option value="sleep">In my sleep</option>
					</select>
					</p>

					<p><button type="submit" name="duel">Duel to the Death</button></p>
				</fieldset>
			</form>
		</section>
	</main>
</body>
</html>