<?php

class BindingModel extends RelationModel {

    protected $_link = array(
        'User' => array(
            'mapping_type' => HAS_MANY,
            'class_name' => 'User',
            'foreign_key' => 'id',
            'parent_key' => 'user_id',
            'mapping_name' => 'Member',
        ),
    );

}
