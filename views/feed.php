<?php
require_once 'EventType.php';

foreach ($feed as $entry) :
    $eventType = new EventType($entry);
    ?>
	<?php echo $eventType->getOcticon(); ?>
	<div class="github-feed-entry ">
        <small style="color: #666">
            <time datetime="<?php echo $entry->created_at ?>"><?php echo $eventType->getTimeAgo() ?> ago</time>
        </small>
        <br />
        <a class="github-feed-actor" target="_blank" href="http://github.com/<?php echo $eventType->getActor() ?>" 
           title="View profile" style="font-weight: bold; margin-right: 3px;">
               <?php echo $eventType->getActor() ?>
        </a>
        <span class="github-feed-action" style="margin-right: 3px;">
            <?php echo $eventType->getAction() ?>
        </span>
        <a class="github-feed-object" style="font-weight: bold; margin-right: 3px;"
           target="_blank" href="<?php echo $eventType->getObjectLink() ?>">
               <?php echo $eventType->getPayload() ?>
        </a>

    </div>

    <?php
endforeach;
