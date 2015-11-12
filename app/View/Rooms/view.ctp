
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
		
                <?php if ($this->Session->read('Auth.User.role') == 'admin') {?>
                <div class="dropdown">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Rooms Menu')?> <span class="caret"></span></button>
                <ul class="dropdown-menu scrollable-menu" role="menu">
                   <li class="list-group-item"><?php echo $this->Html->link(__('Edit Room'), array('action' => 'edit', $room['Room']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Room'), array('action' => 'delete', $room['Room']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $room['Room']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Rooms'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Room'), array('action' => 'add'), array('class' => '')); ?> </li>
                    </ul>
                </div>                    
                <?php }else { ?>
                <li class="list-group-item"><?php echo $this->Html->link(__('List Rooms'), array('action' => 'index'), array('class' => '')); ?> </li>

                <?php } ?>
                
                 <div class="dropdown">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Schools Menu')?> <span class="caret"></span></button>
                <ul class="dropdown-menu scrollable-menu" role="menu">
                    <li class="list-group-item"><?php echo $this->Html->link(__('List Schools'), array('controller' => 'schools', 'action' => 'index'), array('class' => '')); ?></li> 
			<?php if ($this->Session->read('Auth.User.role') == 'admin') {?>
                    <li class="list-group-item"><?php echo $this->Html->link(__('New Schools'), array('controller' => 'schools', 'action' => 'add'), array('class' => '')); ?></li> 
                    <?php } ?>			
                    </ul>
            </div>
			<div class="dropdown">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Years Menu')?> <span class="caret"></span></button>
                <ul class="dropdown-menu scrollable-menu" role="menu">
                        
				<li class="list-group-item"><?php echo $this->Html->link(__('List Years'), array('controller' => 'years', 'action' => 'index'), array('class' => '')); ?></li> 
				<?php if ($this->Session->read('Auth.User.role') == 'admin') {?>
                                <li class="list-group-item"><?php echo $this->Html->link(__('New Years'), array('controller' => 'years', 'action' => 'add'), array('class' => '')); ?></li> 
                    <?php } ?>
                    </ul>
                </div>
                        
                <div class="dropdown">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Course Menu')?> <span class="caret"></span></button>
                <ul class="dropdown-menu scrollable-menu" role="menu">
                        
				<li class="list-group-item"><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index'), array('class' => '')); ?></li> 
				<?php if ($this->Session->read('Auth.User.role') == 'admin') {?>
                                <li class="list-group-item"><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add'), array('class' => '')); ?></li> 
                    <?php } ?>
                    </ul>
                </div>

<?php if ($this->Session->read('Auth.User.role') == 'admin') {?>
                            
                <div class="dropdown">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Users Menu')?> <span class="caret"></span></button>
                    <ul class="dropdown-menu scrollable-menu" role="menu">
                       
		<li class="list-group-item"><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('Add User'), array('controller' => 'users','action' => 'add'), array('class' => '')); ?> </li>
                    </ul>
                </div>
                <?php } ?> 
                
				
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="rooms view">

			<h2><?php  echo __('Room'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Number'); ?></strong></td>
		<td>
			<?php echo h($room['Room']['number']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Floor'); ?></strong></td>
		<td>
			<?php echo h($room['Room']['floor']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Course'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($room['Course']['name'], array('controller' => 'courses', 'action' => 'view', $room['Course']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
