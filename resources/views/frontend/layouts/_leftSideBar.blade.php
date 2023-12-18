<div class="profile-sidebar">
    <div class="widget-profile pro-widget-content">
        <div class="profile-info-widget">
            <a href="#" class="booking-doc-img">
               
                <img src="{{ asset('frontend/assets/task_img/user.png') }}" alt="User Image">
             
            </a>
            <div class="profile-det-info">
                <h3>{{ auth('user')->user()->name }}</h3>
            </div>
        </div>
    </div>
    <div class="dashboard-widget">
        <nav class="dashboard-menu">
            <ul>
                <li @if( Route::currentRouteName()=='user.dashboard') class="active" @endif>
                    <a href="{{ route('user.dashboard') }}">
                        <i class="fas fa-columns"></i>
                        <span>Dashboard</span>
                    </a>
                </li>               
                <li @if( Route::currentRouteName()=='user.products.all' ) class="active" @endif>
                    <a href="{{ route('user.products.all') }}">
                        <i class="fas fa-user-cog"></i>
                        <span>All Products</span>
                    </a>
                </li>
                <li @if( Route::currentRouteName()=='user.products.create.page' ) class="active" @endif>
                    <a href="{{ route('user.products.create.page') }}">
                        <i class="fas fa-lock"></i>
                        <span>Create Product</span>
                    </a>
                </li>               
            </ul>
        </nav>
    </div>
</div>
