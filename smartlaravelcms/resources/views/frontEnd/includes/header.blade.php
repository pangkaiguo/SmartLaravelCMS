<header>
    <div class="site-top">
        <div class="container">
            <div>
                <div class="pull-right">
                    @if(Helper::GeneralWebmasterSettings("dashboard_link_status"))
                        @if(Auth::check())
                            <strong dir="{{trans('frontLang.direction')}}">
                                <a href="{{ route("adminHome") }}">
                                    <i class="fa fa-user"></i> {{ Auth::user()->name }}
                                </a>
                            </strong>
                        @else
                            <strong>
                                <a href="{{ route("adminHome") }}"><i
                                            class="fa fa-cog"></i> {{trans('frontLang.dashboard')}}
                                </a>
                            </strong>
                        @endif
                    @endif
                    @if(Helper::GeneralWebmasterSettings("dashboard_link_status") && ($WebmasterSettings->languages_ar_status  && $WebmasterSettings->languages_en_status ))
                        &nbsp; | &nbsp;
                    @endif
                    @if($WebmasterSettings->languages_ar_status  && $WebmasterSettings->languages_en_status )
                        <strong>
                            @if(trans('backLang.code')=="ar")
                                <a href="{{ URL::to('lang/en') }}"><i
                                            class="fa fa-language "></i> {{ str_replace("[ ","",str_replace(" ]","",strip_tags(trans('backLang.englishBox')))) }}
                                </a>
                            @else
                                <a href="{{ URL::to('lang/ar') }}"><i
                                            class="fa fa-language "></i> {{ str_replace("[ ","",str_replace(" ]","",strip_tags(trans('backLang.arabicBox')))) }}
                                </a>
                            @endif

                        </strong>
                    @endif
                </div>
                <div class="pull-left">
                    @if(Helper::GeneralSiteSettings("contact_t3") !="")
                        <i class="fa fa-phone"></i> &nbsp;<a
                                href="tel:{{ Helper::GeneralSiteSettings("contact_t5") }}"><span
                                    dir="ltr">{{ Helper::GeneralSiteSettings("contact_t5") }}</span></a>
                    @endif
                    @if(Helper::GeneralSiteSettings("contact_t6") !="")
                        <span class="top-email">
                        &nbsp; | &nbsp;
                    <i class="fa fa-envelope"></i> &nbsp;<a
                                    href="mailto:{{ Helper::GeneralSiteSettings("contact_t6") }}">{{ Helper::GeneralSiteSettings("contact_t6") }}</a>
                    </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route("Home") }}">
                    @if(Helper::GeneralSiteSettings("style_logo_" . trans('backLang.boxCode')) !="")
                        <img alt=""
                             src="{{ URL::to('uploads/settings/'.Helper::GeneralSiteSettings("style_logo_" . trans('backLang.boxCode'))) }}">
                    @else
                        <img alt="" src="{{ URL::to('uploads/settings/nologo.png') }}">
                    @endif

                </a>
            </div>
            @include('frontEnd.includes.menu')
        </div>
    </div>
</header>