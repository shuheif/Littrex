public User extends AppModel{
	$actsAs = array(
		'Notification.Notifiable' => array(
			'subjects' => array('User', 'Post', 'Comment')
		)
	);
}
