<?php

namespace App\Traits;

use App\Traits\geometryLibrary\PolyUtil;

trait GmapTrait {
    
  /**
   * @param String postcode
   * @return Boolean
   */
  public function getCoordinate($postcode) {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://maps.googleapis.com/maps/api/geocode/json?address='.$postcode.'&region=GB&key='.env('Google_MAP_KEY'),
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
    ));
    
    $response = curl_exec($curl);
    curl_close($curl);
    return json_decode($response);
  }

  /**
   * @param Array job_coords
   * @param Array user_poly_coords
   * 
   * @return Boolean
   */
  public function sentNotificationToTradeperson(Array $jobcoords, Array $coordinaties) {
    $response =  PolyUtil::containsLocation($jobcoords, $coordinaties);      
    return $response;
  }
}