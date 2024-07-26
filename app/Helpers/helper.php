<?php

use App\Models\Platform;


function getCategories(){
  return Platform::orderBy('id', 'DESC')
        //  ->with('sub_category')
         ->where('status',1)
         ->take(7)
         ->get();
}

?>