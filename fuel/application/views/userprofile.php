    
    
    <div class="col-sm-9 col-md-6 col-lg-8">
       <?php foreach ($profile as $news_item): ?>

       
        <div class="main">
                
                <?php echo $news_item['FirstName'].$news_item['LastName']; ?>
        </div>      

        <?php endforeach; ?>
    </div>