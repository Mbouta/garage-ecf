<div id="commentaire">
			<p>Sur 24493 avis clients, v-parrot.fr a obtenu la note de 4,6/5</p>
			<p><a href="avis.php">Voir tous les avis clients v-parrot.com</a><span>&nbsp;></span></p>
		</div>
		<footer>
			<div class="pages-site">
				<ul>
					<li>PAGES INTERNES</li>
					<li><a href="index.php">Accueil</a></li>
					<li><a href="galerie.php">Galerie</a></li>
					<li><a href="../admin/">Compte</a></li>
					<li><a href="contact.php">Contacts</a></li>
				</ul>
			</div>
			<div class="services">
				<ul>
					<li>NOS SERVICES</li>
					<li><a href="#">Réparation</a></li>
					<li><a href="#">Entretien</a></li>
					<li><a href="#">Voiture d'occasion</a></li>
					<li><a href="#">Location</a></li>
					<li><a href="#">Lavage</a></li>
					<li><a href="#">Tuning</a></li>
				</ul>
			</div>
			<div class="horaires">
				<ul>
					<li>HEURES D'OUVERTURE</li>
						<?php 
							foreach ($listeHoraire as $horaire) {
							    $statut = 'Ouvert';

							    if ($horaire['status'] == '0') {
							        $statut = 'Fermé';
							    }
						   ?>
						<li><a href="#">
						<?php 
							echo $horaire['jour'].': '.$horaire['am'].' - '.$horaire['pm'].' '.$statut."<br>"; 
						?></a>
						</li>
						<?php

							}
						?>
				</ul>
			</div>
			<div class="social">
				<ul>
					<li>RESEAUX SOCIAUX</li>
					<li><a href="#" target="_blank"><img width="48" height="48" src="https://img.icons8.com/color/48/facebook.png" alt="facebook"/></a></li>
					<li><a href="#" target="_blank"><img width="48" height="48" src="https://img.icons8.com/color/48/youtube-play.png" alt="youtube-play"/></a></li>
					<li><a href="#" target="_blank"><img width="48" height="48" src="https://img.icons8.com/color/48/tiktok--v1.png" alt="tiktok--v1"/></a></li>
				</ul>
			</div>
		</footer>