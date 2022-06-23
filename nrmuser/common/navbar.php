 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="/nrmuser/dashboard.php" class="brand-link">
     <img src="/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
       style="opacity: .8">
     <span class="brand-text font-weight-light">Rajlakshmi jewellery </span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image">
         <img src="/img/profile/<?php echo $_SESSION["imgname"] ?>" class="img-circle elevation-2" id="navprofimg" alt="User Image">
       </div>
       <div class="info">
         <a href="#" class="d-block"><?php echo $_SESSION["username"] ?></a>
       </div>
     </div>

     <!-- SidebarSearch Form -->
     <div class="form-inline">
       <div class="input-group" data-widget="sidebar-search">
         <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
         <div class="input-group-append">
           <button class="btn btn-sidebar">
             <i class="fas fa-search fa-fw"></i>
           </button>
         </div>
       </div>
     </div>

     <!-- Sidebar Menu -->
     <nav class="mt-2" >
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item" id="dash">
           <a href="dashboard.php" class="nav-link " id="dash">
             <i class="nav-icon fab fa-dashcube"></i>
             <p>
               Dashboard
             </p>
           </a>
         </li>
         <!-- menu Item1 -->
         <li class="nav-item"  id="openprod">
           <a href="#" class="nav-link" id="product">
             <i class="nav-icon fas fa-boxes"></i>
             <p>
               Products
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <!-- <li class="nav-item">
               <a href="addproduct.php" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Add Product</p>
               </a>
             </li> -->
             <li class="nav-item" id="allprod">
               <a href="../nrmuser/allproduct.php" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>All Product</p>
               </a>
             </li>
           </ul>
         </li>
         <!-- end menuitem 1 -->
         <!-- menu Item 2-->
         <li class="nav-item "  id="openord">
           <a href="#" class="nav-link " id="orders">
             <i class="nav-icon fas fa-cart-plus"></i>
             <p>
               Orders
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <!-- <li class="nav-item">
               <a href="neworder.php" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>New Orders</p>
               </a>
             </li> -->
             <li class="nav-item">
               <a href="../nrmuser/currentorders.php" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Current orders</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="../nrmuser/allorders.php" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>All order</p>
               </a>
             </li>
           </ul>
         </li>
         <!-- end menuitem 2 -->
         <!-- menu Item 3-->
         <li class="nav-item "  id="openbill">
           <a href="#" class="nav-link " id="bill">
             <i class="nav-icon fas fa-file-invoice"></i>
             <p>
               Billing
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="../nrmuser/allinv.php" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>All invoices</p>
               </a>
             </li>

           </ul>
         </li>
         <!-- end menuitem 3 -->
         <!-- menu Item 4-->
         <li class="nav-item " id="openemp">
           <a href="" class="nav-link" id="emp">
             <i class="nav-icon fas fa-users"></i>
             <p>
               Employee
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <!-- <li class="nav-item">
               <a href="addemployee.php" class="nav-link ">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Add new</p>
               </a>
             </li> -->
             <li class="nav-item">
               <a href="../nrmuser/employee.php" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>All employee</p>
               </a>
             </li>

           </ul>
         </li>
         <!-- end menuitem 4 -->
         <!-- menu Item 5-->
         <li class="nav-item "  id="opensettings">
           <a href="#" class="nav-link" id="settings">
             <i class="nav-icon fas fa-cogs"></i>
             <p>
               Settings
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <!-- <li class="nav-item">
               <a href="../users.php" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Users Access</p>
               </a>
             </li> -->
             <li class="nav-item">
               <a href="../nrmuser/profile.php" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>profile</p>
               </a>
             </li>

           </ul>
         </li>
         <!-- end menuitem 5 -->
         <li class="nav-item" >
           <a href="logout.php" class="nav-link">
             <i class="nav-icon fas fa-sign-out-alt"></i>
             <p>
               Logout
               <span class="right badge badge-danger">exit</span>
             </p>
           </a>
         </li>
       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>
