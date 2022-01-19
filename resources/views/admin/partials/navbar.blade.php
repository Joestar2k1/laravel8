 <!-- Sidebar menu-->
 <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
 <aside class="app-sidebar">
     <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="">
         <div>
             <p class="app-sidebar__user-name">John Doe</p>
             <p class="app-sidebar__user-designation">Frontend Developer</p>
         </div>
     </div>
     <ul class="app-menu">
         <li><a class="app-menu__item active" href="index-2.html"><i class="app-menu__icon fas fa-home"></i><span
                     class="app-menu__label">Dashboard</span></a></li>
         <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                     class="app-menu__icon fas fa-laptop"></i><span class="app-menu__label">Quản lí nhân sự</span><i
                     class="treeview-indicator fas fa-angle-right"></i></a>
             <ul class="treeview-menu">
                 <li><a class="treeview-item" href="{{ route('admin.account.user') }}"><i
                             class="icon fa fa-circle-o"></i>Tài khoản nhân viên</a></li>
                 <li><a class="treeview-item" href="{{ route('admin.account.ad') }}"><i
                             class="icon fa fa-circle-o"></i>Tài khoản admin</a></li>
             </ul>
         </li>
         <li><a class="app-menu__item" href="{{ route('admin.product') }}"><i
                     class="app-menu__icon fas fa-pie-chart"></i><span class="app-menu__label">Sản phẩm</span></a></li>

         {{-- hóa đơn nhập --}}
         <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                     class="app-menu__icon fas fa-laptop"></i><span class="app-menu__label">Quản lí hóa đơn</span><i
                     class="treeview-indicator fas fa-angle-right"></i></a>
             <ul class="treeview-menu">
                 <li><a class="treeview-item" href="{{ route('admin.imported_invoice.index') }}"><i
                             class="icon fa fa-circle-o"></i>Hóa đơn nhập hàng</a></li>

             </ul>
         </li>
     </ul>

 </aside>
