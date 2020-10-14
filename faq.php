<!-- page header -->
<?php include_once('main_header.php');
$faqs = $zenta_operation->get_faqs(); ?>
<!-- / page header -->
<div class="page-title bg-color-4">
  <div class="grid-row">
    <h1>FAQs</h1>
    <!-- bread crumb -->
    <nav class="bread-crumb">
      <a href="<?= SITE_URL ?>">Home</a>
      <i class="fa fa-long-arrow-right"></i>
      <a>faqs</a>
    </nav>
    <!-- / bread crumb -->
  </div>
</div>
<!-- page content -->
<div class="page-content woocommerce">
  <!-- map -->
  <!-- <div class="container clear-fix">
      <div class="wow fadeInUp">
        <small>FAQs</small>
        <h1>Read Most Frequent Questions</h1>
      </div>
    </div> -->
  <!-- / map -->
  <!-- / paralax section -->
  <hr class="divider-color" />
  <!-- paralax section -->
  <section class="fullwidth-background padding-section">
    <div class="grid-row grid-row-clear clear-fix">
      <div class="grid-col-row">
        <div class="grid-col grid-col-8">
          <h3>Read Most Frequent Questions</h3>
          <p>Know everything there is about us</p>
          <!-- accordions -->
          <div class="accordions">


            <?php $i = 0;
            foreach ($faqs as $faq) : ?>
              <!-- content-title -->
              <div class="content-title <?= $i == 0 ? "active" : "" ?>"><?= $faq['question'] ?></div>
              <!--/content-title -->
              <!-- accordions content -->
              <div class="content"><?= $faq['answer'] ?></div>
              <!--/accordions content -->
            <?php $i++;
            endforeach ?>
          </div>
          <!--/accordions -->
          <!-- <a href="about" class="cws-button bt-color-3 border-radius alt icon-right">View Detail<i class="fa fa-angle-right"></i></a> -->
        </div>
        <!-- <div class="grid-col grid-col-6">
          <div class="owl-carousel full-width-slider">
            <div class="gallery-item picture">
              <img src="img/Intro-thumb09.jpg" data-at2x="img/Intro-thumb09.jpg" alt>
            </div>
            <div class="gallery-item picture">
              <img src="img/huffington-post-2-1.jpg" data-at2x="img/huffington-post-2-1.jpg" alt>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </section>
  <!-- paralax section -->
  <!-- contact form section -->
  <div class="grid-row clear-fix">
    <div class="grid-col-row">
      <div class="grid-col grid-col-6">
        <section>
          <h2>Ask us your questions here!</h2>
          <div class="widget-contact-form">
            <!-- contact-form -->
            <div class="info-boxes error-message alert-boxes error-alert" id="feedback-form-errors">
              <strong>Attention!</strong>
              <div class="message"></div>
            </div>
            <div class="email_server_responce"></div>
            <form action="php/contacts-process.php" method="post" class="contact-form alt clear-fix">
              <input type="text" name="name" value="" size="40" placeholder="Your Name" aria-invalid="false" aria-required="true">
              <input type="text" name="email" value="" size="40" placeholder="Your Email" aria-required="true">
              <input type="text" name="subject" value="" size="40" placeholder="Subject" aria-invalid="false" aria-required="true">
              <textarea name="message" cols="40" rows="3" placeholder="Your Message" aria-invalid="false" aria-required="true"></textarea>
              <input type="submit" value="Send" class="cws-button border-radius alt">
            </form>
            <!--/contact-form -->
          </div>
        </section>
      </div>
      <!-- <div class="grid-col grid-col-6 widget-address">
          <section>
            <h2>Our Offices</h2>
            <address>
              <p>Visit us to find out more</p>
              <div class="grid-row">
                <?php $i = 1;
                foreach ($contact as $cont_info) : ?>
                  <div class="grid-col grid-col-3">
                    <p><strong class="fs-18">Address<?= $i ?>:</strong><br /><?= $cont_info['address'] ?></p>
                    <p><strong class="fs-18">Phone number:</strong><br />
                      <a href="tel:<?= $cont_info['phone'] ?>"><?= $cont_info['phone'] ?></a><br />
                    </p>
                    <p><strong class="fs-18">E-mail:</strong><br />
                      <a href="mailto:<?= $cont_info['email'] ?>"><?= $cont_info['email'] ?></a><br />
                    </p>
                  </div>
                <?php $i++;
                endforeach ?>
              </div>
            </address>
          </section>
        </div> -->
    </div>
  </div>
  <!-- / contact form section -->
</div>
<!-- / page content -->
<!-- footer -->
<?php include_once('main_footer.php'); ?>
<!-- / footer -->