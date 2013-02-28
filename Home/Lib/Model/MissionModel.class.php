<?php

class MissionModel extends RelationModel
{
    protected $_link = array(
        'Missioninfo' => array(
            'mapping_type' => HAS_MANY,
            'class_name' => 'Missioninfo',
            'foreign_key' => 'mission_id',
            'mapping_name' => 'Info',
        ),
    );
}