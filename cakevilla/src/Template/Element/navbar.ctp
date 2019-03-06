<div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
           <?php $loginUser = $this->request->getSession()->read('Auth.User') ?>
             <?php if($loginUser) { ?>
  
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
         <ul class="nav navbar-nav">
          <li><a href="dashboard" class="navbar-brand">Dashboard</a></li>
          <li><a href="addalbum" class="navbar-brand">ADD Album</a></li>
          <li><a href="listalbum" class="navbar-brand">List Album</a></li>
          <li><a href="addgallery" class="navbar-brand">ADD Gallery</a></li>
          <li><a href="listgallery" class="navbar-brand">List Gallery</a></li>
        </ul>
          <ul class="nav navbar-nav navbar-right">
            
                  <li><?php echo $this->Html->link('Logout',['action'=>'Logout']); ?></li>
            <li><a href="register">Registeration</a></li>
            <?php  } else { ?>
                   <!--  <li><?php echo $this->Html->link('Login1',['action'=>'Login']); ?></li> -->
            <?php } ?>
          </ul>

        </div>
      </div>
    </div>