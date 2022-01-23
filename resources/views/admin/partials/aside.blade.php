<aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
      <div>
        bySura<b class="font-black">Baby</b>
      </div>
    </div>
    <div class="menu is-menu-main">
        <p class="menu-label">Ürünler</p>
        <ul class="menu-list">
            <li class="--set-active-tables-html">
                <a href="{{ route('admin.products') }}">
                    <span class="icon"><i class="mdi mdi-table"></i></span>
                    <span class="menu-item-label">Ürünler</span>
                </a>
            </li>
            <li class="--set-active-forms-html">
                <a href="{{ route('admin.products.addProduct') }}">
                    <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                    <span class="menu-item-label">Ürün Ekle</span>
                </a>
            </li>
            <li class="--set-active-forms-html">
              <a href="{{ route('admin.mainCategories') }}">
                  <span class="icon"><i class="mdi mdi-table"></i></span>
                  <span class="menu-item-label">Kategoriler</span>
              </a>
            </li>
            <li class="--set-active-forms-html">
              <a href="{{ route('admin.subCategories') }}">
                  <span class="icon"><i class="mdi mdi-table"></i></span>
                  <span class="menu-item-label">Alt Kategoriler</span>
              </a>
            </li>
        </ul>

        <p class="menu-label">Raporlar</p>
        <ul class="menu-list">
            <li class="--set-active-tables-html">
              <a href="{{ route('admin.reports.sales') }}">
                  <span class="icon"><i class="mdi mdi-cart-outline"></i></span>
                  <span class="menu-item-label">Satışlar</span>
              </a>
            </li>
        </ul>

        <p class="menu-label">Kullanıcılar</p>
        <ul class="menu-list">
            <li class="--set-active-tables-html">
              <a href="{{ route('admin.users') }}">
                  <span class="icon"><i class="mdi mdi-account"></i></span>
                  <span class="menu-item-label">Üyeler</span>
              </a>
            </li>
            <li class="--set-active-tables-html">
              <a href="{{ route('admin.panelUsers') }}">
                  <span class="icon"><i class="mdi mdi-account"></i></span>
                  <span class="menu-item-label">Panel Kullanıcıları</span>
              </a>
            </li>
            <li class="--set-active-tables-html">
              <a href="{{ route('admin.logout') }}">
                  <span class="icon"><i class="mdi mdi-account"></i></span>
                  <span class="menu-item-label">Çıkış Yap</span>
              </a>
            </li>
        </ul>
    </div>
</aside>
