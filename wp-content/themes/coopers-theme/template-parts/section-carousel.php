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
        <div class="carousel-container">
          <div class="carousel-track" id="carouselTrack">
            
            <!-- Page 1 - Cards 1, 2, 3 -->
            <div class="carousel-page active" data-page="0">
              <div class="page-cards">
                
                <!-- Card 1 -->
                <div class="carousel-slide" data-slide="0">
                  <div class="carousel-card">
                    <!-- Card Image -->
                    <?php 
                    $slide_1_image = get_field('carousel_slide_1_image');
                    if($slide_1_image): ?>
                      <div class="card-image">
                        <img src="<?php echo esc_url($slide_1_image['url']); ?>" alt="<?php echo esc_attr($slide_1_image['alt']); ?>">
                      </div>
                    <?php else: ?>
                      <div class="card-image">
                        <div class="placeholder-image"></div>
                      </div>
                    <?php endif; ?>
                    
                    <!-- Card Content -->
                    <div class="card-content">
                      <!-- Function Tag -->
                      <div class="card-function">
                        <span class="function-tag"><?php echo esc_html(get_field('carousel_slide_1_function_text') ?: 'function'); ?></span>
                      </div>
                      
                      <!-- Title -->
                      <h3 class="card-title"><?php echo esc_html(get_field('carousel_slide_1_title') ?: 'Organize your daily job enhance your life performance'); ?></h3>
                      
                      <!-- Description -->
                      <?php if(get_field('carousel_slide_1_description')): ?>
                        <p class="card-description"><?php echo esc_html(get_field('carousel_slide_1_description')); ?></p>
                      <?php endif; ?>
                      
                      <!-- Button -->
                      <div class="card-footer">
                        <a href="<?php echo esc_url(get_field('carousel_slide_1_button_url') ?: '#'); ?>" class="card-button">
                          <?php echo esc_html(get_field('carousel_slide_1_button_text') ?: 'read more'); ?>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- Card 2 -->
                <div class="carousel-slide" data-slide="1">
                  <div class="carousel-card">
                    <!-- Card Image -->
                    <?php 
                    $slide_2_image = get_field('carousel_slide_2_image');
                    if($slide_2_image): ?>
                      <div class="card-image">
                        <img src="<?php echo esc_url($slide_2_image['url']); ?>" alt="<?php echo esc_attr($slide_2_image['alt']); ?>">
                      </div>
                    <?php else: ?>
                      <div class="card-image">
                        <div class="placeholder-image"></div>
                      </div>
                    <?php endif; ?>
                    
                    <!-- Card Content -->
                    <div class="card-content">
                      <!-- Function Tag -->
                      <div class="card-function">
                        <span class="function-tag"><?php echo esc_html(get_field('carousel_slide_2_function_text') ?: 'function'); ?></span>
                      </div>
                      
                      <!-- Title -->
                      <h3 class="card-title"><?php echo esc_html(get_field('carousel_slide_2_title') ?: 'Mark one activity as done makes your brain understand the power of doing.'); ?></h3>
                      
                      <!-- Description -->
                      <?php if(get_field('carousel_slide_2_description')): ?>
                        <p class="card-description"><?php echo esc_html(get_field('carousel_slide_2_description')); ?></p>
                      <?php endif; ?>
                      
                      <!-- Button -->
                      <div class="card-footer">
                        <a href="<?php echo esc_url(get_field('carousel_slide_2_button_url') ?: '#'); ?>" class="card-button">
                          <?php echo esc_html(get_field('carousel_slide_2_button_text') ?: 'read more'); ?>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- Card 3 -->
                <div class="carousel-slide" data-slide="2">
                  <div class="carousel-card">
                    <!-- Card Image -->
                    <?php 
                    $slide_3_image = get_field('carousel_slide_3_image');
                    if($slide_3_image): ?>
                      <div class="card-image">
                        <img src="<?php echo esc_url($slide_3_image['url']); ?>" alt="<?php echo esc_attr($slide_3_image['alt']); ?>">
                      </div>
                    <?php else: ?>
                      <div class="card-image">
                        <div class="placeholder-image"></div>
                      </div>
                    <?php endif; ?>
                    
                    <!-- Card Content -->
                    <div class="card-content">
                      <!-- Function Tag -->
                      <div class="card-function">
                        <span class="function-tag"><?php echo esc_html(get_field('carousel_slide_3_function_text') ?: 'function'); ?></span>
                      </div>
                      
                      <!-- Title -->
                      <h3 class="card-title"><?php echo esc_html(get_field('carousel_slide_3_title') ?: 'Careful! You understand the difference between a list and a list of desires.'); ?></h3>
                      
                      <!-- Description -->
                      <?php if(get_field('carousel_slide_3_description')): ?>
                        <p class="card-description"><?php echo esc_html(get_field('carousel_slide_3_description')); ?></p>
                      <?php endif; ?>
                      
                      <!-- Button -->
                      <div class="card-footer">
                        <a href="<?php echo esc_url(get_field('carousel_slide_3_button_url') ?: '#'); ?>" class="card-button">
                          <?php echo esc_html(get_field('carousel_slide_3_button_text') ?: 'read more'); ?>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
            
            <!-- Page 2 - Demo Cards 4, 5, 6 -->
            <div class="carousel-page" data-page="1">
              <div class="page-cards">
                
                <!-- Card 4 -->
                <div class="carousel-slide" data-slide="3">
                  <div class="carousel-card">
                    <div class="card-image">
                      <div class="placeholder-image"></div>
                    </div>
                    <div class="card-content">
                      <div class="card-function">
                        <span class="function-tag">page 2</span>
                      </div>
                      <h3 class="card-title">Second page - Card 4</h3>
                      <p class="card-description">This is the fourth card on the second page of the carousel.</p>
                      <div class="card-footer">
                        <a href="#" class="card-button">read more</a>
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- Card 5 -->
                <div class="carousel-slide" data-slide="4">
                  <div class="carousel-card">
                    <div class="card-image">
                      <div class="placeholder-image"></div>
                    </div>
                    <div class="card-content">
                      <div class="card-function">
                        <span class="function-tag">page 2</span>
                      </div>
                      <h3 class="card-title">Second page - Card 5</h3>
                      <p class="card-description">This is the fifth card on the second page of the carousel.</p>
                      <div class="card-footer">
                        <a href="#" class="card-button">read more</a>
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- Card 6 -->
                <div class="carousel-slide" data-slide="5">
                  <div class="carousel-card">
                    <div class="card-image">
                      <div class="placeholder-image"></div>
                    </div>
                    <div class="card-content">
                      <div class="card-function">
                        <span class="function-tag">page 2</span>
                      </div>
                      <h3 class="card-title">Second page - Card 6</h3>
                      <p class="card-description">This is the sixth card on the second page of the carousel.</p>
                      <div class="card-footer">
                        <a href="#" class="card-button">read more</a>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
            
            <!-- Page 3 - Demo Cards 7, 8, 9 -->
            <div class="carousel-page" data-page="2">
              <div class="page-cards">
                
                <!-- Card 7 -->
                <div class="carousel-slide" data-slide="6">
                  <div class="carousel-card">
                    <div class="card-image">
                      <div class="placeholder-image"></div>
                    </div>
                    <div class="card-content">
                      <div class="card-function">
                        <span class="function-tag">page 3</span>
                      </div>
                      <h3 class="card-title">Third page - Card 7</h3>
                      <p class="card-description">This is the seventh card on the third page of the carousel.</p>
                      <div class="card-footer">
                        <a href="#" class="card-button">read more</a>
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- Card 8 -->
                <div class="carousel-slide" data-slide="7">
                  <div class="carousel-card">
                    <div class="card-image">
                      <div class="placeholder-image"></div>
                    </div>
                    <div class="card-content">
                      <div class="card-function">
                        <span class="function-tag">page 3</span>
                      </div>
                      <h3 class="card-title">Third page - Card 8</h3>
                      <p class="card-description">This is the eighth card on the third page of the carousel.</p>
                      <div class="card-footer">
                        <a href="#" class="card-button">read more</a>
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- Card 9 -->
                <div class="carousel-slide" data-slide="8">
                  <div class="carousel-card">
                    <div class="card-image">
                      <div class="placeholder-image"></div>
                    </div>
                    <div class="card-content">
                      <div class="card-function">
                        <span class="function-tag">page 3</span>
                      </div>
                      <h3 class="card-title">Third page - Card 9</h3>
                      <p class="card-description">This is the ninth card on the third page of the carousel.</p>
                      <div class="card-footer">
                        <a href="#" class="card-button">read more</a>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
            
          </div>
          
        </div>
      </div>
      
    </div>
        <div class="carousel-nav">
            <button class="nav-dot active" data-page="0" aria-label="Page 1 (Cards 1-3)"></button>
            <button class="nav-dot" data-page="1" aria-label="Page 2 (Cards 4-6)"></button>
            <button class="nav-dot" data-page="2" aria-label="Page 3 (Cards 7-9)"></button>
        </div>
  </div>
</section>