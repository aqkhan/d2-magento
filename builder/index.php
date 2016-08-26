<?php require_once('includes/functions.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Builder for Magento</title>
    <script type="text/javascript">
        var base_url = '<?php echo $site_url; ?>';
    </script>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="all">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="all">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css" media="all">
    <link rel="stylesheet" href="css/bootstrap-switch.min.css" media="all">
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css" media="all">
    <link rel="stylesheet" href="css/custom.css" media="all">
</head>
<body>
<?php $modules = all_modules(); ?>
<div class="container">
    <div class="row">
        <div class="page-header">
            <h1>Custom Builder for Magento 2 <small>Add Module Content</small></h1>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Module Data</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="javascript:void(0)">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Select Module</label>
                        <div class="col-sm-10">
                            <select class="form-control module">
                                <?php foreach($modules as $module) { ?>
                                    <option><?php echo $module['module']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control title" placeholder="Enter Title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Content</label>
                        <div class="col-sm-10">
                            <textarea class="form-control content" rows="3" placeholder="Enter Content"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-2">
                            <button type="submit" class="btn btn-primary submit-module-data col-sm-12">Submit</button>
                        </div>
                        <div class="col-sm-4">
                            <p class="messages"></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php $products = all_products(); ?>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Best Deals</h3>
            </div>
            <div class="panel-body">
                <button class="btn btn-primary pull-right col-sm-2 update">Update</button>
                <table id="best_deals" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="col-sm-1">Yes / No</th>
                        <th>sku</th>
                        <th>Name</th>
                        <th class="col-sm-1">Image</th>
                        <th>Price</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody class="products-list">
                    <?php foreach($products as $product) { ?>
                    <tr>
                        <td class="col-sm-1">
                            <div class="checkbox">
                                <input type="checkbox" id="checkbox1">
                                <label for="checkbox1"></label>
                            </div>
                        </td>
                        <td class="product-sku"><?php echo $product['sku']; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td class="col-sm-1"><img class="img-responsive" src="<?php echo $media_url.$product['image']; ?>"></td>
                        <td><?php echo $product['price']; ?></td>
                        <td><?php echo limit_text($product['description'], 35); ?></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <button class="btn btn-primary pull-right col-sm-2 update">Update</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/jquery-1.12.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>