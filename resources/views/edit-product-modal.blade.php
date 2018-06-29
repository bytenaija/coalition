<div class="modal fade" id="editModal-{{$index}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="post" action="{{route('edit', $index)}}" id="editForm-{{$index}}">
    <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color:red;">Edit Product</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                    <div class="col-md-12 ">
                            <div>
                       {{csrf_field()}}
                            <div class="form-group">
                                <label for="productname">Product Name</label>
                                <input type="text" name="Productname" class="form-control" placeholder="Product Name" value="{{$product->productName}}" required>
                            </div>
                            <div class="form-group">
                                    <label for="productname">Quantity in Stock</label>

                                    <input type="text" name="quantityinstock" class="form-control" placeholder="Quantity in Stock" value="{{$product->quantity}}" required>
                                </div>
                            <div class="form-group">
                                    <label for="productname">Price Per Item</label>

                                    <input type="text" name="priceperitem" class="form-control" placeholder="Price Per Item" value="{{$product->price}}" required>
                            </div>
                            </div>
                        </div>
            </div>
            <div class="modal-footer">

              <button type="submit" id="edit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
    </form>
      </div>
      <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
      <script>
      $('#editForm-{{$index}}').submit(function(e){
            e.preventDefault();


            url = "{!! $index !!}";

            $.ajax({

        type: 'PUT',
        url: "/edit/" + url,
        dataType: 'json',
        data: $(this).serialize(),

        success: function(data) {

           if(data.success){
               location.reload()
           }
            }
            })
            })

      </script>
