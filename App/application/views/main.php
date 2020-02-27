
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
                                <td><input type="text" name="cname" id="cname" class="form-control name" placeholder="Enter Customer Name" onkeyup="validate1()"></td>
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
                            <table class="table table-borderless">
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
                        <table class="table table-borderless" id="tab_logic">
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>   
                            </tr>
                            <tr id="addr0">
                                <td>1</td>
                                <td><input type="text" name="pname[]" id="pname" class="form-control name-list" placeholder="Enter Product" ></td>
                                <td><input type="text" name="qty[]"  id="qty" class="form-control name-list qty" placeholder="Quantity"></td>
                                <td><input type="text" name="price[]" id="price" class="form-control name-list price" placeholder="Price"></td>
                                <td><input type="text" name="total[]" id="total" class="form-control name-list total" placeholder="Total"></td>
                                <td><button type="button" name="delete_row" id="delete_row" class="btn btn-danger">X</button></td>
                            </tr>
                        </table>
                        <table class="table table-borderless" id="tab_logic1"> 
                          <tr>
                              <td><p id="para1"></p></td>
                              <td> <button type="button" name="add_row" id="add_row" class="btn btn-success">Add Products</button></td>
                              <td><p id="para2"></p></td>
                              <th style="text-align: right">Sub Total:</th>
                              <td><input type="text" name="sub_total" id="sub_total" class="form-control" placeholder="Sub Total"/></td>
                              <td></td>
                          </tr>
                          <tr>
                              <td></td>
                              <td> </td>
                              <td></td>
                              <th style="text-align: right">Tax:</th>
                              <td><input type="text" name="tax[]" id="tax" class="form-control tax" placeholder="Tax %"/></td>
                              <td></td>
                          </tr>
                          <tr>
                              <td></td>
                              <td> </td>
                              <td></td>
                              <th style="text-align: right">Grand Total:</th>
                              <td><input type="text" name="grand_total" id="grand_total" class="form-control" placeholder="Grand Total"/></td>
                              <td></td>
                          </tr>
                        </table>
                    
                    </div> 
                    
            </div>
            
        </div>
          <!-- /.col-md-6 -->
          
        </div>
        <!-- /.row -->
        </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <script>
  $(document).ready(function(){
      var i=1;
      $("#add_row").click(function(){
        b=i-1;
        $('#tab_logic').append(
            // $('#addr0').html()
            `<tr id="addr${i}">
                <td>`+(i+1)+`</td>
                <td><input type="text" name="pname[]" id="pname" class="form-control name-list" placeholder="Enter Product"></td>
                <td><input type="text" name="qty[]"  id="qty" class="form-control name-list qty" placeholder="Quantity"></td>
                <td><input type="text" name="price[]" id="price" class="form-control name-list price" placeholder="Price"></td>
                <td><input type="text" name="total[]" id="total" class="form-control name-list total" placeholder="Total"></td>
                <td><button type="button" name="delete_row" id="delete_row" class="btn btn-danger">X</button></td>
            </tr>`
            );
          // $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
          i++; 
          calc();
      });
    $(document).on("click","#delete_row",function() {
      var button_id = $(this).parent().parent().attr("id"); 
		  $('#'+button_id+'').remove();
      calc();
    });
    
    $('#tab_logic,#tab_logic1 ').on('keyup change',function(){
      calc();
    });
  });

  function calc()
  {
    $('#tab_logic tr').each(function(i, element) {
      var html = $(this).html();
      if(html!='')
      {
        var qty = $(this).find('.qty').val();
        var price = $(this).find('.price').val();
        $(this).find('.total').val(qty*price);
        calc_total();
      }
      });
  }
  function calc_total()
  {
    var total=0;
    var srno=0;
    var grand_total=0;
    $('.total').each(function() {
          total += parseInt($(this).val());
      });
    $('#tab_logic tbody tr').each(function() {
      $(this).find('td:first').text(srno++);
      });
    $('#sub_total').val(total.toFixed(2));
    var tax = $('.tax').val();
    tax= (total*tax)/100;
    grand_total =tax+total;
    $('#grand_total').val(grand_total.toFixed(2));
  }
  function validate1()
	{
    var uname = $(this).find('.qty').val();
	 uname=document.getElementById('cname').value;
	 var letters = /^[A-Za-z]+$/;
	 if(uname.match(letters))
	 {
    document.getElementById('para1').innerHTML="Name is valid";
    document.getElementById('para2').innerHTML="";
	 }
	 else 
	 {
	 	document.getElementById('para2').innerHTML="Name is Invalid";
     document.getElementById('para1').innerHTML="";
	 }
	}
</script>

 