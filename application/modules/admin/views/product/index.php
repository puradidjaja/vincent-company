<?php $this->load->view('includes/header');?>

<div class="span12">
    <h1 class="page-title">Product<a class="btn btn-warning pull-right" href="<?php echo site_url('admin/product/create'); ?>">Create new Product</a></h1>
    <div class="widget">
        <div class="widget-header">
            <h3>Product List</h3>
        </div>
        <div class="widget-content">
            <?php if (isset($products) && count($products)): ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Tags</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?php echo $product['name'];?></td>
                                <td><?php 
                                    $key= preg_split("/[\s,]+/", $product['tags']);?>
                                    <?php foreach($key as $k):?>
                                    <span class="label label-warning"><?php echo $k;?></span>
                                    <?php endforeach;?>
                                </td>
                                <td>
                                    <a href="<?php echo site_url('admin/product/detail/'.$product['id']);?>">
                                        <i class="icon-search"></i> Detail
                                    </a>
                                </td>
                               
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <h1 class="page-header">No Product Found</h1>
               
            <?php endif; ?>
 
          
        </div>
    </div>
</div>

<?php $this->load->view('includes/footer');?>