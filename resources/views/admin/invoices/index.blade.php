@extends('admin.app')
@section('title') Hóa đơn bán hàng @endsection
<!-- @section('css')
   
@endsection -->
@section('content')
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script>
    $(document).ready(function(){
        $(document).on('keyup','#keyword',function(){
            var keyword = $(this).val();
            $.ajax ({
                type : "get",
                url : '/invoices/search',
                data:{
                    keyword : keyword
                },
                dataType: "json",
                success: function(response){
                    $('#list-invoice').html(response);
                }
            });
        });
    });
</script>
<div class="container">
    <div style="color:green;text-align:center">
        <h3>Hóa đơn bán hàng</h3>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group has-search">
       
          <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Tìm kiếm">
        </div>
      </div>

      <div class="col-md-4">
        <div class="row">
          <div class="form-group has-search">
          
            <input type="date" class="form-control" placeholder="Tìm theo ngày">
          </div>
          <span><button class="btn btn-primary"type="submit">Duyệt</button></span>
        </div>
      </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container mt-3">
        <table class="table table-bordered">
            <thead>
                <tr class="success">
                    <th>
                       Mã hóa đơn
                    </th>
                    <th>
                       Nhân viên
                    </th>
                    <th>
                      Khách hàng
                    </th> 
                    <th>
                        Ngày tạo
                    </th>                                                        
                    <th>
                        Tổng
                    </th>   
                    <th>
                       Thanh toán
                    </th> 
                     <th>Thao tác</th>                
                </tr>
            </thead>
            <tbody id="list-invoice">   
                @foreach($invoices as $item)
                <tr>                        
                    <td> {{$item->id}}</td>
                    <td> {{$item->userID}}</td>
                    <td> {{$item->employeeID}}</td>
                    <td> {{$item->dateCreated}}</td>
                    <td> {{$item->isPaid}}</td>
                    <td> {{$item->total}}</td>
                </tr>    
                @endforeach           
            </tbody>
        </table>
      
    </div>
</div>
@endsection