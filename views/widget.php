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
					<a class="refactors-widget-header-link" target="_blank" href="https://github.com/"><?php echo $info->login; ?> (<?php echo $info->name; ?>)</a>
				</div>
			</header>
		<?php endif; ?>

		<div class="refactors-widget-content">
			<img class="github-profile-pic" src="<?php echo $info->avatar_url; ?>" style="border-radius: 5px">
			<span class="github-names">
				<p class="github-name"><?php echo $info->name; ?></p>
				<p class="github-username"><?php echo $info->login; ?></p>
			</span>

			<div class="github-block">
				<?php if ($info->company != ""): ?>
					<div><span class="octicon octicon-organization"></span><?php echo $info->company; ?></div>
				<?php endif; ?>
				<?php if ($info->location != ""): ?>
					<div><span class="octicon octicon-location"></span><?php echo $info->location; ?></div>
				<?php endif; ?>
				<?php if ($info->email != ""): ?>
					<div><span class="octicon octicon-mail"></span><a href="mailto:<?php echo $info->email; ?>"><?php echo $info->email; ?></a></div>
				<?php endif; ?>
				<?php if ($info->blog != ""): ?>
					<div><span class="octicon octicon-link"></span><a href="<?php echo $info->blog; ?>"><?php echo $info->blog; ?></a></div>
				<?php endif; ?>
				<div><span class="octicon octicon-clock"></span>Joined on <?php echo $info->joined; ?></div>
			</div>

			<div class="github-block">
				<div><span class="octicon octicon-organization"></span><a href="https://github.com/<?php echo $info->login; ?>/followers"><?php echo $info->followers; ?> Followers</a></div>
				<div><span class="octicon octicon-person"></span><a href="https://github.com/<?php echo $info->login; ?>/following"><?php echo $info->following; ?> Following</a></div>
			</div>

			<div class="github-block">
				<div><span class="octicon octicon-repo"></span><a href="https://github.com/<?php echo $info->login; ?>/repositories"><?php echo $info->public_repos; ?> Public Repositories</a></div>
				<div><span class="octicon octicon-gist"></span><a href="https://gist.github.com/<?php echo $info->login; ?>"><?php echo $info->public_gists; ?> Public Gists</a></div>
			</div>

		</div>
	</div>
</aside>
