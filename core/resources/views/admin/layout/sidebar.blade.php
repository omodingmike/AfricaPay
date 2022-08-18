<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" class="img-circle" src="{{asset('assets/admin/img/'.Auth::guard('admin')->user()->image)}}" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">{{ Auth::guard('admin')->user()->name }} </p>
            <p class="app-sidebar__user-designation">{{ Auth::guard('admin')->user()->username }}</p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item @if(request()->path() == 'admin/home') active @endif" href="{{url('admin/home')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>


        <li><a class="app-menu__item @if(request()->path() == 'admin/referral') active @endif" href="{{route('referral.index')}}"><i class="app-menu__icon fa fa-sitemap"></i><span class="app-menu__label">Referral Levels</span></a></li>

        @php $reqyy = \App\Deposit::where('image', '!=', '')->where('detail', '!=', '')->where('status', 0)->count() @endphp

        <li class="treeview @if(request()->route()->getName() == 'admin.gateway') is-expanded
                            @elseif(request()->route()->getName() == 'bank.gateway.index') is-expanded
                            @elseif(request()->route()->getName() == 'pending.request.deposit') is-expanded
                            @elseif(request()->route()->getName() == 'reject.request.deposit') is-expanded
                            @elseif(request()->route()->getName() == 'approve.request.deposit') is-expanded
                            @elseif(request()->route()->getName() == 'all.deposit.history') is-expanded
                            @endif">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-money"></i><span class="app-menu__label">Deposit Methods @if($reqyy == 0)  @else<span class="badge badge-danger">{{$reqyy}} </span>@endif</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item @if(request()->route()->getName() == 'admin.gateway') active @endif" href="{{route('admin.gateway')}}"><i class="icon fa fa-magic"></i>Automatic Deposit Methods</a></li>
                <li><a class="treeview-item @if(request()->route()->getName() == 'bank.gateway.index') active @endif" href="{{route('bank.gateway.index')}}"><i class="icon fa fa-cc-diners-club"></i>Bank Deposit Methods</a></li>
                <li><a class="treeview-item @if(request()->route()->getName() == 'pending.request.deposit') active @endif" href="{{route('pending.request.deposit')}}"><i class="icon fa fa-spinner"></i>Pending Bank Deposits &nbsp; @if($reqyy == 0)  @else<span class="badge badge-danger">{{$reqyy}} </span>@endif</a></li>
                <li><a class="treeview-item @if(request()->route()->getName() == 'approve.request.deposit') active @endif" href="{{route('approve.request.deposit')}}"><i class="icon fa fa-check"></i>Approved Bank Deposits</a></li>
                <li><a class="treeview-item @if(request()->route()->getName() == 'reject.request.deposit') active @endif" href="{{route('reject.request.deposit')}}"><i class="icon fa fa-times"></i>Rejected Bank Deposit</a></li>
                <li><a class="treeview-item @if(request()->route()->getName() == 'all.deposit.history') active @endif" href="{{route('all.deposit.history')}}"><i class="icon fa fa-history"></i>All Deposit History</a></li>
            </ul>
        </li>

        <li class="treeview @if(request()->route()->getName() == 'manage-pin') is-expanded
                            @elseif(request()->route()->getName() == 'used-pin') is-expanded
                            @endif">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-key"></i><span class="app-menu__label">Manage E-PIN</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item @if(request()->route()->getName() == 'manage-pin') active @endif" href="{{ route('manage-pin')  }}"><i class="icon fa fa-cog"></i>Generate E-PIN</a></li>
                <li><a class="treeview-item @if(request()->route()->getName() == 'used-pin') active @endif" href="{{route('used-pin')}}"><i class="icon fa fa-trash"></i>Used E-PIN</a></li>
            </ul>
        </li>


        <li class="treeview @if(request()->path() == 'admin/time') is-expanded
                            @elseif(request()->path() == 'admin/plan') is-expanded
                            @elseif(request()->path() == 'admin/plan/create') is-expanded
                            @elseif(request()->route()->getName() == 'plan.edit') is-expanded
                            @endif">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-clone"></i><span class="app-menu__label"> Plan Management</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item @if(request()->path() == 'admin/time') active @endif" href="{{ route('time.index')  }}"><i class="icon fa fa-clock-o"></i>Time Setting </a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/plan') active @elseif(request()->path() == 'admin/plan/create') active @elseif(request()->route()->getName() == 'plan.edit') active @endif" href="{{route('plan.index')}}"><i class="icon fa fa-briefcase"></i>Manage Plan</a></li>
            </ul>
        </li>


        <li class="treeview @if(request()->path() == 'admin/knowledge-base/create') is-expanded
                            @elseif(request()->path() == 'admin/knowledge-base'|| request()->route()->getName() == 'knowledge-base.edit') is-expanded
                            @endif">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-pencil-square"></i><span class="app-menu__label"> Knowledge Base</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item @if(request()->path() == 'admin/knowledge-base/create') active @endif" href="{{ route('knowledge-base.create')  }}"><i class="icon fa fa-plus"></i>Add </a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/knowledge-base' || request()->route()->getName() == 'knowledge-base.edit') active @endif" href="{{ route('knowledge-base.index')  }}"><i class="icon fa fa-edit"></i>Manage </a></li>
            </ul>
        </li>

        <li class="treeview @if(request()->path() == 'admin/terms') is-expanded
                            @elseif(request()->path() == 'admin/terms/create' || request()->route()->getName() == 'terms.edit') is-expanded
                            @endif">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-clone"></i><span class="app-menu__label"> Manage Terms</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item @if(request()->path() == 'admin/terms/create') active @endif" href="{{ route('terms.create')  }}"><i class="icon fa fa-plus"></i>Add </a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/terms'|| request()->route()->getName() == 'terms.edit') active @endif" href="{{ route('terms.index')  }}"><i class="icon fa fa-edit"></i>Manage </a></li>
            </ul>
        </li>

        <li class="treeview @if(request()->path() == 'admin/active/users' || request()->route()->getName() == 'user.view') is-expanded
                            @elseif(request()->path() == 'admin/deactive/users') is-expanded
                            @elseif(request()->path() == 'admin/sms/verified/users') is-expanded
                            @elseif(request()->path() == 'admin/all/users') is-expanded
                            @elseif(request()->path() == 'admin/email/verified/users') is-expanded
                            @endif">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label"> Manage Users</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item @if(request()->path() == 'admin/all/users' || request()->route()->getName() == 'user.view') active @endif" href="{{ route('all.user')  }}"><i class="icon fa fa-users"></i> All Users </a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/active/users') active @endif" href="{{ route('active.user')  }}"><i class="icon fa fa-check"></i> Active Users </a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/deactive/users') active @endif" href="{{ route('deactive.user')  }}"><i class="icon fa fa-ban"></i>Banned Users </a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/email/verified/users') active @endif" href="{{ route('total.email.verified')  }}"><i class="icon fa fa-envelope"></i>Email Unverified Users </a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/sms/verified/users') active @endif" href="{{ route('total.sms.verified')  }}"><i class="icon fa fa-phone"></i>Sms Unverified Users </a></li>
            </ul>
        </li>

        @php $req = \App\Withdraw::where('status', 0)->count() @endphp
        <li class="treeview @if(request()->path() == 'admin/withdraw_method') is-expanded
                            @elseif(request()->path() == 'admin/withdraw/request') is-expanded
                            @elseif(request()->path() == 'admin/approved/withdraw') is-expanded
                            @elseif(request()->path() == 'admin/rejected/withdraw') is-expanded
                            @elseif(request()->path() == 'admin/withdraw/log') is-expanded
                            @endif">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-money"></i><span class="app-menu__label"> Withdraw System  @if($req == 0)  @else<span class="badge badge-danger">{{$req}} </span>@endif  </span> <i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item @if(request()->path() == 'admin/withdraw_method') active @endif" href="{{ route('withdraw_method.index')  }}"><i class="icon fa fa-window-maximize"></i> Withdraw Methods </a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/withdraw/request') active @endif" href="{{ route('withdraw.request')  }}"><i class="icon fa fa-spinner"></i>Withdraw Requests &nbsp; @if($req == 0)  @else<span class="badge badge-danger">{{$req}} </span>@endif </a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/approved/withdraw') active @endif" href="{{ route('approved.withdraw')  }}"><i class="icon fa fa-check"></i> Approved Withdraw </a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/rejected/withdraw') active @endif" href="{{ route('rejected.withdraw')  }}"><i class="icon fa fa-times"></i> Rejected Withdraw </a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/withdraw/log') active @endif" href="{{ route('withdraw.log')  }}"><i class="icon fa fa-eye"></i> View Log </a></li>
            </ul>
        </li>


        @php $check_count = \App\SupportTicket::where('status', 1)->get() @endphp
        <li><a class="app-menu__item @if(request()->path() == 'admin/supports' || request()->route()->getName() == 'ticket.admin.reply') active @endif" href="{{route('support.admin.index')}}"><i class="app-menu__icon fa fa-ambulance"></i><span class="app-menu__label">Support Tickets @if(count($check_count) == 0)  @else <span class="badge badge-danger"> {{count($check_count)}}</span> @endif</span></a></li>

        <li class="treeview @if(request()->path() == 'admin/team') is-expanded
                            @elseif(request()->path() == 'admin/testimonial') is-expanded
                            @elseif(request()->path() == 'admin/social') is-expanded
                            @elseif(request()->path() == 'admin/service') is-expanded
                            @elseif(request()->path() == 'admin/banner') is-expanded
                            @elseif(request()->path() == 'admin/static') is-expanded
                            @elseif(request()->path() == 'admin/about') is-expanded
                            @elseif(request()->path() == 'admin/bread') is-expanded
                            @elseif(request()->path() == 'admin/how-it-work') is-expanded
                            @elseif(request()->path() == 'admin/footer') is-expanded
                            @elseif(request()->path() == 'admin/faqs') is-expanded
                            @elseif(request()->path() == 'admin/title/subtitle') is-expanded
                            @elseif(request()->path() == 'admin/faqs-create') is-expanded
                            @elseif(request()->path() == 'admin/background/image') is-expanded

                            @endif">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-globe"></i><span class="app-menu__label">Web Settings </span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item @if(request()->path() == 'admin/banner') active @endif" href="{{ route('banner.index')  }}"><i class="icon fa fa-image"></i>Manage Banner</a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/bread') active @endif" href="{{ route('bread.index')  }}"><i class="icon fa fa-file-image-o"></i>Manage Breadcrumb</a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/how-it-work') active @endif" href="{{ route('how-it-work.index')  }}"><i class="icon fa fa-question"></i>Manage How It's Work</a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/static') active @endif" href="{{route('static.index')}}"><i class="icon fa fa-adjust"></i>Manage Statistics</a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/service') active @endif" href="{{route('service.index')}}"><i class="icon fa fa-server"></i>Manage Service</a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/about') active @endif" href="{{route('about.index')}}"><i class="icon fa fa-address-card"></i>Manage About</a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/testimonial') active @endif" href="{{route('testimonial.index')}}"><i class="icon fa fa-comment-o"></i>Manage Testimonial</a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/team') active @endif" href="{{ route('team.index')  }}"><i class="icon fa fa-users"></i>Manage Team</a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/faqs') active  @elseif(request()->path() == 'admin/faqs-create') active @endif" href="{{route('faqs-all')}}"><i class="icon fa fa-question"></i>Manage Faq</a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/social') active @endif" href="{{route('social.index')}}"><i class="icon fa fa-facebook"></i>Manage Social</a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/footer') active @endif" href="{{route('footer.index')}}"><i class="icon fa fa-first-order"></i>Manage Footer</a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/background/image') active @endif" href="{{route('background.image.index')}}"><i class="icon fa fa-image"></i>Background Images</a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/title/subtitle') active @endif" href="{{route('extra.title.subtitle')}}"><i class="icon fa fa-text-height"></i>Extra Title & Sub-Title</a></li>
            </ul>
        </li>

        <li class="treeview @if(request()->path() == 'admin/subscriber/list') is-expanded
                            @elseif(request()->path() == 'admin/subscriber/send/mail') is-expanded
                            @endif">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label"> Subscriber </span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item @if(request()->path() == 'admin/subscriber/list') active @endif" href="{{ route('subs.list')  }}"><i class="icon fa fa-calculator"></i> Subscribers List </a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/subscriber/send/mail') active @endif" href="{{ route('subs.mail')  }}"><i class="icon fa fa-envelope"></i> Send Mail </a></li>
            </ul>
        </li>


        <li class="treeview @if(request()->path() == 'admin/general/settings') is-expanded
                            @elseif(request()->path() == 'admin/charges') is-expanded
                            @elseif(request()->path() == 'admin/logo/icon') is-expanded
                            @elseif(request()->path() == 'admin/general/email') is-expanded
                            @elseif(request()->path() == 'admin/general/contact') is-expanded
                            @elseif(request()->path() == 'admin/general/sms') is-expanded
                            @elseif(request()->path() == 'admin/web/template') is-expanded
                            @elseif(request()->path() == 'admin/language/manager' || request()->route()->getName() == 'language-key') is-expanded
                            @endif">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cogs"></i><span class="app-menu__label">Settings </span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item @if(request()->path() == 'admin/general/settings') active @endif" href="{{route('general.index')}}"><i class="icon fa fa-cog"></i>General Settings </a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/web/template') active @endif" href="{{route('template.index')}}"><i class="icon fa fa-globe"></i>Web Template Settings </a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/charges') active @endif" href="{{route('charge.index')}}"><i class="icon fa fa-money"></i>Charge Settings </a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/logo/icon') active @endif" href="{{route('logo.index')}}"><i class="icon fa fa-image"></i>Logo & favicon </a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/general/email') active @endif" href="{{route('email.index')}}"><i class="icon fa fa-envelope"></i>Email Setting</a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/general/sms') active @endif" href="{{route('sms.index')}}"><i class="icon fa fa-phone-square"></i>Sms Setting</a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/general/contact') active @endif" href="{{route('contact.index')}}"><i class="icon fa fa-connectdevelop"></i>Contact Setting</a></li>
                <li><a class="treeview-item @if(request()->path() == 'admin/language/manager' || request()->route()->getName() == 'language-key') active @endif" href="{{route('language-manage')}}"><i class="icon fa fa-language"></i>Language Manager </a></li>
            </ul>
        </li>


    </ul>
</aside>
