<?php $loginUser = $this->request->getSession()->read('Auth.User') ?>
 <br><br>
    <?php if($loginUser) { ?> 
    	 <div class="col-md-4 offset-md-2">
			<div class="jumbotron">
           <h4>Please Logged out this session for this <span></span><b><?php echo $loginUser['name'] ?> </b></h4>
       <?php  } else {  ?>
  
			</div> 
		</div> 
<div class="row">
	<br><br>
	<div class="col-md-4 offset-md-4"></div>
	<div class="col-md-4 offset-md-4">
		<?php echo $this->Flash->render();  ?>
		<div class="card">
			<div class="card-header">
			<div class="card-body">
				<?php echo $this->Form->create(); ?>
				<div class="form-group">
				    <?php  echo $this->Form->input('email',['class'=>'form-control']);?>
				</div>
				<div class="form-group">
				    <?php  echo $this->Form->input('password',['class'=>'form-control']);?>
				</div>
				<?php 
				  echo  $this->Form->button('Login',['class'=>'btn btn-primary']);
				  echo "<span> </span>";
				  echo  $this->Html->link('Register',['action'=>'register'],['class'=>'btn btn-success']);
				  echo $this->Form->end();
				?>


			</div>			
		</div>
	</div>
</div>

</div><?php       } ?>
