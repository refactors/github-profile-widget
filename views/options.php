<p>
    <label for="<?php echo $this->get_field_id('title'); ?>"/>
    <input class="widefat"
           id="<?php echo $this->get_field_id('title'); ?>"
           name="<?php echo $this->get_field_name('title'); ?>"
           type="text"
           placeholder="Title"
           value="<?php echo $title ?>"/>
</p>

<p>
    <label for="<?php echo $this->get_field_id('username'); ?>"/>
    <input class="widefat"
           id="<?php echo $this->get_field_id('username'); ?>"
           name="<?php echo $this->get_field_name('username'); ?>"
           type="text"
           style="width: 90%"
           placeholder="Your GitHub username" max=""
           value="<?php echo $username ?>"/>
           <?php if (!empty($username))
           { ?>
        <a href='http://github.com/<?php echo $username ?>' target='_blank'>
            <img src="<?php echo plugins_url('css/expand.png', dirname(__FILE__)); ?>"/>
        </a>
<?php } ?>
</p>

<p>
<h4>Show</h4>
    <?php foreach ($this->checkboxes as $option): ?>
        <input class="checkbox" type="checkbox"
    <?php checked(${$option}, 'on'); ?>
               id="<?php echo $this->get_field_id($option) ?>"
               name="<?php echo $this->get_field_name($option) ?>"/>
        <label for="<?php echo $this->get_field_id($option) ?>">
    <?php echo ucfirst(str_replace('_', ' ', ucfirst($option))) ?>
        </label>
        <br />
<?php endforeach; ?>
</p>

<a class="github-advanced-title" style="cursor: pointer"><h4 style="font-weight: normal; text-decoration: underline">
		Advanced</h4></a>

<div class="github-advanced" style="display: none">
	<p style="margin-top: 0">
		<label for="<?php echo $this->get_field_id( 'cache' ); ?>"/>
		<input class="widefat"
		       id="<?php echo $this->get_field_id( 'cache' ); ?>"
		       name="<?php echo $this->get_field_name( 'cache' ); ?>"
		       type="number" style="width: 50px;"
		       placeholder="Cache expiration time in minutes"
		       value="<?php echo $cache ?>"/> minutes of cache
	</p>

	<p>
		<small>0 disables cache; less that 5 may create problems because of API limits <strong>unless you provide a
				token</strong>.
		</small>
	</p>

	<p>
		<label for="<?php echo $this->get_field_id( 'token' ); ?>"/>
		<input class="widefat"
		       id="<?php echo $this->get_field_id( 'token' ); ?>"
		       name="<?php echo $this->get_field_name( 'token' ); ?>"
		       type="text" style="width: 70%"
		       placeholder="oAuth token" max=""
		       value="<?php echo $token ?>"/>
		<a href="https://github.com/settings/tokens/new" target="_blank">
			<small>Create token</small>
		</a>
	</p>

	<p>
		<small>If you don't set it, the plugin will only be able to do 60 calls per hour to the GitHub API (not a
			problem, if the cache is at least 5 minutes).
		</small>
	</p>
</div>
