<div class="github-block github-feed public_news">
        
    <?php foreach ($feed as $entry) { ?>
            
        <div class="github-feed-entry push">
            <div class="body"><!-- push -->
                <span class="mega-octicon octicon-git-commit"></span>

                <div class="time">
                  <time datetime="2015-06-30T15:44:35Z" is="relative-time" title="30/06/2015, 16:44 WEST">2 hours ago</time>
                </div>

                <div class="title">
                  <a href="https://github.com/<?php echo $entry->actor->login; ?>">
                      <?php echo $entry->actor->login; ?>
                  </a>
                  <span>pushed</span> to 
                  <a href="/refactors/github-profile-widget/tree/master">master</a> at <a href="/refactors/github-profile-widget" data-ga-click="News feed, event click, Event click type:PushEvent target:repo">refactors/github-profile-widget</a>
                </div>

                <div class="details">
                  <a href="https://github.com/<?php echo $entry->actor->login; ?>"><img alt="@lsoares" class="gravatar" height="30" src="https://avatars0.githubusercontent.com/u/674045?v=3&amp;s=60" width="30"></a>

                    <div class="commits pusher-is-only-committer">
                      <ul>
                        <li>
                          <span title="<?php echo $entry->actor->login; ?>">
                            <img alt="@<?php echo $entry->actor->login; ?>" height="16" src="https://avatars1.githubusercontent.com/u/674045?v=3&amp;s=32" width="16">
                          </span>
                          <code><a href="/refactors/github-profile-widget/commit/fd39700ca97401080d42be758d2ea3792c9e76fc" data-ga-click="News feed, event click, Event click type:PushEvent target:sha">fd39700</a></code>
                          <div class="message">
                            <blockquote>
                              usar func
                            </blockquote>
                          </div>
                        </li>
                      </ul>
                    </div>
                </div>
            </div>
        </div>
     <?php } ?>

</div>