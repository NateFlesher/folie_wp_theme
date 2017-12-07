<div class="wrapper postbox with-pad">

	<h2 class="box-title">Setup Wizard</h2>

	<div class="inner-wrapper">

		<?php if ( ! get_option('add_purchase_code') ): ?>

		<div class="list-item">
			<h4>Please activate the license before!</h4>
			<p>You can't proceed in Theme Setup if you don't activate your license before. See instructions by <a href="#">click here</a>.</p>
		</div>

		<?php endif; ?>

		<div class="list-item">
			<h4>1-click theme setup</h4>
			<p>By click Setup Now, a new window will appear with the Setup Wizard. Follow the instructions and you're done!</p>
		</div>

		<div class="list-item">
			<h4>Template, Plugins, Photos, everything...</h4>
			<p>Not only template, but all needed plugins, photos and widgets for each demo!</p>
		</div>


		<p>
            <a id="setupBtn" name="Select Template" href="/TB_inline?width=960&height=600&inlineId=importer_dialog"  class="button-primary codeless-hint-qtip thickbox"><?php esc_html_e( 'Setup Now', 'folie' ); ?></a>
        </p>

	</div>

</div>

<?php include_once(get_template_directory() . '/includes/codeless_theme_panel/views/importer.php'); ?>