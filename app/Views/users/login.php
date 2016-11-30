<?php $this->layout('layout', ['title' => 'Connecter-vous !']) ; ?>

<?php $this->start('main_content'); ?>

<h2>Connectez-vous à T'Chat</h2>

<?php $fmsg->display(); ?>
<!-- display fait un echo du html des messages d"erreurs -->

    <form action="<?php $this->url('login') ?>" method="POST">
        <p>
            <label for="pseudo">
                Pseudo :
            </label>	
            											<!-- si le pseudo existe on l'affiche sinon on affiche rien ""  -->
            <input type="text" name="pseudo" id="pseudo" value="<?php echo isset($datas['pseudo']) ? $datas['pseudo'] : '' ?>"/>
            <!-- isset car la 1ere fois qu'on arrive sur notre formulaire les données n'existent pas -->
			
        </p>
        <p>
            <label for="mot_de_passe">
                Mot de passe :
            </label>
            <input type="password" name="mot_de_passe" id="mot_de_passe" />
		
        </p>
        <p>
            <input type="submit" class="button" value="Me connecter"/>
			<a class="button" href="#" title="Accéder à la page d'inscription">
				Pas encore inscrit ?
			</a>
        </p>

    </form>

<?php $this->stop('main_content'); ?>