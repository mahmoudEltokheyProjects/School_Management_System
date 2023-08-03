<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- ++++++++++++++++++++++++++++++++ Dashboard : "الرئيسية" ++++++++++++++++++++++++++++++++ -->
                    <li>
                        <a href="{{ url('/') }}">
                            <div class="pull-left"><i class="ti-home"></i>
                                <span class="right-nav-text">{{trans('main_trans.Dashboard')}}</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- ++++++++++++++++++++++++++++++++ menu title ++++++++++++++++++++++++++++++++ -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ __('main_trans.Programname') }}</li>
                    <!-- +++++++++++++++++++++++++++ Grades +++++++++++++++++++++++++++ -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left">
                                <i class="fa fa-university"></i>
                                <span class="right-nav-text">{{ __('main_trans.Grades') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li>
                                <a href="{{ route('Grades.index') }}">{{ __('main_trans.Grades_List') }}</a>
                            </li>
                        </ul>
                    </li>
                    <!-- +++++++++++++++++++++++++++ Classes +++++++++++++++++++++++++++ -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#classes-menu">
                            <div class="pull-left">
                                <i class="fa fa-building"></i>
                                <span class="right-nav-text">{{ __('main_trans.Classes') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="classes-menu" class="collapse" data-parent="#sidebarnav">
                            <li>
                                <a href="{{ route('Classrooms.index') }}">{{ __('My_Classes_trans.List_classes') }}</a>
                            </li>
                        </ul>
                    </li>
                    <!-- +++++++++++++++++++++++++++ Sections +++++++++++++++++++++++++++ -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">
                            <div class="pull-left">
                                <i class="ti-menu-alt"></i>
                                <span class="right-nav-text">{{trans('main_trans.Sections')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('Sections.index') }}">{{trans('main_trans.List_sections')}}</a></li>
                        </ul>
                    </li>
                    <!-- +++++++++++++++++++++++++++ Students +++++++++++++++++++++++++++ -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu">
                            <div class="pull-left">
                                <i class="fa fa-graduation-cap"></i>
                                <span class="right-nav-text">{{ __('main_trans.Students') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="students-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('Student.create') }}">{{ trans('Student_trans.add_student') }}</a> </li>
                            <li> <a href="calendar-list.html">List Calendar</a> </li>
                        </ul>
                    </li>
                    <!-- +++++++++++++++++++++++++++ Teachers +++++++++++++++++++++++++++ -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#teachers-menu">
                            <div class="pull-left">
                                <i class="fa fa-group"></i>
                                <span class="right-nav-text">{{ __('main_trans.Teachers') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="teachers-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('Teacher.index') }}">{{ trans('main_trans.List_Teachers') }}</a> </li>
                        </ul>
                    </li>
                    <!-- +++++++++++++++++++++++++++ Parents +++++++++++++++++++++++++++ -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#parents-menu">
                            <div class="pull-left">
                                <i class="fa fa-users"></i>
                                <span class="right-nav-text">{{ __('main_trans.Parents') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="parents-menu" class="collapse" data-parent="#sidebarnav">
                            <li>
                                <a href="{{ url('add_parent') }}">{{ __('main_trans.List_Parents') }}</a>
                            </li>
                        </ul>
                    </li>
                    <!-- +++++++++++++++++++++++++++ Accounts +++++++++++++++++++++++++++ -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#accounts-menu">
                            <div class="pull-left">
                                <i class="fa fa-money"></i>
                                <span class="right-nav-text">{{ __('main_trans.Accounts') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="accounts-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="calendar.html">Events Calendar </a> </li>
                            <li> <a href="calendar-list.html">List Calendar</a> </li>
                        </ul>
                    </li>
                    <!-- +++++++++++++++++++++++++++ Attendance +++++++++++++++++++++++++++ -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#attendance-menu">
                            <div class="pull-left">
                                <i class="fa fa-calendar"></i>
                                <span class="right-nav-text">{{ __('main_trans.Attendance') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="attendance-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="calendar.html">Events Calendar </a> </li>
                            <li> <a href="calendar-list.html">List Calendar</a> </li>
                        </ul>
                    </li>
                    <!-- +++++++++++++++++++++++++++ Exams +++++++++++++++++++++++++++ -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#exams-menu">
                            <div class="pull-left">
                                <i class="fa fa-book"></i>
                                <span class="right-nav-text">{{ __('main_trans.Exams') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="exams-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="calendar.html">Events Calendar </a> </li>
                            <li> <a href="calendar-list.html">List Calendar</a> </li>
                        </ul>
                    </li>
                    <!-- +++++++++++++++++++++++++++ Library +++++++++++++++++++++++++++ -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#library-menu">
                            <div class="pull-left">
                                <i class="fa fa-book"></i>
                                <span class="right-nav-text">{{ __('main_trans.Library') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="library-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="calendar.html">Events Calendar </a> </li>
                            <li> <a href="calendar-list.html">List Calendar</a> </li>
                        </ul>
                    </li>
                    <!-- +++++++++++++++++++++++++++ Online Classes +++++++++++++++++++++++++++ -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#online-classes-menu">
                            <div class="pull-left">
                                <i class="fa fa-video-camera"></i>
                                <span class="right-nav-text">{{ __('main_trans.Online_Classes') }}</span>
                            </div>
                            <div class="pull-right">
                                <i class="ti-plus"></i>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="online-classes-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="calendar.html">Events Calendar </a> </li>
                            <li> <a href="calendar-list.html">List Calendar</a> </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Left Sidebar End -->

