 <!-- Sidebar menu-->
 <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
 <aside class="app-sidebar">
     <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="">
         <div>
             <p class="app-sidebar__user-name">John Doe</p>
             <p class="app-sidebar__user-designation">Frontend Developer</p>
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
                             class="icon fa fa-circle-o"></i>Tài khoản nhân viên</a></li>
             </ul>
         </li>
         <li>
             <a class="app-menu__item" href="{{ route('admin.product') }}">
                 <i class="fa fa-product-hunt" aria-hidden="true"></i></i>
                 <span class="app-menu__label">Sản phẩm</span>
             </a>
         </li>
         <li>
             <a class="app-menu__item" ">
                 <i class=" fa fa-certificate" aria-hidden="true"></i></i>
                 <span class="app-menu__label">Hóa đơn</span>
             </a>
         </li>
     </ul>
 </aside>
