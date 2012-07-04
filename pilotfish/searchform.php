	<form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
		<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e('search here &hellip;', 'pilotfish'); ?>" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e('Search', 'pilotfish'); ?>"  />
	</form>
