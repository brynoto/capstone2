<?php 
function get_title() {
  'Index';
}

function get_content() { ?>
  

<?php } ?>
<?php require_once "template.php"; ?>

<div class="header-wrapper"></div>
<!-- left sidebar -->

<div class="container-fluid">
  <div class="row">
  <!-- left sidebar -->
    <div class="col">
     <h3>Categories</h3>
       
    </div>  
      
    <!-- main content  -->
    <div class="col-6">
       <h1 class="text-center display-4">Feature Products</h1>
      <div class="row">
        <div class="col-md-3">
          <div class="row">
           <h5>The International Zipper Hoodie</h5>
          </div>
          <div class="row">
            <img src="img/products/prod1.jpg" class="img-thumb">
            </div>
              <p class="list-price text-danger">List Price: <s>$40.00</s></p>
              <p class="price">Our price: $19.99</p>
              <div class="row">
              <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-1">Details</button></div>
         </div>     

        <div class="col-md-3">
          <div class="row">
            <h5>Dota 2 Logo Shirt</h5>
          </div>
          <div class="row">
            <img src="img/products/prod2.jpg" class="img-thumb">
            </div>
              <p class="list-price text-danger">List Price: <s>$25.00</s></p>
              <p class="price">Our price: $14.99</p>
              <div class="row">
              <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-2">Details</button></div>
         </div>     

         <div class="col-md-3">
          <div class="row">
            <h5>Metal Logo Cap Black Hat</h5>
          </div>
          <div class="row">
            <img src="img/products/prod3.jpg" class="img-thumb">
            </div>
              <p class="list-price text-danger">List Price: <s>$30.00</s></p>
              <p class="price">Our price: $24.99</p>
              <div class="row">
              <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-3">Details</button></div>
           </div>     

         <div class="col-md-3">
          <div class="row">
            <h5>Invoker Hoodie</h5>
          </div>
          <div class="row">
            <img src="img/products/prod4.jpg" class="img-thumb">
            </div>
              <p class="list-price text-danger">List Price: <s>$30.00</s></p>
              <p class="price">Our price: $24.99</p>
              <div class="row">
              <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-4">Details</button></div>
         </div>     

         <div class="col-md-3">
          <div class="row">
             <h5>Natus Vincere Hoodie</h5>
          </div>
          <div class="row">
            <img src="img/products/prod5.jpg" class="img-thumb">
           </div>
 
              <p class="list-price text-danger">List Price: <s>$30.00</s></p>
              <p class="price">Our price: $24.99</p>
              <div class="row">
              <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-5">Details</button></div>
         </div>    

         <div class="col-md-3">
           <div class="row">
              <h5>Team Liquid Hoodie</h5>
           </div>
           <div class="row">
             <img src="img/products/prod6.jpg" class="img-thumb">
             </div>
                <p class="list-price text-danger">List Price: <s>$30.00</s></p>
                <p class="price">Our price: $24.99</p>
                <div class="row">
                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-6">Details</button>
                </div>
         </div>   

        <div class="col-md-3">
          <div class="row">
            <h5>Virtus.Pro Hoodie</h5>
          </div>
          <div class="row">
            <img src="img/products/prod7.jpg" class="img-thumb">
            </div>
              <p class="list-price text-danger">List Price: <s>$30.00</s></p>
              <p class="price">Our price: $24.99</p>
              <div class="row">
              <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-7">Details</button></div>
        </div>     

        <div class="col-md-3">
          <div class="row">
             <h5>Team Secret Hoodie</h5>
          </div> 
          <div class="row">
            <img src="img/products/prod8.jpg" class="img-thumb">
            </div>
              <p class="list-price text-danger">List Price: <s>$30.00</s></p>
              <p class="price">Our price: $24.99</p>
              <div class="row">
              <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-8">Details</button></div>
        </div>         
      </div>
    </div>
<?php require_once 'partials/detailsmodal.php'; ?>

    <!-- right sidebar  -->
    <div class="col">Right Sidebar</div>
  </div>
</div>





<?php require 'partials/footer.php'; ?>