<div class="wrap">
	<?php
	// Creating a flash message with the hour date of the last modification
	if ( $last_updated ?? [] ) : ?>
        <div>
            <p>Dernière modification :
				<?= $last_updated ?>
            </p>
        </div>

	<?php endif ?>
    <h1>Redirection Section</h1>
    <p>
        Vous pouvez créer, modifier, supprimer vos redirections
    </p>
</div>