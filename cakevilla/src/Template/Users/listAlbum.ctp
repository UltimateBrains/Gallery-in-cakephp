<br><br>
<div class="row">
<div class="panel panel-success">
 <div class="panel-body">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Album ID</th>
        <th>Album Name</th>
      </tr>
    </thead>
    <tbody>
 <?php 
    $count = 1;
    foreach ($albums as $key => $album) { ?>
       <tr>
        <td><?= $count++; ?></td>
        <td><?= $album->AlbumId; ?></td>
        <td><?= $album->AlbumName; ?></td>
    
  <?php } ?>
    </tbody>
  </table>
  </div>
</div>
</div>