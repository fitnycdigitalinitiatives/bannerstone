<?php

// Calls custom bootstrap main menu
function public_nav_main_bootstrap() {
    $partial = array('common/menu-partial.phtml', 'default');
    $nav = public_nav_main();  // this looks like $this->navigation()->menu() from Zend
    $nav->setPartial($partial);
    return $nav->render();
}

// Returns 400x400 thumbnail for image in set, default first image
function thumbnail_url($item, $index = 0) {
  if ($fitdil_data_json = metadata($item, array('Item Type Metadata', 'fitdil_data'), array('index' => $index))) {
    $fitdil_data = json_decode(html_entity_decode($fitdil_data_json), true);
    $url_suffix = $fitdil_data["image-url"];
    $url = 'https://fitdil.fitnyc.edu' . $url_suffix . '400x400/';
    return $url;
  }
}
// Returns 800x800 thumbnail for image in set, default first image
function large_url($item, $index = 0) {
  if ($fitdil_data_json = metadata($item, array('Item Type Metadata', 'fitdil_data'), array('index' => $index))) {
    $fitdil_data = json_decode(html_entity_decode($fitdil_data_json), true);
    $url_suffix = $fitdil_data["image-url"];
    $url = 'https://fitdil.fitnyc.edu' . $url_suffix . '800x800/';
    return $url;
  }
}

// Returns 400x400 thumbnail for first image of that bannerstone type
function type_thumbnail($item, $tag_name) {
  if ($fitdil_data_json = metadata($item, array('Item Type Metadata', 'fitdil_data'), array('index' => 0))) {
    $fitdil_data = json_decode(html_entity_decode($fitdil_data_json), true);
    $url_suffix = $fitdil_data["image-url"];
    $url = 'https://fitdil.fitnyc.edu' . $url_suffix . '400x400/';
    $title = metadata($item, array('Dublin Core', 'Title'));
    $thumb = '<img class="img-fluid align-self-center" src="' . $url . '" alt="' . $title . '">';
    $html = $thumb;
    $html .= '<h2 class="text-dark">';
    $html .= $tag_name;
    $html .= '</h2>';
    return $html;
  }
}

/**
 * Implements OpenSeadragon
 */
class OpenSeadragon
{

  public function render($item)
  {
    if ($fitdil_data_json_array = metadata($item, array('Item Type Metadata', 'fitdil_data'), array('all' => true))) {
      $html = '<div class="row" id="viewer">';
      $html .= $this->openseadragon_create_tabs($fitdil_data_json_array);
      $html .= '<div class="tab-content col-12 order-first mb-5" id="pills-tabContent">';
      $panel_id = 1;
      foreach ($fitdil_data_json_array as $fitdil_data_json) {
        $fitdil_data = json_decode(html_entity_decode($fitdil_data_json), true);
        $url_suffix = $fitdil_data["image-url"];
        $url = 'https://fitdil.fitnyc.edu' . $url_suffix;
        $static_image = $url . '750x500/';
        $width = $fitdil_data["width"];
        $height = $fitdil_data["height"];
        $pyramid_json = $this->openseadragon_create_pyramid($url, $width, $height);
        $html .= get_view()->partial('common/openseadragon.php', array('pyramid_json' => $pyramid_json, 'hash' => $url_suffix, 'panel_id' => $panel_id, 'static_image' => $static_image));
        $panel_id++;
      }
      $html .= $this->openseadragon_create_buttons();
      $html .= '</div>';
      $html .= '</div>';
      return $html;
    }
  }
  public function openseadragon_create_pyramid($url, $width, $height)
  {
    $pyramid = array();
    $url_1 = array('url' => $url);
    $dimensions_1 = array('height' => (int) $height, 'width' => (int) $width);
    $height_2 = ceil(($height * 3) / 4);
    $width_2 = ceil(($width * 3) / 4);
    $dimensions_2 = array('height' => (int) $height_2, 'width' => (int) $width_2);
    $url_2 = array('url' => $url . $width_2 . 'x' . $height_2 . '/');
    $height_3 = ceil($height / 2);
    $width_3 = ceil($width / 2);
    $dimensions_3 = array('height' => (int) $height_3, 'width' => (int) $width_3);
    $url_3 = array('url' => $url . $width_3 . 'x' . $height_3 . '/');
    $height_4 = ceil($height / 4);
    $width_4 = ceil($width / 4);
    $dimensions_4 = array('height' => (int) $height_4, 'width' => (int) $width_4);
    $url_4 = array('url' => $url . $width_4 . 'x' . $height_4 . '/');
    // Get 400x400 image which is cached from browse page //
    if ($height >= $width) {
      $height_5 = 400;
      $width_5 = floor(($width * 400) / $height);
    }
    else {
      $width_5 = 400;
      $height_5 = floor(($height * 400) / $width);
    }
    $dimensions_5 = array('height' => (int) $height_5, 'width' => (int) $width_5);
    $url_5 = array('url' => $url . '400x400/');
    $pyramid[] = $url_5 + $dimensions_5;
    $pyramid[] = $url_4 + $dimensions_4;
    $pyramid[] = $url_3 + $dimensions_3;
    $pyramid[] = $url_2 + $dimensions_2;
    $pyramid[] = $url_1 + $dimensions_1;
    return json_encode($pyramid);
  }
  private function openseadragon_create_tabs($fitdil_data_json_array)
  {
    $html = '<div class="col-12 order-last mb-5"><ul class="nav justify-content-center" id="pills-tab" role="tablist">';
    $tab_id = 1;
    foreach ($fitdil_data_json_array as $fitdil_data_json) {
      $fitdil_data = json_decode(html_entity_decode($fitdil_data_json), true);
      $record_name = $fitdil_data["record-name"];
      $record_id = $fitdil_data["record-id"];
      $thumbnail_url = 'https://fitdil.fitnyc.edu/media/thumb/' . $record_id . '/' . $record_name . '/';
      $html .= '<li class="nav-item"><a class="nav-link' . ($tab_id == 1 ? ' active' : '') . '" id="openseadragon-' . $tab_id . '-tab" data-toggle="pill" href="#openseadragon-' . $tab_id . '" role="tab" aria-controls="pills-home" aria-selected="true">';
      $html .= '<img id="nav-image" class="img-thumbnail" src="' . $thumbnail_url . '"/>';
      $html .= '</a></li>';
      $tab_id++;
    }
    $html .= '</ul>';
    $html .= '</div>';
    return $html;
  }
  private function openseadragon_create_buttons()
  {
    $html = <<<EOT
    <button class="btn btn-arrow btnPrevious" aria-label="Previous" role="button">
      <i class="material-icons">keyboard_arrow_left</i>
      <span class="sr-only">Previous</span>
    </button>
    <button class="btn btn-arrow btnNext" aria-label="Next" role="button">
      <i class="material-icons">keyboard_arrow_right</i>
      <span class="sr-only">Previous</span>
    </button>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#viewer .btnNext').click(function(){
          var next = $('#viewer .nav-item').has('a.active').next('li');
          if (next.length) {
            $('#viewer .nav-item').has('a.active').next('li').find('a').trigger('click');
          }
          else {
            $("#viewer .nav li:first").find('a').trigger('click');
          }
        });
        $('#viewer .btnPrevious').click(function(){
          var prev = $('#viewer .nav-item').has('a.active').prev('li');
          if (prev.length) {
            $('#viewer .nav-item').has('a.active').prev('li').find('a').trigger('click');
          }
          else {
            $("#viewer .nav li:last").find('a').trigger('click');
          }
        });
      });
    </script>
EOT;
  return $html;
  }
}

/**
 * Implements OpenSeadragon for Exhibition
 */
function OpenSeadragonExhibit($item, $index = 0, $imageSize = 'thumbnail')
{
  if ($fitdil_data_json = metadata($item, array('Item Type Metadata', 'fitdil_data'), array('index' => $index))) {
    $fitdil_data = json_decode(html_entity_decode($fitdil_data_json), true);
    $url_suffix = $fitdil_data["image-url"];
    $url = 'https://fitdil.fitnyc.edu' . $url_suffix;
    if ($imageSize == 'fullsize') {
      $static_image = large_url($item, $index);
    }
    else {
      $static_image = thumbnail_url($item, $index);
    }
    $width = $fitdil_data["width"];
    $height = $fitdil_data["height"];
    $hash = hash("md4", html_escape($url_suffix));
    $title = $fitdil_data["record-name"];
    $openseadragon = new OpenSeadragon;
    $pyramid_json = $openseadragon->openseadragon_create_pyramid($url, $width, $height);
    $html = get_view()->partial('common/openseadragonExhibit.php', array('pyramid_json' => $pyramid_json, 'hash' => $hash, 'static_image' => $static_image, 'title' => $title));
    $link = record_url($item, null, true);
    // Begin Modal //
    $html .= '<!-- Button trigger modal --><button class="btn btn-inform" id="item-info" aria-label="Info" role="button" data-toggle="modal" data-target="#modal-' . $hash . '"><i class="material-icons">info</i><span class="sr-only">Info</span></button>';
    $html .= '<!-- Modal -->
<div class="modal fade" id="modal-' . $hash . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">About this Bannerstone</h2>
        <button type="button" id="close-modal" class="btn btn-close" data-dismiss="modal" aria-label="Close">
          <i class="material-icons">close</i>
          <span class="sr-only">Close Pop-up</span>
        </button>
      </div>
      <div class="modal-body" id="metadata">
        '. all_element_texts($item) . '
      </div>
      <div class="modal-footer">
        <a href="' . $link . '" role="button" class="btn btn-primary">View full record</a>
      </div>
    </div>
  </div>
</div>';
    return $html;
  }
}
