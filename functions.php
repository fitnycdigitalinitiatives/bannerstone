<?php

// Calls custom bootstrap main menu
function public_nav_main_bootstrap() {
    $partial = array('common/menu-partial.phtml', 'default');
    $nav = public_nav_main();  // this looks like $this->navigation()->menu() from Zend
    $nav->setPartial($partial);
    return $nav->render();
}

// Returns thumbnail for image in set, default first image
function thumbnail_url($item, $index = 0) {
  if (($fitdil_data_json = metadata($item, array('Item Type Metadata', 'fitdil_data'), array('index' => $index))) && ($github_collection = metadata($item, array('Item Type Metadata', 'github_collection')))) {
    $fitdil_data = json_decode(html_entity_decode($fitdil_data_json), true);
    $record_name = $fitdil_data["record-name"];
    $url = 'https://fit-bannerstones.github.io/' . $github_collection . '/images/' . $record_name . '-1/full/250,/0/default.jpg';
    return $url;
  }
}
// Returns large image from set, default first image
function medium_url($item, $index = 0) {
  if (($fitdil_data_json = metadata($item, array('Item Type Metadata', 'fitdil_data'), array('index' => $index))) && ($github_collection = metadata($item, array('Item Type Metadata', 'github_collection')))) {
    $fitdil_data = json_decode(html_entity_decode($fitdil_data_json), true);
    $record_name = $fitdil_data["record-name"];
    $url = 'https://fit-bannerstones.github.io/' . $github_collection . '/images/' . $record_name . '-1/full/600,/0/default.jpg';
    return $url;
  }
}
// Returns large image from set, default first image
function large_url($item, $index = 0) {
  if (($fitdil_data_json = metadata($item, array('Item Type Metadata', 'fitdil_data'), array('index' => $index))) && ($github_collection = metadata($item, array('Item Type Metadata', 'github_collection')))) {
    $fitdil_data = json_decode(html_entity_decode($fitdil_data_json), true);
    $record_name = $fitdil_data["record-name"];
    $url = 'https://fit-bannerstones.github.io/' . $github_collection . '/images/' . $record_name . '-1/full/1140,/0/default.jpg';
    return $url;
  }
}

/**
 * Implements OpenSeadragon
 */
class OpenSeadragon
{

  public function render($item)
  {
    if (($fitdil_data_json_array = metadata($item, array('Item Type Metadata', 'fitdil_data'), array('all' => true))) && ($github_collection = metadata($item, array('Item Type Metadata', 'github_collection')))) {
      $html = '<div class="row" id="viewer">';
      $html .= $this->openseadragon_create_tabs($fitdil_data_json_array, $github_collection);
      $html .= '<div class="tab-content col-12 order-first mb-5" id="pills-tabContent">';
      $panel_id = 1;
      foreach ($fitdil_data_json_array as $fitdil_data_json) {
        $fitdil_data = json_decode(html_entity_decode($fitdil_data_json), true);
        $record_name = $fitdil_data["record-name"];
        $static_image = 'https://fit-bannerstones.github.io/' . $github_collection . '/images/' . $record_name . '-1/full/1140,/0/default.jpg';
        $info_json_url = 'https://fit-bannerstones.github.io/' . $github_collection . '/images/' . $record_name . '-1/info.json';
        $html .= get_view()->partial('common/openseadragon.php', array('info_json_url' => $info_json_url, 'hash' => $record_name, 'panel_id' => $panel_id, 'static_image' => $static_image));
        $panel_id++;
      }
      $html .= $this->openseadragon_create_buttons();
      $html .= '</div>';
      $html .= '</div>';
      return $html;
    }
  }
  private function openseadragon_create_tabs($fitdil_data_json_array, $github_collection)
  {
    $html = '<div class="col-12 order-last mb-5"><ul class="nav justify-content-center" id="pills-tab" role="tablist">';
    $tab_id = 1;
    foreach ($fitdil_data_json_array as $fitdil_data_json) {
      $fitdil_data = json_decode(html_entity_decode($fitdil_data_json), true);
      $record_name = $fitdil_data["record-name"];
      $thumbnail_url = 'https://fit-bannerstones.github.io/' . $github_collection . '/images/' . $record_name . '-1/full/250,/0/default.jpg';
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
  if (($fitdil_data_json = metadata($item, array('Item Type Metadata', 'fitdil_data'), array('index' => $index))) && ($github_collection = metadata($item, array('Item Type Metadata', 'github_collection')))) {
    $fitdil_data = json_decode(html_entity_decode($fitdil_data_json), true);
    $record_name = $fitdil_data["record-name"];
    $info_json_url = 'https://fit-bannerstones.github.io/' . $github_collection . '/images/' . $record_name . '-1/info.json';
    if ($imageSize == 'fullsize') {
      $static_image = large_url($item, $index);
    }
    else {
      $static_image = thumbnail_url($item, $index);
    }
    $hash = hash("md4", html_escape($record_name));
    $html = '<div class="image-container">';
    $html .= get_view()->partial('common/openseadragonExhibit.php', array('info_json_url' => $info_json_url, 'hash' => $hash, 'static_image' => $static_image, 'title' => $record_name));
    $link = record_url($item, null, true);
    // Begin Modal //
    $html .= '<!-- Button trigger modal --><button class="btn btn-inform" id="item-info" aria-label="Info" role="button" data-toggle="modal" data-target="#modal-' . $hash . '"><i class="material-icons">info</i><span class="sr-only">Info</span></button>';
    $html .= '<!-- Modal -->
<div class="modal fade" id="modal-' . $hash . '" tabindex="-1" role="dialog" aria-labelledby="More Information" aria-hidden="true">
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
        <a href="' . $link . '" role="button" class="btn">View full record</a>
      </div>
    </div>
  </div>
</div>';
    $html .= '</div><!-- close container -->';
    return $html;
  }
}
