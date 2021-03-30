<?php

foreach ($categoryList as $category){
    echo $category . " <a href='".route('category.show', ['name' => $category])."'>отобразить</a>" .'<br>';
}
