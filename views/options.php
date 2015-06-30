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
	<?php foreach ( $this->checkboxes as $option ): ?>
		<input class="checkbox" type="checkbox"
			<?php checked( ${$option}, 'on' ); ?>
			   id="<?php echo $this->get_field_id( $option ) ?>"
			   name="<?php echo $this->get_field_name( $option ) ?>"/>
		<label for="<?php echo $this->get_field_id( $option ) ?>">
			<?php echo ucfirst( str_replace( '_', ' ', ucfirst( $option ) ) ) ?>
		</label>
		<br>
	<?php endforeach; ?>
</p>

<h4>Advanced</h4>

<p>
	<label for="<?php echo $this->get_field_id( 'cache' ); ?>"/>
	<input
		class="widefat"
		id="<?php echo $this->get_field_id( 'cache' ); ?>"
		name="<?php echo $this->get_field_name( 'cache' ); ?>"
		type="number"
		placeholder="Cache expiration time in minutes"
		value="<?php echo $cache ?>"/>
</p>

<p>
	<small>
		<strong>Set 0 if you don't want to cache the data.</strong> Cache is automatically enabled. If disabled the
		plugin may stop working after a while because there is an hourly
		limit of calls to the GitHub's API.
	</small>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'token' ); ?>"/>
	<input class="widefat"
	       id="<?php echo $this->get_field_id( 'token' ); ?>"
	       name="<?php echo $this->get_field_name( 'token' ); ?>"
	       type="text"
	       placeholder="Your oAuth token" max=""
	       value="<?php echo $token ?>"/>
</p>

<p>
	<small>
		<a href="https://github.com/settings/tokens/new" target="_blank">Create token</a>. If you don't set
		it, the plugin will only be able to do 60 calls per hour to the GitHub API (not a problem, if the cache is at least 5 minutes).
	</small>
</p>