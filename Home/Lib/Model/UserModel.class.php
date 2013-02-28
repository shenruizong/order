<?php

class UserModel extends RelationModel
{
    protected $_link = array(
        'Binding' => array(
            'mapping_type' => HAS_MANY,
            'class_name' => 'Binding',
            'foreign_key' => 'agent_id',
            //'parent_key' => 'user_id',
            'mapping_name' => 'Member',
        ),
    );
}