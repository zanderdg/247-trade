<?php

function getTemplates() {
    $full_path = base_path().'/resources/views/template';

    $templates['default'] = 'Default';

    foreach (glob(base_path().'/resources/views/template/*.php') as $filename) {

        $comment_pattern = '/\*.*?\*/';
        $file = file_get_contents($filename);
        preg_match($comment_pattern,$file,$templateFile);

        $templateFile = @explode( ':', str_replace('*','', $templateFile[0]) , 2);

        if(trim($templateFile[0])=="Template Name" && $templateFile[1]!=""){

            $pos = strrpos($filename, "/");
            if($pos !== false){
                $filename = substr($filename,$pos+1,strlen($filename)-$pos);
                $filename = str_replace('.blade.php', '', $filename);
                $templateName = str_replace('.blade.php','',$filename);
            }

            if($filename!="default.blade.php"){
                $templates[$filename] = $templateFile[1];
            }
        }
    }

    return $templates;
}