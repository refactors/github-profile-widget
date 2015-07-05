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
	       type="text" max="" style="width: 90%"
	       placeholder="GitHub username (or organization)"
	       value="<?php echo $username ?>"/>
	<?php if ( ! empty( $username ) ) { ?>
		<a href='http://github.com/<?php echo $username ?>' target='_blank'>
			<img src="<?php echo plugins_url( 'css/expand.png', dirname( __FILE__ ) ); ?>"/>
		</a>
	<?php } ?>
</p>

<p>
<h4>Show</h4>
<?php foreach ( $this->checkboxes as $option ): ?>
	<input class="checkbox" type="checkbox"
		<?php checked( ${$option}, 'on' ); ?>
		   id="<?php echo $this->get_field_id( $option ) ?>"
		   name="<?php echo $this->get_field_name( $option ) ?>"/>
	<label for="<?php echo $this->get_field_id( $option ) ?>">
		<?php echo ucfirst( str_replace( '_', ' ', ucfirst( $option ) ) ) ?>
	</label>
	<br/>
<?php endforeach; ?>
</p>

<a class="github-advanced-title" href="javascript:void(0)" style="margin-bottom: 8px; display: block;">
	Advanced
</a>

<div class="github-advanced" style="display: none;">
	<p style="margin-top: 0">
		<label for="<?php echo $this->get_field_id( 'cache' ); ?>"/>
		<input class="widefat" title="Value 0 disables cache"
		       id="<?php echo $this->get_field_id( 'cache' ); ?>"
		       name="<?php echo $this->get_field_name( 'cache' ); ?>"
		       type="number" style="width: 50px;"
		       placeholder="Cache expiration time in minutes"
		       value="<?php echo $cache ?>"/> minutes of cache
	</p>
	<small>Widget may hit API limit if cache is less than 5 min, unless a token is provided.</small>

	<p>
		<label for="<?php echo $this->get_field_id( 'token' ); ?>"/>
		<input class="widefat"
		       id="<?php echo $this->get_field_id( 'token' ); ?>"
		       name="<?php echo $this->get_field_name( 'token' ); ?>"
		       type="text" style="width: 75%"
		       placeholder="oAuth token" max=""
		       value="<?php echo $token ?>"/>
		<a href="https://github.com/settings/tokens/new" target="_blank" style="margin-left: 4px;">
			<small>Create token</small>
		</a>
	</p>
</div>
