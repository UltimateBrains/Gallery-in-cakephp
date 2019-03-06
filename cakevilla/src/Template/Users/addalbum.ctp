    

    <br><br>
 <div class="col-md-4 offset-md-4"></div>
  <div class="col-md-4 offset-md-4">
  	<?php echo $this->Flash->render();  ?>
      <div class="panel panel-default">
       <div class="panel-body">
    	<?php echo $this->Form->create(); ?>
				<div class="form-group">
				    <?php  echo $this->Form->control('add_album',['class'=>'form-control','required']);?>
				</div>
				<?php 
				  echo  $this->Form->button('Add Album',['class'=>'btn btn-primary']);
				
				  echo $this->Form->end();
				?>
      </div>
  </div>
</div>