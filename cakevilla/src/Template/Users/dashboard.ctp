<div class="row">
<br><br>
    <div class="col-md-6 offset-md-4">
    	<div class="jumbotron">
            <h3>Album Added</h3>
           <?php $count = 0;
                 foreach ($albums as $key => $album) { 
                     $count++; } ?> <p><?= $count; ?></p>
                   
        </div>




    </div>
    <div class="col-md-6 offset-md-4">
        <div class="jumbotron">
            <h3>Gallery Added</h3>
             <?php $count = 0;
                 foreach ($galleries as $key => $galleries) { 
                     $count++; } ?> <p><?= $count; ?></p>
        </div>
    </div>
</div>