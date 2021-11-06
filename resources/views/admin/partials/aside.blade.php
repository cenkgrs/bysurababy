<aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
      <div>
        bySura<b class="font-black">Baby</b>
      </div>
    </div>
    <div class="menu is-menu-main">
        <p class="menu-label">General</p>
        <ul class="menu-list">
            <li class="--set-active-index-html">
            <a href="index.html">
                <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                <span class="menu-item-label">Dashboard</span>
            </a>
            </li>
        </ul>

        <p class="menu-label">Ürünler</p>
        <ul class="menu-list">
            <li class="--set-active-tables-html">
                <a href="{{ route('admin.products') }}">
                    <span class="icon"><i class="mdi mdi-table"></i></span>
                    <span class="menu-item-label">Ürünler</span>
                </a>
            </li>
            <li class="--set-active-forms-html">
                <a href="{{ route('admin.addProduct') }}">
                    <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                    <span class="menu-item-label">Ürün Ekle</span>
                </a>
            </li>
        </ul>

        <p class="menu-label">Raporlar</p>
        <ul class="menu-list">
            <li class="--set-active-tables-html">
                <a href="{{ route('admin.reports.sales') }}">
                    <span class="icon"><i class="mdi mdi-table"></i></span>
                    <span class="menu-item-label">Satışlar</span>
                </a>
            </li>

            <li class="">
                <a class="dropdown">
                  <span class="icon"><i class="mdi mdi-view-list"></i></span>
                  <span class="menu-item-label">Ürünler</span>
                  <span class="icon"><i class="mdi mdi-plus"></i></span>
                </a>
                <ul>
                  <li>
                    <a href="#void">
                      <span>Sub-item One</span>
                    </a>
                  </li>
                  <li>
                    <a href="#void">
                      <span>Sub-item Two</span>
                    </a>
                  </li>
                </ul>
              </li>
        </ul>

    

        <p class="menu-label">About</p>
        <ul class="menu-list">
            <li>
            <a href="https://justboil.me" onclick="alert('Coming soon'); return false" target="_blank" class="has-icon">
                <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
                <span class="menu-item-label">Premium Demo</span>
            </a>
            </li>
            <li>
            <a href="https://justboil.me/tailwind-admin-templates" class="has-icon">
                <span class="icon"><i class="mdi mdi-help-circle"></i></span>
                <span class="menu-item-label">About</span>
            </a>
            </li>
            <li>
            <a href="https://github.com/justboil/admin-one-tailwind" class="has-icon">
                <span class="icon"><i class="mdi mdi-github-circle"></i></span>
                <span class="menu-item-label">GitHub</span>
            </a>
            </li>
        </ul>
    </div>
</aside>
