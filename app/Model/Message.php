<?php
class Message extends AppModel
{
    public $tablePrefix = 'yg_';
    
    // Every pm is belongs to one sender
	public $belongsTo = array(
        'Sender' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'fields' => array(
                'Sender.id', 
                'Sender.username',
                'Sender.name',
                'Sender.role_id',
            ),
        ),
    );
    
    // Every pm can read by one Reader
    public $hasOne = array(
        'Reader' =>array(
            'foreignKey' => 'message_id',
            'className' => 'MessagesUser',
        ),
    );
    
    // Every pm has many recipient, recipients can detect by his folder
    // so if his folder fro current pm is not outbox , so he is recipient
    public $hasMany = array(
        'Recipients' =>array(
            'foreignKey' => 'message_id',
            'className' => 'MessagesUser',
            'conditions' => array('Recipients.folder <>' => 2),
            
        )
    );
    
    public $folders = array(
        '1' => 'inbox',
        '2' => 'outbox',
        '3' => 'draft',
        '4' => 'trash',
        'inbox' => '1',
        'outbox' => '2',
        'draft' => '3',
        'trash' => '4',
    );
	
	public function countNewMessages($userId)
    {
		$count = $this->find('count', array(
				'contain' => array('Reader'),
				'conditions'=>array('Reader.user_id'=>$userId, 'Reader.new' => 1, 'Reader.folder' => $this->folder['inbox'])
		));
		return $count;
	}
}
?>