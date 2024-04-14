<?php require "includes/header.php";?>
<?php require "config/config.php";?>
  <?php
    
    $listings=[];
    $select=$conn->query("SELECT * FROM props");
    $select->execute();
    $props=$select->fetchAll(PDO::FETCH_OBJ);

    if(isset($_POST['submit'])){
        $types=$_POST['types'];
        $offers=$_POST['offers'];
        $cities=$_POST['cities'];


        $search=$conn->query("SELECT * FROM props WHERE home_type LIKE '%$types%' OR type LIKE '%$offers%' OR location LIKE '%$cities%'");
        $search->execute();
        $listings=$search->fetchAll(PDO::FETCH_OBJ);
    }
    else{
        header("location: ".APPURL."");
    }
  ?>
  
    <div class="slide-one-item home-slider owl-carousel">
    <?php foreach ($props as $prop) : ?>
      <div class="site-blocks-cover overlay" style="background-image: url(images/<?php echo $prop->image; ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
              <span class="d-inline-block bg-<?php if($prop->type=="rent") {echo "success";} else {echo "danger";}?> success text-white px-3 mb-3 property-offer-type rounded"><?php echo $prop->type; ?></span>
              <h1 class="mb-2"><?php echo $prop->name; ?></h1>
              <p class="mb-5"><strong class="h2 text-success font-weight-bold"><?php echo $prop->price; ?></strong></p>
              <p><a href="property-details.php?id=<?php echo $prop->id; ?>" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">See Details</a></p>
            </div>
          </div>
        </div>
      </div>  
      <?php endforeach; ?>

     
    </div>


    <div class="site-section site-section-sm pb-0">
      <div class="container">
        <div class="row">
          <form class="form-search col-md-12" method="POST" action="search.php" style="margin-top: -100px;">
            <div class="row  align-items-end">
              <div class="col-md-3">
                <label for="list-types">Listing Types</label>
                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down"></span>
                  <select name="types" id="list-types" class="form-control d-block rounded-0">
                    <option value="">Flat</option>
                    <option value="">Commercial Building</option>
                    <option value="">Land Property</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <label for="offer-types">Offer Type</label>
                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down"></span>
                  <select name="offers" id="offer-types" class="form-control d-block rounded-0">
                    <option value="">Sale</option>
                    <option value="">Rent</option>
                    <option value="">Lease</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <label for="select-city">Select City</label>
                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down"></span>
                  <select name="cities" id="select-city" class="form-control d-block rounded-0">
                    <option value="ahmedabad">Ahmedabad</option>
                    <option value="mumbai">Mumbai</option>
                    <option value="chennai">Chennai</option>
                    <option value="calcutta">Calcutta</option>
                    <option value="delhi">Delhi</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <input type="submit" name="submit" class="btn btn-success text-white btn-block rounded-0" value="Search">
              </div>
            </div>
          </form>
        </div>  

        <div class="row">
          <div class="col-md-12">
            <div class="view-options bg-white py-3 px-3 d-md-flex align-items-center">
              <div class="mr-auto">
                <a href="index.php" class="icon-view view-module active"><span class="icon-view_module"></span></a>
                <a href="view-list.html" class="icon-view view-list"><span class="icon-view_list"></span></a>
                
              </div>
              <div class="ml-auto d-flex align-items-center">
                <div>
                  <a href="#" class="view-list px-3 border-right active">All</a>
                  <a href="#" class="view-list px-3 border-right">Rent</a>
                  <a href="#" class="view-list px-3">Sale</a>
                </div>


                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down"></span>
                  <select class="form-control form-control-sm d-block rounded-0">
                    <option value="">Sort by</option>
                    <option value="">Price Ascending</option>
                    <option value="">Price Descending</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
       
      </div>
    </div>

    <div class="site-section site-section-sm bg-light">
      <div class="container">
      
        <div class="row mb-5">
            <?php if(count($listings) > 0): ?>
                <?php foreach ($listings as $listing) : ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="property-entry h-100">
                    <a href="property-details.php?id=<?php echo $listing->id; ?>" class="property-thumbnail">
                        <div class="offer-type-wrap">
                        <span class="offer-type bg-danger"><?php echo $listing->type; ?></span>
                        </div>
                        <img src="images/<?php echo $listing->image; ?>" alt="Image" class="img-fluid">
                    </a>
                    <div class="p-4 property-body">
                        <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                        <h2 class="property-title"><a href="property-details.php?id=<?php echo $listing->id; ?>"><?php echo $listing->name; ?></a></h2>
                        <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span><?php echo $listing->location; ?></span>
                        <strong class="property-price text-primary mb-3 d-block text-success"><?php echo $listing->price; ?></strong>
                        <ul class="property-specs-wrap mb-3 mb-lg-0">
                        <li>
                            <span class="property-specs">Beds</span>
                            <span class="property-specs-number"><?php echo $listing->beds; ?></span>
                            
                        </li>
                        <li>
                            <span class="property-specs">Baths</span>
                            <span class="property-specs-number"><?php echo $listing->bath; ?></span>
                            
                        </li>
                        <li>
                            <span class="property-specs">SQ FT</span>
                            <span class="property-specs-number"><?php echo $listing->sqft; ?></span>
                            
                        </li>
                        </ul>

                    </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php else : ?>
                <div class="bg-success text-white">No Records Found</div>
            <?php endif; ?>
            </div>
     
        
      </div>
    </div>

    <?php require "includes/footer.php";?>