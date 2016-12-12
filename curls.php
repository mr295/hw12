<?php

     class curl {
     public $page;

     function httpGetException($object)
     { 
       $ch = curl_init();
       curl_setopt($ch,CURLOPT_URL, $object);
       curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
       $output = curl_exec($ch);
       
     if($output == false)
     {
      echo "Error Number:".curl_errno($ch)."<br>";
      echo "Echo String:".curl_error($ch);
      }
      curl_close($ch);
      return $output;
      }
      
      function httpPost($url,$params)
      { 
      $postData = '';

      foreach($params as $k => $x)
      { 
        $postData .= $k . '='.$x.'&';
      }
      $postData = rtrim($postData, '&');
      $ch = curl_init();
      curl_setopt($ch,CURLOPT_URL,$url);
      curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch,CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_POST, count($postData));
      curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
      $output = curl_exec($ch);
   
   if($output == false)
   {
      echo "Error Number:".curl_errno($ch)."<br>";
      echo "Error String:".curl_error($ch);
   }
   curl_close($ch);
   return($output);
   }
   }

   $page = new curl;
   $url = "web.njit.edu/~mr295";
   $page->httpGetException($url);
   $page1 = new curl;
   
   $params = array( 
    "name" => "Mehul Rana",
    "Major" => "Business and Information Systems",
    "school" => "NJIT",
    "Course" => "IS218-Web Application"
    );
    
    echo $page1->httpPost($url,$params);
?>