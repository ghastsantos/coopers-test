<section class="todolist-section">
  <div class="todolist-bg"></div>
  
  <div class="container">
    <div class="todolist-content">
      <?php if(get_field('todolist_title')): ?>
        <h2 class="todolist-title">
          <?php the_field('todolist_title'); ?>
          <div class="title-line"></div>
        </h2>
      <?php else: ?>
        <h2 class="todolist-title">
          To-do List
          <div class="title-line"></div>
        </h2>
      <?php endif; ?>
      
      <?php if(get_field('todolist_description')): ?>
        <p class="todolist-description"><?php the_field('todolist_description'); ?></p>
      <?php else: ?>
        <p class="todolist-description">Choose the right plan for you and get in touch through our contact form. We are here to help.</p>
      <?php endif; ?>
    </div>
  </div>
</section>