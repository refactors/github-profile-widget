<?php foreach ( $feed as $entry ) : ?>

	<div class="github-feed-entry <?php echo $evType; ?>">

		<div class="body">
			<span class="mega-octicon octicon-git---" style="display: none;"></span>

			<div class="time" style="display: none;">
				<time datetime="2015-06-30T15:56:40Z"
				      is="relative-time"
				      title="<?php $entry->created_at ?>">5 hours ago
				</time>
			</div>

			<div class="title">
				<span><?php echo str_replace( 'event', '', strtolower( $entry->type ) ) ?>ed</span>
				to
				<a href="/refactors/github-profile-widget/tree/master">master</a>
				at
				<a href="/refactors/github-profile-widget">refactors/github-profile-widget</a>
			</div>

			<div class="details" style="display: none;">
				<a href="/hacdias">
					<img alt="@hacdias" class="gravatar" height="30"
					     src="https://avatars2.githubusercontent.com/u/5447088?v=3&amp;s=60" width="30">
				</a>

				<div class="commits pusher-is-only-committer">
					<ul>
						<li>
							<span title="hacdias">
							<img alt="@hacdias" height="16" width="16"
							     src="https://avatars3.githubusercontent.com/u/5447088?v=3&amp;s=32"/>
							</span>

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

<?php endforeach;