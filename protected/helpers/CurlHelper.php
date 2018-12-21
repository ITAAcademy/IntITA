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

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  $url
     * @param  $filename
     * @param  $file
     * @param  $params - type, id
     * @param  $private - file type
     */
    function loadImageToDependServer($url, $filename, $file, $params = [], $private = false)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        $postData = array(
            'name' => $filename,
            'file' => $file,
            'params' => $params,
            'private' => $private,
        );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_exec($ch);
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  $url
     * @param  $filename
     * @param  $params - type, id
     * @param  $private - file type
     */
    function unlinkImageFromDependServer($url, $filename, $params = [], $private = false)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        $postData = array(
            'name' => $filename,
            'params' => $params,
            'private' => $private,
        );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_exec($ch);
    }

}