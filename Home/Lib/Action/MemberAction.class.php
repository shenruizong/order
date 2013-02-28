<?php

class MemberAction extends Action {

    //添加代理人
    function AddMember() {
        $user = M("user");
        $id = $user->getField("id");
        if ($id == null) {
            $this->error("无此代理人存在");
        } else {
            if ($this->AddBinding($id)) {
                $this->success("绑定成功");
            } else {
                $this->error("绑定失败，你已经与该代理人绑定了");
            }
        }
    }

    //添加绑定代理人
    private function AddBinding($id) {
        $binding = M("binding");
        if (session("id")) {
            $Abinding = $binding->where("agent_id='" + $id + "' AND user_id='" + session("id") + "'")->find();
            if ($Abinding == NULL) {
                $row["agent_id"] = $id;
                $row["user_id"] = session("id");
                $binding->add($row);
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

//删除绑定
    function DelBinding() {
        $agent_id = $_GET["agent_id"];
        $user_id = $_GET["user_id"];
        $binding = M("binding");
        if ($binding->where("agent_id='" + $agent_id + "' AND user_id='" + $user_id + "'")->delete()) {
            $this->success("删除成功。正在返回");
        } else {
            $this->error($binding->getError());
        }
    }

    function ShowMember() {
        $binding = D("binding");
        $result = $binding
                        ->field('w37_user.id,w37_user.openid,w37_user.nickname,w37_user.logoncount,w37_user.create_time,w37_user.last_time')
                        ->join('INNER JOIN w37_user ON w37_binding.user_id = w37_user.id')
                        ->where("w37_binding.agent_id ='" . session("id") . "'")->select();
        $this->assign("user", $result);
        $this->display();
    }

    function ShowAgent() {
        $binding = M("binding");
        $result = $binding->
                        field("w37_user.id,w37_user.openid,w37_user.nickname,w37_user.logoncount,w37_user.create_time,w37_user.last_time")
                        ->join("INNER JOIN w37_user ON w37_binding.agent_id = w37_user.id")
                        ->where("w37_binding.user_id ='" . session("id") . "'")->select();
        $this->assign("agent",$result);
        $this->display();
    }

}
