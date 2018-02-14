
    </main>
    <footer role="contentinfo" class="pt-5 pb-5">
        <div class="container text-center">
          <a href="https://www.fitnyc.edu">
            <img src="<?php echo img('FITSUNY1_white.png'); ?>" alt="Fashion Institute of Technology - State University of New York">
          </a>
          <p>&copy;<?php echo date('Y'); ?> Fashion Insititute of Technology
          <br>
          All rights reserved.</p>
          <p class="mb-0">This site is an initiative of the FIT History of Art Department and the FIT Library.</p>
        </div>
        <?php fire_plugin_hook('public_footer', array('view' => $this)); ?>
    </footer>
</body>
</html>
