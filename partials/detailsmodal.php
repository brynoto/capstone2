<div class="modal fade details-1" id="details-1" role="dialog" aria-labelledby="details-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center">The International Zipper Hoodie</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span> 
          </button>    
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <div class="center-block">
                <img src="img/products/prod1.jpg" alt="avatar" class="details img-responsive">
              </div>
            </div>
            <div class="col-sm-6">
              <h4>Details</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore e.</p>
              <hr>
              <p>Price: $19.99</p>
              <p>Brand: Bench</p>
              <form action="add_cart.php" method="POST">
                <div class="form-group">
                  <div class="col-sm-3">
                    <label for="quantity">Quantity:</label>
                    <input type="text" class="form-control" id="quantity" name="quantity">
                  </div>
                  <p>Available: 3</p>
                </div>
                <div class="form-group">
                  <label form="size">Size:</label>
                  <select name="size" id="size" class="form-control">
                    <option value=""></option>
                    <option value="small">Small</option>
                    <option value="medium">Medium</option>
                    <option value="large">Large</option>
                  </select>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default" data-dismiss="modal">Close</button>
        <button class="btn btn-warning" type="submit"><span class="glyphicon glyphicon-shopping-cart"></span>Add to Cart</button>
      </div>
   </div>
  </div>
</div>