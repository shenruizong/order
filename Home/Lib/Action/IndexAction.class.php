<?php

// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {

    public function index() {
        if (!$_SESSION) {
            session("id", "2");
            session("nickname", "bbc");
        }
        $this->display();
    }
    public function gone()
    {
        foreach ($_SESSION as $k => $v) {
            unset($_SESSION[$k]);
        }
        $this->redirect('index');
    }

}
