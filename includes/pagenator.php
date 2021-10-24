<section>
    <style>
        .pagination a.active {
            background-color: #4CAF50;
            color: white;
        }

        .pagination a:hover:not(.active) {background-color: #ddd;}
    </style>
    <div class="pagenator">
        <ul class="pagination pagination-lg justify-content-center">
<?php
    for ($i=1; $i <= $page_count; $i++) { 
?>
            <li class="page-item"><a class="page-link" href="?page=<?=$i?>"><?=$i?></a></li>
<?php
    }   
?>
        </ul>
    </div>
</section>