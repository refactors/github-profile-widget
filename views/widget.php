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

    <?php if (isset($config["title"])) : ?>
        <?php echo $before_title . $config["title"] . $after_title; ?>
    <?php endif; ?>

    <div class="github-widget" id="<?php echo $this->id; ?>">

        <?php if (!isset($config["hideBuiltInHeader"]) || !$config["hideBuiltInHeader"] == "on") : ?>
            <header class="github-widget-header">
                <img class="github-widget-company-logo" title="GitHub"
                     src="https://assets-cdn.github.com/favicon.ico"/>
                <div class="github-widget-header-text">
                    <a class="github-widget-header-link" target="_blank" 
                       href="<?php echo $profile->html_url; ?>" title="Check profile">
                        <?php echo $profile->login; ?> (<?php echo $profile->name; ?>)
                    </a>
                </div>
            </header>
        <?php endif; ?>

        <div class="github-widget-content">
            <img class="github-profile-pic" src="<?php echo $profile->avatar_url; ?>" style="border-radius: 5px">
            <span class="github-names">
                <p class="github-name"><?php echo $profile->name; ?></p>
                <a class="github-username" target="_blank" href="<?php echo $profile->html_url; ?>" title="Check profile">
                    <?php echo $profile->login; ?>
                </a>
            </span>

            <div class="github-block">
                <?php if (!empty($profile->company)): ?>
                    <div><span class="octicon octicon-organization"></span><?php echo $profile->company; ?></div>
                <?php endif; ?>
                <?php if (!empty($profile->location)): ?>
                    <div><span class="octicon octicon-location"></span><?php echo $profile->location; ?></div>
                <?php endif; ?>
                <?php if (!empty($profile->email)): ?>
                    <div><span class="octicon octicon-mail"></span>
                        <a href="mailto:<?php echo $profile->email; ?>"><?php echo $profile->email; ?></a></div>
                <?php endif; ?>
                <?php if (!empty($profile->blog)): ?>
                    <div><span class="octicon octicon-link"></span>
                        <a href="<?php echo $profile->blog; ?>" target="_blank"><?php echo $profile->blog; ?></a>
                    </div>
                <?php endif; ?>
                <div>
                    <span class="octicon octicon-clock"></span>
                    Joined on <?php echo $profile->created_at->format('M d, Y'); ?>
                </div>
           
            </div>            
             
            <div class="github-block github-vcard-stats">
                <a class="github-vcard-stat" href="https://github.com/<?php echo $profile->login; ?>/followers">
                    <strong class="github-vcard-stat-count"><?php echo $profile->followers; ?></strong>
                    <span class="text-muted">Followers</span>
                </a>
                <a class="github-vcard-stat" href="https://github.com/<?php echo $profile->login; ?>/following">
                    <strong class="github-vcard-stat-count"><?php echo $profile->following; ?></strong>
                    <span class="text-muted">Following</span>
                </a>
            </div>
            <div style="clear: both;"></div>

            <div class="github-block">
                <div>
                    <span class="octicon octicon-repo"></span>
                    <a href="https://github.com/<?php echo $profile->login; ?>/repositories" target="_blank">
                        <?php echo $profile->public_repos; ?> Public Repositories
                    </a>

	                <input type="checkbox" id="gh-repo-t" class="github-repos-toggle">
	                <label for="gh-repo-t" class="github-repos-toggle-la octicon octicon-chevron-down"></label>

	                <div class="github-repos">
		                <?php foreach ($repos as $repo) { ?>
                                    <div class="github-repo-name">
                                        <a target="_blank" href="<?php echo $repo->html_url; ?>"
                                           title="<?php echo $repo->full_name; ?>">
                                            <?php echo $repo->name ?>
                                        </a>
                                    </div>
                                <?php } ?>
	                </div>
                </div>
                <div>
                    <span class="octicon octicon-gist"></span>
                    <a href="https://gist.github.com/<?php echo $profile->login; ?>" target="_blank">
                        <?php echo $profile->public_gists; ?> Public Gists
                    </a>
                </div>
            </div>
            
            
            <div class="github-block">     
                <?php foreach ($organizations as $org) { ?>
                    <div>
                        <a target="_blank" href="https://github.com/<?php echo $org->login; ?>"
                           title="<?php echo $org->description; ?>">
                            <img src='<?php echo $org->avatar_url; ?>' class="github-avatarurl" />
                            <?php echo $org->login ?>
                        </a>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
</aside>
