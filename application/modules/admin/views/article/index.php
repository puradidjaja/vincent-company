<?php $this->load->view('includes/header');?>

<div class="span12">
    <h1 class="page-title">Article<a class="btn btn-warning pull-right" href="<?php echo site_url('admin/article/create'); ?>">Create new Article</a></h1>
    <div class="widget">
        <div class="widget-header">
            <h3>Article List</h3>
        </div>
        <div class="widget-content">
            <?php if (isset($articles) && count($articles)): ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Created</th>
                            <th>Summary</th>
                            <th>Status</th>
                            <th>Linked on Main page</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($articles as $article): ?>
                            <tr>
                                <td><?php echo $article['title'];?></td>
                                <td><?php echo $article['create_date'];?></td>
                                <td><?php echo $article['summary'];?></td>
                                <td><?php if($article['status']==1){
                                    
                                        echo '<span class="label">draft</span>';
                                    }else{
                                        echo '<span class="label label-warning">publish</span>';
                                    }
                                ?>
                                </td>
                                <td><?php if($article['is_linked']==1){
                                    
                                        echo '<span class="label">yes</span>';
                                    }else{
                                        echo '<span class="label label-warning">no</span>';
                                    }
                                ?>
                                </td>
                                <td>
                                    <a href="<?php echo site_url('admin/article/detail/'.$article['id']);?>" class="btn" title="View Detail"><i class="icon-zoom-in icon-large "></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <h1 class="page-header">No Article Found</h1>
               
            <?php endif; ?>
 
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>

<?php $this->load->view('includes/footer');?>