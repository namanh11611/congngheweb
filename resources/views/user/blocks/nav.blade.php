<div class="container">
    <div id="categorymenu">
        <nav class="subnav">
            <ul class="nav-pills categorymenu">
            <li><a href="{{ url('/') }}">Trang Chủ</a></li>
            <?php 
                $menu_level_1 = DB::table('category')->where('parent_id',0)->get();
            ?>
            @foreach($menu_level_1 as $item_level_1)
                <li><a  href="index-2.html">{!! $item_level_1->name !!}</a>
                    <div>
                        <ul>
                            <li><a href="index2.html">Home Style 2</a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endforeach
                <li><a href="{{ url('lien-he') }}">Contact</a>
                </li>
            </ul>
        </nav>
    </div>
</div>