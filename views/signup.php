<div id="signup-block-body">
	<section class="sup-section">
		<h1 class="sup-h1">Inscription</h1>
		<form action="#" method="post" id="signup-form">
			<div class="field-box">
				<label for="profile">Profile</label><br>
				<select name="profile" id="profile" class="sup">
					<option>Etudiant</option>
					<option>Etreprise</option>
				</select>
			</div>
			<div class="field-box">
				<label for="email">Email</label><br>
				<input type="text" name="email" id="email" class="form-child sup"/>
				<p class="error-message first">L'email doit être renseigné.</p>
			</div>
			<div class="field-box">
				<label for="emailconfirme">Confirmez l'email</label><br>
				<input type="text" name="emailconfirme" id="emailconfirme" class="form-child sup"/>
				<p class="error-message first">Les emails ne correspondent pas.</p>
			</div>
			<div class="field-box">
				<label for="pwd">Mot de passe</label><br>
				<input type="password" name="pwd" id="pwd" class="form-child sup"/>
				<p class="error-message first">Le mot de passe doit être renseigné</p>
			</div>
			<div class="field-box">
				<label for="pwdconfirme">Confirmez le mot de passe</label><br>
				<input type="password" name="pwdconfirme" id="pwdconfirme" class="form-child sup"/>
				<p class="error-message first">Les mots de passe ne correspondent pas.</p>
			</div>
			<div class="field-box sup-btn">						
				<input type="submit" name="submit-btn" id="submit-btn" class="s-btn"/>
			</div>
		</form>
	</section>
</div>
		