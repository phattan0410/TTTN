 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="/admin" class="brand-link">
         <img src="/template/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">Admin</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="/template/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">
                     <?php

                        use App\Models\NhanVien;
                        use Illuminate\Support\Facades\Session;

                        $nv = NhanVien::where('MaNV', Session::get('loginId'))->get()->first();
                        if ($nv) {
                            echo '<p>' . $nv->HoTenNV . '</p>';
                            Session::put('message', null);
                        }
                        ?>
                 </a>
             </div>
         </div>

         <!-- SidebarSearch Form -->
         <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
            </div>
        </div> -->

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                 <!-- <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-bars"></i>
                <p>
                    Hãng Sản Xuất
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/menus/add" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Thêm Hãng Sản Xuất</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/menus/list" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh Sách Hãng </p>
                    </a>
                </li>
                </ul>
            </li> -->
                 <!-- <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-solid fa-store"></i>
                <p>
                    Sản phẩm
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/product/add" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Thêm Sản Phẩm</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/product/list" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh Sách Sản Phẩm</p>
                    </a>
                </li>
                </ul>
            </li> -->
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fa-solid fa-users"></i>
                         <p>
                             Quản Lý Nhân Viên
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <!-- <li class="nav-item">
                    <a href="/admin/menus/add" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Thêm Hãng Sản Xuất</p>
                    </a>
                </li> -->
                         <li class="nav-item">
                             <a href="/admin/users/add" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Thêm Nhân Viên</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="/admin/customer/list" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Danh Sách Nhân Viên</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="/admin/customer/list2" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Phân Quyền Nhân Viên</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">

                         <i class="nav-icon fa-solid fa-clipboard"></i>
                         <p>
                             Quản Lý Danh Mục
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">

                         <li class="nav-item">
                             <a href="/admin/class/list" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Quản Lý Lớp Năng Khiếu</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="/admin/parent/list" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Quản Lý Phụ Huynh</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="/admin/brunch/list" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Quản Lý Bữa Ăn</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="/admin/food/list" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Quản Lý Món Ăn</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">

                         <i class="nav-icon fa-thin fas fa-money-check-alt "></i>
                         <p>
                             Quản Lý Thu
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">

                         <li class="nav-item">
                             <a href="/admin/fees/list" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Biên lai lệ phí</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="/admin/tution/list" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Biên lai học phí</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="/admin/student/list" class="nav-link">

                         <i class="nav-icon fa-thin fas fas fa-user-graduate"></i>Quản Lý Học Sinh

                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon  fa-solid fa-utensils"></i>

                         <p>
                             Quản Lý Khẩu Phần Ăn
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="/admin/class/list" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Bữa Ăn Học Sinh</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="/admin/parent/list" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Thành Phần Món Ăn</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <!-- <i class="nav-icon fa-solid fa-clipboard"></i> -->
                         <i class="nav-icon fa-solid fa-list"></i>

                         <p>
                             Thống kê
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="/admin/customer/listGV" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Danh Sách Giáo Viên</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="/admin/customer/listNV" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Danh Sách Nhân Viên</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="/admin/class/show" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Danh Sách Lớp Học</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="/admin/student/list" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Danh Sách Học Sinh</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="/admin/parent/list" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Danh Sach Nợ Lệ Phí Đưa Rước</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="/admin/parent/list" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Danh Sách Nợ Lệ Phí Khóa Học</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="/admin/search" class="nav-link">
                         <i class="nav-icon fa-solid fa-magnifying-glass"></i>
                         <p>
                             Tìm Kiếm
                             <!-- <i class="right fas fa-angle-left"></i>    -->
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="/admin/users/logout" class="nav-link">
                         <p>
                             Đăng xuất
                         </p>
                     </a>

                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>