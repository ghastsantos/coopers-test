<section class="carousel-section">
  <div class="container">
    <div class="carousel-wrapper">
      
      <!-- Left Side - Title and Background -->
      <div class="carousel-left">
        <div class="carousel-title-wrapper">
          <?php if(get_field('carousel_title')): ?>
            <h2 class="carousel-title"><?php the_field('carousel_title'); ?></h2>
          <?php else: ?>
            <h2 class="carousel-title">good things</h2>
          <?php endif; ?>
        </div>
        
        <!-- Background Image -->
        <?php 
        $carousel_bg_image = get_field('carousel_background_image');
        if($carousel_bg_image): ?>
          <div class="carousel-bg-image">
            <img src="<?php echo esc_url($carousel_bg_image['url']); ?>" alt="<?php echo esc_attr($carousel_bg_image['alt']); ?>">
          </div>
        <?php endif; ?>
      </div>
      
      <!-- Right Side - Carousel -->
      <div class="carousel-right">
        <?php if(have_rows('carousel_items')): ?>
          <div class="carousel-container">
            <div class="carousel-track" id="carouselTrack">
              <?php 
              $slide_index = 0;
              while(have_rows('carousel_items')): the_row(); 
                $image = get_sub_field('image');
                $function_text = get_sub_field('function_text');
                $title = get_sub_field('title');
                $description = get_sub_field('description');
                $button_text = get_sub_field('button_text');
                $button_url = get_sub_field('button_url');
              ?>
                <div class="carousel-slide <?php echo $slide_index === 0 ? 'active' : ''; ?>" data-slide="<?php echo $slide_index; ?>">
                  <div class="carousel-card">
                    
                    <!-- Card Image -->
                    <?php if($image): ?>
                      <div class="card-image">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                      </div>
                    <?php endif; ?>
                    
                    <!-- Card Content -->
                    <div class="card-content">
                      
                      <!-- Function Tag -->
                      <?php if($function_text): ?>
                        <div class="card-function">
                          <span class="function-tag"><?php echo esc_html($function_text); ?></span>
                        </div>
                      <?php endif; ?>
                      
                      <!-- Title -->
                      <?php if($title): ?>
                        <h3 class="card-title"><?php echo esc_html($title); ?></h3>
                      <?php endif; ?>
                      
                      <!-- Description -->
                      <?php if($description): ?>
                        <p class="card-description"><?php echo esc_html($description); ?></p>
                      <?php endif; ?>
                      
                      <!-- Button -->
                      <?php if($button_text): ?>
                        <div class="card-footer">
                          <a href="<?php echo esc_url($button_url ?: '#'); ?>" class="card-button">
                            <?php echo esc_html($button_text); ?>
                          </a>
                        </div>
                      <?php endif; ?>
                      
                    </div>
                  </div>
                </div>
              <?php 
                $slide_index++;
                endwhile; 
              ?>
            </div>
            
            <!-- Carousel Navigation Dots -->
            <div class="carousel-nav">
              <?php 
              $total_slides = 0;
              if(have_rows('carousel_items')):
                while(have_rows('carousel_items')): the_row();
                  $total_slides++;
                endwhile;
              endif;
              
              for($i = 0; $i < $total_slides; $i++): ?>
                <button class="nav-dot <?php echo $i === 0 ? 'active' : ''; ?>" 
                        data-slide="<?php echo $i; ?>" 
                        aria-label="Slide <?php echo $i + 1; ?>">
                </button>
              <?php endfor; ?>
            </div>
            
          </div>
        <?php else: ?>
          <!-- Default content if no ACF fields -->
          <div class="carousel-container">
            <div class="carousel-track" id="carouselTrack">
              
              <!-- Default Slide 1 -->
              <div class="carousel-slide active" data-slide="0">
                <div class="carousel-card">
                  <div class="card-image">
                    <div class="placeholder-image"></div>
                  </div>
                  <div class="card-content">
                    <div class="card-function">
                      <span class="function-tag">function</span>
                    </div>
                    <h3 class="card-title">Organize your daily job enhance your life performance</h3>
                    <div class="card-footer">
                      <a href="#" class="card-button">read more</a>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Default Slide 2 -->
              <div class="carousel-slide" data-slide="1">
                <div class="carousel-card">
                  <div class="card-image">
                    <div class="placeholder-image"></div>
                  </div>
                  <div class="card-content">
                    <div class="card-function">
                      <span class="function-tag">function</span>
                    </div>
                    <h3 class="card-title">Mark one activity as done makes your brain understand the power of doing.</h3>
                    <div class="card-footer">
                      <a href="#" class="card-button">read more</a>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Default Slide 3 -->
              <div class="carousel-slide" data-slide="2">
                <div class="carousel-card">
                  <div class="card-image">
                    <div class="placeholder-image"></div>
                  </div>
                  <div class="card-content">
                    <div class="card-function">
                      <span class="function-tag">function</span>
                    </div>
                    <h3 class="card-title">Careful! You understand the difference between a list and a list of desires.</h3>
                    <div class="card-footer">
                      <a href="#" class="card-button">read more</a>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            
            <!-- Default Navigation Dots -->
            <div class="carousel-nav">
              <button class="nav-dot active" data-slide="0" aria-label="Slide 1"></button>
              <button class="nav-dot" data-slide="1" aria-label="Slide 2"></button>
              <button class="nav-dot" data-slide="2" aria-label="Slide 3"></button>
            </div>
            
          </div>
        <?php endif; ?>
      </div>
      
    </div>
  </div>
</section>