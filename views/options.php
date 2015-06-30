<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"/>
	<input class="widefat"
	       id="<?php echo $this->get_field_id( 'title' ); ?>"
	       name="<?php echo $this->get_field_name( 'title' ); ?>"
	       type="text"
	       placeholder="Title"
	       value="<?php echo $title ?>"/>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'username' ); ?>"/>
	<input class="widefat"
	       id="<?php echo $this->get_field_id( 'username' ); ?>"
	       name="<?php echo $this->get_field_name( 'username' ); ?>"
	       type="text"
	       style="width: 90%"
	       placeholder="Your GitHub username" max=""
	       value="<?php echo $username ?>"/>
	<?php if ( ! empty( $username ) ) { ?>
		<a href='http://github.com/<?php echo $username ?>' target='_blank'>
			<img src="<?php echo plugins_url( 'css/expand.png', dirname( __FILE__ ) ); ?>"/>
		</a>
	<?php } ?>
</p>

<h4>Show:</h4>

<p>
	<?php foreach ( $this->options["checkboxes"] as $option => $title ): ?>
		<input class="checkbox" type="checkbox"
			<?php checked( ${$option}, 'on' ); ?>
			   id="<?php echo $this->get_field_id( $option ) ?>"
			   name="<?php echo $this->get_field_name( $option ) ?>"/>
		<label for="<?php echo $this->get_field_id( $option ) ?>">
			<?php echo ucfirst( $title ) ?>
		</label>
		<br>
	<?php endforeach; ?>
</p>

<h4>Advanced Settings</h4>

<p>
	<input class="checkbox" type="checkbox"
		<?php checked( $cache, 'on' ); ?>
		   id="<?php echo $this->get_field_id( 'cache' ) ?>"
		   name="<?php echo $this->get_field_name( 'cache' ) ?>"/>
	<label for="<?php echo $this->get_field_id( 'cache' ) ?>">
		<?php echo ucfirst( 'Cache' ) ?>
	</label>
</p>

<p style="font-size: 80%; color: gray;">
	Cache is automatically enabled. If disabled the plugin may stop working after a while because there is an hourly
	limit of calls to the GitHub's API.
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'cache_time' ); ?>"/>
	<input
		class="widefat"
		id="<?php echo $this->get_field_id( 'cache_time' ); ?>"
		name="<?php echo $this->get_field_name( 'cache_time' ); ?>"
		type="number"
		placeholder="Cache Expiration Time in Seconds"
		value="<?php echo $cache_time ?>"/>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'token' ); ?>"/>
	<input class="widefat"
	       id="<?php echo $this->get_field_id( 'token' ); ?>"
	       name="<?php echo $this->get_field_name( 'token' ); ?>"
	       type="text"
	       placeholder="Your oAuth Token" max=""
	       value="<?php echo $token ?>"/>
</p>

<p style="font-size: 80%; color: gray;">
	<a href="https://github.com/settings/tokens/new" target="_blank">Create token</a>. If you don't set
	it, the plugin will only be able to do 60 calls per hour to the GitHub API (which usually is not a problem, as the
	plugin has cache).
</p>