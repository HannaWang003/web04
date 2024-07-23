<style>
#left .mid {
    background: lightgreen;
    color: #fff;
}
</style>
<a href="?type=0">全部商品(<?= $Goods->count(['sh' => 1]) ?>)</a>
<?php
$bigs = $Th->all(['big_id' => 0]);
foreach ($bigs as $big) {
?>
<div class="nav">
    <a href="?type=<?= $big['id'] ?>"><?= $big['name'] ?>(<?= $Goods->count(['sh' => 1, 'big' => $big['id']]) ?>)</a>
    <?php
        $mids = $Th->all(['big_id' => $big['id']]);
        foreach ($mids as $mid) {
        ?>
    <a href="?type=<?= $mid['id'] ?>"
        class='mid'><?= $mid['name'] ?>(<?= $Goods->count(['sh' => 1, 'mid' => $mid['id']]) ?>)</a>
    <?php
        }
        ?>
</div>
<?php
}
?>
<script>
$('.mid').hide();
$('.nav').hover(function() {
    $('.mid').hide();
    $(this).children('.mid').show()
}, () => {
    $('.mid').hide();
})
</script>