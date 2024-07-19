<?php
$all = $Goods->count(['sh' => 1]);
$bigs = $Th->all(['big_id' => 0]);
?>
<a href="?type=0">全部商品(<?= $all ?>)</a>
<?php
foreach ($bigs as $big) {
?>
<div class="nav">
    <a href="?type=<?= $big['id'] ?>"><?= $big['name'] ?>(<?= $Goods->count(['sh' => 1, 'big' => $big['id']]) ?>)</a>
    <?php
        $mids = $Th->all(['big_id' => $big['id']]);
        foreach ($mids as $mid) {
        ?>
    <a href="?type=<?= $mid['id'] ?>" class="mid"
        style="display:none;background:lightgreen;color:#fff;"><?= $mid['name'] ?>(<?= $Goods->count(['sh' => 1, 'mid' => $mid['id']]) ?>)</a>
    <?php
        }
        ?>
</div>
<?php
}
?>
<script>
$('.nav').hover(function() {
    $('.mid').hide();
    $(this).children('.mid').show()
}, () => {
    $('.mid').hide();
})
</script>