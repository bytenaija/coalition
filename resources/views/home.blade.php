<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

        <style>
            input{
                margin: 1rem;
            }

            body{
                background-color: black;
                color: white;
                padding: 5rem;
            }

            thead{
                color:red;
            }

            #submitInventory{
                margin-bottom: 2rem;
            }

            .total{
                color:red;
                font-weight: bold;
            }

            .modal-body{
                color:black;
                text-align: left;
            }

            .modal-body input{
                margin: 0;

            }
        </style>

    </head>
    <body>
        <section class="container-fluid">

                <div class="col-md-6 text-center offset-3">
                    <div>
                    <h4>Save Product Inventory</h4>
                    <form method="post" action="{{route('save')}}" id="productsForm">
                        {{csrf_field()}}
                    <input type="text" name="Productname" class="form-control" placeholder="Product Name" required>
                    <input type="text" name="quantityinstock" class="form-control" placeholder="Quantity in Stock" required>
                    <input type="text" name="priceperitem" class="form-control" placeholder="Price Per Item" required>
                    <button id="submitInventory" class="btn btn-primary">Add Inventory</button>


                    </form>
                    </div>
                </div>
                @include('_listproducts-table')

        </section>


        <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

<script>

$(document).ready(()=>{
        $('#productsForm').submit(function(e){
            e.preventDefault();

            $.ajax({

        type: 'POST',
        url: "/save",
        dataType: 'json',
        data: $(this).serialize(),

        success: function(data) {
            console.log(data)
           if(data.success){
               location.reload()
           }
            }
            })
            })


    })




</script>
    </body>
</html>
