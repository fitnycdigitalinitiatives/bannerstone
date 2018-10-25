
    </main>
    <footer role="contentinfo" class="pt-5 pb-5">
        <div class="container text-center">
          <a href="https://www.fitnyc.edu">
            <img src="<?php echo img('FITSUNY1_white.png'); ?>" alt="Fashion Institute of Technology - State University of New York">
          </a>
          <p class="small">&copy;<?php echo date('Y'); ?> Fashion Insititute of Technology
          <br>
          All rights reserved.</p>
          <p class="mb-0">This site is an initiative of the <a class="text-white" href="https://www.fitnyc.edu/history-of-art/">FIT History of Art Department</a> and the <a class="text-white" href="https://www.fitnyc.edu/library/">FIT Library</a>.</p>
        </div>
        <?php fire_plugin_hook('public_footer', array('view' => $this)); ?>
    </footer>
    <?php if ( @$bodyid == 'home'): ?>
      <!-- Smooth Scroll -->
      <script type="text/javascript">
      $(document).ready(function(){
        // Add smooth scrolling to all links
        $("a").on('click', function(event) {

          // Make sure this.hash has a value before overriding default behavior
          if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
              scrollTop: $(hash).offset().top
            }, 800, function(){

              // Add hash (#) to URL when done scrolling (default click behavior)
              window.location.hash = hash;
            });
          } // End if
        });
      });
      </script>
    <?php endif; ?>
    <?php if ( (@$bodyid == 'exhibit')): ?>
      <script type="text/javascript">
      $(document).ready(function(){
          $("#exhibit-nav .navbar-toggler").click(function(){
              $("#main-nav").toggle(200);
          });
      });
      </script>
    <?php endif; ?>
    <?php /* No Search Functionality Needed Until further notice
    <script>
    $(document).ready(function(){
        $("#search-button").click(function(){
            $(this).toggleClass("active");
            $("#search-form").toggle();
            $("#query").focus();

        });
    });
    </script>
    */ ?>

</body>
</html>
