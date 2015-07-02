<?php

class EventType {

	protected $info;

	function __construct( $info )
	{
		$this->info = $info;
	}
	
	function __toString() {
		return $this->info->type;
	}
	
	function getAction() {
		return str_replace('event', '', strtolower( $this->info->type ) );
	}
	
	function getActor() {
		return $this->info->actor->login;
	}
	
	function getPayload() {
		return "TODO";
	}
}
//
//EventType::$types = array(
//	 "Deployment",
//	 "DeploymentStatus",
//	 "Download",
//	 "Follow",
//	 "Fork",
//	 "ForkApply",
//	 "Gist",
//	 "Gollum",
//	 "IssueComment",
//	 "Issues",
//	 "Member",
//	 "Membership",
//	 "PageBuild",
//	 "Public",
//	 "PullRequest",
//	 "PullRequestReviewComment",
//	 "Push",
//	 "Release",
//	 "Repository",
//	 "Status",
//	 "TeamAdd",
//	 "Watch" )
//);
