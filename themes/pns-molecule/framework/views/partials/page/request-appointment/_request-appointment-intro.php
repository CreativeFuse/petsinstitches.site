<?php

$page = 'request_appointment';
$group = get_field( $page );


if( $group ){ ?>


	<div class="c-intro o-section u-gradient--blue u-arrow--bottom">

		<div class="o-container o-container--max">

			<div class="o-row">

				<div class="o-col-md-12">

					<div class="c-text-block u-align--center">

						<p itemprop="description" class="e-p--large u-color--white u-max-width--800 u-center">
							<?php esc_html_e( $group[ 'intro_copy' ] ); ?>
						</p>

					</div>

				</div>
			</div>
		</div>
	</div>

<?php } ?>