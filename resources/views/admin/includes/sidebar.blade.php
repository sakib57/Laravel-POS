<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">{{ Auth::user()->name }}</p>
          <p class="app-sidebar__user-designation">Frontend Developer</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item {{ request()->is('home') ? 'active':'' }}" href="{{ url('/home') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        

        <li class="treeview {{ Request::segment(1)=='companies' ? 'is-expanded':'' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Companies</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
            <li><a class="treeview-item {{ request::is('companies/create') ? 'active':'' }}" href="{{ route('companies.create') }}"><i class="icon fa fa-circle-o"></i> Add Company</a></li>
              <li><a class="treeview-item {{ request::is('companies') ? 'active':'' }}" href="{{ route('companies.index') }}"><i class="icon fa fa-circle-o"></i> Manage Companies</a></li>
            </ul>
        </li>
        

        <li class="treeview {{ Request::segment(1)=='users' ? 'is-expanded':'' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Users</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item {{ Request::is('users/create') ? 'active':'' }}" href="{{ route('users.create') }}"><i class="icon fa fa-circle-o"></i> Add Users</a></li>
                <li><a class="treeview-item {{ Request::is('users') ? 'active':'' }}" href="{{ route('users.index') }}"><i class="icon fa fa-circle-o"></i> Manage Users</a></li>
            </ul>
        </li>


        <li class="treeview {{ Request::segment(1)=='settings' ? 'is-expanded':'' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Settings</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item {{ request()->is('settings.settings') ? 'active':'' }}" href="#"><i class="icon fa fa-circle-o"></i> System Settings</a></li>

                <li><a class="treeview-item {{ request()->is('settings.header-logo') ? 'active':'' }}" href="#"><i class="icon fa fa-circle-o"></i> Change System Logo</a></li>


                <li><a class="treeview-item {{ request()->is('settings.biller-logo') ? 'active':'' }}" href="#"><i class="icon fa fa-circle-o"></i> Change Biller Logo</a></li>

                

                <li><a class="treeview-item {{ Request::is('settings/categories') ? 'active':'' }}" href="{{ route('categories.index') }}"><i class="icon fa fa-circle-o"></i>List Categories</a></li>

                <li><a class="treeview-item {{ request()->is('settings/categories/create') ? 'active':'' }}" href="{{ route('categories.create') }}"><i class="icon fa fa-circle-o"></i>Add Categories</a></li>

                <li><a class="treeview-item {{ request()->is('settings/subcategories') ? 'active':'' }}" href="{{ route('subcategories.index') }}"><i class="icon fa fa-circle-o"></i>List Sub Categories</a></li>

                <li><a class="treeview-item {{ request()->is('settings/subcategories/create') ? 'active':'' }}" href="{{ route('subcategories.create') }}"><i class="icon fa fa-circle-o"></i>Add Sub Categories</a></li>

                <li><a class="treeview-item {{ request()->is('settings/warehouses') ? 'active':'' }}" href="{{ route('warehouses.index') }}"><i class="icon fa fa-circle-o"></i>List Warehouses</a></li>
                
                <li><a class="treeview-item {{ request()->is('settings/warehouses/create') ? 'active':'' }}" href="{{ route('warehouses.create') }}"><i class="icon fa fa-circle-o"></i>Add Warehouses</a></li>

                <li><a class="treeview-item {{ request()->is('settings/tax-rates') ? 'active':'' }}" href="{{ route('tax-rates.index') }}"><i class="icon fa fa-circle-o"></i>List Tax Rates</a></li>

                <li><a class="treeview-item {{ request()->is('settings/tax-rates/create') ? 'active':'' }}" href="{{ route('tax-rates.create') }}"><i class="icon fa fa-circle-o"></i>Add Tax Rates</a></li>

                <li><a class="treeview-item {{ request()->is('settings/discounts') ? 'active':'' }}" href="{{ route('discounts.index') }}"><i class="icon fa fa-circle-o"></i>Discount Lists</a></li>

                <li><a class="treeview-item {{ request()->is('settings/discounts/create') ? 'active':'' }}" href="{{ route('discounts.create') }}"><i class="icon fa fa-circle-o"></i>Add Discount</a></li>

                
            </ul>
        </li>

        <li class="treeview {{ Request::segment(1)=='people' ? 'is-expanded':'' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">People</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                
                <li><a class="treeview-item {{ request()->is('people/billers') ? 'active':'' }}" href="{{ route('billers.index') }}"><i class="icon fa fa-circle-o"></i> Biller List</a></li>

                <li><a class="treeview-item {{ request()->is('people/billers/create') ? 'active':'' }}" href="{{ route('billers.create') }}"><i class="icon fa fa-circle-o"></i>Add Biller</a></li>
                

                <li><a class="treeview-item {{ request()->is('people/suppliers') ? 'active':'' }}" href="{{ route('suppliers.index') }}"><i class="icon fa fa-circle-o"></i>Supplier List</a></li>

                <li><a class="treeview-item {{ request()->is('people/suppliers/create') ? 'active':'' }}" href="{{ route('suppliers.create') }}"><i class="icon fa fa-circle-o"></i>Add Supplier</a></li>

                <li><a class="treeview-item {{ request()->is('people/suppliers/get_import') ? 'active':'' }}" href="{{ url('people/suppliers/get_import') }}"><i class="icon fa fa-circle-o"></i>Add Supplier By CSV</a></li>



                <li><a class="treeview-item {{ request()->is('people/customers') ? 'active':'' }}" href="{{ route('customers.index') }}"><i class="icon fa fa-circle-o"></i>Customer List</a></li>

                <li><a class="treeview-item {{ request()->is('people/customers/create') ? 'active':'' }}" href="{{ route('customers.create') }}"><i class="icon fa fa-circle-o"></i>Add Customer</a></li>


                


                <li><a class="treeview-item {{ request()->is('people/customers/get_import') ? 'active':'' }}" href="{{ url('people/customers/get_import') }}"><i class="icon fa fa-circle-o"></i>Add Customer By CSV</a></li>
            </ul>
        </li>


        <li class="treeview {{ Request::segment(1)=='quotations' ? 'is-expanded':'' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Quotetations</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item {{ request()->is('quotations') ? 'active':'' }}" href="{{route('quotations.index')}}"><i class="icon fa fa-circle-o"></i> List Quotations</a></li>

                <li><a class="treeview-item {{ request()->is('quotations/create') ? 'active':'' }}" href="{{route('quotations.create')}}"><i class="icon fa fa-circle-o"></i> Add Quotations</a></li>                
            </ul>
        </li>

        <li class="treeview {{ Request::segment(1)=='sales' ? 'is-expanded':'' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Sales</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item {{ request()->is('sales') ? 'active':'' }}" href="{{route('sales.index')}}"><i class="icon fa fa-circle-o"></i> List Sales</a></li>

                <li><a class="treeview-item {{ request()->is('sales/create') ? 'active':'' }}" href="{{route('sales.create')}}"><i class="icon fa fa-circle-o"></i> Add Sale</a></li>


                <li><a class="treeview-item {{ request()->is('sales/delivery') ? 'active':'' }}" href="{{route('sales.delivery')}}"><i class="icon fa fa-circle-o"></i> Delivery List</a></li>                
            </ul>
        </li>


        <li class="treeview {{ Request::segment(1)=='purchases' ? 'is-expanded':'' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Purchases</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item {{ request()->is('purchases') ? 'active':'' }}" href="{{route('purchases.index')}}"><i class="icon fa fa-circle-o"></i> List Purchases</a></li>

                <li><a class="treeview-item {{ request()->is('purchases/create') ? 'active':'' }}" href="{{route('purchases.create')}}"><i class="icon fa fa-circle-o"></i> Add Purchases</a></li>


                <li><a class="treeview-item {{ request()->is('sales/delivery') ? 'active':'' }}" href="#"><i class="icon fa fa-circle-o"></i> Add Purchases by CSV</a></li>                
            </ul>
        </li>


        <li class="treeview {{ Request::segment(1)=='products' ? 'is-expanded':'' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Product</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item {{ request()->is('products') ? 'active':'' }}" href="{{route('products.index')}}"><i class="icon fa fa-circle-o"></i> List Product</a></li>

                <li><a class="treeview-item {{ request()->is('products/create') ? 'active':'' }}" href="{{route('products.create')}}"><i class="icon fa fa-circle-o"></i> Add Product</a></li>


                <li><a class="treeview-item {{ request()->is('products/get_import') ? 'active':'' }}" href="{{ url('products/get_import') }}"><i class="icon fa fa-circle-o"></i> Add Product by CSV</a></li>                
            </ul>
        </li>

        <li class="treeview {{ Request::segment(1)=='accounts' ? 'is-expanded':'' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Account Configuration</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">

                <li><a class="treeview-item {{ request()->is('accounts') ? 'active':'' }}" href="{{route('accounts.index')}}"><i class="icon fa fa-circle-o"></i> Accounts List</a></li>
                <li><a class="treeview-item {{ request()->is('accounts/create') ? 'active':'' }}" href="{{route('accounts.create')}}"><i class="icon fa fa-circle-o"></i>Add new Account</a></li>

                <li><a class="treeview-item {{ request()->is('accounts/charts') ? 'active':'' }}" href="{{route('charts.index')}}"><i class="icon fa fa-circle-o"></i> Chart of Account</a></li>
                <li><a class="treeview-item {{ request()->is('accounts/charts/create') ? 'active':'' }}" href="{{route('charts.create')}}"><i class="icon fa fa-circle-o"></i> Add New Chart of Account</a></li>

                <li><a class="treeview-item {{ request()->is('accounts/payments-method') ? 'active':'' }}" href="{{route('payments-method.index')}}"><i class="icon fa fa-circle-o"></i>Payment Method</a></li>
                <li><a class="treeview-item {{ request()->is('accounts/payments-method/create') ? 'active':'' }}" href="{{route('payments-method.create')}}"><i class="icon fa fa-circle-o"></i>Add New Payment Method</a></li>


                
            </ul>
        </li>


        <li class="treeview {{ Request::segment(1)=='payments' ? 'is-expanded':'' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Payments</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">

                <li><a class="treeview-item {{ request()->is('payments') ? 'active':'' }}" href="#"><i class="icon fa fa-circle-o"></i> Payment List</a></li>
                <li><a class="treeview-item {{ request()->is('payments/create') ? 'active':'' }}" href="{{route('payments.create')}}"><i class="icon fa fa-circle-o"></i>Add new Payment</a></li>


                
            </ul>
        </li>



        

        


        
            
      </ul>
    </aside>
