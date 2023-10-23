<?php if (is_404()) { ?>
<div id="breadcrumb" class="breadcrumbs breadcrumbs--white" vocab="http://schema.org/" typeof="BreadcrumbList">
  <?php } else { ?>
  <div id="breadcrumb" class="breadcrumbs" vocab="http://schema.org/" typeof="BreadcrumbList">
    <?php } ?>
    <?php bcn_display(); ?>
  </div>