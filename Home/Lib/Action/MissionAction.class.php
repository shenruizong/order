<?php

class MissionAction extends Action {

    function GetMission() {
        if ($_GET["id"]) {
            $missionDb = D("Mission");
            $mission = $missionDb->relation(TRUE)->where("agent_id ='" . $_GET["id"] . "'")->select();
            if ($mission) {
                $this->assign("mission", $mission);
                dump($mission);
                $this->display();
            } else {
                dump($messionDb);
            }
        }
    }

    function AcceptMission() {
        if ($_GET["id"]) {
            $AcceptMissionDb = M("acceptmission");
            $AcceptMission = $AcceptMissionDb->where("user_id ='" . session("id") . "' AND mission_id ='" . $_GET["id"] . "'")->select();
            if ($AcceptMission == NULL) {
                $AcceptMissionRow["mission_id"] = $_GET["id"];
                $AcceptMissionRow["user_id"] = session("id");
                $AcceptMissionRow["accept_time"] = time();
                $result = $AcceptMissionDb->add($AcceptMissionRow);
                $this->show("任务接取完毕");
            } else {
                $this->show("该任务你已经接受，不能再接取");
            }
        }
    }
    
    function ShowMyMission()
    {
        $this->display();
    }
    function ShowAllMission()
    {
        $this->display();
    }

}