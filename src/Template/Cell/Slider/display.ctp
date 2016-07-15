<!-- Carousel
================================================== -->
<?php if (!$slider->isEmpty()):
   $slides = $slider->first()->attachments;
   ?>
   <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
         <div class="item active">
            <?= $this->Image->image(['image' => $slides[0]->path, 'height' => '500',  'valign' => 'center'], ['class' => 'slider_img']) ?>

            <div class="container">
               <div class="carousel-caption">
                  <?php if(!empty($slides[0]->description)):?>
                     <p>
                        <?=$slides[0]->description?>
                     </p>
                  <?php endif;?>
               </div>
            </div>
         </div>
         <?php for ($i=1; $i < count($slides); $i++) :?>
            <div class="item">
               <?= $this->Image->image(['image' => $slides[$i]->path, 'width' => '1200', 'cropratio' => '16:9', 'valign' => 'center'], ['class' => 'img-responsive']) ?>
               <div class="container">
                  <div class="carousel-caption">
                     <h1>Another example headline.</h1>
                     <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                     <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                  </div>
               </div>
            </div>
         <?php endfor;?>
      </div>
   </div><!-- /.carousel -->
<?php endif;?>
