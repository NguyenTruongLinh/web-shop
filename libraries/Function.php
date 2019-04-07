<?php 

    /**
    * debug
    **/
    function _debug($data) {

        echo '<pre style="background: #000; color: #fff; width: 100%; overflow: auto">';
        echo '<div>Your IP: ' . $_SERVER['REMOTE_ADDR'] . '</div>';

        $debug_backtrace = debug_backtrace();
        $debug = array_shift($debug_backtrace);

        echo '<div>File: ' . $debug['file'] . '</div>';
        echo '<div>Line: ' . $debug['line'] . '</div>';

        if(is_array($data) || is_object($data)) {
            print_r($data);
        }
        else {
            var_dump($data);
        }
        echo '</pre>';
    }
    /**
    * tao slug
    **/

    function to_slug($str) {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }

     if( ! function_exists('xss_clean') ) {
        function xss_clean($data)
        {
            // Fix &entity\n;
            $data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
            $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
            $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
            $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

            // Remove any attribute starting with "on" or xmlns
            $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

            // Remove javascript: and vbscript: protocols
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

            // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

            // Remove namespaced elements (we do not need them)
            $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

            do
            {
                // Remove really unwanted tags
                $old_data = $data;
                $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
            }
            while ($old_data !== $data);

            // we are done...
            return $data;
        }
    }
    /**
     * get input
     */
    
    function  getInput($string)
    {
        return isset($_GET[$string]) ? $_GET[$string] : '';
    }

    
    /**
     * post Input
     */
    
    function  postInput($string)
    {
        return isset($_POST[$string]) ? $_POST[$string] : '';
    }



    function base_url()
    {
        // return $url  = "http://codedoan.com/"; 
        return $url  = "http://localhost/web-shop/"; 
    }


    function public_admin()
    {
        return base_url() . "public/admin/";
    }

    function public_frontend()
    {
        return base_url() . "public/frontend/";
    }

    function modules($url)
    {
        return base_url() . "admin/modules/" .$url ;
    }

    function uploads()
    {
        return base_url() . "public/uploads/";
    }
    
     if ( ! function_exists('redirectStyle'))
    {
        function redirectStyle($url = "")
        {
            header("location: ".base_url()."{$url}");exit();
        }
    }



    /**
     *  redirect về các trang 
     */
    if ( ! function_exists('redirectAdmin'))
    {
        function redirectAdmin($url = "")
        {
            header("location: ".base_url()."admin/modules/{$url}");exit();
        }
    }



    /**
     *  redirect về các trang 
     */
    if ( ! function_exists('redirect'))
    {
        function redirect($url = "")
        {
            header("location: ".base_url().$url);exit();
        }
    }

    function formatPrice($number){
        $number = intval($number);

        return $number = number_format($number,0,',','.')." đ";
    }

    function formatPriceSale($number, $sale){
        $number = intval($number);
        $sale = intval($sale);

        $price = $number * (100 - $sale)/100;

        return formatPrice($price);
    }

    function sale($number){
        if ($number < 5000000) {
            return 0;
        }
        elseif ($number < 10000000) {
            return 5;
        }
        else{
            return 10;
        }
    }


    // class UploadTool {
    //     /**
    //     * @var arr => $upload_info = infos sobre os arquivos enviados
    //     */
    //     private $upload_info = array();
    //     /**
    //     * @param str => $input_name = nome do input
    //     * @param str => $folder_to_move = nome da pasta em que o arquivo será salvo
    //     * @param arr => $mime_allowed = mime types permitidos no processo de upload
    //     * @param bol => $return_json = se true retorna um objeto json
    //     */
    //     public function manage_single_file(string $input_name, string $folder_to_move, array $mime_allowed = [], bool $return_json = true){
    //         $resultado = array();
    //         $count_mime_allowed = count($mime_allowed);
    //         if(is_uploaded_file($_FILES[$input_name]['tmp_name'])){
    //             $new_name_file = bin2hex(random_bytes(64)).'.'.pathinfo($_FILES[$input_name]['name'], PATHINFO_EXTENSION);
    //             $this->upload_info = array(
    //                 'name' => $new_name_file,
    //                 'size' => $_FILES[$input_name]['size'],
    //                 'mime' => finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES[$input_name]['tmp_name']),
    //                 'extension' => pathinfo($_FILES[$input_name]['name'], PATHINFO_EXTENSION),
    //                 'check_mime' => true,
    //                 'folder_to_move' => $folder_to_move,
    //                 'error_code' => $_FILES[$input_name]['error'],
    //             );
    //             if($count_mime_allowed > 0 && !in_array($this->upload_info['mime'], $mime_allowed, true)){$this->upload_info['check_mime'] = false;}
    //             if($this->upload_info['error_code'] === 0 && $this->upload_info['check_mime'] === true){move_uploaded_file($_FILES[$input_name]['tmp_name'], $folder_to_move.$this->upload_info['name']);}
    //         }
    //         // $resultado['upload_info'] = $this->upload_info;
    //         // if($return_json){echo json_encode($resultado);}
    //         // if(!$return_json){return $resultado;}
    //     }
    //     *
    //     * @param str => $input_name = nome do input
    //     * @param str => $folder_to_move = nome da pasta em que o arquivo será salvo
    //     * @param arr => $mime_allowed = mime types permitidos no processo de upload
    //     * @param bol => $return_json = se true retorna um objeto json
        
    //     public function manage_multiple_file(string $input_name, string $folder_to_move, array $mime_allowed = [], bool $return_json = true){
    //         $resultado = array();
    //         $count_mime_allowed = count($mime_allowed);
    //         $qtd_arquivos_enviados = count($_FILES[$input_name]['tmp_name']);
    //         for($i = 0; $i < $qtd_arquivos_enviados; $i++){
    //             if(is_uploaded_file($_FILES[$input_name]['tmp_name'][$i])){
    //                 $new_name_file = bin2hex(random_bytes(64)).'.'.pathinfo($_FILES[$input_name]['name'][$i], PATHINFO_EXTENSION);
    //                 $this->upload_info[] = array(
    //                     'name' => $new_name_file,
    //                     'size' => $_FILES[$input_name]['size'][$i],
    //                     'mime' => finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES[$input_name]['tmp_name'][$i]),
    //                     'extension' => pathinfo($_FILES[$input_name]['name'][$i], PATHINFO_EXTENSION),
    //                     'check_mime' => true,
    //                     'folder_to_move' => $folder_to_move,
    //                     'error_code' => $_FILES[$input_name]['error'][$i],
    //                 );
    //                 if($count_mime_allowed > 0 && !in_array($this->upload_info[$i]['mime'], $mime_allowed, true)){$this->upload_info[$i]['check_mime'] = false;}
    //                 if($this->upload_info[$i]['error_code'] === 0 && $this->upload_info[$i]['check_mime'] === true){move_uploaded_file($_FILES[$input_name]['tmp_name'][$i], $folder_to_move.$this->upload_info[$i]['name']);}
    //             }
    //         }
    //         // $resultado['upload_info'] = $this->upload_info;
    //         // if($return_json){echo json_encode($resultado);}
    //         // if(!$return_json){return $resultado;}
    //     }
    // }


 ?>