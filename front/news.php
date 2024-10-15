<style>
    #ns {
        width: 80%;
        margin: auto;
    }

    #na {
        width: 80%;
        margin: auto;

        tr {
            display: none;
        }
    }
</style>
<h2 class="ct">最新消息</h2>
<table id="ns">
    <tr>
        <th>*點擊標題觀看詳細資訊</th>
    </tr>
    <tr>
        <th class="tt">標題</th>
    </tr>
    <tr>
        <td class="pp ns" data-id="1">年終特賣會開跑了</td>
    </tr>
    <tr>
        <td class="pp ns" data-id="2">情人節特惠活動</td>
    </tr>
</table>
<table id="na">
    <tr class="a1">
        <th class="tt" width="30%">標題</th>
        <td class="pp">年終特賣會開跑了</td>
    </tr>
    <tr class="a1">
        <th class="tt">內容</th>
        <td class="pp">即日期至年底，凡會員購物滿仟送佰，買越多送越多~</td>
    </tr>
    <tr class="a2">
        <th class="tt" width="30%">標題</th>
        <td class="pp">情人節特惠活動</td>
    </tr>
    <tr class="a2">
        <th class="tt">內容</th>
        <td class="pp">為了慶祝七夕情人節，將舉辦情人兩人到現場有七七折之特惠活動~</td>
    </tr>
</table>
<div class="ct but" style="display:none"><button onclick="location.reload()">返回</button></div>
<script>
    $('.ns').on('click', function() {
        $('#ns').hide();
        let id = $(this).data('id');
        $('.but').show();
        $('.a' + id).show();
    })
</script>