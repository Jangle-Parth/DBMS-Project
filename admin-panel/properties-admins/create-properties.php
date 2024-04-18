<?php require "../layouts/header.php";?>
<?php require "../../config/config.php";?>
  


<?php 
$id = '';
if(isset($_POST['submit'])) {
  if(empty($_POST['name']) OR empty($_POST['location']) OR empty($_POST['price'])
  OR empty($_POST['beds']) OR empty($_POST['bath']) OR empty($_POST['sqft'])
  OR empty($_POST['home_type']) OR empty($_POST['year_built']) OR empty($_POST['type'])
  OR empty($_POST['price_sqft']) OR empty($_POST['description']))
  {
    echo "<script>alert('some inputs are empty');</script>";
  }
  
  
  else{
    $name = $_POST['name'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $beds = $_POST['beds'];
    $bath = $_POST['bath'];
    $sqft = $_POST['sqft'];
    $home_type = $_POST['home_type'];
    $year_built = $_POST['year_built'];
    $type = $_POST['type'];
    $price_sqft = $_POST['price_sqft'];
    $description = $_POST['description'];
    $adminname = $_SESSION['adminname'];
    $image = $_FILES['thumbnail']['name'];
    $dir="thumbnails/".basname($image);

    $insert = $conn->prepare("INSERT INTO posts(name,location,
    price,beds,bath,sqft,home_type,year_built,type,price_sqft,
    description,adminname,image) 
    VALUES (:name,:location,:price,:beds,:bath,:sqft,
    :home_type,:year_built,:type,:price_sqft,:description,
    :admin_name,:image)"
    );
    $insert->execute([
      ':name'=>$name,
      ':location'=>$location,
      ':price'=>$price,
      ':beds'=>$beds,
      ':bath'=>$bath,
      ':sqft'=>$sqft,
      ':home_type'=>$home_type,
      ':year_built'=>$year_built,
      ':type'=>$type,
      ':price_sqft'=>$price_sqft,
      ':description'=>$description,
      ':admin_name'=>$adminname,
      ':image'=>$image,
    ]);

    if(move_uploaded_file($_FILES['thumbnail']['tmp_name'],$dir)){
      echo "<script>alert('Data Inserted Succefully');</script>";
    }
  }
  //   $id = $conn->lastInsertId();
	// foreach ($_FILES['image']['tmp_name'] as $key => $value) {
	// 	$filename=$_FILES['image']['name'][$key];
	// 	$filename_tmp=$_FILES['image']['tmp_name'][$key];
	// 	echo '<br>';
	// 	$ext=pathinfo($filename,PATHINFO_EXTENSION);

	// 	$finalimg='';
		
			
			
	// 			 $filename=str_replace('.','-',basename($filename,$ext));
	// 			 $newfilename=$filename.time().".".$ext;
	// 			 move_uploaded_file($filename_tmp, 'images/'.$newfilename);
	// 			 $finalimg=$newfilename;
			
	// 		$creattime=date('Y-m-d h:i:s');

  //           // $id=$_POST['id'];
	// 		//insert
	// 		$insertqry=$conn->prepare("INSERT INTO `multiple-images`( `image_name`, `image_createtime`, post_id) VALUES ('$finalimg','$creattime', '$id')");
	// 		$insertqry->execute();

	// 		header('Location: index.php');
		
	// }
}



?>
<div class="container-fluid">
    <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Create Properties</h5>
                <form method="POST" action="create-properties.php" enctype="multipart/form-data">
                    <!-- Email input -->
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                    </div>    
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="location" id="form2Example1" class="form-control" placeholder="location" />
                    </div> 
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="price" id="form2Example1" class="form-control" placeholder="price" />
                    </div> 
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="beds" id="form2Example1" class="form-control" placeholder="beds" />
                    </div>
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="bath" id="form2Example1" class="form-control" placeholder="baths" />
                    </div>
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="sqft" id="form2Example1" class="form-control" placeholder="SQ/FT" />
                    </div>   
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="year_built" id="form2Example1" class="form-control" placeholder="Year Build" />
                    </div> 
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="price_sqft" id="form2Example1" class="form-control" placeholder="Price Per SQ FT" />
                    </div> 
                    
                    <select name="home_type" class="form-control form-select" aria-label="Default select example">
                        <option selected>Select Home Type</option>
                        <option value="Condo">Falt</option>
                        <option value="Condo">Bunglow</option>
                        <option value="Condo">Land</option>
                    </select>   
                    <select name="type" class="form-control mt-3 mb-4 form-select" aria-label="Default select example">
                        <option selected>Select Type</option>
                        <option value="Rent">Rent</option>
                        <option value="Sale">Sale</option>
                        <option value="Condo">Condo</option>
                    </select>  
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea placeholder="Description" name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Property Thumbnail</label>
                        <input name="thumbnail" class="form-control" type="file" id="formFile">
                    </div>
                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Gallery Images</label>
                        <input name="images" class="form-control" type="file" id="formFileMultiple" multiple>
                    </div>
                    <!-- Submit button -->
                    <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>
            
                </form>

            </div>
          </div>
        </div>
      </div>
<?php require "../layouts/footer.php";?>
