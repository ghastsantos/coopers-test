<section class="todolist-section">
  <div class="container">
    <div class="todolist-content">
      <?php if(get_field('todolist_title')): ?>
        <h2 class="todolist-title">
          <?php the_field('todolist_title'); ?>
          <div class="title-line"></div>
        </h2>
      <?php endif; ?>
      
      <?php if(get_field('todolist_subtitle')): ?>
        <p class="todolist-subtitle"><?php the_field('todolist_subtitle'); ?></p>
      <?php endif; ?>
      
      <?php if(get_field('todolist_description')): ?>
        <p class="todolist-description"><?php the_field('todolist_description'); ?></p>
      <?php endif; ?>
    </div>
  </div>
</section>