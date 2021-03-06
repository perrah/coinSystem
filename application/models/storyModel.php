<?php
	include(ROOT_PATH . '/application/models/story.php');
	include_once(ROOT_PATH . '/application/services/database.php');

	class StoryModel {
		private $db;

		public function __construct() {
			$this->db = new Database();
			$this->db->connect();
		}
		
		// returns an array of story objects
		public function getStoryList() {
			$result = $this->db->query('select * FROM story');
			$stories = mysqli_fetch_all($result['result']);

			$storyList = array();
			foreach($stories as $story) {
				$resultUsersSub = $this->db->query("select * FROM personal WHERE SSO = '" . $story[1] . "'");
				$usersSub = mysqli_fetch_all($resultUsersSub['result']);
				$userSub = $usersSub[0];
				$sName = $userSub[2] . " " . $userSub[1];

				$resultUsers = $this->db->query("select * FROM personal WHERE SSO = '" . $story[2] . "'");
				$users = mysqli_fetch_all($resultUsers['result']);
				$user = $users[0];
				$tName = $user[2] . " " . $user[1];

				//test
				$storyObj = new Story($story[0], $story[1], $story[2], $story[3], $story[4], $story[5], $story[6], $story[7], $story[8], $story[9], $story[10], $tName, $sName); 
				array_push($storyList, $storyObj);
			}
			return $storyList;
		}

		// returns approved stories
		public function getApvStories() {
			$result = $this->db->query("select * FROM story WHERE Status = 'approved'");
			$stories = mysqli_fetch_all($result['result']);

			$storyList = array();
			foreach($stories as $story) {
				$resultUsersSub = $this->db->query("select * FROM personal WHERE SSO = '" . $story[1] . "'");
				$usersSub = mysqli_fetch_all($resultUsersSub['result']);
				$userSub = $usersSub[0];
				$sName = $userSub[2] . " " . $userSub[1];

				$resultUsers = $this->db->query("select * FROM personal WHERE SSO = '" . $story[2] . "'");
				$users = mysqli_fetch_all($resultUsers['result']);
				$user = $users[0];
				$tName = $user[2] . " " . $user[1];

				$storyObj = new Story($story[0], $story[1], $story[2], $story[3], $story[4], $story[5], $story[6], $story[7], $story[8], $story[9], $story[10], $tName, $sName); 
				array_push($storyList, $storyObj);
			}
			return $storyList;
		}

		// returns an array of Story objects
		public function getStoriesBySubSSO($subSSO) {
			$result = $this->db->query("select * FROM story WHERE SubSSO = '" . $subSSO . "'");
			$stories = mysqli_fetch_all($result['result']);

			$storyList = array();
			foreach($stories as $story) {
				$resultUsersSub = $this->db->query("select * FROM personal WHERE SSO = '" . $story[1] . "'");
				$usersSub = mysqli_fetch_all($resultUsersSub['result']);
				$userSub = $usersSub[0];
				$sName = $userSub[2] . " " . $userSub[1];

				$resultUsers = $this->db->query("select * FROM personal WHERE SSO = '" . $story[2] . "'");
				$users = mysqli_fetch_all($resultUsers['result']);
				$user = $users[0];
				$tName = $user[2] . " " . $user[1];

				$storyObj = new Story($story[0], $story[1], $story[2], $story[3], $story[4], $story[5], $story[6], $story[7], $story[8], $story[9], $story[10], $tName, $sName); 
				array_push($storyList, $storyObj);
			}
			return $storyList;
		}

		public function getStoriesByTargetSSO($targetSSO) {
			$result = $this->db->query("select * FROM story WHERE TargetSSO = '" . $targetSSO . "'");
			$stories = mysqli_fetch_all($result['result']);

			$storyList = array();
			foreach($stories as $story) {
				$resultUsersSub = $this->db->query("select * FROM personal WHERE SSO = '" . $story[1] . "'");
				$usersSub = mysqli_fetch_all($resultUsersSub['result']);
				$userSub = $usersSub[0];
				$sName = $userSub[2] . " " . $userSub[1];

				$resultUsers = $this->db->query("select * FROM personal WHERE SSO = '" . $story[2] . "'");
				$users = mysqli_fetch_all($resultUsers['result']);
				$user = $users[0];
				$tName = $user[2] . " " . $user[1];

				$storyObj = new Story($story[0], $story[1], $story[2], $story[3], $story[4], $story[5], $story[6], $story[7], $story[8], $story[9], $story[10], $tName, $sName); 
				array_push($storyList, $storyObj);
			}
			return $storyList;
		}

		// returns a story object that correpsonds to that ID
		public function getStoryByID($storyID) {
			//$db = new Database();
			//$db->connect();
			$result = $this->db->query("select * FROM story WHERE StoryID = " . $storyID . "");
			$stories = mysqli_fetch_all($result['result']);
			$story = $stories[0];
			
			$resultUsersSub = $this->db->query("select * FROM personal WHERE SSO = '" . $story[1] . "'");
			$usersSub = mysqli_fetch_all($resultUsersSub['result']);
			$userSub = $usersSub[0];
			$sName = $userSub[2] . " " . $userSub[1];

			$resultUsers = $this->db->query("select * FROM personal WHERE SSO = '" . $story[2] . "'");
			$users = mysqli_fetch_all($resultUsers['result']);
			$user = $users[0];
			$tName = $user[2] . " " . $user[1];

			$storyObj = new Story($story[0], $story[1], $story[2], $story[3], $story[4], $story[5], $story[6], $story[7], $story[8], $story[9], $story[10], $tName, $sName); 
				
			return $storyObj;
		}

		// Date in MM/DD/YYYY format because America
		public function setApvDate($storyID, $date) {
			$result = $this->db->query("UPDATE story SET ApvDate='" . $date . "' WHERE StoryID = " . $storyID . "");
			return $result;
		}

		// approves a story
		public function setApproved($storyID) {
			$result = $this->db->query("UPDATE story SET Status='approved' WHERE StoryID = " . $storyID . "");
			return $result;
		}

		// denies a story
		public function setDenied($storyID) {
			$result = $this->db->query("UPDATE story SET Status='denied' WHERE StoryID = " . $storyID . "");
			//echo count()
			return $result;
		}

		// creates a story in the DB
		public function createStory($subSSO, $targetSSO, $story, $subDate, $value1, $value2, $value3, $title) {
			$result = $this->db->query("INSERT INTO story (SubSSO, TargetSSO, Story, SubDate, Value_1, Value_2, Value_3, Title) VALUES('" . $subSSO . 
				"','" . $targetSSO . "','" . $story . "','". $subDate . "','". $value1 . "','". $value2 . "','". $value3 . "','". $title . "')");
			//echo count()
			return $result;
		}

		// votes yes on a story
		public function voteYes($storyID, $sso) {
			$this->vote($storyID, $sso, 1);
		}

		// votes yes on a story
		public function voteNo($storyID, $sso) {
			$this->vote($storyID, $sso, 0);
		}

		// creates a vote for a reviewer on a story
		// vote is binary, 1 for yes, 0 for no
		public function vote($storyID, $sso, $vote) {
			$result = $this->db->query("INSERT INTO vote VALUES(" . $storyID . 
				",'" . $sso . "'," . $vote . ")");
			return $result;
		}

		//returns a two element array with the first element being number of yes votes, and second element being total votes
		public function getVotes($storyID) {
			$result = $this->db->query("select * FROM vote WHERE StoryID = " . $storyID . "");
			$votes = mysqli_fetch_all($result['result']);

			$totalVotes = 0;
			$yesVotes = 0;
			foreach($votes as $vote) {
				$totalVotes++;
				if($vote[2] == 1) {
					$yesVotes++;
				}
			}
			$voteList = array($yesVotes, $totalVotes);
			return $voteList;
		}

		// gets stories voted on, no matter the status
		public function getStoriesVotedOn($sso) {
			$result = $this->db->query("select * FROM vote WHERE SSO = '" . $sso . "'");
			$storyIDs = mysqli_fetch_all($result['result']);
			//echo count($storyIDs);
			//echo "<br/>";
			//get stories from storyIDs
			$storyList = array();
			foreach($storyIDs as $storyID) {
				//echo $storyID[0];
				//echo "<br/>";
				$storyObj = $this->getStoryByID($storyID[0]);				
				array_push($storyList, $storyObj);
			}
			return $storyList;
		}

		// gets pending stories not voted on
		public function getStoriesNotVotedOn($sso) {
			$resultVotedOn = $this->db->query("select * FROM vote WHERE SSO = '" . $sso . "'");
			$storiesVoted = mysqli_fetch_all($resultVotedOn['result']);
			$resultPending= $this->db->query("select * FROM story WHERE Status = 'pending'");
			$storiesPending = mysqli_fetch_all($resultPending['result']);

			$storyList = array();
			foreach($storiesPending as $pendStory) {
				$storyVoted = false;
				foreach($storiesVoted as $votStory) {
					//check if the voted story is the current pending story
					if($votStory[0] == $pendStory[0]) {
						$storyVoted = true;
						break;
					}
				}
				if (!$storyVoted) {
					$storyObj = new Story($pendStory[0], $pendStory[1], $pendStory[2], $pendStory[3], $pendStory[4], $pendStory[5], $pendStory[6], 
						$pendStory[7], $pendStory[8], $pendStory[9]); 
					array_push($storyList, $storyObj);
				}
			}

			return $storyList;
		}
	}
?>