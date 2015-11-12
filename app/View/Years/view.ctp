
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <ul class="list-group">		

                <div class="dropdown">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Years Menu')?> <span class="caret"></span></button>
                    <ul class="dropdown-menu scrollable-menu" role="menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('Edit Year'), array('action' => 'edit', $year['Year']['id']), array('class' => '')); ?> </li>
                        <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Year'), array('action' => 'delete', $year['Year']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $year['Year']['id'])); ?> </li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Years'), array('action' => 'index'), array('class' => '')); ?> </li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('New Year'), array('action' => 'add'), array('class' => '')); ?> </li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Schools Menu')?> <span class="caret"></span></button>
                    <ul class="dropdown-menu scrollable-menu" role="menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Schools'), array('controller' => 'schools', 'action' => 'index'), array('class' => '')); ?></li> 
                        <li class="list-group-item"><?php echo $this->Html->link(__('New School'), array('controller' => 'schools', 'action' => 'add'), array('class' => '')); ?></li> 
                    </ul>
                </div>
                <div class="dropdown">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Courses Menu')?> <span class="caret"></span></button>
                    <ul class="dropdown-menu scrollable-menu" role="menu">

                        <li class="list-group-item"><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index'), array('class' => '')); ?></li> 
                        <li class="list-group-item"><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add'), array('class' => '')); ?></li> 
                    </ul>
                </div>

                <div class="dropdown">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Rooms Menu')?> <span class="caret"></span></button>
                    <ul class="dropdown-menu scrollable-menu" role="menu">

                        <li class="list-group-item"><?php echo $this->Html->link(__('List Rooms'), array('controller' => 'rooms', 'action' => 'index'), array('class' => '')); ?></li> 
                        <li class="list-group-item"><?php echo $this->Html->link(__('New Rooms'), array('controller' => 'rooms', 'action' => 'add'), array('class' => '')); ?></li> 
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

        <div class="years view">

            <h2><?php  echo __('Year'); ?></h2>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Yearname'); ?></strong></td>
                            <td>
			<?php echo h($year['Year']['yearname']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('School'); ?></strong></td>
                            <td>
			<?php echo $this->Html->link($year['School']['name'], array('controller' => 'schools', 'action' => 'view', $year['School']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr>					</tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


        <div class="related">

            <h3><?php echo __('Related Courses'); ?></h3>

				<?php if (!empty($year['Course'])): ?>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo __('Name'); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
									<?php
										$i = 0;
										foreach ($year['Course'] as $course): ?>
                        <tr>
                            <td><?php echo $course['name']; ?></td>
                            <td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'courses', 'action' => 'view', $course['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'courses', 'action' => 'edit', $course['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'courses', 'action' => 'delete', $course['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $course['id'])); ?>
                            </td>
                        </tr>
	<?php endforeach; ?>
                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

				<?php endif; ?>


            <div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Course'), array('controller' => 'courses', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->

        </div><!-- /.related -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
