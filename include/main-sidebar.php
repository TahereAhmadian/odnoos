<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-right image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $_SESSION['name']; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> آنلاین</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="جستوجو ...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header active">ناوبری اصلی</li>
            <li class="treeview">
                <a href="index.php">
                    <i class="fa fa-dashboard"></i> <span>پیشخوان</span>

            </li>

            <!-- the part of کسب و کار-->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-angle-left pull-left"></i><i class="fa fa-tasks"></i> <span>کسب و کار</span>
                </a>

                <ul class="treeview-menu">

                    <li><a href="insertBusiness.php"><i class="fa fa-circle-o"></i>ایحاد کسب و کار </a></li>

                    <li><a href="myBusiness.php"><i class="fa fa-circle-o"></i> کسب و کارهای من </a></li>

                    <li><a href="myOpenBusiness.php"><i class="fa fa-circle-o"></i> کسب و کارهای آزاد من </a></li>

                    <li><a href="contractList.php"><i class="fa fa-circle-o"></i>لیست قراردادهای من </a></li>

                    <li><a href="openBusiness.php"><i class="fa fa-circle-o"></i> کسب و کارهای آزاد </a></li>

                    <li><a href="businessList.php"><i class="fa fa-circle-o"></i>لیست کسب و کارها </a></li>


                </ul>
            </li>




            <li class="treeview">
                <a href="#">
                    <i class="fa fa-angle-left pull-left"></i><i class="fa fa-university"></i> <span>سازمان</span>
                </a>

                <ul class="treeview-menu">

                    <li><a href="insertOrganization.php"><i class="fa fa-circle-o"></i>ایحاد سازمان </a></li>

                    <li><a href="myOrganization.php"><i class="fa fa-circle-o"></i> سازمانهای من </a></li>

                    <li><a href="organizationList.php"><i class="fa fa-circle-o"></i>لیست سازمانها </a></li>



                </ul>
            </li>
        </ul>
        </li>



        </ul>
    </section>
    <!-- /.sidebar -->
</aside>