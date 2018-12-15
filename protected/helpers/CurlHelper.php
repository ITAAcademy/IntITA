<?php

class CurlHelper
{
    function callPageByCurl($url)
    {
        $options = array(
            CURLOPT_RETURNTRANSFER => true,     // return web page
            CURLOPT_HEADER         => false,    // don't return headers
            CURLOPT_FOLLOWLOCATION => true,     // follow redirects
            CURLOPT_ENCODING       => "",       // handle all encodings
            CURLOPT_USERAGENT      => "spider", // who am i
            CURLOPT_AUTOREFERER    => true,     // set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
            CURLOPT_TIMEOUT        => 120,      // timeout on response
            CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
            CURLOPT_SSL_VERIFYPEER => false     // Disabled SSL Cert checks
        );

        $ch = curl_init( $url );
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $session=new CHttpSession;
        $session->open();

        curl_setopt($ch, CURLOPT_COOKIE, "JSESSIONID=".$session->getSessionID());
        curl_setopt_array( $ch, $options );
        $content = curl_exec( $ch );
        $err     = curl_errno( $ch );
        $errmsg  = curl_error( $ch );
        $header  = curl_getinfo( $ch );

        curl_close( $ch );

        $header['errno']   = $err;
        $header['errmsg']  = $errmsg;
        $header['content'] = $content;
    }

    function loadImageToDependServer($url, $filename, $file, $path = null)
    {

        $target_url = $url;
        //This needs to be the full path to the file you want to send.
        $file_name_with_full_path =$file['tmp_name']['course_img'];
        /* curl will accept an array here too.
         * Many examples I found showed a url-encoded string instead.
         * Take note that the 'key' in the array will be the key that shows up in the
         * $_FILES array of the accept script. and the at sign '@' is required before the
         * file name.
         */
        $post = array('extra_info' => '123456','file_contents'=>'@'.$file_name_with_full_path);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$target_url);
        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        $result=curl_exec ($ch);
        curl_close ($ch);
        echo $result;


//
//        $tmpfile = $file['tmp_name']['course_img'];
//
////        $data = array(
////            'uploaded_file' => '@'.$tmpfile.';filename='.$filename,
////        );
//
//        $data = array(
//            'file' => '@'.$tmpfile.';filename='.$filename,
//        );
//        $ch = curl_init();
////        $data = array('name' => $filename, 'file' => '@'.$tmpfile, 'path' => $path);
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_POST, 1);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
//        curl_exec($ch);
//

//        $tmpfile = $file['tmp_name']['course_img'];
//        $filename = basename($file['name']['course_img']);
//
//        $data = array(
//            'uploaded_file' => '@'.$tmpfile.';filename='.$filename,
//        );
//
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
//// set your other cURL options here (url, etc.)
//
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_POST, 1);
//
//        curl_exec($ch);
    }

}