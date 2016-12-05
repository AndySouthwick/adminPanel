<div id="wrapper">

 

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
      
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><? orders_totals(); ?></div>
                                        <div>Total Orders</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<? echo  dirname($_SERVER['PHP_SELF']). '/index.php?layout=1&page=orders'; ?>">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
          
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><? orders_totals() ?></div>
                                        <div>New Orders!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Area Chart</h5>
                            </div>
                            <div class="panel-body">
                            <div class="col-lg-12"><h4>Number of Orders by Days</h4></div>
                            <div class="col-lg-1"><h5>Mondays</h5><? week_day_orders(Monday) ?></div>   
                            <div class="col-lg-1"><h5>Tuesdays</h5><? week_day_orders(Tuesday) ?></div> 
                            <div class="col-lg-1"><h5>Wednesdays</h5><? week_day_orders(Wednesday) ?></div> 
                            <div class="col-lg-1"><h5>Thursdays</h5><? week_day_orders(Thursday) ?></div>   
                            <div class="col-lg-1"><h5>Fridays</h5><? week_day_orders(Friday) ?></div>         
                            <div class="col-lg-1"><h5>Saturdays</h5><? week_day_orders(Saturday) ?></div>
                            <div class="col-lg-1"><h5>Sundays</h5><? week_day_orders(Sunday) ?></div>  
                            <br/><br/>
                                <div class="col-lg-12">
                                <h4>Order Of Product Populartiy</h4>
                                <? most_popular()  ?>
                                </div>
                                <div class="col-lg-12">
                                <h4>Our Best Customers! Who Have Multiple Orders</h4>
                                <? repeat_customers();  ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                   
                  
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><i class="fa fa-money fa-fw"></i> Transactions Panel</h5>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Order #</th>
                                                <th>Order Date</th>
                                                <th>Item Ordered </th>
                                                <th>Amount (USD)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <? show_orders(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                 <a href="<? echo  dirname($_SERVER['PHP_SELF']). '/index.php?layout=1&page=orders'; ?>">
                                View All Transactions <i class="fa fa-arrow-circle-right"></i></a> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
   