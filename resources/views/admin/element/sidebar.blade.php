@section('custom-css')
    <style>

    </style>
@endsection

<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <div class="d-flex no-block nav-text-box align-items-center">
        <span><img src="{{ asset('/dist/images/logo-light-icon.png') }}"></span>
        <a class="waves-effect waves-dark ml-auto hidden-sm-down" style="color:azure;" href="#">
            <i class="fa fa-align-justify"></i>
        </a>
        {{-- jika hover berubah --}}
        {{-- <a class="nav-toggler waves-effect waves-dark ml-auto hidden-sm-up" href="javascript:void(0)">
            <i class="fa fa-align-left ti-close"></i>
        </a> --}}
    </div>
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                @if ($user->email == 'admin@admin.com')
                <li class="sidebar" id="user-id">
                    <a class="waves-effect waves-dark" href="{{ route('admin.users') }}">
                        <i class="fa fa-user"></i>
                        User
                    </a>
                </li>
                <li class="sidebar" id="type-id">
                    <a class="waves-effect waves-dark" href="{{ route('admin.types') }}">
                        <i class="fab fa-dropbox"></i>
                        Types
                    </a>
                </li>
                <li class="sidebar" id="category-id">
                    <a class="waves-effect waves-dark" href="{{ route('admin.categories') }}">
                        <i class="fa fa-th-large"></i>
                        Category
                    </a>
                </li>
                <li class="sidebar" id="role-id">
                    <a class="waves-effect waves-dark" href="{{ route('admin.roles') }}">
                        <i class="fa fa-users-cog"></i>
                        Role
                    </a>
                </li>
                <li class="sidebar" id="task-id">
                    <a class="waves-effect waves-dark" href="{{ route('admin.tasks') }}">
                        <i class="fa fa-tasks"></i>
                        Task
                    </a>
                </li>
                <li class="sidebar" id="score-id">
                    <a class="waves-effect waves-dark" href="{{ route('admin.scores') }}">
                        <i class="fa fa-star"></i>
                        Score
                    </a>
                </li>
                <li class="sidebar" id="activity-id">
                    <a class="waves-effect waves-dark" href="{{ route('activity') }}">
                        <i class="fa fa-history"></i>
                        Activity
                    </a>
                </li>
                @else
                <li class="sidebar" id="activity-id">
                    <a class="waves-effect waves-dark" href="{{ route('activity') }}">
                        <i class="fa fa-history"></i>
                        Activity
                    </a>
                </li>
                @endif
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>


<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->

@section('scripts')
    <script>

        $(document).ready(function(){
            var url = window.location.href;
            var urls = url.split('localhost/app-training/public/');
            //console.log(urls[1]);
            var param = urls[1].split('edit');
            var p = param[0].split('admin');
            var asli = p[1].split('/');
            console.log(asli);

            if( urls[1] == 'admin/types' || urls[1] == 'admin/types/' || urls[1] == 'admin/types/create' || urls[1] == 'admin/types/'+asli[2]+'/edit' ){
                $('.sidebar a').removeClass('active');
                $('#type-id a').addClass('active');
            }else if( urls[1] == 'admin/users' || urls[1] == 'admin/users/' || urls[1] == 'admin/users/create' || urls[1] == 'admin/users/'+asli[2]+'/edit' ){
                $('.sidebar a').removeClass('active');
                $('#user-id a').addClass('active');
            }else if( urls[1] == 'admin/categories' || urls[1] == 'admin/categories/' || urls[1] == 'admin/categories/create' || urls[1] == 'admin/categories/'+asli[2]+'/edit' ){
                $('.sidebar a').removeClass('active');
                $('#category-id a').addClass('active');
            }else if( urls[1] == 'admin/roles' || urls[1] == 'admin/roles/' || urls[1] == 'admin/roles/create' || urls[1] == 'admin/roles/'+asli[2]+'/edit' ){
                $('.sidebar a').removeClass('active');
                $('#role-id a').addClass('active');
            }else if( urls[1] == 'admin/scores' || urls[1] == 'admin/scores/' || urls[1] == 'admin/scores/create' || urls[1] == 'admin/scores/'+asli[2]+'/edit' ){
                $('.sidebar a').removeClass('active');
                $('#score-id a').addClass('active');
            }else if( urls[1] == 'admin/tasks' || urls[1] == 'admin/tasks/' || urls[1] == 'admin/tasks/create' || urls[1] == 'admin/tasks/'+asli[2]+'/edit' ){
                $('.sidebar a').removeClass('active');
                $('#task-id a').addClass('active');
            }else{
                $('.sidebar a').removeClass('active');
                $('#activity-id a').addClass('active');
            }

        })

    </script>
@endsection
