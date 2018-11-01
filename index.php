<?php echo head(array('bodyid'=>'home')); ?>

<div class="container-fluid mb-5" id="banner">
  <div class="row justify-content-md-center">
    <div class="col-md-auto" id="large-img">
      <img src="<?php echo img('grid_2-1.jpg'); ?>" class="img-fluid" alt="Bannerstone image">
    </div>
    <div class="col-md-auto" id="small-img">
        <div class="row">
          <div class="col-md-auto">
            <img src="<?php echo img('grid_2-2.jpg'); ?>" class="img-fluid" id="small-top" alt="Bannerstone image">
          </div>
        </div>
        <div class="row">
          <div class="col-md-auto">
            <img src="<?php echo img('grid_2-3.jpg'); ?>" class="img-fluid" id="small-middle" alt="Bannerstone image">
          </div>
        </div>
        <div class="row">
          <div class="col-md-auto">
            <img src="<?php echo img('grid_2-4.jpg'); ?>" class="img-fluid" id="small-bottom" alt="Bannerstone image">
            <a class="d-block text-right mt-2 text-dark" id="info" href="https://bannerstone.fitnyc.edu/items/show/112"><i class="material-icons align-bottom">info</i> AMNH DN/128</a>
          </div>
        </div>
    </div>
  </div>
</div>

<div class="container" id="introduction">
  <div class="row justify-content-md-center">
    <div class="col-md-6">
      <?php fire_plugin_hook('public_home', array('view' => $this)); ?>
      <section>
        <h1 class="text-center mb-4">Introduction</h1>
        <p>The <strong>A</strong>rchaic <strong>B</strong>annerstone <strong>P</strong>roject is a resource for the study of the aesthetically complex, anomalous ancient Native American lithics known as bannerstones. Finely composed, carved, and polished works are usually associated with luxury items for a ruling elite.  Bannerstones, however, were made within distinctly egalitarian societies raising questions about who made them, who were they made for, and for what purposes were they made.</p>
        <p>To engage with these and other questions we have created this open-source website to bring bannerstone awareness and study to the broadest range of people. Included on this site are a bannerstone typology, high-quality images, a glossary, a bibliography, and a vast array of out-of-print or difficult to find texts relevant to bannerstone study. Also included are suggested metrics to better standardize the study of bannerstones in public and private collections as well as a suggested guide for photographic practices.</p>
        <p>Learning to see, study, and value the art and technology of bannerstones will bring us closer to the lived lives of ancient Native Americans of Eastern North America. This study, awareness, and appreciation of Ancient Native Americans in turn can open ways of seeing and respecting the vast history that links the past to the present.</p>
      </section>
      <section>
        <h1 class="text-center mb-4">What are Bannerstones?</h1>
        <p>Native Americans carved and carefully drilled holes through the center of these stones leading early 20th century archaeologists to believe they were meant to be placed on staffs as banners or emblems, thus the name <em>bannerstone</em>. Currently there is significant uncertainty about why these stones were made and what role they played in the lives of ancient Native Americans. What is certain is that bannerstones as a distinct category of stone carving are amongst the most aesthetically complex artifacts made by North Americans during the Archaic period.</p>
        <p>Whether local to them or traded from distant areas, stones were chosen by nomadic as well as settled Native Americans who worked the carved surface in relation to natural striations or other inherent visual qualities. Like axe heads, bannerstones were made by pecking, grinding and polishing lithic surfaces. This technology of lithic manufacture was practiced throughout North, South, and Central America from the Archaic to the Modern period (8000 BCE – AD1900), bannerstones, however, were only made in Eastern United States during the Archaic period. Most lithics made in this manner are of hard igneous or metamorphic rock suitable for well-known purposes of hammering or cutting. Bannerstones, however, are made up of a vast array of stones from hard igneous rock to metamorphic and even softer sedimentary rock.</p>
        <p>Since bannerstones were not used for hammering or any kind of percussive practice, the choice of stone for their making was either about weight and / or visual appearance.  Bannerstones were also carved into over twenty distinctive, expressive shapes pointing to the importance of aesthetic and conceptual concerns in their making, meaning, and uses. </p>
      </section>
      <section>
        <h1 class="text-center mb-4">Images and Resources on this Website</h1>
        <p>All images on the ABP (Archaic Bannerstone Project) under the Bannerstone Tab can be downloaded, shared, and reused for non-commercial purposes with proper attribution. Please attribute photographs to Anna Blume (unless otherwise indicated) and review the separate credit line details under Collections.</p>
        <p>Under the Bannerstone tab all images are available alphabetized by collection. Under the Collection Tab you can find notes on these specific collections as well as all images and metadata from that collection. Under the Typology Tab you will be able to search by type. By clicking on each bannerstone image you will open up the full suite of images and metadata for this stone. Images from each particular collection will be identified by the name of the collection and the catalog or accession number. For instance (AMNH 1/1821) refers to a specific quartz butterfly bannerstone in the American Museum of Natural History. All web essays and resources under the Resource Tab are also available for download.</p>
        <p>For publishing questions or general suggestions regarding the ABP, contact <a href="mailto:bannerstone@fitnyc.edu">bannerstone@fitnyc.edu</a>.</p>
      </section>
    </div>
  </div>
</div>




<?php echo foot(array('bodyid'=>'home')); ?>
