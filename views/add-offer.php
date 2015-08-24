<div id="add-offer-block-body">
	<section>
		<h1>Vous êtes sur le point d'ajouter une offre</h1>
		<p class="success-message">Votre offre à été ajoutée avec succès</p>
		<form action="#" method="post" id="add-offer-form">
			<div class="field-box">
				<label for="libelle"> 1. Poste de l'offre</label><br>
				<input type="text" name="libelle" id="libelle" class="form-child" placeholder="Ex : développeur php H/F"/>
				<p class="error-message first">Le poste de l'offre doit être renseigné.</p>
			</div>
			<div class="field-box">
				<label for="mission"> 2. Mission</label><br>
				<textarea name="mission" id="mission" class="form-child"></textarea>
				<p class="error-message">La mission de l'offre doit être renseignée.</p>
			</div>
			<div class="field-box">
				<label for="competence"> 3. Compétences réquises</label><br>
				<textarea name="competence" id="competence" class="form-child"></textarea>
				<p class="error-message">Les compétences doivent être renseignées.</p>
			</div>
			<div class="field-box">
				<label for="theplus"> 4. Les plus</label><br>
				<textarea name="theplus" id="theplus"></textarea>
			</div>
			<div class="field-box">
				<input type="submit" id="submit-btn" value="Ajouter" class="s-btn">
			</div>
		</form>
	</section>
</div>