<?php session_start(); ?>
<div id="login-block-body">
	<section class="sup-section" id="login-section">
		<form action="../index.php?action=auth" method="post" id="login-form">
			<div class="field-box">
				<label for="login">Identifiant</label><br>
				<input type="text" name="login" id="login-email" class="form-child sup"/>
			</div>
			<div class="field-box">
				<label for="pwdconfirme">Mot de passe</label><br>
				<input type="password" name="login-pw" id="login-pwd" class="form-child sup"/>
				<p class="error-message first">L'identifiant ou le mot de passe est vide.</p>
				<?php 
				if(isset($_SESSION['login-error']))
				{ 
					//$error = $_SESSION['login-error'];
					echo '<p class="login-error first">'.$_SESSION['login-error'].'</p>';
					//echo $_SESSION['login-error'];
				} 
				 ?>
			</div>
			<div class="field-box sup-btn">						
				<input type="submit" name="submit-btn" id="submit-btn" class="s-btn" value="S'identifier"/>
			</div>
		</form>
		<div id="sup-link"><a href="index.php?action=signup">Pas encore membre ? inscrivez vous ici</a></div> 
	</section>
</div>