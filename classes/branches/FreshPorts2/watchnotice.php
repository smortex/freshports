<?php
	#
	# $Id: watchnotice.php,v 1.1.2.4 2005-10-08 01:57:16 dan Exp $
	#
	# Copyright (c) 1998-2003 DVL Software Limited
	#


// base class for watch notice
class WatchNotice {

	var $Never			= 'Z';
	var $Daily			= 'D';
	var $Weekely		= 'W';
	var $Fortnightly	= 'F';
	var $Monthly		= 'M';

	var $id;
	var $frequency;
	var $description;
	var $last_sent;

	var $dbh;

	function WatchNotice($dbh) {
		$this->dbh	= $dbh;
	}

    function _PopulateValues($myrow) {
		$this->id			= $myrow["id"];
		$this->frequency	= $myrow["frequency"];
		$this->description	= $myrow["description"];
		$this->last_sent	= $myrow["last_sent"];
	}

	function FetchByID($id) {
		if (IsSet($id)) {
			$this->id = $id;
		}
		$sql = "select * from watch_notice where id = $this->id";
#		echo "sql = '$sql'<BR>";

        $result = pg_exec($this->dbh, $sql);
		if ($result) {
			$numrows = pg_numrows($result);
			if ($numrows == 1) {
#				echo "fetched by ID succeeded<BR>";
				$myrow = pg_fetch_array ($result, 0);
				$this->_PopulateValues($myrow);
			}
		}

        return $this->id;
	}

	
	function FetchByFrequency($frequency) {
		if (IsSet($frequency)) {
			$this->frequency = $frequency;
		}
		$sql = "select * from watch_notice where frequency = '$this->frequency'";

#		echo "sql = '$sql'<BR>";

        $result = pg_exec($this->dbh, $sql);
		if ($result) {
			$numrows = pg_numrows($result);
			if ($numrows == 1) {
#				echo "fetched by Frequency succeeded<BR>";
				$myrow = pg_fetch_array ($result, 0);
				$this->_PopulateValues($myrow);
			}
		}
        return $this->id;
	}
}

?>