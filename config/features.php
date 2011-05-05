<?php

/**
 * Set up some mappings and other static global configuration.
 * These items generally won't change for different installations.
 */

$config['roster_requirements'] = array(
	'4/3'	=> 12,
	'5/2'	=> 12,
	'3/3'	=> 10,
	'4/2'	=> 10,
	'3/2'	=> 8,
	'womens'=> 12,
	'mens'	=> 12,
	'open'	=> 12,
);

if (!defined('APPROVAL_AUTOMATIC')) {
	define('APPROVAL_AUTOMATIC', -1);		// approval, scores agree
	define('APPROVAL_AUTOMATIC_HOME', -2);  // approval, home score used
	define('APPROVAL_AUTOMATIC_AWAY', -3);  // approval, away score used
	define('APPROVAL_AUTOMATIC_FORFEIT', -4); // approval, no score entered
}

$config['approved_by'] = array(
	APPROVAL_AUTOMATIC			=> 'automatic approval',
	APPROVAL_AUTOMATIC_HOME		=> 'automatic approval using home submission',
	APPROVAL_AUTOMATIC_AWAY		=> 'automatic approval using away submission',
	APPROVAL_AUTOMATIC_FORFEIT	=> 'game automatically forfeited due to lack of score submission',
);

// List of roster positions which denote player status on a roster.
$config['playing_roster_positions'] = array(
	'captain',
	'assistant',
	'player',
);

$config['extended_playing_roster_positions'] = array(
	'captain',
	'assistant',
	'player',
	'substitute',
);

// List of roster positions which confer additional permissions such as viewing
// of contact information and updating a team roster.
$config['privileged_roster_positions'] = array(
	'coach',
	'captain',
	'assistant',
);

if (!defined('ROSTER_APPROVED')) {
	define('ROSTER_APPROVED', 1);
	define('ROSTER_INVITED', 2);
	define('ROSTER_REQUESTED', 3);
}

if (!defined('ATTENDANCE_UNKNOWN')) {
	define('ATTENDANCE_UNKNOWN', 0);	// status is unknown
	define('ATTENDANCE_ATTENDING', 1);	// attendance has been confirmed by player (and captain, if a substitute)
	define('ATTENDANCE_ABSENT', 2);		// absence has been confirmed by player
	define('ATTENDANCE_INVITED', 3);	// substitute has been invited by the captain
	define('ATTENDANCE_AVAILABLE', 4);	// substitute has indicated they are available
	define('ATTENDANCE_NO_SHOW', 5);	// player said they were coming, but didn't show
}

$config['attendance'] = array(
	ATTENDANCE_ATTENDING	=> 'Attending',
	ATTENDANCE_ABSENT		=> 'Absent',
	ATTENDANCE_UNKNOWN		=> 'Unknown',
	ATTENDANCE_INVITED		=> 'Invited',
	ATTENDANCE_AVAILABLE	=> 'Available',
	ATTENDANCE_NO_SHOW		=> 'No Show',
);

$config['attendance_alt'] = array(
	ATTENDANCE_ATTENDING	=> 'Y',
	ATTENDANCE_ABSENT		=> 'N',
	ATTENDANCE_UNKNOWN		=> '?',
	ATTENDANCE_INVITED		=> 'I',
	ATTENDANCE_AVAILABLE	=> 'A',
	ATTENDANCE_NO_SHOW		=> 'X',
);

$config['attendance_verb'] = array(
	ATTENDANCE_ATTENDING	=> 'attending',
	ATTENDANCE_ABSENT		=> 'absent for',
	ATTENDANCE_UNKNOWN		=> 'unknown/undecided for',
	ATTENDANCE_INVITED		=> 'invited to sub for',
	ATTENDANCE_AVAILABLE	=> 'available to sub for',
	ATTENDANCE_NO_SHOW		=> 'a no-show for',
);

?>