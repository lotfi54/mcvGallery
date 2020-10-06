 <?php
include_once APPROOT . '/views/inc/header.php';
?>




   <div class="flex justify-center  flex-wrap  mt-10">
   <!-- card 1 -->
   <?php foreach ($data['posts'] as $post) : ?>

   <div class="cards flex lg:w-1/4  mx-2 my-2 ">
        
   <div class="card-tail w-full  mx-auto max-w-xs rounded-lg overflow-hidden shadow-sm my-2 bg-white">
   <div class="relative  mb-0">
   <a href="<?php echo URLROOT; ?>posts/show/<?php echo $post->id ?>">
         <img class="imgage-detail max-w-full object-cover" src="uploads/<?php echo $post->image; ?>"
            alt="Profile picture" />
         </a>
         <div class="text-center absolute w-full" style="bottom: -30px">
            <div class="mb-5">
               <p class="text-white tracking-wide uppercase text-lg font-bold"><?php echo $post->title ?></p>
               
            </div>
         </div>
      </div>
   </div>
</div>
<?php endforeach; ?>
</div>

   </div>


   <?php
include_once APPROOT . '/views/inc/footer.php';
?>






