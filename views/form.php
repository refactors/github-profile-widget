<?php
/*
 * HackerRank Profile Widget for WordPress
 *
 *     Copyright (C) 2015 Henrique Dias <hacdias@gmail.com>
 *     Copyright (C) 2015 Luís Soares <lsoares@gmail.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
?>
<p>
	<label for="<?php echo $this->get_field_id( 'username' ); ?>">
		<input class="widefat"
		       id="<?php echo $this->get_field_id( 'username' ); ?>"
		       name="<?php echo $this->get_field_name( 'username' ); ?>"
		       type="text"
		       placeholder="Your HackerRank username"
		       style="width: 90%"
		       value="<?php echo esc_attr( $username ); ?>"/></label>

	<?php if ( ! empty( $username ) ) : ?>
		<a href="https://www.hackerrank.com/<?php echo esc_attr( $username ); ?>" target='_blank' title='Test link'>
			<img src='<?php echo plugins_url( 'assets/link.png', dirname( __FILE__ ) ); ?>'></a>
	<?php endif; ?>

	<br><br>

	<label for="<?php echo $this->get_field_id( 'title' ); ?>">
		<input class="widefat"
		       id="<?php echo $this->get_field_id( 'title' ); ?>"
		       name="<?php echo $this->get_field_name( 'title' ); ?>"
		       type="text"
		       placeholder="Title of the widget"
		       value="<?php echo esc_attr( $title ); ?>"/></label>

	<br><br>

	<input class="checkbox" type="checkbox" <?php checked( $hideBuiltInHeader, 'on' ); ?>
	       id="<?php echo $this->get_field_id( 'hideBuiltInHeader' ); ?>"
	       name="<?php echo $this->get_field_name( 'hideBuiltInHeader' ); ?>"/>
	<label for="<?php echo $this->get_field_id( 'hideBuiltInHeader' ); ?>">
		Hide built-in header
	</label>

	<br><br>

	<?php foreach ( $this->options as $option ): ?>
		<?php if ( substr( $option, 0, 4 ) === "show" ): ?>
			<input class="checkbox" type="checkbox" <?php checked( ${$option}, 'on' ); ?>
			       id="<?php echo $this->get_field_id( $option ); ?>"
			       name="<?php echo $this->get_field_name( $option ); ?>"/>
			<label for="<?php echo $this->get_field_id( $option ); ?>">
				<?php echo str_replace( 'show', '', $option ); ?>
			</label>
			<br>
		<?php endif; ?>
	<?php endforeach; ?>

	<br>

	Template:

	<select id="<?php echo $this->get_field_id( 'theme' ); ?>"
	        name="<?php echo $this->get_field_name( 'theme' ); ?>">
		<option value="light" <?php selected( $theme, 'light' ); ?>>Light</option>
		<option value="dark" <?php selected( $theme, 'dark' ); ?>>Dark</option>
		<option value="balanced" <?php selected( $theme, 'balanced' ); ?>>Balanced</option>
	</select>
</p>
