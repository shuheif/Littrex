<div class="top-bar-section">
    <ul class="left">
        <?php if($auth->user('role') == 1 || $auth->user('role') == 5): ?>
        <li><?= $this->Html->link(__('Courses'), ['controller' => 'Courses', 'action' => 'index']) ?></lI>
		<li><?= $this->Html->link(__('Clubs'), ['controller' => 'Clubs', 'action' => 'index']) ?></lI>
		<li><?= $this->Html->link(__('Information'), ['controller' => 'Informations', 'action' => 'index']) ?></lI> 
		<li><?= $this->Html->link(__('Users'), ['controller' => 'Users', 'action' => 'index']) ?></lI>
        <?php else: ?>
		<li><?= $this->Html->link(__('Courses'), ['controller' => 'Courses', 'action' => 'myCourses']) ?></lI>
		<li><?= $this->Html->link(__('Clubs'), ['controller' => 'Clubs', 'action' => 'myClubs']) ?></lI>
		<li><?= $this->Html->link(__('Information'), ['controller' => 'Informations', 'action' => 'index']) ?></lI> 
        <li><?= $this->Html->link(__('Profile'), ['controller' => 'Users', 'action' => 'view', $auth->user('id')]) ?></lI>
        <?php endif; ?>
	</ul>
    <ul class="right">
        <?php if (!empty($auth->user())): ?>
        <li><?= h("Hi, " . $auth->user('first_name')) ?></li>
	    <li><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
        <?php else: ?>
		<li><?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login']) ?></li>
        <?php endif; ?>
    </ul>
</div>
