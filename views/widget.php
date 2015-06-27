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
			<img class="github-profile-pic" src="https://avatars2.githubusercontent.com/u/5447088?v=3&s=460" style="border-radius: 5px">
			<span class="github-names">
				<p class="github-name">Henrique Dias</p>
				<p class="github-username">hacdias</p>
			</span>

			<div class="github-block">
				<span class="octicon octicon-circuit-board"></span>
				Developer Program Member
			</div>

			<div class="github-block">
				<div><span class="octicon octicon-location"></span>Portugal</div>
				<div><span class="octicon octicon-mail"></span><a href="mailto:hacdias@gmail.com">hacdias@gmail.com</a></div>
				<div><span class="octicon octicon-link"></span><a href="http://henriquedias.com">http://henriquedias.com</a></div>
				<div><span class="octicon octicon-clock"></span>Joined on Sep 12, 2013</div>
			</div>

		</div>
	</div>
</aside>
