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
      $html .= '<div class="tab-content col-12 order-first mb-2 mb-md-5" id="pills-tabContent">';
      $panel_id = 1;
      foreach ($fitdil_data_json_array as $fitdil_data_json) {
        $fitdil_data = json_decode(html_entity_decode($fitdil_data_json), true);
        $record_name = $fitdil_data["record-name"];
        $fitdil_url = $fitdil_data["image-url"];
        $static_image = 'https://fit-bannerstones.github.io/' . $github_collection . '/images/' . $record_name . '-1/full/1140,/0/default.jpg';
        $info_json_url = 'https://fit-bannerstones.github.io/' . $github_collection . '/images/' . $record_name . '-1/info.json';
        $download_url = 'https://fitdil.fitnyc.edu' . $fitdil_url . '?forcedl';
        $html .= get_view()->partial('common/openseadragon.php', array('info_json_url' => $info_json_url, 'hash' => $record_name, 'panel_id' => $panel_id, 'static_image' => $static_image, 'download_url' => $download_url));
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
      $html .= '<li class="nav-item"><a class="nav-link' . ($tab_id == 1 ? ' active' : '') . '" id="image-panel-' . $tab_id . '" data-toggle="pill" href="#openseadragon-' . $tab_id . '" role="tab" aria-controls="pills-home" aria-selected="true">';
      $html .= '<img id="nav-image" class="img-thumbnail" src="' . $thumbnail_url . '" alt="Bannerstone view ' . $record_name . ' thumbnail"/>';
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
    <button class="btn btn-arrow btnPrevious d-none d-lg-block" aria-label="Previous" role="button">
      <i class="material-icons">keyboard_arrow_left</i>
      <span class="sr-only">Previous</span>
    </button>
    <button class="btn btn-arrow btnNext d-none d-lg-block" aria-label="Next" role="button">
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
      $static_image = medium_url($item, $index);
    }
    $hash = hash("md4", html_escape($record_name));
    $html = get_view()->partial('common/openseadragonExhibit.php', array('info_json_url' => $info_json_url, 'hash' => $hash, 'static_image' => $static_image, 'title' => $record_name));
    $link = record_url($item, null, true);
    return $html;
  }
}
/**
 * Customized function to return search filters and terms
 */
function item_search_filters_bootstrap(array $params = null)
    {
        if ($params === null) {
            $request = Zend_Controller_Front::getInstance()->getRequest();
            $requestArray = $request->getParams();
        } else {
            $requestArray = $params;
        }

        $db = get_db();
        $displayArray = array();
        foreach ($requestArray as $key => $value) {
            if($value != null) {
                $filter = ucfirst($key);
                $displayValue = null;
                switch ($key) {
                    case 'type':
                        $filter = 'Item Type';
                        $itemType = $db->getTable('ItemType')->find($value);
                        if ($itemType) {
                            $displayValue = $itemType->name;
                        }
                        break;

                    case 'collection':
                        $collection = $db->getTable('Collection')->find($value);
                        if ($collection) {
                            $displayValue = strip_formatting(
                                metadata(
                                    $collection,
                                    array('Dublin Core', 'Title'),
                                    array('no_escape' => true)
                                )
                            );
                        }
                        break;

                    case 'user':
                        $user = $db->getTable('User')->find($value);
                        if ($user) {
                            $displayValue = $user->name;
                        }
                        break;

                    case 'public':
                    case 'featured':
                        $displayValue = ($value == 1 ? __('Yes') : $displayValue = __('No'));
                        break;

                    case 'search':
                    case 'tags':
                    case 'range':
                        $displayValue = $value;
                        break;
                }
                if ($displayValue) {
                    $displayArray[$filter] = $displayValue;
                }
            }
        }

        $displayArray = apply_filters('item_search_filters', $displayArray, array('request_array' => $requestArray));

        // Advanced needs a separate array from $displayValue because it's
        // possible for "Specific Fields" to have multiple values due to
        // the ability to add fields.
        if(array_key_exists('advanced', $requestArray)) {
            $advancedArray = array();
            foreach ($requestArray['advanced'] as $i => $row) {
                if (!$row['element_id'] || !$row['type']) {
                    continue;
                }
                $elementID = $row['element_id'];
                $elementDb = $db->getTable('Element')->find($elementID);
                $element = __($elementDb->name);
                $type = __($row['type']);
                $query = $row['terms'];
                if (isset($row['terms'])) {
                    $advancedValue = '"' . html_escape($row['terms']). '"';
                }
                $advancedArray[$i] = '<span class="advanced">' . $advancedValue . '</span> ';
            }
        }

        $html = '';
        if (!empty($displayArray) || !empty($advancedArray)) {
            foreach($displayArray as $name => $query) {
                $class = html_escape(strtolower(str_replace(' ', '-', $name)));
                $html .= '<span class="' . $class . '">"' . html_escape($query) . '"</span>';
            }
            if(!empty($advancedArray)) {
                foreach($advancedArray as $j => $advanced) {
                    $html .= $advanced;
                }
            }
        }
        return $html;
    }

// Creates social media tags for an image, following Twitter and Facebook standards.
function social_tags($bodyclass) {
	$html = '';
	if ($bodyclass == "items show" ) {
		$item = get_current_record('item');
		$title = metadata($item, array('Dublin Core', 'Title'));
		$url = record_url($item, null, true);
		$image = thumbnail_url($item, 1);
		$description = metadata($item, array('Item Type Metadata', 'Bannerstone Type')) . ' type bannerstone. ' . metadata($item, array('Item Type Metadata', 'Notes'));
		$html .= '<meta name="description" content="' . $description . '" />';
		$html .= '<!-- Open Graph data -->';
		$html .= '<meta property="og:title" content="' . $title . '" />';
		$html .= '<meta property="og:type" content="article" />';
		$html .= '<meta property="og:url" content="' . $url . '" />';
		$html .= '<meta property="og:image" content="' . $image . '" />';
		$html .= '<meta property="og:description" content="' . $description . '" />';

		$html .= '<!-- Twitter Card data -->';
		$html .= '<meta name="twitter:card" content="summary_large_image">';
		$html .= '<meta name="twitter:title" content="' . $title . '" />';
		$html .= '<meta name="twitter:description" content="' . $description . '" />';
		$html .= '<meta name="twitter:image" content="' . $image . '" />';
	}
	else {
		if ($site_description = option('description')) {
			$html .= '<meta name="description" content="' . $site_description . '" />';
		}
	}
	return $html;
}
// Given an metadata element and term, returns a search of all videos that match that term.
function heading_links($elementName, $text) {
	$element = get_db()->getTable('Element')->findByElementSetNameAndElementName('Item Type Metadata', $elementName);
	$id = $element->id;
	$advanced[] = array('element_id' => $id, 'terms' => htmlspecialchars_decode($text, ENT_QUOTES), 'type' => 'is exactly');
	$paramArray = array('search' => '', 'advanced' => $advanced);
	$params = http_build_query($paramArray);
	$url = url('/items/browse?') . $params;
	$html = '<a href="';
	$html .= $url;
	$html .= '">';
	$html .= $text;
	$html .= '</a>';
	return $html;
}
