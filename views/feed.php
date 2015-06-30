<?php foreach ($feed as $entry) : ?>

    <div class="github-feed-entry">
        <?php echo $entry->type; ?>
    </div>

    <div class="alert push">
        <div class="body"><!-- push -->
            <span class="mega-octicon octicon-git-commit"></span>

            <div class="time">
                <time datetime="2015-06-30T15:56:40Z" is="relative-time" title="Jun 30, 2015, 4:56 PM GMT+1">5 hours
                    ago
                </time>
            </div>

            <div class="title">
                <a href="/hacdias" data-ga-click="News feed, event click, Event click type:PushEvent target:actor">hacdias</a>
                <span>pushed</span> to <a href="/refactors/github-profile-widget/tree/master"
                                          data-ga-click="News feed, event click, Event click type:PushEvent target:branch">master</a>
                at <a href="/refactors/github-profile-widget"
                      data-ga-click="News feed, event click, Event click type:PushEvent target:repo">refactors/github-profile-widget</a>
            </div>

            <div class="details">
                <a href="/hacdias"><img alt="@hacdias" class="gravatar" height="30"
                                        src="https://avatars2.githubusercontent.com/u/5447088?v=3&amp;s=60" width="30"></a>

                <div class="commits pusher-is-only-committer">
                    <ul>
                        <li>
          <span title="hacdias">
            <img alt="@hacdias" height="16" src="https://avatars3.githubusercontent.com/u/5447088?v=3&amp;s=32"
                 width="16">
          </span>
                            <code><a
                                    href="/refactors/github-profile-widget/commit/8b2fc25982dcfb3ce7825252cfbf5ec10dbf17c7"
                                    data-ga-click="News feed, event click, Event click type:PushEvent target:sha">8b2fc25</a></code>

                            <div class="message">
                                <blockquote>
                                    update css
                                </blockquote>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="alert issues_closed">
        <div class="body"><!-- issues -->
            <span class="mega-octicon octicon-issue-closed"></span>

            <div class="time">
                <time datetime="2015-06-30T15:14:38Z" is="relative-time" title="Jun 30, 2015, 4:14 PM GMT+1">5 hours
                    ago
                </time>
            </div>

            <div class="title">
                <a href="/hacdias" data-ga-click="News feed, event click, Event click type:IssuesEvent target:actor">hacdias</a>
                <span>closed</span> issue <a href="/refactors/github-profile-widget/issues/7"
                                             data-ga-click="News feed, event click, Event click type:IssuesEvent target:issue"
                                             title="Set organisations like the original">refactors/github-profile-widget#7</a>
            </div>

            <div class="details">
                <a href="/hacdias"><img alt="@hacdias" class="gravatar" height="30"
                                        src="https://avatars2.githubusercontent.com/u/5447088?v=3&amp;s=60" width="30"></a>

                <div class="message">
                    <blockquote>
                        Set organisations like the original
                    </blockquote>
                </div>
            </div>
        </div>
    </div>




    <?php /* <div class="github-feed-entry issues_closed">
        <div class="body">
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
              <a href="https://github.com/<?php echo $entry->actor->login; ?>"><img alt="@lsoares" class="gravatar" height="30" src="<?php echo $entry->avatar_url; ?>" width="30"></a>

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
    </div> */ ?>
<?php endforeach;