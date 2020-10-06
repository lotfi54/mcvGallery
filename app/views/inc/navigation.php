
<nav class="navbar navbar-expand-lg navbar-light bg-light">
 <div class="container">
 <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo APPNAME; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
  
    <ul class="navbar-nav ml-auto m-2">
           
                
                <?php if(isset($_SESSION['user_id'])): ?>
                  <span class="info mr-3 align-self-center "> <?php echo $_SESSION['user_name'] ?></span>
                  <li class="btn btn-secondary mr-3"><a href="<?php echo URLROOT; ?>dashboards/index">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M4 16L8.58579 11.4142C9.36683 10.6332 10.6332 10.6332 11.4142 11.4142L16 16M14 14L15.5858 12.4142C16.3668 11.6332 17.6332 11.6332 18.4142 12.4142L20 14M14 8H14.01M6 20H18C19.1046 20 20 19.1046 20 18V6C20 4.89543 19.1046 4 18 4H6C4.89543 4 4 4.89543 4 6V18C4 19.1046 4.89543 20 6 20Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>

                </a></li>
                  <li class="btn btn-secondary mr-3"><a href="<?php echo URLROOT; ?>dashboards/add">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 16L4 17C4 18.6569 5.34315 20 7 20L17 20C18.6569 20 20 18.6569 20 17L20 16M16 8L12 4M12 4L8 8M12 4L12 16" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </a>
              </li>
                <li class="btn btn-danger"><a href="<?php echo URLROOT; ?>users/logout">Logout</a></li>
               
                
                <?php
                else :?> 
                <li class="btn btn-secondary ml-3 "><a href="<?php  echo URLROOT; ?>users/login">Connexion</a></li>
                <li class="btn btn-secondary  ml-3"><a href="<?php  echo URLROOT; ?>users/register">Inscription</a></li>  
                
              <?php endif;?>
                
        </ul>
  </div>
  </div>
</nav>
</body>
</html>