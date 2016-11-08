<?php
/*
 * Template Name: Template Retail Page
 */
?>


<?php
    get_header();
    get_template_part('template_inc/inc','header');
//    get_template_part('template_inc/inc','breadcrumb');
?>
<section class="custom-tem-banner">
    <?php if(have_posts()):
        while(have_posts()):the_post();
    ?>
    <div class="custom-tem-banner-img">
        <?php  
         the_post_thumbnail();
        ?>
    </div>
    <div class="container custom-tem-banner-inner">
        <h2><?php echo get_field('custom-title');?></h2>
        <p><?php echo get_field('description'); ?></p>
    </div>
    <?php 
        endwhile;
        endif;
    ?>
</section>
<div class="container">
    <div class="breadcrumbs">
        <?php if(function_exists('bcn_display'))
        {
            bcn_display();
        }?>
    </div>
</div>
<div class="container retail-outlet">

<?php

if($_GET['location']){
                $code = $_GET['location'];
            }

if($_GET['radius']){
                $radius = $_GET['radius'];
            }
?>

    <h2>LOPI FIREPLACE OUTLETS</h2>
    <ul>
        <li class="col-md-8 col-sm-8 col-md-12">
            <p>
                There are over 60 Specialist Lopi Fireplace outlets across Australia. Please search for your local outlet below or contatct us on <strong>1800 064 234</strong> for further information.
            </p>
            <form action="" name="fined location" class="location">
                  <p>Enter your Town or Postcode</p>
                  <input type="search" name="location" value="<?php if(!empty($code)){echo $code;}?>">
                  <input type="submit" value="Find Location">

                  <p>Within</p>
                  <select name="radius" class="form-control">
                      <option value="15" <?php if($radius==15){echo 'selected';}?>>15km</option>
                      <option value="25" <?php if($radius==25){echo 'selected';}?>>25km</option>
                      <option value="50" <?php if($radius==50){echo 'selected';}?>>50km</option>
                      <option value="100" <?php if($radius==100){echo 'selected';}?>>100km</option>
                      <option value="200" <?php if($radius==200){echo 'selected';}?>>200km</option>
                      <option value="500" <?php if($radius==500){echo 'selected';}?>>500km</option>
                      <option value="1000" <?php if($radius==1000){echo 'selected';}?>>1000km</option>
                      <option value="2500" <?php if($radius==2500){echo 'selected';}?>>2500km</option>
                  </select>
            </form>
      


<?php

function distance($lat1, $lon1, $lat2, $lon2, $unit)
{
  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);
  if ($unit == "K") {
    return ($miles * 1.609344);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
        return $miles;
      }
}


global $wpdb;


    $rows = $wpdb->get_results("SELECT * FROM ausSuburbDatabase where postcode='$code'");



   

    foreach ( $rows as $row ) {
                $lat = $row->lat;
$lon = $row->lon;
                }

                        $job_args = array( 'posts_per_page' => 5, 'post_type' => 'lopioutlets', 'orderby' => 'ID', 'order' => 'DESC' );

                        $jobs = get_posts( $job_args );

            $i = 0;
            
                        foreach ( $jobs as $post ) : setup_postdata( $post );
            $i = $i + 1;
            
$dbcode = get_post_meta( $post->ID, 'postalcode', true );

                    $latitude = get_post_meta( $post->ID, 'latitude', true );
                    $longitude = get_post_meta( $post->ID, 'longitude', true );

$dist = distance($lat,$lon,$latitude,$longitude, "K");

  
            if($dist < $radius){

            if($i==1){
                    $phone1 = get_post_meta( $post->ID, 'phone', true );
                    $latitude1 = get_post_meta( $post->ID, 'latitude', true );
                    $longitude1 = get_post_meta( $post->ID, 'longitude', true ); 

$dis1 = distance($lat,$lon,$latitude1,$longitude1, "K");

$title1 = get_the_title($post->ID);
$address1 = get_post_meta( $post->ID, 'address', true );

            }else if($i==2){
                    $phone2 = get_post_meta( $post->ID, 'phone', true );
                    $latitude2 = get_post_meta( $post->ID, 'latitude', true );
                    $longitude2 = get_post_meta( $post->ID, 'longitude', true ); 

$dis2 = distance($lat,$lon,$latitude2,$longitude2, "K");

$title2 = get_the_title($post->ID);
$address2 = get_post_meta( $post->ID, 'address', true );
            }
            }    
           endforeach;



                    ?>
     


<script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script type="text/javascript">// <![CDATA[
var markers = [
{"lat":"<?php if(!empty($lat)){echo $lat; }else{echo '-35.276370';} ?>","lng":"<?php if(!empty($lon)){echo $lon; }else{echo '149.120489';} ?>"}, 

<?php if(!empty($code) && !empty($latitude1)){ ?>
{"title":"<?php echo $title1; ?>","lat":"<?php if(!empty($latitude1)){echo $latitude1; } ?>","lng":"<?php if(!empty($longitude1)){echo $longitude1; } ?>","description":"<?php echo $address1; ?>"},
<?php } ?>
<?php if(!empty($code) && !empty($latitude2)){ ?>
{"title":"<?php echo $title2; ?>","lat":"<?php if(!empty($latitude2)){echo $latitude2; } ?>","lng":"<?php if(!empty($longitude2)){echo $longitude2; } ?>","description":"<?php echo $address2; ?>"}
<?php } ?>
];
window.onload = function () {
var mapOptions = {
center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
zoom: 10,
mapTypeId: google.maps.MapTypeId.ROADMAP
};
var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
var infoWindow = new google.maps.InfoWindow();
var lat_lng = new Array();
var latlngbounds = new google.maps.LatLngBounds();
for (i = 0; i < markers.length; i++) {
var data = markers[i]
var myLatlng = new google.maps.LatLng(data.lat, data.lng);
lat_lng.push(myLatlng);
var marker = new google.maps.Marker({
position: myLatlng,
map: map,
title: data.title
});
latlngbounds.extend(marker.position);
(function (marker, data) {
google.maps.event.addListener(marker, "click", function (e) {
infoWindow.setContent(data.description);
infoWindow.open(map, marker);
});
})(marker, data);
}
map.setCenter(latlngbounds.getCenter());
map.fitBounds(latlngbounds);
}

// ]]></script></pre>
            
       <div id="dvMap" style="width: 670px; height: 280px;"></div>    




        </li>

<?php if(!empty($title1) || !empty($title2)){ ?>


        <li class="col-md-4 col-sm-4 col-md-12 search-result">
          <h3>Your Search Results</h3>
<?php if(!empty($title1)){ ?>
          <div class="results">
            <div class="results-inner">
              <div class="results-inner-left">
                <img src="<?php bloginfo( 'template_directory' ); ?>/images/map-icon.png" alt="map-marker">
              </div>
              <div class="results-inner-right">
                <h4><?php echo $title1; ?></h4>
                <h4 class="black"><?php echo round($dis1); ?>Km</h4>
              </div>
                <p><?php echo $address1; ?></p>
              <p class="bolder-font">
                <?php echo $phone1; ?>
              </p>
              <div class="directions">
                <a target="_blank" href="https://www.google.com.au/maps?saddr=<?php echo $code;?>&daddr=<?php echo $address1;?>">Directions</a>
              </div>
            </div>
            <div class="result-divider"></div>
<?php } ?>
<?php if(!empty($title2)){ ?>

            <div class="results-inner">
              <div class="results-inner-left">
                <img src="<?php bloginfo( 'template_directory' ); ?>/images/map-icon.png" alt="map-marker">
              </div>
              <div class="results-inner-right">
                <h4><?php echo $title2; ?></h4>
                <h4 class="black"><?php echo round($dis2); ?>Km</h4>
              </div>
                <p><?php echo $address2; ?></p>
              <p class="bolder-font">
                <?php echo $phone2; ?>
              </p>
              <div class="directions">
                <a target="_blank" href="https://www.google.com.au/maps?saddr=<?php echo $code;?>&daddr=<?php echo $address2;?>">Directions</a>
              </div>
            </div>
<?php } ?>
          </div>
        </li>
<?php } ?>
    </ul>

</div>
    <div class="pro-bottom-banner" style="background:url(<?php the_field('bg_image'); ?>)">
       <?php
        if(have_posts()):
            while(have_posts()):the_post();?>
               <?php the_field('banner-text'); ?>
        <?php
            endwhile;
        endif;
        wp_reset_query();
        ?>
    </div>
    <div class="pro-newsletter">
        <div class="container">
            <?php
                dynamic_sidebar('newsletter');
            ?>
        </div>
    </div>
<?php
    interiart_footer_type();
    get_footer();
?>