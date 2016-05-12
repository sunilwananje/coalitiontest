@extends('template') 
@section('content')
<!-- Row Start -->
<form class="form-horizontal" method="post" id= "productForm" onsubmit="return false">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-lg-12 col-md-12">                   
            <div class="widget">
                <div class="form-group" style="text-align:center;">
                    <div class="col-lg-12 col-md-12">
                       <label class="control-label"> Add Product</label>
                    </div>
                </div>
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
               
                    <div class="form-group">
                        <label for="buyer" class="col-sm-4 control-label">Product Name</label>
                        <div class="col-sm-5">
                            <input type='text' name="product_name" id="product_name" class="form-control" placeholder="Product Name" required/> 
                        </div>  
                    </div>
                    <div class="form-group">
                        <label for="buyer" class="col-sm-4 control-label">Quantity</label>
                        <div class="col-sm-5">
                            <input type='text' name="quantity" id="quantity" class="form-control" placeholder="Quantity" required/>
                        </div>  
                    </div>
                    
                    <div class="form-group">
                        <label for="buyer" class="col-sm-4 control-label">Price Per Item</label>
                        <div class="col-sm-5">
                            <input type='text' name="price" id="price" class="form-control" placeholder="Price Per Item" required/>
                        </div>  
                    </div>
                    <div class="form-group">
                        <label for="buyer" class="col-sm-4 control-label">Total</label>
                        <div class="col-sm-5">
                            <input type='text' name="total" id="total" class="form-control" placeholder="Total" required/>
                        </div>  
                    </div>
                    <div class="form-group">
                        <div class="col-sm-5 pull-right">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary pull-right">Submit</button>
                        </div>  
                    </div>
                    
            </div>
        </div>
    </div>
</form>
<div class="table-responsive">
      <table class="display table table-condensed table-striped table-bordered table-hover no-margin">
        <thead>
          <tr>
            <th>Sr No</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>              
            <th>Total</th>             
            <th>Datetime</th> 
          </tr>

        </thead>
        <tbody>
        @if(is_array($productArray))
            @foreach($productArray as $key => $product)
               <tr>
                   <td>{{($key+1)}}</td>
                   <td>{{$product['product_name']}}</td>
                   <td>{{$product['quantity']}}</td>
                   <td>{{$product['price']}}</td>
                   <td>{{$product['total']}}</td>
                   <td>{{$product['created_at']}}</td>
               </tr>
            @endforeach
        @else
           <tr>
              <td colspan = "5">No Products</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>
<script type="text/javascript" src="{{ asset('/js/jquery.js') }}"></script>
<script>
    $(document).ready(function(){
      $('#submit').click(function(){
         var data = $("#productForm").serialize();

         $.ajax({
            type:'post',
            url:'/product/save',
            data:data,
            success:function(data){
                location.reload();
            }
         })
      });
$(document).on('focusout','#price',function(){
      var price=parseFloat($(this).val());
      var qnty=$('#quantity').val();
      priceCalculation(this,price,qnty);
 });

 $(document).on('focusout','#quantity',function(){
      var qnty=parseFloat($(this).val());
      var price=$('#price').val();
      priceCalculation(this,price,qnty);
 });

});
    function priceCalculation(select,price,qnty){
      price = isNaN(price) ? '0' : price;
      qnty = isNaN(qnty) ? '0' : qnty;
      var total=price*qnty;
     
      $('#total').val(total);
      
     }
</script>

@stop
