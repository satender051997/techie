
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Invoice Generator</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                <div class="col-lg-6">
                 <div class="form-group">
                    <form>
                        <table class="table table-borderless" id="">
                            <tr>
                                <th colspan="2" >Customer Details</th>
                            </tr>
                            <tr>
                                <td><input type="text" name="cname" id="cname" class="form-control" placeholder="Enter Customer Name"></td>
                            </tr>
                            <tr>
                                <td><input type="number" name="mob" id="mob" class="form-control" placeholder="Mobile No."></td>
                            </tr>
                            <tr>
                                <td><input type="email" name="email" id="email" class="form-control" placeholder="Email"></td>
                            </tr>
                            </table>
                    </form>
                  
                    </div>
                    </div>
                        <div class="col-lg-6">
                    <div class="form-group">
                        <form>
                            <table class="table table-borderless" id="">
                                <tr>
                                    <th colspan="2">Address</th>
                                </tr>
                                <tr>
                                    <td th colspan="2"><input type="text" name="house" id="house" class="form-control" placeholder="House No./Name"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="street" id="street" class="form-control" placeholder="Street"></td>
                                    <td><input type="text" name="pin" id="pin" class="form-control" placeholder="Postal Code"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="town" id="town" class="form-control" placeholder="Town"></td>
                                    <td><input type="text" name="country" id="country" class="form-control" placeholder="Country"></td>
                                </tr>
                                </table>
                        </form>
                       
                        </div>
                        </div>
                    </div>  
                    <hr />
                    <form name="add_name" id="add_name">
                        <table class="table table-borderless" id="dynamic_field">
                            <tr>
                                <th>Item Discription </th>
                            </tr>
                            <tr count='1'>
                                <td><input type="text" name="name" id="name" class="form-control name-list" placeholder="Enter Product"></td>
                                <td><input type="text" name="qty" count="1" id="qty_1" class="form-control name-list qty" placeholder="Quantity"></td>
                                <td><input type="text" name="price" count="1" id="price_1" class="form-control name-list price" placeholder="Price"></td>
                                <td><input type="text" name="stotal" id="stotal_1" class="form-control name-list subtotal" placeholder="Sub Total"></td>
                                <td><button type="button" name="add" id="add" class="btn btn-success">+</button></td>
                            </tr>
                        </table>
                        <input type="text" name="final_amount" id="final_amount" class="form-control" placeholder="Final Total"/>
                        <input type="submit" id="submit" name="submit" value="submit" class="btn btn-primary" />
                    </div> 
            </div>
            
        </div>
          <!-- /.col-md-6 -->
          
        </div>
       
        <!-- /.row -->
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <script>
$(document).ready(function(){
	var i=1;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append(
            '<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter Product" class="form-control name_list" /></td> <td><input type="text" name="quantity[]" count="'+i+'" id="qty_'+i+'" class="form-control name-list qty" placeholder="Quantity"></td><td><input type="text" name="price[]" count="'+i+'" id="price_'+i+'" class="form-control name-list price" placeholder="Price"></td> <td><input type="text" name="Stotal" count="'+i+'" id="stotal_'+i+'" class="form-control name-list" placeholder="Sub Total"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	});
	
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
	$('.qty').on('keyup',function(){
        var count=$(this).attr("count");
        calculate_amount(count);
    });
    $('.price').on('keyup',function(){
        var count=$(this).attr("count");
        calculate_amount(count);
    });
	$('#submit').click(function(){		
		$.ajax({
			url:"name.php",
			method:"POST",
			data:$('#add_name').serialize(),
			success:function(data)
			{
				alert(data);
				$('#add_name')[0].reset();
			}
		});
	});
	
});
function calculate_amount(count){
var qty=1;
var price=0;
var finaltotal=0;
qty= $('#qty_'+count).val();
price= $('#price_'+count).val();
finaltotal=parseInt(qty)*parseFloat(price);
$('#stotal_'+count).val(finaltotal);
console.log(price);
}
</script>

 