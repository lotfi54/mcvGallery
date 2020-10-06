<?php include_once APPROOT . '/views/inc/header.php';?>



<?php if (isset($_SESSION['user_id'])): ?>  

<div class="flex justify-center  flex-wrap  mt-6">
<?php foreach ($data['posts'] as $post) : ?>
<div class=" flex lg:w-1/4  mx-2 my-2 ">
    <div class="cards mx-auto max-w-xs rounded-lg overflow-hidden shadow-lg my-2 bg-white">
      <div class="relative mb-0">
         <img class="imgage-detail w-full object-cover" src="../../../public/uploads/<?php echo $post->image; ?>"
            alt="Profile picture" />
         <div class="text-center absolute w-full" style="bottom: 30px">
            <div class="mb-0">
               <p class="text-white tracking-wide uppercase text-lg font-bold"><?php echo $post->title ?></p>

        </div>  
         </div>
      </div>
      <div class="sup-edit py-1 absolute px-0 text-center tracking-wide grid grid-cols-3 gap-6">
  
        <div class="flex-1 justify-beteween">
        <a href="<?php echo URLROOT; ?>dashboards/delete/<?php echo $post->id ?>">
         <div class="following  ">
            
            <p class="icon text-gray-400  text-sm  mt-2 ">
            <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M19 7L18.1327 19.1425C18.0579 20.1891 17.187 21 16.1378 21H7.86224C6.81296 21 5.94208 20.1891 5.86732 19.1425L5 7M10 11V17M14 11V17M15 7V4C15 3.44772 14.5523 3 14 3H10C9.44772 3 9 3.44772 9 4V7M4 7H20" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>

            </p>
         </div>
</a>
<a href="<?php echo URLROOT; ?>dashboards/update/<?php echo $post->id ?>">
         <div class="following ">
            
            <p class="icon text-gray-400   text-sm  mt-2">
            <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M15.2322 5.23223L18.7677 8.76777M16.7322 3.73223C17.7085 2.75592 19.2914 2.75592 20.2677 3.73223C21.244 4.70854 21.244 6.29146 20.2677 7.26777L6.5 21.0355H3V17.4644L16.7322 3.73223Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>


            </p>
         </div>
</a>
      </div>
        </div>
   </div>
</div>
<?php endforeach; ?>

</div>
<?php else: ?> 

   <h2>Erreur 404</h2>
<?php endif; ?>  
<?php include_once APPROOT . '/views/inc/footer.php';?>


