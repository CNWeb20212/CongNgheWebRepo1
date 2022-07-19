<?php

class team extends database{
	public $teamid, $name, $create_time, $member, $request

	public function getTeam($teamid){
		$query = "select * from team WHERE team.id = '$teamid'";
		$table = $this->query($query);
		$res = array();
		while ($row = $table->fetch_assoc()){
			array_push($res, $row); // id, name, create_time
		}
		return isset($res[0]) ? $res[0] : null;
	}


}

?>



