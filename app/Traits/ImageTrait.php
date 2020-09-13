<?php

namespace App\Traits;

Trait ImageTrait {

    public function SaveImage($path , $photoName){
        $fileExtention = $photoName->getClientOriginalExtension();
        $fileName = time().'.'.$fileExtention;
        $direct = $path;
        $photoName->move($direct,$fileName);
            return $fileName;
    }


}


