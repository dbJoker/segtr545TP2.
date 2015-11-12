<div class="container">
     <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <ul class="list-group">	
                
                <div class="dropdown">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Schools Menu') ?> <span class="caret"></span></button>
                    <ul class="dropdown-menu scrollable-menu" role="menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List schools'), array('controller' => 'schools', 'action' => 'index'), array('class' => '')); ?></li> 
                        <?php if ($this->Session->read('Auth.User.role') == 'admin') { ?>
                            <li class="list-group-item"><?php echo $this->Html->link(__('New Schools'), array('controller' => 'schools', 'action' => 'add'), array('class' => '')); ?></li> 
                        <?php } ?>			
                    </ul>
                </div>
                <div class="dropdown">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Years Menu') ?> <span class="caret"></span></button>
                    <ul class="dropdown-menu scrollable-menu" role="menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Years'), array('controller' => 'years', 'action' => 'index'), array('class' => '')); ?></li> 
                        <?php if ($this->Session->read('Auth.User.role') == 'admin') { ?>
                            <li class="list-group-item"><?php echo $this->Html->link(__('New Years'), array('controller' => 'years', 'action' => 'add'), array('class' => '')); ?></li> 
                        <?php } ?>				
                    </ul>
                </div>
                <div class="dropdown">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Course Menu') ?> <span class="caret"></span></button>
                    <ul class="dropdown-menu scrollable-menu" role="menu">

                        <li class="list-group-item"><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index'), array('class' => '')); ?></li> 
                        <?php if ($this->Session->read('Auth.User.role') == 'admin') { ?>
                            <li class="list-group-item"><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add'), array('class' => '')); ?></li> 
                        <?php } ?>
                    </ul>
                </div>

                <div class="dropdown">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Rooms Menu') ?> <span class="caret"></span></button>
                    <ul class="dropdown-menu scrollable-menu" role="menu">

                        <li class="list-group-item"><?php echo $this->Html->link(__('List Rooms'), array('controller' => 'rooms', 'action' => 'index'), array('class' => '')); ?></li> 
                        <?php if ($this->Session->read('Auth.User.role') == 'admin') { ?>
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
    
    
    
  <div class="jumbotron">
    <h1>Tristan Séguin-Chouinard</h1> 
    <p>420-267 MO Développer un site Web et une application pour Internet.</p>
    <p>Automne 2015, Collège Montmorency.</p>
  </div>

    <p><strong>Téléversement d'images : </strong><br>
        Pour le téléversement d'image, vous devez être connecté en tant qu'admin afin d'accèder à la vue add de school.<br>
        (exemple d'utilisateur admin : nom : admin / mot de passe : admin).<br>
        Donc, dans le menu déroulant, Schools Menu > new schools</p> 
		
    <p><strong>Les listes liées</strong><br>
        Pour les listes liées, vous devez être connecté en tant qu'admin afin d'accèder à la vue add de school.<br>
        (exemple d'utilisateur admin : nom : admin / mot de passe : admin).<br>
        Donc, dans le menu déroulant > Schools Menu > new schools<br>
        </p> 
        
        <p><strong>l'auto complet</strong><br>
        Pour l'autocomplet, vous devez être connecté en tant qu'admin ou super utilisateur (accompte active) afin d'accèder à la vue add de Course.<br>
        (exemple d'utilisateur admin : nom : admin / mot de passe : admin).<br>
        Donc, dans le menu déroulant > Course Menu > new Course<br>
        </p> 
        
        <p><strong>Pour la verification par e-mail</strong><br>
        Lorsque vous vous enregistré, un e-mail est envoyer a votre e-mail. Un lien permet d'activer votre compte ce qui permet d'ajouter un cours<br>
        (menu déroulant > Course Menu > new Course)<br>
        si vous n'êtes pas activé, un message vous indiquera de vous activé dans tout les index et vous ne pourrez pas créer un nouveau cours.</p> 

  <br>
  <a href="http://www.databaseanswers.org/data_models/educational_networks/index.htm">http://www.databaseanswers.org/data_models/educational_networks/index.htm</a>
  <br><br>
  <img src="http://www.databaseanswers.org/data_models/educational_networks/images/educational_networks_with_inheritance_model.gif" alt="Mountain View" style="width:750px;height:600px;">
</div>