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
		// TODO
	}
	
	function getAction() {
		return str_replace('event', '', strtolower( $this->info->type ) ); // TODO!
	}
	
	function getOcticon() {
		// TODO
	}
	
	function getActorLink() {
		// TODO
	}
	
	function getObjectLink() {
		// TODO
	}
	function __toString() {
		return $this->info->type;
	}
}
