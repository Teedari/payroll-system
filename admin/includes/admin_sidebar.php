<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
<!--
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                             /input-group 
                        </li>
-->
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Employee<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                   <a href="employee_cat.php?source=add_employee">Add Employee</a>
                                </li>
                                <li>
                                    <a href="employee_cat.php?source=manage_employee">Manage Employee</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <!-- Department side display -->
                         <li>
                            <a href="#"><i class="fa fa-university fa-fw"></i> Department<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                   <a href="department_cat.php?source=add_department">Add Department</a>
                                </li>
                                <li>
                                    <a href="department_cat.php?source=manage_department">Manage Department</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <!-- /department -->
                        
                         <li>
                            <a href="#"><i class="fa fa-money fa-fw"></i> Payslip<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                   <a href="payslip_cat.php?source=add_payslip">Add Payslip</a>
                                </li>
                                <li>
                                    <a href="payslip_cat.php?source=manage_payslip">Manage Payslip</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Settings<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="profile.php">Profiles</a>
                                </li>
                                <li>
                                    <a href="../logout.php">Login Page</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>