<?php
/**
 * Template part for displaying the reviews partial
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

<?php 
$title = get_sub_field('title');
$show_google_reviews = get_sub_field('show_google_reviews');
$show_tripadvisor = get_sub_field('show_tripadvisor');
?>

<section class="reviews mb-5">
    <div class="container">
        <div class="row">

            <?php if($title): ?>
                <div class="col-12">
                    <h2><?php echo $title; ?></h2>
                </div>
            <?php endif; ?>

            <?php if($show_google_reviews): ?>
                <div class="col-12 col-md-8 pt-3">
                    <div class="reviews-container">
                        <div id="google-reviews">
                            <?php
                            $key = 'AIzaSyCCvWoyNV9d1VFgAlCiA1QCbU1d3npUgvk';
                            $url = "https://maps.googleapis.com/maps/api/place/details/json?placeid=ChIJc93vBmHX5ogRVBKgklhEc-w&key=$key"; // path to your JSON file
                            $data = file_get_contents($url); // put the contents of the file into a variable
                            $tags = json_decode($data,true); // decode the JSON feed
                            $i = 0;

                            foreach( $tags['result']['reviews'] as $tag ): 

                                if ($i++ == 2) break;
                                
                                $author_name       = $tag['author_name'];
                                $photo_url         = $tag['profile_photo_url'];
                                $review            = $tag['text'];
                                $rating            = $tag['rating'];
                                $time              = $tag['time'];
                                $rough_time        = $tag['relative_time_description'];

                                if ($rating == 5):
                                    $starRating = "<i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i>";
                                elseif($rating == 4):
                                    $starRating = "<i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i>";
                                elseif($rating == 3):
                                    $starRating = "<i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i>";
                                elseif($rating == 2):
                                    $starRating = "<i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i>";
                                else:
                                    $starRating = "<i class='fa fa-star' aria-hidden='true'></i>";
                                endif;
                            ?>

                                <div class="review-wrap d-flex mb-4">
                                    <div class="author text-center mr-3 mb-3">
                                        <img class="author-img mb-2" src="<?php echo $photo_url; ?>" alt="<?php echo $author_name; ?>" />
                                        <div class="rating d-flex"><?php echo $starRating; ?></div>
                                    </div>
                                    <div class="review">
                                        <h4 class="author-name grey"><?php echo $author_name; ?></h4>
                                        <?php echo $review; ?>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if($show_tripadvisor): ?>
                <div class="col-12 col-md-4">
                    <div id="TA_selfserveprop845" class="TA_selfserveprop"><ul id="0iQVoXq" class="TA_links G7Scjs"><li id="LikoaALFX" class="9r8RIMFjwBJ"><a target="_blank" href="https://www.tripadvisor.com/"><img src="https://www.tripadvisor.com/img/cdsi/img2/branding/150_logo-11900-2.png" alt="TripAdvisor"/></a></li></ul></div><script async src="https://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=845&amp;locationId=3224952&amp;lang=en_US&amp;rating=true&amp;nreviews=1&amp;writereviewlink=true&amp;popIdx=true&amp;iswide=false&amp;border=true&amp;display_version=2" data-loadtrk onload="this.loadtrk=true"></script>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>