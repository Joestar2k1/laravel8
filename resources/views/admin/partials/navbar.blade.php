 <!-- Sidebar menu-->

 <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
 <aside class="app-sidebar">
     <div class="app-sidebar__user">
         <img class="app-sidebar__user-avatar" src="{{asset('backend/assets/img/avaters/')}}./{{Session::get('user')->avatar}}" width="40px" height="40px">
         <div>
             <p class="app-sidebar__user-designation">{{Session::get('user')->type}}</p>
         </div>
     </div>
     </div>
     <ul class="app-menu">
         <li>
             <a class="app-menu__item active" href="{{ route('admin.dashboard') }}">
                 <i class="fa fa-th-list" aria-hidden="true"></i></i>
                 <span class="app-menu__label">Dashboard</span>
             </a>
         </li>
         <li class="treeview">
             <a class="app-menu__item" href="#" data-toggle="treeview">
                 <i class="fa fa-users" aria-hidden="true"></i></i>
                 <span class="app-menu__label">Quản lí nhân sự</span>
                 <i class="fa fa-arrow-down" aria-hidden="true"></i>
             </a>
        <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{ route('admin.account') }}"><i
                             class="icon fa fa-circle-o"></i>Tài khoản người dùng</a>
            </li>
            <li>
                <a class="treeview-item" href="{{ route('admin.employee.index') }}">
                    <i class="icon fa fa-circle-o"></i>
                    Tài khoản nhân viên
                </a>
            </li>
        </ul>
         </li>
         <li>
            <a class="app-menu__item" href="{{ route('admin.product') }}">
                 <i class="app-menu__icon fa fa-pie-chart"></i>
                 <span class="app-menu__label">Sản phẩm</span>
            </a>
        </li>
         <li class="treeview">
             <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-laptop"></i>
                <span class="app-menu__label">Quản lí hóa đơn</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
          
             <ul class="treeview-menu">
              
                <li>
                     <a class="treeview-item" href=" {{ route('admin.invoice.orderTracking') }}">
                         <i class="icon fa fa-circle-o"></i>Theo dõi các đơn hàng
                    </a>
                </li>
                 <li>
                     <a class="treeview-item" href="{{ route('admin.invoice') }}">
                         <i class="icon fa fa-circle-o"></i>Hóa đơn bán hàng
                        </a>
                </li>
                <li>
                     <a class="treeview-item" href=" {{ route('admin.imported_invoice.index') }}">
                         <i class="icon fa fa-circle-o"></i>Hóa đơn nhập hàng
                    </a>
                </li>
             
             </ul>
         </li>

         <li class="treeview">
             <a class="app-menu__item" href="#" data-toggle="treeview">
                 <i class="app-menu__icon fa fa-laptop"></i>
                 <span class="app-menu__label">Quản lí nhà cung cấp</span><i
                     class="treeview-indicator fa fa-angle-right"></i></a>
             <ul class="treeview-menu">
                 <li><a class="treeview-item" href="{{ route('admin.provider.index') }}"><i
                             class="icon fa fa-circle-o"></i>Nhà cung cấp</a></li>

             </ul>
         </li>
     </ul>
 </aside>
