
<?php
//  print_r($result);die;  
 
    // Set order
    if($order == "asc"){
      $order = "desc";
    }else{
      $order = "asc";
    }
    ?>

 <div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <div class="content-header"> <!-- Content Header (Page header) -->
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           <h1>Invoices</h1>
          </div><!-- col-sm-6 close -->
        </div><!-- row mb-2 close-->
      </div><!-- container-fluid close -->
    </div>  <!-- /.content-header -->
  

    
    <div class="content"><!-- Main content -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12"> 
          <div class="card">
                <div class="card-body">
                <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <table class="table table-bordered">
                       
                        <thead class="table-dark">
                            <tr>
                                <th>Sl. No.</th>
                                <th>Invoice Id</th>
                                <th><a href="<?= base_url() ?>index.php/Invoices/list/0/customer_name/<?= $order ?>">Name</a></th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Grand total</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <?php 
                          // print_r($records);die;  
                        echo "<tbody>";
                        foreach($result as $i=>$r) { 
                            echo "<tr>"; 
                            echo "<td>".++$i."</td>"; 
                            echo "<td>".$r->invoice_id."</td>"; 
                            echo "<td>".$r->customer_name."</td>"; 
                            echo "<td>".$r->customer_mobile."</td>";
                            echo "<td>".$r->customer_email."</td>"; 
                            echo "<td>".$r->grand_total."</td>";
                            echo "<td><a href = ".site_url('Invoices/view'.$r->invoice_id)."><i class='fa fa-eye' aria-hidden='true' style='color:black;'></i></a></td>";
                            echo "<td><a href = ".site_url('Invoices/delete_invoice/'.$r->invoice_id)."><i class='fa fa-trash' aria-hidden='true' style='color:red;'></i></a></td>";  
                            echo "<tr>"; 
                         } 
                        echo "</tbody>"; 
                        if(count($result) == 0){
                          echo "<tr>";
                          echo "<td colspan='8'>No record found.</td>";
                          echo "</tr>";
                        }
                        ?>        
                        </table>
                        <p><?= $pagination; ?></p>
                    </div>  <!-- form-group class close -->  
                </div>  <!-- col-lg-12 class close -->  
                </div> <!-- card-row class close -->  
                </div> <!-- card-body class close -->
           </div>  <!-- card class close -->
          </div><!-- col-lg-12 close -->
        </div><!-- row close (main content) -->
    </div><!-- container fluid close (main content) -->
  </div><!-- Main content close -->
</div>  <!-- content wrapper of page content close -->
 
 