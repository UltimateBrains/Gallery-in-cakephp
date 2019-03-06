 

 <br><br>
 <div class="col-md-6 ></div>
  <div class="col-md-6">
  	<?php echo $this->Flash->render();  ?>
      <div class="panel panel-default">
       <div class="panel-body">
    	<?php echo $this->Form->create(null,['type' => 'file']);

    	 ?>
		   <div class="form-group">
		  <?php $count = 1;
				foreach ($albums as $key => $album) { 
				$options[] = [['text' => $album->AlbumName, 'value' => $album->AlbumId]];}		     
				echo $this->Form->select('album', $options,['class'=>'form-control']);?>
 		    </div>
		<div class="form-group">
		<?php  echo $this->Form->control('file', ['type' => 'file',"class"=>"form-control" ]);?>
		</div>
				<?php echo  $this->Form->button('Add Gallery',['class'=>'btn btn-info']);			
				  echo $this->Form->end();
				?>
      </div>
  </div>
</div>