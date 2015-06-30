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
	       style="width: 70%"
	       placeholder="Your GitHub username" max=""
	       value="<?php echo $username ?>"/>
	<?php if ( ! empty( $username ) ) { ?>
		<a href='http://github.com/<?php echo $username ?>' target='_blank'>
			<img src="<?php echo plugins_url( 'css/expand.png', dirname( __FILE__ ) ); ?>"/>
		</a>
	<?php } ?>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'oAuth' ); ?>"/>
	<input class="widefat"
	       id="<?php echo $this->get_field_id( 'oAuth' ); ?>"
	       name="<?php echo $this->get_field_name( 'oAuth' ); ?>"
	       type="text"
	       placeholder="Your oAuth Token" max=""
	       value="<?php echo $oAuth ?>"/>
</p>
<p style="font-size: 80%; color: gray;">
    <a href="https://github.com/settings/tokens/new" target="_blank">Create token</a>. If you don't set
	it, the plugin will only be able to do 60 calls per hour to the GitHub API.</p>
