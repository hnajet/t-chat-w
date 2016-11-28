<?php $this->layout('layout', ['title' => 'Messages de mon salon']) ; ?>

<?php $this->start('main_content'); ?>
<!-- on a uniquement à notre disposition $salon et $messages à notre disposition -->
 <h2>Bienvenue sur le salon "<?php echo $this->e($salon['nom']); ?>"</h2>
    <ol class="messages">
		<?php foreach ($messages as $message): ?>
		<li>
				<!-- on déclare notre vue $message voir le salon controller ligne 37 et pseudo car en base de donné la colonne s'appelle pseudo -->
				<span class="personne"><?php echo $this->e($message['pseudo']); ?>:</span></li>
				<span class="message">"<?php echo $this->e($message['corps']); ?>"</span></li>
		<?php endforeach; ?>
    </ol>
    <!-- J'envoie mon formulaire d'ajout de message sur la page courante
    cela va me permettre d'ajouter mes messages à ce salon précisément.
    -->
    <form class="form-message" action="<?php $this->url('see_salon', array('id'=>$salon['id'])) ?>" method="POST">
        <input type="text" name="message" /><input type="submit" class="button" name="send" value="Envoyer"/>
    </form>



<?php $this->stop('main_content'); ?>
