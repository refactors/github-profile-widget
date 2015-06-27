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
<aside class="widget">

	<?php if ( isset( $config["title"] ) ) : ?>
		<?php echo $before_title . $config["title"] . $after_title; ?>
	<?php endif; ?>

	<div class="refactors-widget github-widget" id="<?php echo $this->id; ?>">

		<?php if ( ! isset( $config["hideBuiltInHeader"] ) || ! $config["hideBuiltInHeader"] == "on" ) : ?>
			<header class="refactors-widget-header">
				<img class="refactors-widget-company-logo"
				     src="https://assets-cdn.github.com/favicon.ico"/>

				<div class="refactors-widget-header-text">
					<a class="refactors-widget-header-link" target="_blank" href="https://someURL"><?php echo $config["username"]; ?> (Henrique Dias)</a>
				</div>
			</header>
		<?php endif; ?>

		<div class="refactors-widget-content">
			<img src="https://avatars2.githubusercontent.com/u/5447088?v=3&s=460" style="border-radius: 5px">




			<div class="refactors-shadowed">
				This text is inside a shadowed box.
			</div>

			<h2>This is an H2 title</h2>

			<p>This is a paragraph. And this is <strong>bold</strong>. Oh... Gosh! This is <em>italic</em>!</p>
		</div>
	</div>
</aside>
