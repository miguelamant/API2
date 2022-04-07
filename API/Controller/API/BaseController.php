<?php
class BaseController
{
    /**
     * __call magic method.
     */
    public function __call($name, $arguments)
    {
        $this->sendOutput('', array('HTTP/1.1 404 Not Found'));
    }
 
    /**
     * Get URI elements.
     * 
     * @return array
     */
    protected function getUriSegments()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = explode( '/', $uri );
 
        return $uri;
    }
 
    /**
     * Get querystring params.
     * 
     * @return array
     */
    protected function getQueryStringParams()
    {
        parse_str($_SERVER['QUERY_STRING'], $query);
        return $query;
    }
    protected function getQueryJSONStringParams(){
        $jsonArray = json_decode(file_get_contents('php://input'),true);
        return $jsonArray;
    }//so the server runs php, and within the php package, there is a kind of input
    //in the php://input directory, the JSON object is saved, this is the data
    //so the post method is a stream, with a header, and some data added to it. 
    //the header is the URI I guess. 
    //and the data is the JSON object. 
    //file_get_contents gets the JSON object stored in 'php://input'. json_decode forms it into a 
    //valid json object according to the php rules. 

    //so now, the code could actually work. the main difference is the part above here
    //next to do is simulate a post request, by using CURL 
 
    /**
     * Send API output.
     *
     * @param mixed  $data
     * @param string $httpHeader
     */
    protected function sendOutput($data, $httpHeaders=array())
    {
        header_remove('Set-Cookie');
 
        if (is_array($httpHeaders) && count($httpHeaders)) {
            foreach ($httpHeaders as $httpHeader) {
                header($httpHeader);
            }
        }
 
        echo $data;
        exit;
    }
}