
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           <h1 class="m-0 text-dark">Invoice Id #00<?php echo $id_row;?></h1>
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
              <?php echo form_open('Invoices/new_invoice');?>
                <div class="row">
                <div class="col-lg-6">
                 <div class="form-group">
                        <table class="table table-borderless table_detail">
                            <tr>
                                <thead class="thead-dark"><th colspan="2" >Customer Details </thead>
                            </tr>
                            <tr>
                                <td><input type="text" name="cname" id="cname" class="form-control name" placeholder="Enter Customer Name" required/>
                                <span id="cname_msg" class="error_msg"></span>
                              </td>
                            </tr>
                            <tr>
                                <td><input type="text" name="mob" id="mob" class="form-control" placeholder="Mobile No."  required/>
                                <span id="cmobile_msg" class="error_msg"></span>
                              </td>
                            </tr>
                            <tr>
                                <td><input type="email" name="email" id="email" class="form-control" placeholder="Email" required/>
                                <span id="c_email_msg" class="error_msg"></span>
                              </td>
                            </tr>
                            </table>
                   
                    </div>
                    </div>
                        <div class="col-lg-6">
                    <div class="form-group">
                     
                            <table class="table table-borderless">
                                <tr>
                                <thead class="thead-dark"><th colspan="2">Address</th></thead>
                                </tr>
                                <tr>
                                    <td th colspan="2"><input type="text" name="house" id="house" class="form-control" placeholder="House No./Name" required/></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="street" id="street" class="form-control" placeholder="Street" required/></td>
                                    <td><input type="number" name="pin" id="pin" class="form-control" placeholder="Postal Code" required/></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="town" id="town" class="form-control" placeholder="Town" onblur="town_Validate()" required/>
                                    <span id="cTown_msg" class="error_msg"></span>
                                    </td>
                                    <td><input type="text" name="country" id="country" class="form-control" placeholder="Country"  onblur="country_Validate()" required/>
                                    <span id="country_msg" class="error_msg"></span>
                                    </td>
                                </tr>
                                </table>
                         
                        </div>
                        </div>
                    </div>  
                    <hr />
                        <table class="table table-borderless" id="tab_logic">
                        <thead class="thead-dark">
                            <tr>
                              
                                <th>#</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th></th>
                                 
                            </tr>
                            </thead>  
                            <tr id="addr0">
                                <td>1</td>
                                <td><input type="text" name="product[]" id="product" class="form-control name-list product" placeholder="Enter Product"  />
                                <span id="product_msg" class="error_msg"></span>
                                </td>
                                <td><input type="number" name="qty[]"  id="qty" class="form-control name-list qty" placeholder="Quantity" />
                                <span id="qty_msg" class="error_msg"></span>
                                </td>
                                <td><input type="number" name="price[]" id="price" class="form-control name-list price" placeholder="Price" />
                                <span id="price_msg" class="error_msg"></span>
                                </td>
                                <td><input type="text" name="total[]" id="total" class="form-control name-list total" placeholder="Total" ></td>
                                <td><button type="button" name="delete_row" id="delete_row" class="btn btn-danger">X</button></td>
                            </tr>
                        </table>
                   
                        <div class="container">
                          <div class="row">
                            <div class="col-md-2">
                              <button type="button" name="add_row" id="add_row" class="btn btn-success btn1 btn-block">Add Products</button>
                            </div>
                            <div class="col-md-4 offset-md-6 ">
                                  <table class="pull-right" id="tab_logic1"> 
                                    <tr>
                                        <th style="text-align: left">Sub Total:</th>
                                        <td><input type="text" name="sub_total" id="sub_total" class="form-control form-group" placeholder="Sub Total"/></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left">Tax:</th>
                                        <td><input type="text" name="tax" id="tax" class="form-control  form-group tax" placeholder="Tax %"/>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left">Grand Total:</th>
                                        <td><input type="text" name="grand_total" id="grand_total" class="form-control  form-group" placeholder="Grand Total"/></td>
                                        
                                    </tr>
                                    <tr>
                                      <td></td>
                                      <td><button type="submit" name="generate_bill" id="generate_bill" class="btn btn-primary btn-block" onsubmit="empty_field_Validate()">Generate Bill</button>
                                      <span id="empty_msg" class="error_msg"></span>
                                      </td>
                                    </tr>
                                  </table>
                            </div>
                          </div>
                        </div>
                      
                    
                    </div> 
                    <?php  echo form_close();    ?>   
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
  document.getElementById("cname").addEventListener("blur", name_Validate);
  document.getElementById("mob").addEventListener("keyup", number_Validate);
  document.getElementById("email").addEventListener("keyup", email_Validate);
  document.getElementById("town").addEventListener("keyup", town_Validate);
  document.getElementById("country").addEventListener("keyup", country_Validate);

  $(document).ready(function(){
      var i=1;
      $("#add_row").click(function(){
        $('#tab_logic').append(
            `<tr id="addr${i}">
                <td>`+(i+1)+`</td>
                <td><input type="text" name="product[]" id="product" class="form-control name-list product" placeholder="Enter Product"></td>
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
    var srno=1;
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
</script>


 