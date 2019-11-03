<h2><?php echo $title; ?></h2>
<a href="<?php echo site_url('news/create');?>">Adicionar Notícia</a><br/>
<?php foreach ($news as $n) {
    ?>
<h3><?php echo $n['title']; ?></h3>
<a href="<?php echo site_url('news/'.$n['uri']); ?>">Ver notícia...</a>
    <?php }
?>