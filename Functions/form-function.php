<?php

function fillSelect($options, $select = "") {

  $html_dropdown = "";
  foreach ($options as $make) {
    $selected = $select == $make->make ? "selected" : "";
    $html_dropdown .= "<option $selected value='$make->make_id'>$make->make</option>";
  }
  return $html_dropdown;
}