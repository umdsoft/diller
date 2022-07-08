<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl(['site/index'])?>">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Bosh sahifa</span>
                    </a>
                </li>

                <li class="menu-title" data-key="t-apps">Bo'limlar</li>
                <li>
                    <a href="#">
                        <i data-feather="dollar-sign"></i>
                        <span data-key="t-chat">Savdo</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i data-feather="shopping-cart"></i>
                        <span data-key="t-chat">Buyurtma</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i data-feather="check-circle"></i>
                        <span data-key="t-chat">Kirim</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i data-feather="check-circle"></i>
                        <span data-key="t-chat">Chiqim</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="arrow-down">
                        <i data-feather="pie-chart"></i>
                        <span data-key="t-ecommerce">Xisobot</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="#">Kunlik</a></li>
                        <li><a href="#">Mijoz bo'yicha</a></li>
                        <li><a href="#">Yetkazuvchi bo'yicha</a></li>
                    </ul>
                </li>
            </ul>


        </div>
        <!-- Sidebar -->
    </div>
</div>
