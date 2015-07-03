<?php

/**
 * help:
 * https://developer.github.com/v3/activity/events/types/
 * https://github.com/ussuri?tab=activity
 * https://api.github.com/users/ussuri/events/public
 */
class EventType {

	protected $info;

	function __construct( $info ) {
		$this->info = $info;
	}
	
	function getActor() {
		return $this->info->actor->login;
	}
	
	function getPayload() {
		return $this->info->repo->name;
	}
	
	function getTimeAgo() {
		$this->info->created_at = new DateTime($this->info->created_at);
                return humanTiming($this->info->created_at);
	}
	
	function getAction() {
               // TODO :\
		return str_replace('event', '', strtolower( $this->info->type ) ); // TODO!
	}
	
	function getOcticon() {
		// TODO
	}
	
	function getActorLink() {
		// TODO
	}
	
	function getObjectLink() {
		return "https://github.com/" . $this->info->repo->name ;
	}
	function __toString() {
		return $this->info->type;
	}
}


function humanTiming (DateTime $time_) {    
    $time = time() - $time_->getTimestamp(); // to get the time since that moment
    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );
    foreach ($tokens as $unit => $text) {
        if ($time >= $unit) {
            $numberOfUnits = floor($time / $unit);
            return $numberOfUnits . ' ' . $text . ($numberOfUnits>1 ? 's' : '');
        }
    }
}