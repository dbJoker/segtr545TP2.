
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <ul class="list-group">			
		<?php if ($this->Session->read('Auth.User.role') == 'admin' || $this->Session->read('Auth.User.role') == 'super-utilisateurs') {?>
                <div class="dropdown">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Course Menu')?> <span class="caret"></span></button>
                    <ul class="dropdown-menu scrollable-menu" role="menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('Edit Course'), array('action' => 'edit', $course['Course']['id']), array('class' => '')); ?> </li>
                        <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Course'), array('action' => 'delete', $course['Course']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $course['Course']['id'])); ?> </li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Courses'), array('action' => 'index'), array('class' => '')); ?> </li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('New Course'), array('action' => 'add'), array('class' => '')); ?> </li>
                    </ul>
                </div>          
                    <?php }else{ ?>

                <li class="list-group-item"><?php echo $this->Html->link(__('List Courses'), array('action' => 'index'), array('class' => '')); ?> </li>

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
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Rooms Menu')?> <span class="caret"></span></button>
                    <ul class="dropdown-menu scrollable-menu" role="menu">

                        <li class="list-group-item"><?php echo $this->Html->link(__('List Rooms'), array('controller' => 'rooms', 'action' => 'index'), array('class' => '')); ?></li> 
                        <?php if ($this->Session->read('Auth.User.role') == 'admin') {?>
                        <li class="list-group-item"><?php echo $this->Html->link(__('New Rooms'), array('controller' => 'rooms', 'action' => 'add'), array('class' => '')); ?></li> 
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

        <div class="courses view">

            <h2><?php  echo __('Course'); ?></h2>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Name'); ?></strong></td>
                            <td>
			<?php echo h($course['Course']['name']); ?>
                                &nbsp;
                            </td>
                        </tr>	
                    <tr>		<td><strong><?php echo __('Professeur'); ?></strong></td>
                            <td>
			<?php echo h($course['Course']['professeur']); ?>
                                &nbsp;
                            </td>
                        </tr></tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


        <div class="related">

            <h3><?php echo __('Related Rooms'); ?></h3>

				<?php if (!empty($course['Room'])): ?>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <!--<th><?php// echo __('Id'); ?></th>-->
                            <th><?php echo __('Number'); ?></th>
                            <th><?php echo __('Floor'); ?></th>
                            <!--<th><?php// echo __('Course Id'); ?></th>-->
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
									<?php
										$i = 0;
										foreach ($course['Room'] as $room): ?>
                        <tr>
                            <!--<td><?php// echo $room['id']; ?></td>-->
                            <td><?php echo $room['number']; ?></td>
                            <td><?php echo $room['floor']; ?></td>
                            <!--<td><?php// echo $room['course_id']; ?></td>-->
                            <td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'rooms', 'action' => 'view', $room['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'rooms', 'action' => 'edit', $room['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'rooms', 'action' => 'delete', $room['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $room['id'])); ?>
                            </td>
                        </tr>
	<?php endforeach; ?>
                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

				<?php endif; ?>


            <div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Room'), array('controller' => 'rooms', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->

        </div><!-- /.related -->


        <div class="related">

            <h3><?php echo __('Related Years'); ?></h3>

				<?php if (!empty($course['Year'])): ?>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo __('Yearname'); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
									<?php
										$i = 0;
										foreach ($course['Year'] as $year): ?>
                        <tr>
                            <td><?php echo $year['yearname']; ?></td>
                            <td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'years', 'action' => 'view', $year['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'years', 'action' => 'edit', $year['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'years', 'action' => 'delete', $year['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $year['id'])); ?>
                            </td>
                        </tr>
	<?php endforeach; ?>
                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

				<?php endif; ?>


            <div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Year'), array('controller' => 'years', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->

        </div><!-- /.related -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
