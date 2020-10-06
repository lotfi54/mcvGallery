<?php include_once APPROOT . '/views/inc/header.php';?>


<div class="row">
    
<div class="col-lg-8 mx-auto mt-10">
        <div class="card card-body  p-3">
        <h2 class="text-center">Ajouter une image à votre gallerie</h2>
        
            <form action="<?php  echo URLROOT ;?>dashboards/update/<?php echo $data['id'] ?>" method="POST" enctype="multipart/form-data"> 
            <!-- name -->
                <div class="form-group">
                    <span for="name">Nom<sup>*</sup></span>
                    <input type="text" name="title" value="<?php echo $data['title'];?>" placeholder="title ..." class="form-control form-control-lg <?php echo (!empty($data['title_err']) ? 'is-invalid' : '') ?>">
                </div>
                <div class="custom-file">
                    <input type="file" value="<?php echo $data['image']; ?>" class="custom-file-input form-control form-control-lg <?php echo(!empty($data['image_err']) ? 'is-invalid' : '') ?>" id="chooseFile" name="image">
                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                    <span class="invalid-feedback"><?php echo $data["image_err"] ?></span>
                </div>
                <div class="text-center mt-4">
                    <input type="submit" value="Validé" class="btn btn-xl btn-success">
                </div>
            </form>
        </div>
    </div>

    <div class="col-lg-4 mt-10">
    <div class="user-image mb-3 text-center">
    <div style="width: 300px; height: 300px; overflow: hidden; background: #fff; border:1px solid black; margin: 0 auto">
      <img src="..." class="figure-img img-fluid rounded" id="imgPlaceholder" alt="">
    </div>
  </div>
   
</div>
</div>



<?php include_once APPROOT . '/views/inc/footer.php';?>
