<?php require "includes/header.php";?>
<?php require "config/config.php";?>

<?php
  if(isset($_GET['id'])){
    $id=$_GET['id'];
    $single=$conn->query("SELECT * FROM props WHERE id='$id'");
    $single->execute();
    $allDetails=$single->fetch(PDO::FETCH_OBJ); 
    $relatedProps=$conn->query("SELECT * FROM props WHERE home_type='$allDetails->home_type' AND id !='$id'");
    $relatedProps->execute();
    $allRelatedProps=$relatedProps->fetchAll(PDO::FETCH_OBJ);    
}
    $images=$conn->query("SELECT * FROM related_images WHERE prop_id='$id'");
    $images->execute();
    $allImages=$images->fetchAll(PDO::FETCH_OBJ);
?> 





<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?php echo APPURL; ?>/images/<?php echo $allDetails->image; ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">
      <div class="col-md-10">
        <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">Property Details of</span>
        <h1 class="mb-2"><?php echo $allDetails->name; ?></h1>
        <p class="mb-5"><strong class="h2 text-success font-weight-bold"><?php echo $allDetails->price; ?></strong></p>
      </div>
    </div>
  </div>
</div>

<div class="site-section site-section-sm">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div>
          <div class="slide-one-item home-slider owl-carousel">
            <?php foreach($allImages as $image) : ?>
              <div><img src="images/<?php echo $image->image; ?>" alt="Image" class="img-fluid"></div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="bg-white property-body border-bottom border-left border-right">
          <div class="row mb-5">
            <div class="col-md-6">
              <strong class="text-success h1 mb-3"><?php echo $allDetails->price; ?></strong>
            </div>
            <div class="col-md-6">
              <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
              <li>
                <span class="property-specs">Beds</span>
                <span class="property-specs-number"><?php echo $allDetails->beds; ?></span>
                
              </li>
              <li>
                <span class="property-specs">Baths</span>
                <span class="property-specs-number"><?php echo $allDetails->bath; ?></span>
                
              </li>
              <li>
                <span class="property-specs">SQ FT</span>
                <span class="property-specs-number"><?php echo $allDetails->sqft; ?></span>
                
              </li>
            </ul>
            </div>
          </div>
          <div class="row mb-5">
            <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
              <span class="d-inline-block text-black mb-0 caption-text">Home Type</span>
              <strong class="d-block"><?php echo str_replace('-',' ',$allDetails->home_type); ?></strong>
            </div>
            <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
              <span class="d-inline-block text-black mb-0 caption-text">Year Built</span>
              <strong class="d-block"><?php echo $allDetails->year_built; ?></strong>
            </div>
            <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
              <span class="d-inline-block text-black mb-0 caption-text">Price/Sqft</span>
              <strong class="d-block"><?php echo $allDetails->price_sqft; ?></strong>
            </div>
          </div>
          <h2 class="h4 text-black">More Info</h2>
          <p>
            <?php echo $allDetails->description; ?>
          </p>

          <div class="row no-gutters mt-5">
            <div class="col-12">
              <h2 class="h4 text-black mb-3">Gallery</h2>
            </div>
            <?php foreach($allImages as $image) : ?>
              <div class="col-sm-6 col-md-4 col-lg-3">
                <a href="images/<?php echo $image->image; ?>" class="image-popup gal-item"><img src="images/<?php echo $image->image; ?>" alt="Image" class="img-fluid"></a>
              </div>
            <?php endforeach; ?>
          
          
          </div>
        </div>
      </div>
      <div class="col-lg-4">

        <div class="bg-white widget border rounded">

          <h3 class="h4 text-black widget-title mb-3">Contact Agent</h3>
          <form action="" class="form-contact-agent">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" id="name" class="form-control">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" class="form-control">
            </div>
            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" id="phone" class="form-control">
            </div>
            <div class="form-group">
              <input type="submit" id="phone" class="btn btn-primary" value="Send Message">
            </div>
          </form>
        </div>

        <div class="bg-white widget border rounded">
          <h3 class="h4 text-black widget-title mb-3 ml-0">Share</h3>
              <div class="px-3" style="margin-left: -15px;">
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo APPURL; ?>/property-details.php?id=<?php echo $allDetails->id; ?>&quote=<?php echo $allDetails->name; ?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                <a  href="https://twitter.com/intent/tweet?text=<?php echo $allDetails->name; ?>&url=<?php echo APPURL; ?>/property-details.php?id=<?php echo $allDetails->id; ?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo APPURL; ?>/property-details.php?id=<?php echo $allDetails->id; ?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>    
              </div>            
        </div>

        <div class="bg-white widget border rounded">
          <h3 class="h4 text-black widget-title mb-3 ml-0">ADD THIS TO FAVORITE</h3>
              <div class="px-3" style="margin-left: -15px;">
                <form action="addfav.php" class="form-contact-agent" method="POST">
                  <div class="form-group">
                    <label for="name">prop_id</label>
                    <input type="text" id="name" name="prop_id" value="<?php echo $id; ?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="email">user_id</label>
                    <input type="email" id="email" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="submit" name="submit" id="phone" class="btn btn-primary" value="Add to Favorite">
                  </div>
                </form>
              </div>            
        </div>

      </div>
      
    </div>
  </div>
</div>

<div class="site-section site-section-sm bg-light">
  <div class="container">

    <div class="row">
      <div class="col-12">
        <div class="site-section-title mb-5">
          <h2>Related Properties</h2>
        </div>
      </div>
    </div>
  
    <div class="row mb-5">
      <?php foreach ($allRelatedProps as $allRelatedProp) : ?>
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="property-entry h-100">
            <a href="property-details.php?id=<?php echo $allRelatedProp->id; ?>" class="property-thumbnail">
              <div class="offer-type-wrap">
                <span class="offer-type bg-<?php if($allRelatedProp->type=="rent") {echo "success";} else {echo "danger";}?>"><?php echo $allRelatedProp->type; ?></span>
              </div>
              <img src="images/<?php echo $allRelatedProp->image; ?>" alt="Image" class="img-fluid">
            </a>
            <div class="p-4 property-body">
              <h2 class="property-title"><a href="property-details.php"><?php echo $allRelatedProp->name; ?></a></h2>
              <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> <?php echo $allRelatedProp->location; ?></span>
              <strong class="property-price text-primary mb-3 d-block text-success"><?php echo $allRelatedProp->price; ?></strong>
              <ul class="property-specs-wrap mb-3 mb-lg-0">
                <li>
                  <span class="property-specs">Beds</span>
                  <span class="property-specs-number"><?php echo $allRelatedProp->beds; ?></span>
                  
                </li>
                <li>
                  <span class="property-specs">Baths</span>
                  <span class="property-specs-number"><?php echo $allRelatedProp->bath; ?></span>
                  
                </li>
                <li>
                  <span class="property-specs">SQ FT</span>
                  <span class="property-specs-number"><?php echo $allRelatedProp->sqft; ?></span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
<?php require "includes/footer.php";?>
