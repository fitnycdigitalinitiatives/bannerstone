<?php

// Calls custom bootstrap main menu
function public_nav_main_bootstrap() {
    $partial = array('common/menu-partial.phtml', 'default');
    $nav = public_nav_main();  // this looks like $this->navigation()->menu() from Zend
    $nav->setPartial($partial);
    return $nav->render();
}

// Returns 400x400 thumbnail for first image in set
function thumbnail_url($item) {
  if ($fitdil_data_json = metadata($item, array('Item Type Metadata', 'fitdil_data'), array('index' => 0))) {
    $fitdil_data = json_decode(html_entity_decode($fitdil_data_json), true);
    $url_suffix = $fitdil_data["image-url"];
    $url = 'https://fitdil.fitnyc.edu' . $url_suffix . '400x400/';
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
    if ($fitdil_data_json_array = metadata($item, array('Item Type Metadata', 'fitdil_data'), array('all' => true))) {
      $html = '<div class="tab-content" id="pills-tabContent">';
      $panel_id = 1;
      foreach ($fitdil_data_json_array as $fitdil_data_json) {
        $fitdil_data = json_decode(html_entity_decode($fitdil_data_json), true);
        $url_suffix = $fitdil_data["image-url"];
        $url = 'https://fitdil.fitnyc.edu' . $url_suffix;
        $width = $fitdil_data["width"];
        $height = $fitdil_data["height"];
        $pyramid_json = $this->openseadragon_create_pyramid($url, $width, $height);
        $html .= get_view()->partial('common/openseadragon.php', array('pyramid_json' => $pyramid_json, 'hash' => $url_suffix, 'panel_id' => $panel_id));
        $panel_id++;
      }
      $html .= '</div>';
      $html .= $this->openseadragon_create_tabs($fitdil_data_json_array);
      return $html;
    }
  }
  private function openseadragon_create_pyramid($url, $width, $height)
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
    // $pyramid[] = $url_1 + $dimensions_1; //
    return json_encode($pyramid);
  }
  private function openseadragon_create_tabs($fitdil_data_json_array)
  {
    $html = '<ul class="nav justify-content-center" id="pills-tab" role="tablist">';
    $tab_id = 1;
    foreach ($fitdil_data_json_array as $fitdil_data_json) {
      $fitdil_data = json_decode(html_entity_decode($fitdil_data_json), true);
      $url_suffix = $fitdil_data["image-url"];
      $thumbnail_url = 'https://fitdil.fitnyc.edu' . $url_suffix . '400x400/';
      $html .= '<li class="nav-item"><a class="nav-link' . ($tab_id == 1 ? ' active' : '') . '" id="openseadragon-' . $tab_id . '-tab" data-toggle="pill" href="#openseadragon-' . $tab_id . '" role="tab" aria-controls="pills-home" aria-selected="true">';
      $html .= '<div class="card"><img class="card-img-top" src="' . $thumbnail_url . '"/></div>';
      $html .= '</a></li>';
      $tab_id++;
    }
    $html .= '</ul>';
    return $html;
  }
}
