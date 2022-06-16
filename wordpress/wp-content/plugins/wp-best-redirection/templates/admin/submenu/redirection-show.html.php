<div class="wrap">
    <h1>WPBestRedirection Manage</h1>

    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form action="options.php" method="post">
			<?php
			// output security fields for the registered setting "wporg"
			settings_fields('wp_best_redirection_manage');
			// output setting sections and their fields
			// (sections are registered for "wporg", each field is registered to a specific section)
			do_settings_sections('wp_best_redirection_manage');
			// output save settings button
			submit_button('Save Settings');
			?>
        </form>
    </div>
</div>