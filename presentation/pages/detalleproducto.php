<!DOCTYPE php>
<html lang="en">

<?php include_once('../includes/head.php'); 

	$URL_FORIMAGE= "http://localhost/Final/uploads/";

								
	
?> 

	<body class="goto-here">
		<?php include_once('../includes/barritadearriba.php'); ?>
		<?php include_once('../includes/menu.php'); ?>

		<!-- END nav -->

		<div class="hero-wrap hero-bread" style="background-image: url('../images/bg_hamburguesa.jpg');">
			<div class="container">
				<div class="row no-gutters slider-text align-items-center justify-content-center">
					<div class="col-md-9 ftco-animate text-center">
						<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Inicio</a></span> <span>Productos</span></p>
						<h1 class="mb-0 bread">Productos</h1>
					</div>
				</div>
			</div>
		</div>

		<section class="ftco-section">
			<div class="container">				
				<div class="row justify-content-center">			 
									 <?php
									 	$ProductB = new ProductBusiness($con);

										$product=$ProductB->getProduct($_GET['detalle']);										 									
										
											
										?>	
											<div class="col-md-6 col-lg-3 ftco-animate">
												<div class="product">									
													<a href="#" class="img-prod"><img class="img-fluid" src="<?php echo $URL_FORIMAGE.$product->getImage() ?>" alt="imagen">
														<div class="overlay"></div>
													</a>
													<div class="text py-3 pb-4 px-3 text-center">																	
														<h3><a href="#"><?php echo $product->getName() ?></a></h3>
														<div class="d-flex">
															<p class="text-left"><?php echo $product->getDescription() ?></p>
															<div class="pricing">
																<p class="price"><span class="price-sale"><?php echo $product->getPrice() ?></span></p>
															</div>
														</div>
														<div class="bottom-area d-flex px-3">
															<div class="m-auto d-flex">
																<a href="shop.php" class="add-to-cart d-flex justify-content-center align-items-center text-center">Volver								
																</a>												
															</div>
											
										</div>
									</div>
								</div>
							</div>
							</div>
                </div>
		</section>	
		<section class="ftco-section">
			<div class="container">				
				<div class="row justify-content-center"> 
							<?php 
                            include_once('./funcs.php');
							

							$CommentB = new CommentBusiness($con);

							$idprod=$_GET['detalle'];

							if(isset($_POST['commentSubmit'])){
								unset($_POST['commentSubmit']);		
								
								$CommentB->createNewComment($_POST);
								
							
								redirect(`detalleproducto.php?detalle=$idprod`);
							}
                         ?>	

						<div class="modal-content px-5 py-3">							
						      
						
							<p class="h5">Comentarios:</p>
							
							<?php 
											
										

																						
										foreach($CommentB->getComments() as $comment){
												if($comment->getProduct() == $_GET['detalle']){											
												
										?>
										<p class="my-2">
										 <?php echo $comment->getCreationDate()?> -
										 <?php 
										  $in=$comment->getScorage();
										  for($i = 0; $i <= $in-1; $i++) {
											echo "★";
											};
										 ?> 
										 <?php 
										 	if($in==1){
												 echo "Malo";
											 }elseif($in==2){
												echo "Regular";
											 }elseif($in==3){
												echo "Bueno";
											 }elseif($in==4){
												echo "Muy bueno";
											 }elseif($in==5){
												echo "Excelente";
											 }
											 
										 ?> <br />
										 <b><?php echo $comment->getUser() ?></b>: 
										 <?php echo $comment->getComment()?></p><br />										 
										 </p><br />											 
										 <?php 
												}
											}										 
										 ?>
						<form action="" method="post" enctype="multipart/form-data">	
							<br><input class="my-2 d-none" type="text" name="product" value="<?php echo $product->getName() ?>" ><br /> 
							<br><input class="my-2 d-none" type="text" name="productId" value="<?php echo $product->getId() ?>" ><br />		
							Nombre:<br><input class="my-2" type="text" name="user" value="">
							<br><br />
						    Rank: <select name="rank" id="cars">
												<option value="1">Malo</option>
												<option value="2">Regular</option>
												<option value="3">Bueno</option>
												<option value="4">Muy bueno</option>
												<option value="5">Excelente</option>
											</select>	
											<br><br />					
							Mensaje:<br><input class="my-2" type="text" name="comment" value=""><br />
							<br>            
									<input class="my-2" type="submit" name="commentSubmit">        
						</form>
					</div>
					</div>
                </div>
			</section>
				 
		

		<?php include_once('../includes/footer.php'); ?>



		<!-- loader -->
		<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
				<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
				<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>


		<script src="../js/jquery.min.js"></script>
		<script src="../js/jquery-migrate-3.0.1.min.js"></script>
		<script src="../js/popper.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/jquery.easing.1.3.js"></script>
		<script src="../js/jquery.waypoints.min.js"></script>
		<script src="../js/jquery.stellar.min.js"></script>
		<script src="../js/owl.carousel.min.js"></script>
		<script src="../js/jquery.magnific-popup.min.js"></script>
		<script src="../js/aos.js"></script>
		<script src="../js/jquery.animateNumber.min.js"></script>
		<script src="../js/bootstrap-datepicker.js"></script>
		<script src="../js/scrollax.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
		<script src="../js/google-map.js"></script>
		<script src="../js/main.js"></script>

	</body>
</html>