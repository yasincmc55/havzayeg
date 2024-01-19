<?php

function files__($data, $name, $languageParam)
{
    $name = $name.'_'.$languageParam;
    $filteredProperties = [];
    foreach ($data as $key => $value) {
        if (strpos($key, $name) === 0 ) {
            $filteredProperties[$key] = $value;
        }
    }
    usort($filteredProperties, function ($a, $b) {
        return $a[1] - $b[1];
    });
    return $filteredProperties;
}

function get_categories($id){
    $db = db_connect();
    $result = $db->query("SELECT * FROM categories WHERE category_id =".$id)->getResult();
    return $result[0]->category_name;
}

function decode_data_lang($dil, $content_id, $column)
{
    $db = db_connect();
    $item = $column;

    // Use query bindings to avoid SQL injection
    $result = $db->query("SELECT * FROM contents WHERE content_parent_id = ? AND language_id = ?", [$content_id, $dil])->getResult();

    // Check if there are results before trying to access them
    if (!empty($result)) {
        return $result[0]->{$item};
    }

    // Return a default value or handle the case where there are no results
    return null; // Change this to the appropriate default value or error handling strategy
}



if (!function_exists('getFilteredContents')) {
    function getFilteredContents($contents, $designer_id, $category_id, $language_id) {
        return $contents->where('designer_id', $designer_id)
                        ->where('category_id', $category_id)
                        ->where('language_id', $language_id)
                        ->findAll();
    }
}

function get_tibbi_birimler($designer_id, $category_id, $language_id){
    $db = db_connect();
    $query = "SELECT * FROM contents WHERE category_id = ? AND designer_id = ? AND language_id = ?";
    $result = $db->query($query, [$category_id, $designer_id, $language_id])->getResult();
    return $result;
}



