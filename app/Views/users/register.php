<?php function afficherPost($champ) {
    // je vérifie qu'une valeur a bien été postée pour ce nom de champ
    // et si c'est le cas, j'affiche cette valeur
    echo (!empty($_POST[$champ]) ? $_POST[$champ] : '' ) ;
}

function afficherCheck( $valeurAttendue ) {
    
    // si on renseigné un sexe en POST et que la valeur entrée en POST est celle
    // qui est attendue par l'input radio, alors on veut cocher cet input
    echo (!empty($_POST['sexe']) && $_POST['sexe'] == $valeurAttendue) ? 'checked' : '';
}

?>




<?php $this->layout('layout', ['title' => 'Inscrivez-vous !']) ; ?>

<?php $this->start('main_content'); ?>

<h2>Inscription d'un utilisateur</h2>
<?php $fmsg->display(); ?>

<form action="<?php $this->url('register'); ?>" method="POST" enctype="multipart/form-data">
	<!-- pseudo, email, password, sexe, avatar -->
	<p>
		<label for="pseudo">Pseudo :</label>
		<input type="text" name="pseudo" id="pseudo" 
			   placeholder="3 à 50 caractères"
			   value="<?php afficherPost('pseudo'); ?>"/>
	</p>

	<p>
		<label for="email">Email :</label>
		<input type="email" name="email" id="email" value="<?php afficherPost('email'); ?>"/>	
	</p>

	<p>
		<label for="mot_de_passe">Mot de passe :</label>
		<input type="password" name="mot_de_passe" id="mot_de_passe" value="<?php afficherPost('mot_de_passe'); ?>" />

	</p>

	<p>
		<label for="femme">Sexe :</label>
		<select name="sexe">
			<option value="femme">Femme</option>
			<option value="homme">Homme</option>
			<option value="non-défini">Non-défini</option>
		</select>
	</p>

	<p>
		<label for="avatar">Avatar :</label>
		<input type="file" name="avatar" id="avatar"/>
	</p>

	<p>
		<input type="submit" name="send" value="S'inscrire" />
	</p>
</form>


<?php $this->stop('main_content'); ?>