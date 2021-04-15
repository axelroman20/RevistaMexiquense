<div class="row justify-content-center">

    <div class="col">
      <div class="card bg-dark text-white">
        <a href="publications/single?article=<?php echo $post->id; ?>" style="color: #fff;">
          <div class="card-img-overlay" style="background: #00000080;">
            <h5 class="card-title"><?php echo $post->title; ?></h5>
            <p class="card-text"><?php echo $post->description; ?></p>
            <p class="card-text"><?php echo getDateFilter($post->created_at); ?></p>
          </div>
          <img src="<?php echo UPLOADS.$post->user.'/'.$post->thumb; ?>" class="card-img" height="400">
        </a>
      </div>
    </div>
  
</div>