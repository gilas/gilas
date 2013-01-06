<?php
class MessagesUser extends AppModel
{
    public $tablePrefix = 'yg_';
	public $name = "MessagesUser";
    public $belongsTo = array(
        'Recipient' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'fields' => array('Recipient.id', 'Recipient.username', 'Recipient.name','Recipient.role_id')
        ),
        'Message' => array(
            'className' => 'Message',
            'foreignKey' => 'message_id',
        )
    );
 }
?>