<?php echo head(array('bodyid'=>'home')); ?>

<div class="container-fluid mb-5" id="banner">
  <div class="row justify-content-md-center">
    <div class="col-auto" id="large-img">
      <img src="<?php echo img('grid_2-1.jpg'); ?>" class="img-fluid" alt="Bannerstone image">
    </div>
    <div class="col-auto" id="small-img">
        <div class="row">
          <div class="col-auto">
            <img src="<?php echo img('grid_2-2.jpg'); ?>" class="img-fluid" id="small-top" alt="Bannerstone image">
          </div>
        </div>
        <div class="row">
          <div class="col-auto">
            <img src="<?php echo img('grid_2-3.jpg'); ?>" class="img-fluid" id="small-middle" alt="Bannerstone image">
          </div>
        </div>
        <div class="row">
          <div class="col-auto">
            <img src="<?php echo img('grid_2-4.jpg'); ?>" class="img-fluid" id="small-bottom" alt="Bannerstone image">
          </div>
        </div>
    </div>
  </div>
</div>

<div class="container" id="about">
  <div class="row justify-content-md-center">
    <div class="col-md-6">
      <?php fire_plugin_hook('public_home', array('view' => $this)); ?>
      <section>
        <h1 class="text-center mb-4">About</h1>
        <p>The <strong>A</strong>rchaic <strong>B</strong>annerstone <strong>P</strong>roject is a resource for the study of the aesthetically complex, anomalous ancient Native American lithics known as bannerstones. Finely composed, carved, and polished works are usually associated with luxury items for a ruling elite.  Bannerstones, however, were made within distinctly egalitarian societies raising questions about who made them, who were they made for, and for what purposes were they made.</p>
        <p>To engage with these and other questions we have created this open-source website to bring bannerstone awareness and study to the broadest range of people. Included on this site are a morphology of types, high-quality images, a glossary, a bibliography, and a vast array of out-of-print or difficult to find texts relevant to bannerstone study. Also included are suggested metrics to better standardize the study of bannerstones in public and private collections as well as a suggested guide for photographic practices.</p>
        <p>Learning to see, study, and value the art and technology of bannerstones will bring us closer to the lived lives of Ancient Native Americans of Eastern North America. This study, awareness, and appreciation of Ancient Native Americans in turn can open ways of seeing and respecting the vast history that links the past to the present.</p>
      </section>
      <section>
        <h1 class="text-center mb-4">What are Bannerstones?</h1>
        <p>Bannerstones are carefully sculpted stones created across the eastern United States between 6000 BCE and 1000 BCE. More specifically, bannerstones were made from the Mississippi Valley to the Atlantic Coast and from the Canadian border to the Gulf of Mexico. American Indians carved and drilled these stones to be placed on a staff (thus the name given to them – bannerstone – in early 20th c. archeological literature, where they were assumed to be banners or emblems.)</p>
        <p>Whether local to them or traded from distant areas, stones were chosen by nomadic as well as settled Native Americans who worked the carved surface in relation to natural striations or other inherent visual qualities. Like axe heads, bannerstones were made by pecking, grinding and polishing lithic surfaces. This technology of lithic manufacture was practiced throughout North, South, and Central America from the Archaic to the Modern period (8000 BCE – AD1900), bannerstones, however, were only made in Eastern United States during the Archaic period. Most lithics made in this manner are of hard igneous or metamorphic rock suitable for well-known purposes of hammering or cutting. Bannerstones, however, are made up of a vast array of stones from hard igneous rock to metamorphic and even softer sedimentary rock.</p>
        <p>Since bannerstones were not used for hammering or any kind of percussive practice, the choice of stone for their making was either about weight and / or visual appearance.  Bannerstones were also carved into over twenty distinctive, expressive shapes pointing to the importance of aesthetic and conceptual concerns in their making, meaning, and uses. </p>
      </section>
      <section>
        <h1 class="text-center mb-4">Images on this Website</h1>
        <p>All images on the ABP (Archaic Bannerstone Project) have been designated in the public domain and are therefore free to download and use for any purpose. Images from particular collections will be identified by the name of the collection and the catalog or accession number. For instance (AMNH 1/1821) refers to a specific quartz butterfly bannerstone in the American Museum of Natural History.</p>
        <p>As of 2018, the majority of images available on the website are of 61 bannerstones selected from the collection of 462 stones in the American Museum of Natural History. These 61 bannerstones represent the range of types, materials, and conditions of the stones. There are 580 photographs taken at various angles, which highlight sculpted form, scale, carving and drilling techniques, geologic details, and the current condition of these bannerstones.  These images may be downloaded and used freely for teaching and personal use. Include the credit line “© Anna Blume, 2017, Courtesy of the Division of Anthropology, American Museum of Natural History” along with the object’s Catalog Number. Publishing of images is permitted with permission from the AMNH. For publishing questions, contact anna_blume [at] fitnyc [dot] edu.</p>
      </section>
    </div>
  </div>
</div>




<?php echo foot(array('bodyid'=>'home')); ?>
