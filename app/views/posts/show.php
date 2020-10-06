<?php include_once APPROOT . '/views/inc/header.php'; ?>
<div class="mt-5">

<div class="antialiased flex justify-center items-center  ">
  <div class=" flex rounded-lg bg-white shadow-lg overflow-hidden">
    <div class="p-4">
      <div class="flex justify-between">
      <div class="text-purple-400 uppercase tracking-wider text-2xl"><?php echo $data['post']->title; ?></div>
      </div>
      <div class="text-3xl text-purple-900">
      <img class="imgage-detail max-w-full object-cover" src="../../../public/uploads/<?php echo $data['post']->image; ?>"
            alt="Profile picture" />
      </div>
     
    </div>
  </div>

</div>





</div <?php include_once APPROOT . '/views/inc/footer.php'; ?>