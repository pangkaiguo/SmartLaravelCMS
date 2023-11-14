@extends('backEnd.layout')

@section('content')

    <div class="padding">
        <div class="row-col">
            <div class="col-sm-3 col-lg-2">
                <div class="p-y">
                    <div class="nav-active-border left b-primary">
                        <ul class="nav nav-sm">

                            <li class="nav-item">
                                <a class="nav-link block {{ ( Session::get('active_tab') == 'frontSettingsTab' || Session::get('active_tab') =="") ? 'active' : '' }}"
                                   href
                                   data-toggle="tab" data-target="#tab-5"
                                   onclick="document.getElementById('active_tab').value='frontSettingsTab'">
                                    &nbsp; {!!  trans('backLang.frontSettings') !!}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link block {{  ( Session::get('active_tab') == 'languageSettingsTab') ? 'active' : '' }}"
                                   href
                                   data-toggle="tab" data-target="#tab-2"
                                   onclick="document.getElementById('active_tab').value='languageSettingsTab'">
                                    &nbsp; {!!  trans('backLang.languageSettings') !!}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link block {{  ( Session::get('active_tab') == 'SEOSettingTab') ? 'active' : '' }}"
                                   href
                                   data-toggle="tab" data-target="#tab-3"
                                   onclick="document.getElementById('active_tab').value='SEOSettingTab'">
                                    &nbsp; {!!  trans('backLang.seoTabTitle') !!}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link block {{  ( Session::get('active_tab') == 'registrationSettingsTab') ? 'active' : '' }}"
                                   href
                                   data-toggle="tab" data-target="#tab-4"
                                   onclick="document.getElementById('active_tab').value='registrationSettingsTab'">
                                    &nbsp; {!!  trans('backLang.registrationSettings') !!}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link block {{  ( Session::get('active_tab') == 'mailSettingsTab') ? 'active' : '' }}"
                                   href data-toggle="tab" data-target="#tab-7"
                                   onclick="document.getElementById('active_tab').value='mailSettingsTab'">
                                    &nbsp; {!!  trans('backLang.mailSettings') !!}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link block {{  ( Session::get('active_tab') == 'googleRecaptchaTab') ? 'active' : '' }}"
                                   href data-toggle="tab" data-target="#tab-8"
                                   onclick="document.getElementById('active_tab').value='googleRecaptchaTab'">
                                    &nbsp; {!!  trans('backLang.googleRecaptcha') !!}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link block {{  ( Session::get('active_tab') == 'googleTagsTab') ? 'active' : '' }}"
                                   href data-toggle="tab" data-target="#tab-9"
                                   onclick="document.getElementById('active_tab').value='googleTagsTab'">
                                    &nbsp; {!!  trans('backLang.googleTags') !!}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link block {{  ( Session::get('active_tab') == 'appsSettingsTab') ? 'active' : '' }}"
                                   href data-toggle="tab" data-target="#tab-1"
                                   onclick="document.getElementById('active_tab').value='appsSettingsTab'">
                                    &nbsp; {!!  trans('backLang.appsSettings') !!}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link block {{  ( Session::get('active_tab') == 'restfulAPITab') ? 'active' : '' }}"
                                   href
                                   data-toggle="tab" data-target="#tab-6"
                                   onclick="document.getElementById('active_tab').value='restfulAPITab'">
                                    &nbsp; {!!  trans('backLang.restfulAPI') !!}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-7 col-lg-10 light lt">

                {{Form::open(['route'=>['webmasterSettingsUpdate'],'method'=>'POST'])}}
                <input type="hidden" id="active_tab" name="active_tab" value="{{ Session::get('active_tab') }}"/>
                <div class="tab-content pos-rlt">

                    <button type="submit" id="save-settings-btn" class="btn btn-info m-a pull-right">{{ trans('backLang.update') }}</button>

                    <div class="tab-pane {{ ( Session::get('active_tab') == 'frontSettingsTab' || Session::get('active_tab') =="") ? 'active' : '' }}"
                         id="tab-5">
                        <div class="p-a-md"><h5>{!!  trans('backLang.frontSettings') !!}</h5></div>

                        <div class="p-a-md col-md-12">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>{{ trans('backLang.headerMenu') }} : </label>
                                    <select name="header_menu_id" id="header_menu_id" class="form-control c-select">
                                        <option value="0">- - {!!  trans('backLang.none') !!} - -</option>
                                        <?php
                                        $title_var = "title_" . trans('backLang.boxCode');
                                        $title_var2 = "title_" . trans('backLang.boxCodeOther');
                                        ?>
                                        @foreach ($ParentMenus as $ParentMenu)
                                            <?php
                                            if ($ParentMenu->$title_var != "") {
                                                $title = $ParentMenu->$title_var;
                                            } else {
                                                $title = $ParentMenu->$title_var2;
                                            }
                                            ?>
                                            <option value="{{ $ParentMenu->id  }}" {{ ($ParentMenu->id == $WebmasterSetting->header_menu_id) ? "selected='selected'":""  }}>{{ $title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('backLang.footerMenu') }} : </label>
                                    <select name="footer_menu_id" id="footer_menu_id" class="form-control c-select">
                                        <option value="0">- - {!!  trans('backLang.none') !!} - -</option>
                                        <?php
                                        $title_var = "title_" . trans('backLang.boxCode');
                                        $title_var2 = "title_" . trans('backLang.boxCodeOther');
                                        ?>
                                        @foreach ($ParentMenus as $ParentMenu)
                                            <?php
                                            if ($ParentMenu->$title_var != "") {
                                                $title = $ParentMenu->$title_var;
                                            } else {
                                                $title = $ParentMenu->$title_var2;
                                            }
                                            ?>
                                            <option value="{{ $ParentMenu->id  }}" {{ ($ParentMenu->id == $WebmasterSetting->footer_menu_id) ? "selected='selected'":""  }}>{{ $title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('backLang.homeSlideBanners') }} : </label>
                                    <select name="home_banners_section_id" id="home_banners_section_id"
                                            class="form-control c-select">
                                        <option value="0">- - {!!  trans('backLang.none') !!} - -</option>
                                        @foreach ($WebmasterBanners as $WebmasterBanner)
                                            <?php
                                            ?>
                                            <option value="{{ $WebmasterBanner->id  }}" {{ ($WebmasterBanner->id == $WebmasterSetting->home_banners_section_id) ? "selected='selected'":""  }}>{!! trans('backLang.'.$WebmasterBanner->name)   !!}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>{{ trans('backLang.homeTextBanners') }} : </label>
                                    <select name="home_text_banners_section_id" id="home_text_banners_section_id"
                                            class="form-control c-select">
                                        <option value="0">- - {!!  trans('backLang.none') !!} - -</option>
                                        @foreach ($WebmasterBanners as $WebmasterBanner)
                                            <?php
                                            ?>
                                            <option value="{{ $WebmasterBanner->id  }}" {{ ($WebmasterBanner->id == $WebmasterSetting->home_text_banners_section_id) ? "selected='selected'":""  }}>{!! trans('backLang.'.$WebmasterBanner->name)   !!}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('backLang.sideBanners') }} : </label>
                                    <select name="side_banners_section_id" id="side_banners_section_id"
                                            class="form-control c-select">
                                        <option value="0">- - {!!  trans('backLang.none') !!} - -</option>
                                        @foreach ($WebmasterBanners as $WebmasterBanner)
                                            <?php
                                            ?>
                                            <option value="{{ $WebmasterBanner->id  }}" {{ ($WebmasterBanner->id == $WebmasterSetting->side_banners_section_id) ? "selected='selected'":""  }}>{!! trans('backLang.'.$WebmasterBanner->name)   !!}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('backLang.newsletterGroup') }} : </label>
                                    <select name="newsletter_contacts_group" id="newsletter_contacts_group"
                                            class="form-control c-select">
                                        <option value="0">- - {!!  trans('backLang.none') !!} - -</option>
                                        @foreach ($ContactsGroups as $ContactsGroup)
                                            <?php
                                            ?>
                                            <option value="{{ $ContactsGroup->id  }}" {{ ($ContactsGroup->id == $WebmasterSetting->newsletter_contacts_group) ? "selected='selected'":""  }}>{!! $ContactsGroup->name   !!}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('backLang.topicsPerPage') }} : </label>
                                    {!! Form::number('home_contents_per_page',$WebmasterSetting->home_contents_per_page, array('id' => 'home_contents_per_page','class' => 'form-control')) !!}
                                </div>


                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('backLang.homeRow1') }} : </label>
                                    <select name="home_content1_section_id" id="home_content1_section_id"
                                            class="form-control c-select">
                                        <option value="0">- - {!!  trans('backLang.none') !!} - -</option>
                                        @foreach ($GeneralWebmasterSections as $Webmaster_Section)
                                            <?php
                                            ?>
                                            <option value="{{ $Webmaster_Section->id  }}" {{ ($Webmaster_Section->id == $WebmasterSetting->home_content1_section_id) ? "selected='selected'":""  }}>{!! str_replace("backLang.","",trans('backLang.'.$Webmaster_Section->name))   !!}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('backLang.homeRow2') }} : </label>
                                    <select name="home_content2_section_id" id="home_content2_section_id"
                                            class="form-control c-select">
                                        <option value="0">- - {!!  trans('backLang.none') !!} - -</option>
                                        @foreach ($GeneralWebmasterSections as $Webmaster_Section)
                                            <?php
                                            ?>
                                            <option value="{{ $Webmaster_Section->id  }}" {{ ($Webmaster_Section->id == $WebmasterSetting->home_content2_section_id) ? "selected='selected'":""  }}>{!! str_replace("backLang.","",trans('backLang.'.$Webmaster_Section->name))   !!}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('backLang.homeRow_3') }} : </label>
                                    <select name="home_content3_section_id" id="home_content3_section_id"
                                            class="form-control c-select">
                                        <option value="0">- - {!!  trans('backLang.none') !!} - -</option>
                                        @foreach ($GeneralWebmasterSections as $Webmaster_Section)
                                            <?php
                                            ?>
                                            <option value="{{ $Webmaster_Section->id  }}" {{ ($Webmaster_Section->id == $WebmasterSetting->home_content3_section_id) ? "selected='selected'":""  }}>{!! str_replace("backLang.","",trans('backLang.'.$Webmaster_Section->name))   !!}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('backLang.homeRow3') }} : </label>
                                    <select name="latest_news_section_id" id="latest_news_section_id"
                                            class="form-control c-select">
                                        <option value="0">- - {!!  trans('backLang.none') !!} - -</option>
                                        @foreach ($GeneralWebmasterSections as $Webmaster_Section)
                                            <?php
                                            ?>
                                            <option value="{{ $Webmaster_Section->id  }}" {{ ($Webmaster_Section->id == $WebmasterSetting->latest_news_section_id) ? "selected='selected'":""  }}>{!! str_replace("backLang.","",trans('backLang.'.$Webmaster_Section->name))  !!}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('backLang.contactPageId') }} : </label>
                                    <select name="contact_page_id" id="contact_page_id" class="form-control c-select">
                                        <option value="0">- - {!!  trans('backLang.none') !!} - -</option>
                                        <?php
                                        $title_var = "title_" . trans('backLang.boxCode');
                                        $title_var2 = "title_" . trans('backLang.boxCodeOther');
                                        ?>
                                        @foreach ($SitePages as $SitePage)
                                            <?php
                                            if ($SitePage->$title_var != "") {
                                            $title = $SitePage->$title_var;
                                            } else {
                                            $title = $SitePage->$title_var2;
                                            }
                                            ?>
                                            <option value="{{ $SitePage->id  }}" {{ ($SitePage->id == $WebmasterSetting->contact_page_id) ? "selected='selected'":""  }}>{{ $title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('backLang.commentsStatus') }} : </label>
                                    <div class="radio">
                                        <div>
                                            <label class="ui-check ui-check-md">
                                                {!! Form::radio('new_comments_status','1',$WebmasterSetting->new_comments_status ? true : false , array('id' => 'new_comments_status1','class'=>'has-value')) !!}
                                                <i class="dark-white"></i>
                                                {{ trans('backLang.automaticPublish') }}
                                            </label>
                                        </div>
                                        <div style="margin-top: 5px;">
                                            <label class="ui-check ui-check-md">
                                                {!! Form::radio('new_comments_status','0',$WebmasterSetting->new_comments_status ? false : true , array('id' => 'new_comments_status2','class'=>'has-value')) !!}
                                                <i class="dark-white"></i>
                                                {{ trans('backLang.manualByAdmin') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('backLang.dashboardLink') }} : </label>
                                    <div class="radio">
                                        <div>
                                            <label class="ui-check ui-check-md">
                                                {!! Form::radio('dashboard_link_status','1',$WebmasterSetting->dashboard_link_status ? true : false , array('id' => 'dashboard_link_status1','class'=>'has-value')) !!}
                                                <i class="dark-white"></i>
                                                {{ trans('backLang.active') }}
                                            </label>
                                        </div>
                                        <div style="margin-top: 5px;">
                                            <label class="ui-check ui-check-md">
                                                {!! Form::radio('dashboard_link_status','0',$WebmasterSetting->dashboard_link_status ? false : true , array('id' => 'dashboard_link_status2','class'=>'has-value')) !!}
                                                <i class="dark-white"></i>
                                                {{ trans('backLang.notActive') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane {{  ( Session::get('active_tab') == 'appsSettingsTab') ? 'active' : '' }}"
                         id="tab-1">
                        <div class="p-a-md"><h5>{!!  trans('backLang.appsSettings') !!}</h5></div>
                        <div class="p-a-md col-md-12">

                            <div class="checkbox">
                                <label class="ui-check">
                                    {!! Form::checkbox('analytics_status','1',$WebmasterSetting->analytics_status, array('id' => 'analytics_status')) !!}
                                    <i class="dark-white"></i><label
                                            for="analytics_status">{{ trans('backLang.visitorsAnalytics') }}</label>
                                </label>
                            </div>

                            <div class="checkbox">
                                <label class="ui-check">
                                    {!! Form::checkbox('inbox_status','1',$WebmasterSetting->inbox_status, array('id' => 'inbox_status')) !!}
                                    <i class="dark-white"></i><label
                                            for="inbox_status">{{ trans('backLang.siteInbox') }}</label>
                                </label>
                            </div>

                            <div class="checkbox">
                                <label class="ui-check">
                                    {!! Form::checkbox('calendar_status','1',$WebmasterSetting->calendar_status, array('id' => 'calendar_status')) !!}
                                    <i class="dark-white"></i><label
                                            for="calendar_status">{{ trans('backLang.calendar') }}</label>
                                </label>
                            </div>

                            <div class="checkbox">
                                <label class="ui-check">
                                    {!! Form::checkbox('banners_status','1',$WebmasterSetting->banners_status, array('id' => 'banners_status')) !!}
                                    <i class="dark-white"></i><label
                                            for="banners_status">{{ trans('backLang.adsBanners') }}</label>
                                </label>
                            </div>


                            <div class="checkbox">
                                <label class="ui-check">
                                    {!! Form::checkbox('newsletter_status','1',$WebmasterSetting->newsletter_status, array('id' => 'newsletter_status')) !!}
                                    <i class="dark-white"></i><label
                                            for="newsletter_status">{{ trans('backLang.newsletter') }}</label>
                                </label>
                            </div>

                            <div class="checkbox">
                                <label class="ui-check">
                                    {!! Form::checkbox('settings_status','1',$WebmasterSetting->settings_status, array('id' => 'settings_status')) !!}
                                    <i class="dark-white"></i><label
                                            for="settings_status">{{ trans('backLang.generalSettings') }}</label>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane {{  ( Session::get('active_tab') == 'languageSettingsTab') ? 'active' : '' }}"
                         id="tab-2">
                        <div class="p-a-md"><h5>{!!  trans('backLang.languageSettings') !!}</h5></div>

                        <div class="p-a-md col-md-12">

                            <div class="form-group">
                                <label>{{ trans('backLang.arabicLanguageFields') }} : </label>
                                <div class="radio">
                                    <div>
                                        <label class="ui-check ui-check-md">
                                            {!! Form::radio('ar_box_status','1',$WebmasterSetting->ar_box_status ? true : false , array('id' => 'ar_box_status1','class'=>'has-value')) !!}
                                            <i class="dark-white"></i>
                                            {{ trans('backLang.active') }}
                                        </label>
                                    </div>
                                    <div style="margin-top: 5px;">
                                        <label class="ui-check ui-check-md">
                                            {!! Form::radio('ar_box_status','0',$WebmasterSetting->ar_box_status ? false : true , array('id' => 'ar_box_status2','class'=>'has-value')) !!}
                                            <i class="dark-white"></i>
                                            {{ trans('backLang.notActive') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{ trans('backLang.englishLanguageFields') }} : </label>
                                <div class="radio">
                                    <div>
                                        <label class="ui-check ui-check-md">
                                            {!! Form::radio('en_box_status','1',$WebmasterSetting->en_box_status ? true : false , array('id' => 'en_box_status1','class'=>'has-value')) !!}
                                            <i class="dark-white"></i>
                                            {{ trans('backLang.active') }}
                                        </label>
                                    </div>
                                    <div style="margin-top: 5px;">
                                        <label class="ui-check ui-check-md">
                                            {!! Form::radio('en_box_status','0',$WebmasterSetting->en_box_status ? false : true , array('id' => 'en_box_status2','class'=>'has-value')) !!}
                                            <i class="dark-white"></i>
                                            {{ trans('backLang.notActive') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>{{ trans('backLang.activeLanguages') }} : </label>
                                <div class="radio">
                                    <div>
                                        <label class="ui-check ui-check-md">
                                            {!! Form::checkbox('languages_ar_status','1',($WebmasterSetting->languages_ar_status == 1)? true : false , array('id' => 'languages_ar_status','class'=>'has-value')) !!}
                                            <i class="dark-white"></i>
                                            {!!  trans('backLang.arabicBox') !!}
                                        </label>
                                    </div>
                                    <div style="margin-top: 5px;">
                                        <label class="ui-check ui-check-md">
                                            {!! Form::checkbox('languages_en_status','1',($WebmasterSetting->languages_en_status == 1) ? true : false , array('id' => 'languages_en_status','class'=>'has-value')) !!}
                                            <i class="dark-white"></i>
                                            {!!  trans('backLang.englishBox') !!}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <a class="btn info " target="_blank"
                               href="{{ url(env('BACKEND_PATH').'/webmaster/translations') }}">
                                <i class="material-icons">&#xe8e2;</i> {{ trans('backLang.translations') }}
                            </a>

                            <div class="form-group m-t">
                                <label>{{ trans('backLang.defaultLanguage') }} : </label>
                                <div>
                                    <select name="languages_by_default" class="form-control c-select">
                                        <option value="ar" {{ ($WebmasterSetting->languages_by_default=="ar")?"selected='selected'":"" }}>{{ strip_tags(trans('backLang.arabicBox')) }}</option>
                                        <option value="en" {{ ($WebmasterSetting->languages_by_default=="en")?"selected='selected'":"" }}>{{ strip_tags(trans('backLang.englishBox')) }}</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group m-t">
                                <label>{{ trans('backLang.timezone') }} : </label>
                                <div>
                                    <select name="timezone" id="timezone" class="form-control c-select">
                                        <option value="America/New_York">America, Eastern</option>
                                        <option value="America/Chicago">America, Central</option>
                                        <option value="America/Denver">America, Mountain</option>
                                        <option value="America/Phoenix">America, Mountain (no DST)</option>
                                        <option value="America/Los_Angeles">America, Pacific</option>
                                        <option value="America/Anchorage">America, Alaska</option>
                                        <option value="America/Adak">America, Hawaii</option>
                                        <option value="Pacific/Honolulu">Pacific, Hawaii (no DST)</option>
                                        <option value="Pacific/Midway">Pacific, Midway (GMT-11:00)</option>
                                        <option value="Pacific/Niue">Pacific, Niue (GMT-11:00)</option>
                                        <option value="Pacific/Pago_Pago">Pacific, Pago Pago (GMT-11:00)</option>
                                        <option value="Pacific/Honolulu">Pacific, Honolulu (GMT-10:00)</option>
                                        <option value="Pacific/Johnston">Pacific, Johnston (GMT-10:00)</option>
                                        <option value="Pacific/Rarotonga">Pacific, Rarotonga (GMT-10:00)</option>
                                        <option value="Pacific/Tahiti">Pacific, Tahiti (GMT-10:00)</option>
                                        <option value="Pacific/Marquesas">Pacific, Marquesas (GMT-09:30)</option>
                                        <option value="America/Adak">America, Adak (GMT-09:00)</option>
                                        <option value="Pacific/Gambier">Pacific, Gambier (GMT-09:00)</option>
                                        <option value="America/Anchorage">America, Anchorage (GMT-08:00)</option>
                                        <option value="America/Juneau">America, Juneau (GMT-08:00)</option>
                                        <option value="America/Metlakatla">America, Metlakatla (GMT-08:00)</option>
                                        <option value="America/Nome">America, Nome (GMT-08:00)</option>
                                        <option value="America/Sitka">America, Sitka (GMT-08:00)</option>
                                        <option value="America/Yakutat">America, Yakutat (GMT-08:00)</option>
                                        <option value="Pacific/Pitcairn">Pacific, Pitcairn (GMT-08:00)</option>
                                        <option value="America/Creston">America, Creston (GMT-07:00)</option>
                                        <option value="America/Dawson">America, Dawson (GMT-07:00)</option>
                                        <option value="America/Dawson_Creek">America, Dawson Creek (GMT-07:00)</option>
                                        <option value="America/Fort_Nelson">America, Fort Nelson (GMT-07:00)</option>
                                        <option value="America/Hermosillo">America, Hermosillo (GMT-07:00)</option>
                                        <option value="America/Los_Angeles">America, Los Angeles (GMT-07:00)</option>
                                        <option value="America/Phoenix">America, Phoenix (GMT-07:00)</option>
                                        <option value="America/Tijuana">America, Tijuana (GMT-07:00)</option>
                                        <option value="America/Vancouver">America, Vancouver (GMT-07:00)</option>
                                        <option value="America/Whitehorse">America, Whitehorse (GMT-07:00)</option>
                                        <option value="America/Belize">America, Belize (GMT-06:00)</option>
                                        <option value="America/Boise">America, Boise (GMT-06:00)</option>
                                        <option value="America/Cambridge_Bay">America, Cambridge Bay (GMT-06:00)
                                        </option>
                                        <option value="America/Chihuahua">America, Chihuahua (GMT-06:00)</option>
                                        <option value="America/Costa_Rica">America, Costa Rica (GMT-06:00)</option>
                                        <option value="America/Denver">America, Denver (GMT-06:00)</option>
                                        <option value="America/Edmonton">America, Edmonton (GMT-06:00)</option>
                                        <option value="America/El_Salvador">America, El Salvador (GMT-06:00)</option>
                                        <option value="America/Guatemala">America, Guatemala (GMT-06:00)</option>
                                        <option value="America/Inuvik">America, Inuvik (GMT-06:00)</option>
                                        <option value="America/Managua">America, Managua (GMT-06:00)</option>
                                        <option value="America/Mazatlan">America, Mazatlan (GMT-06:00)</option>
                                        <option value="America/Ojinaga">America, Ojinaga (GMT-06:00)</option>
                                        <option value="America/Regina">America, Regina (GMT-06:00)</option>
                                        <option value="America/Swift_Current">America, Swift Current (GMT-06:00)
                                        </option>
                                        <option value="America/Tegucigalpa">America, Tegucigalpa (GMT-06:00)</option>
                                        <option value="America/Yellowknife">America, Yellowknife (GMT-06:00)</option>
                                        <option value="Pacific/Galapagos">Pacific, Galapagos (GMT-06:00)</option>
                                        <option value="America/Atikokan">America, Atikokan (GMT-05:00)</option>
                                        <option value="America/Bahia_Banderas">America, Bahia Banderas (GMT-05:00)
                                        </option>
                                        <option value="America/Bogota">America, Bogota (GMT-05:00)</option>
                                        <option value="America/Cancun">America, Cancun (GMT-05:00)</option>
                                        <option value="America/Cayman">America, Cayman (GMT-05:00)</option>
                                        <option value="America/Chicago">America, Chicago (GMT-05:00)</option>
                                        <option value="America/Eirunepe">America, Eirunepe (GMT-05:00)</option>
                                        <option value="America/Guayaquil">America, Guayaquil (GMT-05:00)</option>
                                        <option value="America/Indiana/Knox">America, Indiana, Knox (GMT-05:00)</option>
                                        <option value="America/Indiana/Tell_City">America, Indiana, Tell City
                                            (GMT-05:00)
                                        </option>
                                        <option value="America/Jamaica">America, Jamaica (GMT-05:00)</option>
                                        <option value="America/Lima">America, Lima (GMT-05:00)</option>
                                        <option value="America/Matamoros">America, Matamoros (GMT-05:00)</option>
                                        <option value="America/Menominee">America, Menominee (GMT-05:00)</option>
                                        <option value="America/Merida">America, Merida (GMT-05:00)</option>
                                        <option value="America/Mexico_City">America, Mexico City (GMT-05:00)</option>
                                        <option value="America/Monterrey">America, Monterrey (GMT-05:00)</option>
                                        <option value="America/North_Dakota/Beulah">America, North Dakota, Beulah
                                            (GMT-05:00)
                                        </option>
                                        <option value="America/North_Dakota/Center">America, North Dakota, Center
                                            (GMT-05:00)
                                        </option>
                                        <option value="America/North_Dakota/New_Salem">America, North Dakota, New Salem
                                            (GMT-05:00)
                                        </option>
                                        <option value="America/Panama">America, Panama (GMT-05:00)</option>
                                        <option value="America/Port-au-Prince">America, Port-au-Prince (GMT-05:00)
                                        </option>
                                        <option value="America/Rainy_River">America, Rainy River (GMT-05:00)</option>
                                        <option value="America/Rankin_Inlet">America, Rankin Inlet (GMT-05:00)</option>
                                        <option value="America/Resolute">America, Resolute (GMT-05:00)</option>
                                        <option value="America/Rio_Branco">America, Rio Branco (GMT-05:00)</option>
                                        <option value="America/Winnipeg">America, Winnipeg (GMT-05:00)</option>
                                        <option value="Pacific/Easter">Pacific, Easter (GMT-05:00)</option>
                                        <option value="America/Anguilla">America, Anguilla (GMT-04:00)</option>
                                        <option value="America/Antigua">America, Antigua (GMT-04:00)</option>
                                        <option value="America/Aruba">America, Aruba (GMT-04:00)</option>
                                        <option value="America/Asuncion">America, Asuncion (GMT-04:00)</option>
                                        <option value="America/Barbados">America, Barbados (GMT-04:00)</option>
                                        <option value="America/Blanc-Sablon">America, Blanc-Sablon (GMT-04:00)</option>
                                        <option value="America/Boa_Vista">America, Boa Vista (GMT-04:00)</option>
                                        <option value="America/Campo_Grande">America, Campo Grande (GMT-04:00)</option>
                                        <option value="America/Caracas">America, Caracas (GMT-04:00)</option>
                                        <option value="America/Cuiaba">America, Cuiaba (GMT-04:00)</option>
                                        <option value="America/Curacao">America, Curacao (GMT-04:00)</option>
                                        <option value="America/Detroit">America, Detroit (GMT-04:00)</option>
                                        <option value="America/Dominica">America, Dominica (GMT-04:00)</option>
                                        <option value="America/Grand_Turk">America, Grand Turk (GMT-04:00)</option>
                                        <option value="America/Grenada">America, Grenada (GMT-04:00)</option>
                                        <option value="America/Guadeloupe">America, Guadeloupe (GMT-04:00)</option>
                                        <option value="America/Guyana">America, Guyana (GMT-04:00)</option>
                                        <option value="America/Havana">America, Havana (GMT-04:00)</option>
                                        <option value="America/Indiana/Indianapolis">America, Indiana, Indianapolis
                                            (GMT-04:00)
                                        </option>
                                        <option value="America/Indiana/Marengo">America, Indiana, Marengo (GMT-04:00)
                                        </option>
                                        <option value="America/Indiana/Petersburg">America, Indiana, Petersburg
                                            (GMT-04:00)
                                        </option>
                                        <option value="America/Indiana/Vevay">America, Indiana, Vevay (GMT-04:00)
                                        </option>
                                        <option value="America/Indiana/Vincennes">America, Indiana, Vincennes
                                            (GMT-04:00)
                                        </option>
                                        <option value="America/Indiana/Winamac">America, Indiana, Winamac (GMT-04:00)
                                        </option>
                                        <option value="America/Iqaluit">America, Iqaluit (GMT-04:00)</option>
                                        <option value="America/Kentucky/Louisville">America, Kentucky, Louisville
                                            (GMT-04:00)
                                        </option>
                                        <option value="America/Kentucky/Monticello">America, Kentucky, Monticello
                                            (GMT-04:00)
                                        </option>
                                        <option value="America/Kralendijk">America, Kralendijk (GMT-04:00)</option>
                                        <option value="America/La_Paz">America, La Paz (GMT-04:00)</option>
                                        <option value="America/Lower_Princes">America, Lower Princes (GMT-04:00)
                                        </option>
                                        <option value="America/Manaus">America, Manaus (GMT-04:00)</option>
                                        <option value="America/Marigot">America, Marigot (GMT-04:00)</option>
                                        <option value="America/Martinique">America, Martinique (GMT-04:00)</option>
                                        <option value="America/Montserrat">America, Montserrat (GMT-04:00)</option>
                                        <option value="America/Nassau">America, Nassau (GMT-04:00)</option>
                                        <option value="America/New_York">America, New York (GMT-04:00)</option>
                                        <option value="America/Nipigon">America, Nipigon (GMT-04:00)</option>
                                        <option value="America/Pangnirtung">America, Pangnirtung (GMT-04:00)</option>
                                        <option value="America/Port_of_Spain">America, Port of Spain (GMT-04:00)
                                        </option>
                                        <option value="America/Porto_Velho">America, Porto Velho (GMT-04:00)</option>
                                        <option value="America/Puerto_Rico">America, Puerto Rico (GMT-04:00)</option>
                                        <option value="America/Santo_Domingo">America, Santo Domingo (GMT-04:00)
                                        </option>
                                        <option value="America/St_Barthelemy">America, St. Barthelemy (GMT-04:00)
                                        </option>
                                        <option value="America/St_Kitts">America, St. Kitts (GMT-04:00)</option>
                                        <option value="America/St_Lucia">America, St. Lucia (GMT-04:00)</option>
                                        <option value="America/St_Thomas">America, St. Thomas (GMT-04:00)</option>
                                        <option value="America/St_Vincent">America, St. Vincent (GMT-04:00)</option>
                                        <option value="America/Thunder_Bay">America, Thunder Bay (GMT-04:00)</option>
                                        <option value="America/Toronto">America, Toronto (GMT-04:00)</option>
                                        <option value="America/Tortola">America, Tortola (GMT-04:00)</option>
                                        <option value="America/Araguaina">America, Araguaina (GMT-03:00)</option>
                                        <option value="America/Argentina/Buenos_Aires">America, Argentina, Buenos Aires
                                            (GMT-03:00)
                                        </option>
                                        <option value="America/Argentina/Catamarca">America, Argentina, Catamarca
                                            (GMT-03:00)
                                        </option>
                                        <option value="America/Argentina/Cordoba">America, Argentina, Cordoba
                                            (GMT-03:00)
                                        </option>
                                        <option value="America/Argentina/Jujuy">America, Argentina, Jujuy (GMT-03:00)
                                        </option>
                                        <option value="America/Argentina/La_Rioja">America, Argentina, La Rioja
                                            (GMT-03:00)
                                        </option>
                                        <option value="America/Argentina/Mendoza">America, Argentina, Mendoza
                                            (GMT-03:00)
                                        </option>
                                        <option value="America/Argentina/Rio_Gallegos">America, Argentina, Rio Gallegos
                                            (GMT-03:00)
                                        </option>
                                        <option value="America/Argentina/Salta">America, Argentina, Salta (GMT-03:00)
                                        </option>
                                        <option value="America/Argentina/San_Juan">America, Argentina, San Juan
                                            (GMT-03:00)
                                        </option>
                                        <option value="America/Argentina/San_Luis">America, Argentina, San Luis
                                            (GMT-03:00)
                                        </option>
                                        <option value="America/Argentina/Tucuman">America, Argentina, Tucuman
                                            (GMT-03:00)
                                        </option>
                                        <option value="America/Argentina/Ushuaia">America, Argentina, Ushuaia
                                            (GMT-03:00)
                                        </option>
                                        <option value="America/Bahia">America, Bahia (GMT-03:00)</option>
                                        <option value="America/Belem">America, Belem (GMT-03:00)</option>
                                        <option value="America/Cayenne">America, Cayenne (GMT-03:00)</option>
                                        <option value="America/Fortaleza">America, Fortaleza (GMT-03:00)</option>
                                        <option value="America/Glace_Bay">America, Glace Bay (GMT-03:00)</option>
                                        <option value="America/Goose_Bay">America, Goose Bay (GMT-03:00)</option>
                                        <option value="America/Halifax">America, Halifax (GMT-03:00)</option>
                                        <option value="America/Maceio">America, Maceio (GMT-03:00)</option>
                                        <option value="America/Moncton">America, Moncton (GMT-03:00)</option>
                                        <option value="America/Montevideo">America, Montevideo (GMT-03:00)</option>
                                        <option value="America/Paramaribo">America, Paramaribo (GMT-03:00)</option>
                                        <option value="America/Recife">America, Recife (GMT-03:00)</option>
                                        <option value="America/Santarem">America, Santarem (GMT-03:00)</option>
                                        <option value="America/Santiago">America, Santiago (GMT-03:00)</option>
                                        <option value="America/Sao_Paulo">America, Sao Paulo (GMT-03:00)</option>
                                        <option value="America/Thule">America, Thule (GMT-03:00)</option>
                                        <option value="Antarctica/Palmer">Antarctica, Palmer (GMT-03:00)</option>
                                        <option value="Antarctica/Rothera">Antarctica, Rothera (GMT-03:00)</option>
                                        <option value="Atlantic/Bermuda">Atlantic, Bermuda (GMT-03:00)</option>
                                        <option value="Atlantic/Stanley">Atlantic, Stanley (GMT-03:00)</option>
                                        <option value="America/St_Johns">America, St. Johns (GMT-02:30)</option>
                                        <option value="America/Godthab">America, Godthab (GMT-02:00)</option>
                                        <option value="America/Miquelon">America, Miquelon (GMT-02:00)</option>
                                        <option value="America/Noronha">America, Noronha (GMT-02:00)</option>
                                        <option value="Atlantic/South_Georgia">Atlantic, South Georgia (GMT-02:00)
                                        </option>
                                        <option value="Atlantic/Cape_Verde">Atlantic, Cape Verde (GMT-01:00)</option>
                                        <option value="Africa/Abidjan">Africa, Abidjan (GMT)</option>
                                        <option value="Africa/Accra">Africa, Accra (GMT)</option>
                                        <option value="Africa/Bamako">Africa, Bamako (GMT)</option>
                                        <option value="Africa/Banjul">Africa, Banjul (GMT)</option>
                                        <option value="Africa/Bissau">Africa, Bissau (GMT)</option>
                                        <option value="Africa/Conakry">Africa, Conakry (GMT)</option>
                                        <option value="Africa/Dakar">Africa, Dakar (GMT)</option>
                                        <option value="Africa/Freetown">Africa, Freetown (GMT)</option>
                                        <option value="Africa/Lome">Africa, Lome (GMT)</option>
                                        <option value="Africa/Monrovia">Africa, Monrovia (GMT)</option>
                                        <option value="Africa/Nouakchott">Africa, Nouakchott (GMT)</option>
                                        <option value="Africa/Ouagadougou">Africa, Ouagadougou (GMT)</option>
                                        <option value="Africa/Sao_Tome">Africa, Sao Tome (GMT)</option>
                                        <option value="America/Danmarkshavn">America, Danmarkshavn (GMT)</option>
                                        <option value="America/Scoresbysund">America, Scoresbysund (GMT)</option>
                                        <option value="Atlantic/Azores">Atlantic, Azores (GMT)</option>
                                        <option value="Atlantic/Reykjavik">Atlantic, Reykjavik (GMT)</option>
                                        <option value="Atlantic/St_Helena">Atlantic, St. Helena (GMT)</option>
                                        <option value="UTC">UTC (GMT)</option>
                                        <option value="Africa/Algiers">Africa, Algiers (GMT+01:00)</option>
                                        <option value="Africa/Bangui">Africa, Bangui (GMT+01:00)</option>
                                        <option value="Africa/Brazzaville">Africa, Brazzaville (GMT+01:00)</option>
                                        <option value="Africa/Casablanca">Africa, Casablanca (GMT+01:00)</option>
                                        <option value="Africa/Douala">Africa, Douala (GMT+01:00)</option>
                                        <option value="Africa/El_Aaiun">Africa, El Aaiun (GMT+01:00)</option>
                                        <option value="Africa/Kinshasa">Africa, Kinshasa (GMT+01:00)</option>
                                        <option value="Africa/Lagos">Africa, Lagos (GMT+01:00)</option>
                                        <option value="Africa/Libreville">Africa, Libreville (GMT+01:00)</option>
                                        <option value="Africa/Luanda">Africa, Luanda (GMT+01:00)</option>
                                        <option value="Africa/Malabo">Africa, Malabo (GMT+01:00)</option>
                                        <option value="Africa/Ndjamena">Africa, Ndjamena (GMT+01:00)</option>
                                        <option value="Africa/Niamey">Africa, Niamey (GMT+01:00)</option>
                                        <option value="Africa/Porto-Novo">Africa, Porto-Novo (GMT+01:00)</option>
                                        <option value="Africa/Tunis">Africa, Tunis (GMT+01:00)</option>
                                        <option value="Africa/Windhoek">Africa, Windhoek (GMT+01:00)</option>
                                        <option value="Atlantic/Canary">Atlantic, Canary (GMT+01:00)</option>
                                        <option value="Atlantic/Faroe">Atlantic, Faroe (GMT+01:00)</option>
                                        <option value="Atlantic/Madeira">Atlantic, Madeira (GMT+01:00)</option>
                                        <option value="Europe/Dublin">Europe, Dublin (GMT+01:00)</option>
                                        <option value="Europe/Guernsey">Europe, Guernsey (GMT+01:00)</option>
                                        <option value="Europe/Isle_of_Man">Europe, Isle of Man (GMT+01:00)</option>
                                        <option value="Europe/Jersey">Europe, Jersey (GMT+01:00)</option>
                                        <option value="Europe/Lisbon">Europe, Lisbon (GMT+01:00)</option>
                                        <option value="Europe/London">Europe, London (GMT+01:00)</option>
                                        <option value="Africa/Blantyre">Africa, Blantyre (GMT+02:00)</option>
                                        <option value="Africa/Bujumbura">Africa, Bujumbura (GMT+02:00)</option>
                                        <option value="Africa/Cairo">Africa, Cairo (GMT+02:00)</option>
                                        <option value="Africa/Ceuta">Africa, Ceuta (GMT+02:00)</option>
                                        <option value="Africa/Gaborone">Africa, Gaborone (GMT+02:00)</option>
                                        <option value="Africa/Harare">Africa, Harare (GMT+02:00)</option>
                                        <option value="Africa/Johannesburg">Africa, Johannesburg (GMT+02:00)</option>
                                        <option value="Africa/Kigali">Africa, Kigali (GMT+02:00)</option>
                                        <option value="Africa/Lubumbashi">Africa, Lubumbashi (GMT+02:00)</option>
                                        <option value="Africa/Lusaka">Africa, Lusaka (GMT+02:00)</option>
                                        <option value="Africa/Maputo">Africa, Maputo (GMT+02:00)</option>
                                        <option value="Africa/Maseru">Africa, Maseru (GMT+02:00)</option>
                                        <option value="Africa/Mbabane">Africa, Mbabane (GMT+02:00)</option>
                                        <option value="Africa/Tripoli">Africa, Tripoli (GMT+02:00)</option>
                                        <option value="Antarctica/Troll">Antarctica, Troll (GMT+02:00)</option>
                                        <option value="Arctic/Longyearbyen">Arctic, Longyearbyen (GMT+02:00)</option>
                                        <option value="Europe/Amsterdam">Europe, Amsterdam (GMT+02:00)</option>
                                        <option value="Europe/Andorra">Europe, Andorra (GMT+02:00)</option>
                                        <option value="Europe/Belgrade">Europe, Belgrade (GMT+02:00)</option>
                                        <option value="Europe/Berlin">Europe, Berlin (GMT+02:00)</option>
                                        <option value="Europe/Bratislava">Europe, Bratislava (GMT+02:00)</option>
                                        <option value="Europe/Brussels">Europe, Brussels (GMT+02:00)</option>
                                        <option value="Europe/Budapest">Europe, Budapest (GMT+02:00)</option>
                                        <option value="Europe/Busingen">Europe, Busingen (GMT+02:00)</option>
                                        <option value="Europe/Copenhagen">Europe, Copenhagen (GMT+02:00)</option>
                                        <option value="Europe/Gibraltar">Europe, Gibraltar (GMT+02:00)</option>
                                        <option value="Europe/Kaliningrad">Europe, Kaliningrad (GMT+02:00)</option>
                                        <option value="Europe/Ljubljana">Europe, Ljubljana (GMT+02:00)</option>
                                        <option value="Europe/Luxembourg">Europe, Luxembourg (GMT+02:00)</option>
                                        <option value="Europe/Madrid">Europe, Madrid (GMT+02:00)</option>
                                        <option value="Europe/Malta">Europe, Malta (GMT+02:00)</option>
                                        <option value="Europe/Monaco">Europe, Monaco (GMT+02:00)</option>
                                        <option value="Europe/Oslo">Europe, Oslo (GMT+02:00)</option>
                                        <option value="Europe/Paris">Europe, Paris (GMT+02:00)</option>
                                        <option value="Europe/Podgorica">Europe, Podgorica (GMT+02:00)</option>
                                        <option value="Europe/Prague">Europe, Prague (GMT+02:00)</option>
                                        <option value="Europe/Rome">Europe, Rome (GMT+02:00)</option>
                                        <option value="Europe/San_Marino">Europe, San Marino (GMT+02:00)</option>
                                        <option value="Europe/Sarajevo">Europe, Sarajevo (GMT+02:00)</option>
                                        <option value="Europe/Skopje">Europe, Skopje (GMT+02:00)</option>
                                        <option value="Europe/Stockholm">Europe, Stockholm (GMT+02:00)</option>
                                        <option value="Europe/Tirane">Europe, Tirane (GMT+02:00)</option>
                                        <option value="Europe/Vaduz">Europe, Vaduz (GMT+02:00)</option>
                                        <option value="Europe/Vatican">Europe, Vatican (GMT+02:00)</option>
                                        <option value="Europe/Vienna">Europe, Vienna (GMT+02:00)</option>
                                        <option value="Europe/Warsaw">Europe, Warsaw (GMT+02:00)</option>
                                        <option value="Europe/Zagreb">Europe, Zagreb (GMT+02:00)</option>
                                        <option value="Europe/Zurich">Europe, Zurich (GMT+02:00)</option>
                                        <option value="Africa/Addis_Ababa">Africa, Addis Ababa (GMT+03:00)</option>
                                        <option value="Africa/Asmara">Africa, Asmara (GMT+03:00)</option>
                                        <option value="Africa/Dar_es_Salaam">Africa, Dar es Salaam (GMT+03:00)</option>
                                        <option value="Africa/Djibouti">Africa, Djibouti (GMT+03:00)</option>
                                        <option value="Africa/Juba">Africa, Juba (GMT+03:00)</option>
                                        <option value="Africa/Kampala">Africa, Kampala (GMT+03:00)</option>
                                        <option value="Africa/Khartoum">Africa, Khartoum (GMT+03:00)</option>
                                        <option value="Africa/Mogadishu">Africa, Mogadishu (GMT+03:00)</option>
                                        <option value="Africa/Nairobi">Africa, Nairobi (GMT+03:00)</option>
                                        <option value="Antarctica/Syowa">Antarctica, Syowa (GMT+03:00)</option>
                                        <option value="Asia/Aden">Asia, Aden (GMT+03:00)</option>
                                        <option value="Asia/Amman">Asia, Amman (GMT+03:00)</option>
                                        <option value="Asia/Baghdad">Asia, Baghdad (GMT+03:00)</option>
                                        <option value="Asia/Bahrain">Asia, Bahrain (GMT+03:00)</option>
                                        <option value="Asia/Beirut">Asia, Beirut (GMT+03:00)</option>
                                        <option value="Asia/Damascus">Asia, Damascus (GMT+03:00)</option>
                                        <option value="Asia/Famagusta">Asia, Famagusta (GMT+03:00)</option>
                                        <option value="Asia/Gaza">Asia, Gaza (GMT+03:00)</option>
                                        <option value="Asia/Hebron">Asia, Hebron (GMT+03:00)</option>
                                        <option value="Asia/Jerusalem">Asia, Jerusalem (GMT+03:00)</option>
                                        <option value="Asia/Kuwait">Asia, Kuwait (GMT+03:00)</option>
                                        <option value="Asia/Nicosia">Asia, Nicosia (GMT+03:00)</option>
                                        <option value="Asia/Qatar">Asia, Qatar (GMT+03:00)</option>
                                        <option value="Asia/Riyadh">Asia, Riyadh (GMT+03:00)</option>
                                        <option value="Europe/Athens">Europe, Athens (GMT+03:00)</option>
                                        <option value="Europe/Bucharest">Europe, Bucharest (GMT+03:00)</option>
                                        <option value="Europe/Chisinau">Europe, Chisinau (GMT+03:00)</option>
                                        <option value="Europe/Helsinki">Europe, Helsinki (GMT+03:00)</option>
                                        <option value="Europe/Istanbul">Europe, Istanbul (GMT+03:00)</option>
                                        <option value="Europe/Kiev">Europe, Kiev (GMT+03:00)</option>
                                        <option value="Europe/Kirov">Europe, Kirov (GMT+03:00)</option>
                                        <option value="Europe/Mariehamn">Europe, Mariehamn (GMT+03:00)</option>
                                        <option value="Europe/Minsk">Europe, Minsk (GMT+03:00)</option>
                                        <option value="Europe/Moscow">Europe, Moscow (GMT+03:00)</option>
                                        <option value="Europe/Riga">Europe, Riga (GMT+03:00)</option>
                                        <option value="Europe/Simferopol">Europe, Simferopol (GMT+03:00)</option>
                                        <option value="Europe/Sofia">Europe, Sofia (GMT+03:00)</option>
                                        <option value="Europe/Tallinn">Europe, Tallinn (GMT+03:00)</option>
                                        <option value="Europe/Uzhgorod">Europe, Uzhgorod (GMT+03:00)</option>
                                        <option value="Europe/Vilnius">Europe, Vilnius (GMT+03:00)</option>
                                        <option value="Europe/Volgograd">Europe, Volgograd (GMT+03:00)</option>
                                        <option value="Europe/Zaporozhye">Europe, Zaporozhye (GMT+03:00)</option>
                                        <option value="Indian/Antananarivo">Indian, Antananarivo (GMT+03:00)</option>
                                        <option value="Indian/Comoro">Indian, Comoro (GMT+03:00)</option>
                                        <option value="Indian/Mayotte">Indian, Mayotte (GMT+03:00)</option>
                                        <option value="Asia/Baku">Asia, Baku (GMT+04:00)</option>
                                        <option value="Asia/Dubai">Asia, Dubai (GMT+04:00)</option>
                                        <option value="Asia/Muscat">Asia, Muscat (GMT+04:00)</option>
                                        <option value="Asia/Tbilisi">Asia, Tbilisi (GMT+04:00)</option>
                                        <option value="Asia/Yerevan">Asia, Yerevan (GMT+04:00)</option>
                                        <option value="Europe/Astrakhan">Europe, Astrakhan (GMT+04:00)</option>
                                        <option value="Europe/Samara">Europe, Samara (GMT+04:00)</option>
                                        <option value="Europe/Saratov">Europe, Saratov (GMT+04:00)</option>
                                        <option value="Europe/Ulyanovsk">Europe, Ulyanovsk (GMT+04:00)</option>
                                        <option value="Indian/Mahe">Indian, Mahe (GMT+04:00)</option>
                                        <option value="Indian/Mauritius">Indian, Mauritius (GMT+04:00)</option>
                                        <option value="Indian/Reunion">Indian, Reunion (GMT+04:00)</option>
                                        <option value="Asia/Kabul">Asia, Kabul (GMT+04:30)</option>
                                        <option value="Asia/Tehran">Asia, Tehran (GMT+04:30)</option>
                                        <option value="Antarctica/Mawson">Antarctica, Mawson (GMT+05:00)</option>
                                        <option value="Asia/Aqtau">Asia, Aqtau (GMT+05:00)</option>
                                        <option value="Asia/Aqtobe">Asia, Aqtobe (GMT+05:00)</option>
                                        <option value="Asia/Ashgabat">Asia, Ashgabat (GMT+05:00)</option>
                                        <option value="Asia/Atyrau">Asia, Atyrau (GMT+05:00)</option>
                                        <option value="Asia/Dushanbe">Asia, Dushanbe (GMT+05:00)</option>
                                        <option value="Asia/Karachi">Asia, Karachi (GMT+05:00)</option>
                                        <option value="Asia/Oral">Asia, Oral (GMT+05:00)</option>
                                        <option value="Asia/Samarkand">Asia, Samarkand (GMT+05:00)</option>
                                        <option value="Asia/Tashkent">Asia, Tashkent (GMT+05:00)</option>
                                        <option value="Asia/Yekaterinburg">Asia, Yekaterinburg (GMT+05:00)</option>
                                        <option value="Indian/Kerguelen">Indian, Kerguelen (GMT+05:00)</option>
                                        <option value="Indian/Maldives">Indian, Maldives (GMT+05:00)</option>
                                        <option value="Asia/Colombo">Asia, Colombo (GMT+05:30)</option>
                                        <option value="Asia/Kolkata">Asia, Kolkata (GMT+05:30)</option>
                                        <option value="Asia/Kathmandu">Asia, Kathmandu (GMT+05:45)</option>
                                        <option value="Antarctica/Vostok">Antarctica, Vostok (GMT+06:00)</option>
                                        <option value="Asia/Almaty">Asia, Almaty (GMT+06:00)</option>
                                        <option value="Asia/Bishkek">Asia, Bishkek (GMT+06:00)</option>
                                        <option value="Asia/Dhaka">Asia, Dhaka (GMT+06:00)</option>
                                        <option value="Asia/Omsk">Asia, Omsk (GMT+06:00)</option>
                                        <option value="Asia/Qyzylorda">Asia, Qyzylorda (GMT+06:00)</option>
                                        <option value="Asia/Thimphu">Asia, Thimphu (GMT+06:00)</option>
                                        <option value="Asia/Urumqi">Asia, Urumqi (GMT+06:00)</option>
                                        <option value="Indian/Chagos">Indian, Chagos (GMT+06:00)</option>
                                        <option value="Asia/Yangon">Asia, Yangon (GMT+06:30)</option>
                                        <option value="Indian/Cocos">Indian, Cocos (GMT+06:30)</option>
                                        <option value="Antarctica/Davis">Antarctica, Davis (GMT+07:00)</option>
                                        <option value="Asia/Bangkok">Asia, Bangkok (GMT+07:00)</option>
                                        <option value="Asia/Barnaul">Asia, Barnaul (GMT+07:00)</option>
                                        <option value="Asia/Ho_Chi_Minh">Asia, Ho Chi Minh (GMT+07:00)</option>
                                        <option value="Asia/Jakarta">Asia, Jakarta (GMT+07:00)</option>
                                        <option value="Asia/Krasnoyarsk">Asia, Krasnoyarsk (GMT+07:00)</option>
                                        <option value="Asia/Novokuznetsk">Asia, Novokuznetsk (GMT+07:00)</option>
                                        <option value="Asia/Novosibirsk">Asia, Novosibirsk (GMT+07:00)</option>
                                        <option value="Asia/Phnom_Penh">Asia, Phnom Penh (GMT+07:00)</option>
                                        <option value="Asia/Pontianak">Asia, Pontianak (GMT+07:00)</option>
                                        <option value="Asia/Tomsk">Asia, Tomsk (GMT+07:00)</option>
                                        <option value="Asia/Vientiane">Asia, Vientiane (GMT+07:00)</option>
                                        <option value="Indian/Christmas">Indian, Christmas (GMT+07:00)</option>
                                        <option value="Asia/Brunei">Asia, Brunei (GMT+08:00)</option>
                                        <option value="Asia/Hong_Kong">Asia, Hong Kong (GMT+08:00)</option>
                                        <option value="Asia/Hovd">Asia, Hovd (GMT+08:00)</option>
                                        <option value="Asia/Irkutsk">Asia, Irkutsk (GMT+08:00)</option>
                                        <option value="Asia/Kuala_Lumpur">Asia, Kuala Lumpur (GMT+08:00)</option>
                                        <option value="Asia/Kuching">Asia, Kuching (GMT+08:00)</option>
                                        <option value="Asia/Macau">Asia, Macau (GMT+08:00)</option>
                                        <option value="Asia/Makassar">Asia, Makassar (GMT+08:00)</option>
                                        <option value="Asia/Manila">Asia, Manila (GMT+08:00)</option>
                                        <option value="Asia/Shanghai">Asia, Shanghai (GMT+08:00)</option>
                                        <option value="Asia/Singapore">Asia, Singapore (GMT+08:00)</option>
                                        <option value="Asia/Taipei">Asia, Taipei (GMT+08:00)</option>
                                        <option value="Australia/Perth">Australia, Perth (GMT+08:00)</option>
                                        <option value="Asia/Pyongyang">Asia, Pyongyang (GMT+08:30)</option>
                                        <option value="Australia/Eucla">Australia, Eucla (GMT+08:45)</option>
                                        <option value="Asia/Chita">Asia, Chita (GMT+09:00)</option>
                                        <option value="Asia/Choibalsan">Asia, Choibalsan (GMT+09:00)</option>
                                        <option value="Asia/Dili">Asia, Dili (GMT+09:00)</option>
                                        <option value="Asia/Jayapura">Asia, Jayapura (GMT+09:00)</option>
                                        <option value="Asia/Khandyga">Asia, Khandyga (GMT+09:00)</option>
                                        <option value="Asia/Seoul">Asia, Seoul (GMT+09:00)</option>
                                        <option value="Asia/Tokyo">Asia, Tokyo (GMT+09:00)</option>
                                        <option value="Asia/Ulaanbaatar">Asia, Ulaanbaatar (GMT+09:00)</option>
                                        <option value="Asia/Yakutsk">Asia, Yakutsk (GMT+09:00)</option>
                                        <option value="Pacific/Palau">Pacific, Palau (GMT+09:00)</option>
                                        <option value="Australia/Adelaide">Australia, Adelaide (GMT+09:30)</option>
                                        <option value="Australia/Broken_Hill">Australia, Broken Hill (GMT+09:30)
                                        </option>
                                        <option value="Australia/Darwin">Australia, Darwin (GMT+09:30)</option>
                                        <option value="Antarctica/DumontDUrville">Antarctica, DumontDUrville
                                            (GMT+10:00)
                                        </option>
                                        <option value="Asia/Ust-Nera">Asia, Ust-Nera (GMT+10:00)</option>
                                        <option value="Asia/Vladivostok">Asia, Vladivostok (GMT+10:00)</option>
                                        <option value="Australia/Brisbane">Australia, Brisbane (GMT+10:00)</option>
                                        <option value="Australia/Currie">Australia, Currie (GMT+10:00)</option>
                                        <option value="Australia/Hobart">Australia, Hobart (GMT+10:00)</option>
                                        <option value="Australia/Lindeman">Australia, Lindeman (GMT+10:00)</option>
                                        <option value="Australia/Melbourne">Australia, Melbourne (GMT+10:00)</option>
                                        <option value="Australia/Sydney">Australia, Sydney (GMT+10:00)</option>
                                        <option value="Pacific/Chuuk">Pacific, Chuuk (GMT+10:00)</option>
                                        <option value="Pacific/Guam">Pacific, Guam (GMT+10:00)</option>
                                        <option value="Pacific/Port_Moresby">Pacific, Port Moresby (GMT+10:00)</option>
                                        <option value="Pacific/Saipan">Pacific, Saipan (GMT+10:00)</option>
                                        <option value="Australia/Lord_Howe">Australia, Lord Howe (GMT+10:30)</option>
                                        <option value="Antarctica/Casey">Antarctica, Casey (GMT+11:00)</option>
                                        <option value="Antarctica/Macquarie">Antarctica, Macquarie (GMT+11:00)</option>
                                        <option value="Asia/Magadan">Asia, Magadan (GMT+11:00)</option>
                                        <option value="Asia/Sakhalin">Asia, Sakhalin (GMT+11:00)</option>
                                        <option value="Asia/Srednekolymsk">Asia, Srednekolymsk (GMT+11:00)</option>
                                        <option value="Pacific/Bougainville">Pacific, Bougainville (GMT+11:00)</option>
                                        <option value="Pacific/Efate">Pacific, Efate (GMT+11:00)</option>
                                        <option value="Pacific/Guadalcanal">Pacific, Guadalcanal (GMT+11:00)</option>
                                        <option value="Pacific/Kosrae">Pacific, Kosrae (GMT+11:00)</option>
                                        <option value="Pacific/Norfolk">Pacific, Norfolk (GMT+11:00)</option>
                                        <option value="Pacific/Noumea">Pacific, Noumea (GMT+11:00)</option>
                                        <option value="Pacific/Pohnpei">Pacific, Pohnpei (GMT+11:00)</option>
                                        <option value="Antarctica/McMurdo">Antarctica, McMurdo (GMT+12:00)</option>
                                        <option value="Asia/Anadyr">Asia, Anadyr (GMT+12:00)</option>
                                        <option value="Asia/Kamchatka">Asia, Kamchatka (GMT+12:00)</option>
                                        <option value="Pacific/Auckland">Pacific, Auckland (GMT+12:00)</option>
                                        <option value="Pacific/Fiji">Pacific, Fiji (GMT+12:00)</option>
                                        <option value="Pacific/Funafuti">Pacific, Funafuti (GMT+12:00)</option>
                                        <option value="Pacific/Kwajalein">Pacific, Kwajalein (GMT+12:00)</option>
                                        <option value="Pacific/Majuro">Pacific, Majuro (GMT+12:00)</option>
                                        <option value="Pacific/Nauru">Pacific, Nauru (GMT+12:00)</option>
                                        <option value="Pacific/Tarawa">Pacific, Tarawa (GMT+12:00)</option>
                                        <option value="Pacific/Wake">Pacific, Wake (GMT+12:00)</option>
                                        <option value="Pacific/Wallis">Pacific, Wallis (GMT+12:00)</option>
                                        <option value="Pacific/Chatham">Pacific, Chatham (GMT+12:45)</option>
                                        <option value="Pacific/Apia">Pacific, Apia (GMT+13:00)</option>
                                        <option value="Pacific/Enderbury">Pacific, Enderbury (GMT+13:00)</option>
                                        <option value="Pacific/Fakaofo">Pacific, Fakaofo (GMT+13:00)</option>
                                        <option value="Pacific/Tongatapu">Pacific, Tongatapu (GMT+13:00)</option>
                                        <option value="Pacific/Kiritimati">Pacific, Kiritimati (GMT+14:00)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane {{  ( Session::get('active_tab') == 'SEOSettingTab') ? 'active' : '' }}"
                         id="tab-3">
                        <div class="p-a-md"><h5>{!!  trans('backLang.seoTabTitle') !!}</h5></div>

                        <div class="p-a-md col-md-12">

                            <div class="form-group">
                                <label>{{ trans('backLang.seoTab') }} : </label>
                                <div class="radio">
                                    <div>
                                        <label class="ui-check ui-check-md">
                                            {!! Form::radio('seo_status','1',$WebmasterSetting->seo_status ? true : false , array('id' => 'seo_status1','class'=>'has-value')) !!}
                                            <i class="dark-white"></i>
                                            {{ trans('backLang.active') }}
                                        </label>
                                    </div>
                                    <div style="margin-top: 5px;">
                                        <label class="ui-check ui-check-md">
                                            {!! Form::radio('seo_status','0',$WebmasterSetting->seo_status ? false : true , array('id' => 'seo_status2','class'=>'has-value')) !!}
                                            <i class="dark-white"></i>
                                            {{ trans('backLang.notActive') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{ trans('backLang.friendlyURLinks') }} : </label>
                                <div class="radio">
                                    <div>
                                        <label class="ui-check ui-check-md">
                                            {!! Form::radio('links_status','0',$WebmasterSetting->links_status ? false : true , array('id' => 'links_status1','class'=>'has-value')) !!}
                                            <i class="dark-white"></i>
                                            {{ trans('backLang.friendlyURLinks1') }}
                                        </label>
                                    </div>
                                    <div style="margin-top: 5px;">
                                        <label class="ui-check ui-check-md">
                                            {!! Form::radio('links_status','1',$WebmasterSetting->links_status ? true : false , array('id' => 'links_status2','class'=>'has-value')) !!}
                                            <i class="dark-white"></i>
                                            {{ trans('backLang.friendlyURLinks2') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane {{  ( Session::get('active_tab') == 'registrationSettingsTab') ? 'active' : '' }}"
                         id="tab-4">
                        <div class="p-a-md"><h5>{!!  trans('backLang.registrationSettings') !!}</h5></div>

                        <div class="p-a-md col-md-12">


                            <div class="form-group">
                                <label>{{ trans('backLang.permissionForNewUsers') }} : </label>
                                <select name="permission_group" id="permission_group" class="form-control c-select">
                                    @foreach ($PermissionsGroups as $PermissionsGroup)
                                        <?php
                                        ?>
                                        <option value="{{ $PermissionsGroup->id  }}" {{ ($PermissionsGroup->id == $WebmasterSetting->permission_group) ? "selected='selected'":""  }}>{!! $PermissionsGroup->name   !!}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group m-t-3">
                                <label><h6>{{ trans('backLang.allowRegister') }}</h6></label>
                                <div class="radio">

                                    <div>
                                        <label class="ui-check ui-check-md">
                                            {!! Form::radio('register_status','0',$WebmasterSetting->register_status ? false : true , array('id' => 'register_status2','class'=>'has-value')) !!}
                                            <i class="dark-white"></i>
                                            {{ trans('backLang.notActive') }}
                                        </label>
                                    </div>
                                    <div style="margin-top: 5px;">
                                        <label class="ui-check ui-check-md">
                                            {!! Form::radio('register_status','1',$WebmasterSetting->register_status ? true : false , array('id' => 'register_status1','class'=>'has-value')) !!}
                                            <i class="dark-white"></i>
                                            {{ trans('backLang.active') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-t-3">
                                <div class="form-group col-md-4">
                                    <label><h6>{{ trans('backLang.loginWithFacebook') }}
                                            <a target="_blank"
                                               href="https://developers.facebook.com/apps">
                                                <i class="material-icons">&#xe8fd;</i>
                                            </a>
                                        </h6></label>
                                    <div class="radio">

                                        <div>
                                            <label class="ui-check ui-check-md">
                                                {!! Form::radio('login_facebook_status','0',$WebmasterSetting->login_facebook_status ? false : true , array('id' => 'login_facebook_status2','class'=>'has-value')) !!}
                                                <i class="dark-white"></i>
                                                {{ trans('backLang.notActive') }}
                                            </label>
                                        </div>
                                        <div style="margin-top: 5px;">
                                            <label class="ui-check ui-check-md">
                                                {!! Form::radio('login_facebook_status','1',$WebmasterSetting->login_facebook_status ? true : false , array('id' => 'login_facebook_status1','class'=>'has-value')) !!}
                                                <i class="dark-white"></i>
                                                {{ trans('backLang.active') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8" id="facebook_ids_div"
                                     style="display: {{ ($WebmasterSetting->login_facebook_status==1)?"block":"none" }}">
                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label">{!!  trans('backLang.loginAppID') !!}</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('login_facebook_client_id',$WebmasterSetting->login_facebook_client_id, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label">{!!  trans('backLang.loginAppSecret') !!}</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('login_facebook_client_secret',$WebmasterSetting->login_facebook_client_secret, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label">
                                            <small>{!!  trans('backLang.callbackURL') !!}</small>
                                        </label>
                                        <div class="col-sm-10">
                                            {!! Form::text('login_facebook_callbackURL',env('APP_URL') . '/oauth/facebook/callback', array('class' => 'form-control','readonly' => '','style'=>'font-size:12px', 'dir'=>trans('backLang.ltr'))) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-2">
                                <div class="form-group col-md-4">
                                    <label><h6>{{ trans('backLang.loginWithTwitter') }}
                                            <a target="_blank"
                                               href="https://apps.twitter.com">
                                                <i class="material-icons">&#xe8fd;</i>
                                            </a></h6></label>
                                    <div class="radio">

                                        <div>
                                            <label class="ui-check ui-check-md">
                                                {!! Form::radio('login_twitter_status','0',$WebmasterSetting->login_twitter_status ? false : true , array('id' => 'login_twitter_status2','class'=>'has-value')) !!}
                                                <i class="dark-white"></i>
                                                {{ trans('backLang.notActive') }}
                                            </label>
                                        </div>
                                        <div style="margin-top: 5px;">
                                            <label class="ui-check ui-check-md">
                                                {!! Form::radio('login_twitter_status','1',$WebmasterSetting->login_twitter_status ? true : false , array('id' => 'login_twitter_status1','class'=>'has-value')) !!}
                                                <i class="dark-white"></i>
                                                {{ trans('backLang.active') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8" id="twitter_ids_div"
                                     style="display: {{ ($WebmasterSetting->login_twitter_status==1)?"block":"none" }}">
                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label">{!!  trans('backLang.loginConsumerAppKey') !!}</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('login_twitter_client_id',$WebmasterSetting->login_twitter_client_id, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label">{!!  trans('backLang.loginConsumerAppSecret') !!}</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('login_twitter_client_secret',$WebmasterSetting->login_twitter_client_secret, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label">
                                            <small>{!!  trans('backLang.callbackURL') !!}</small>
                                        </label>
                                        <div class="col-sm-10">
                                            {!! Form::text('login_facebook_callbackURL',env('APP_URL') . '/oauth/twitter/callback', array('class' => 'form-control','readonly' => '','style'=>'font-size:12px', 'dir'=>trans('backLang.ltr'))) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-2">
                                <div class="form-group col-md-4">
                                    <label><h6>{{ trans('backLang.loginWithGoogle') }}
                                            <a target="_blank"
                                               href="https://developers.google.com/identity/sign-in/web/sign-in">
                                                <i class="material-icons">&#xe8fd;</i>
                                            </a></h6></label>
                                    <div class="radio">

                                        <div>
                                            <label class="ui-check ui-check-md">
                                                {!! Form::radio('login_google_status','0',$WebmasterSetting->login_google_status ? false : true , array('id' => 'login_google_status2','class'=>'has-value')) !!}
                                                <i class="dark-white"></i>
                                                {{ trans('backLang.notActive') }}
                                            </label>
                                        </div>
                                        <div style="margin-top: 5px;">
                                            <label class="ui-check ui-check-md">
                                                {!! Form::radio('login_google_status','1',$WebmasterSetting->login_google_status ? true : false , array('id' => 'login_google_status1','class'=>'has-value')) !!}
                                                <i class="dark-white"></i>
                                                {{ trans('backLang.active') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8" id="google_ids_div"
                                     style="display: {{ ($WebmasterSetting->login_google_status==1)?"block":"none" }}">
                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label">{!!  trans('backLang.loginClientID') !!}</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('login_google_client_id',$WebmasterSetting->login_google_client_id, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label">{!!  trans('backLang.loginClientSecret') !!}</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('login_google_client_secret',$WebmasterSetting->login_google_client_secret, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label">
                                            <small>{!!  trans('backLang.callbackURL') !!}</small>
                                        </label>
                                        <div class="col-sm-10">
                                            {!! Form::text('login_facebook_callbackURL',env('APP_URL') . '/oauth/google/callback', array('class' => 'form-control','readonly' => '','style'=>'font-size:12px', 'dir'=>trans('backLang.ltr'))) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-2">
                                <div class="form-group col-md-4">
                                    <label><h6>{{ trans('backLang.loginWithLinkedIn') }}
                                            <a target="_blank"
                                               href="https://www.linkedin.com/developer/apps/">
                                                <i class="material-icons">&#xe8fd;</i>
                                            </a></h6></label>
                                    <div class="radio">

                                        <div>
                                            <label class="ui-check ui-check-md">
                                                {!! Form::radio('login_linkedin_status','0',$WebmasterSetting->login_linkedin_status ? false : true , array('id' => 'login_linkedin_status2','class'=>'has-value')) !!}
                                                <i class="dark-white"></i>
                                                {{ trans('backLang.notActive') }}
                                            </label>
                                        </div>
                                        <div style="margin-top: 5px;">
                                            <label class="ui-check ui-check-md">
                                                {!! Form::radio('login_linkedin_status','1',$WebmasterSetting->login_linkedin_status ? true : false , array('id' => 'login_linkedin_status1','class'=>'has-value')) !!}
                                                <i class="dark-white"></i>
                                                {{ trans('backLang.active') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8" id="linkedin_ids_div"
                                     style="display: {{ ($WebmasterSetting->login_linkedin_status==1)?"block":"none" }}">
                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label">{!!  trans('backLang.loginClientID') !!}</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('login_linkedin_client_id',$WebmasterSetting->login_linkedin_client_id, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label">{!!  trans('backLang.loginClientSecret') !!}</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('login_linkedin_client_secret',$WebmasterSetting->login_linkedin_client_secret, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label">
                                            <small>{!!  trans('backLang.callbackURL') !!}</small>
                                        </label>
                                        <div class="col-sm-10">
                                            {!! Form::text('login_facebook_callbackURL',env('APP_URL') . '/oauth/linkedin/callback', array('class' => 'form-control','readonly' => '','style'=>'font-size:12px', 'dir'=>trans('backLang.ltr'))) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-2">
                                <div class="form-group col-md-4">
                                    <label><h6>{{ trans('backLang.loginWithGitHub') }}
                                            <a target="_blank"
                                               href="https://github.com/settings/developers">
                                                <i class="material-icons">&#xe8fd;</i>
                                            </a></h6></label>
                                    <div class="radio">

                                        <div>
                                            <label class="ui-check ui-check-md">
                                                {!! Form::radio('login_github_status','0',$WebmasterSetting->login_github_status ? false : true , array('id' => 'login_github_status2','class'=>'has-value')) !!}
                                                <i class="dark-white"></i>
                                                {{ trans('backLang.notActive') }}
                                            </label>
                                        </div>
                                        <div style="margin-top: 5px;">
                                            <label class="ui-check ui-check-md">
                                                {!! Form::radio('login_github_status','1',$WebmasterSetting->login_github_status ? true : false , array('id' => 'login_github_status1','class'=>'has-value')) !!}
                                                <i class="dark-white"></i>
                                                {{ trans('backLang.active') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8" id="github_ids_div"
                                     style="display: {{ ($WebmasterSetting->login_github_status==1)?"block":"none" }}">
                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label">{!!  trans('backLang.loginClientID') !!}</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('login_github_client_id',$WebmasterSetting->login_github_client_id, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label">{!!  trans('backLang.loginClientSecret') !!}</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('login_github_client_secret',$WebmasterSetting->login_github_client_secret, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label">
                                            <small>{!!  trans('backLang.callbackURL') !!}</small>
                                        </label>
                                        <div class="col-sm-10">
                                            {!! Form::text('login_facebook_callbackURL',env('APP_URL') . '/oauth/github/callback', array('class' => 'form-control','readonly' => '','style'=>'font-size:12px', 'dir'=>trans('backLang.ltr'))) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-2">
                                <div class="form-group col-md-4">
                                    <label><h6>{{ trans('backLang.loginWithBitbucket') }}
                                            <a target="_blank"
                                               href="https://bitbucket.org/account">
                                                <i class="material-icons">&#xe8fd;</i>
                                            </a></h6></label>
                                    <div class="radio">

                                        <div>
                                            <label class="ui-check ui-check-md">
                                                {!! Form::radio('login_bitbucket_status','0',$WebmasterSetting->login_bitbucket_status ? false : true , array('id' => 'login_bitbucket_status2','class'=>'has-value')) !!}
                                                <i class="dark-white"></i>
                                                {{ trans('backLang.notActive') }}
                                            </label>
                                        </div>
                                        <div style="margin-top: 5px;">
                                            <label class="ui-check ui-check-md">
                                                {!! Form::radio('login_bitbucket_status','1',$WebmasterSetting->login_bitbucket_status ? true : false , array('id' => 'login_bitbucket_status1','class'=>'has-value')) !!}
                                                <i class="dark-white"></i>
                                                {{ trans('backLang.active') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8" id="bitbucket_ids_div"
                                     style="display: {{ ($WebmasterSetting->login_bitbucket_status==1)?"block":"none" }}">
                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label">{!!  trans('backLang.loginKey') !!}</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('login_bitbucket_client_id',$WebmasterSetting->login_bitbucket_client_id, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label">{!!  trans('backLang.loginSecret') !!}</label>
                                        <div class="col-sm-10">
                                            {!! Form::text('login_bitbucket_client_secret',$WebmasterSetting->login_bitbucket_client_secret, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 form-control-label">
                                            <small>{!!  trans('backLang.callbackURL') !!}</small>
                                        </label>
                                        <div class="col-sm-10">
                                            {!! Form::text('login_facebook_callbackURL',env('APP_URL') . '/oauth/bitbucket/callback', array('class' => 'form-control','readonly' => '','style'=>'font-size:12px', 'dir'=>trans('backLang.ltr'))) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane {{  ( Session::get('active_tab') == 'restfulAPITab') ? 'active' : '' }}"
                         id="tab-6">
                        <div class="p-a-md"><h5>{!!  trans('backLang.restfulAPI') !!}</h5></div>

                        <div class="p-a-md col-md-12">

                            <div class="form-group">
                                <label>{{ trans('backLang.APIStatus') }} : </label>
                                <div class="radio">
                                    <div>
                                        <label class="ui-check ui-check-md">
                                            {!! Form::radio('api_status','0',$WebmasterSetting->api_status ? false : true , array('id' => 'api_status2','class'=>'has-value')) !!}
                                            <i class="dark-white"></i>
                                            {{ trans('backLang.notActive') }}
                                        </label>
                                    </div>
                                    <div style="margin-top: 5px;">
                                        <label class="ui-check ui-check-md">
                                            {!! Form::radio('api_status','1',$WebmasterSetting->api_status ? true : false , array('id' => 'api_status1','class'=>'has-value')) !!}
                                            <i class="dark-white"></i>
                                            {{ trans('backLang.active') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" id="api_key_div"
                                 style="display: {{ ($WebmasterSetting->api_status==1)?"block":"none" }}">
                                <label>{!!  trans('backLang.APIKey') !!} : </label>
                                {!! Form::text('api_key',$WebmasterSetting->api_key, array('id' => 'api_key','readonly'=>'','class' => 'form-control')) !!}
                                <a href="javascript:void(0)" onclick="generate_key()">
                                    <small>{!!  trans('backLang.APIKeyGenerate') !!}</small>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane {{  ( Session::get('active_tab') == 'mailSettingsTab') ? 'active' : '' }}"
                         id="tab-7">
                        <div class="p-a-md"><h5>{!!  trans('backLang.mailSettings') !!}</h5></div>

                        <div class="p-a-md col-md-12">
                            <div class="form-group">
                                <label>{!!  trans('backLang.mailDriver') !!}</label>
                                {!! Form::text('mail_driver',$WebmasterSetting->mail_driver, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                            </div>
                            <div class="form-group">
                                <label>{!!  trans('backLang.mailHost') !!}</label>
                                {!! Form::text('mail_host',$WebmasterSetting->mail_host, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                            </div>
                            <div class="form-group">
                                <label>{!!  trans('backLang.mailPort') !!}</label>
                                {!! Form::text('mail_port',$WebmasterSetting->mail_port, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                            </div>
                            <div class="form-group">
                                <label>{!!  trans('backLang.mailUsername') !!}</label>
                                {!! Form::text('mail_username',$WebmasterSetting->mail_username, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                            </div>
                            <div class="form-group">
                                <label>{!!  trans('backLang.mailPassword') !!}</label>
                                {!! Form::text('mail_password',$WebmasterSetting->mail_password, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                            </div>
                            <div class="form-group">
                                <label>{!!  trans('backLang.mailEncryption') !!}</label>
                                {!! Form::text('mail_encryption',$WebmasterSetting->mail_encryption, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                            </div>
                            <div class="form-group">
                                <label>{!!  trans('backLang.mailNoReplay') !!}</label>
                                {!! Form::text('mail_no_replay',$WebmasterSetting->mail_no_replay, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane {{  ( Session::get('active_tab') == 'googleRecaptchaTab') ? 'active' : '' }}"
                         id="tab-8">
                        <div class="p-a-md"><h5>{!!  trans('backLang.googleRecaptcha') !!}</h5></div>

                        <div class="p-a-md col-md-12">
                            <div class="form-group">
                                <label>{{ trans('backLang.googleRecaptchaStatus') }} : </label>
                                <div class="radio">
                                    <div>
                                        <label class="ui-check ui-check-md">
                                            {!! Form::radio('nocaptcha_status','0',$WebmasterSetting->nocaptcha_status ? false : true , array('id' => 'nocaptcha_status2','class'=>'has-value')) !!}
                                            <i class="dark-white"></i>
                                            {{ trans('backLang.notActive') }}
                                        </label>
                                    </div>
                                    <div style="margin-top: 5px;">
                                        <label class="ui-check ui-check-md">
                                            {!! Form::radio('nocaptcha_status','1',$WebmasterSetting->nocaptcha_status ? true : false , array('id' => 'nocaptcha_status1','class'=>'has-value')) !!}
                                            <i class="dark-white"></i>
                                            {{ trans('backLang.active') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div id="nocaptcha_div" {!!  ( !$WebmasterSetting->nocaptcha_status) ? "style='display:none'":"" !!}>

                                <div class="form-group">
                                    <label>{!!  trans('backLang.googleRecaptchaSecret') !!}</label>
                                    {!! Form::text('nocaptcha_secret',$WebmasterSetting->nocaptcha_secret, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                                </div>
                                <div class="form-group">
                                    <label>{!!  trans('backLang.googleRecaptchaSitekey') !!}</label>
                                    {!! Form::text('nocaptcha_sitekey',$WebmasterSetting->nocaptcha_sitekey, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                                </div>

                            </div>
                            <small><a href="https://www.google.com/recaptcha"
                                      style="text-decoration: underline" target="_blank"><i
                                            class="material-icons">&#xe8fd;</i> Google reCAPTCHA</a></small>
                        </div>
                    </div>
                    <div class="tab-pane {{  ( Session::get('active_tab') == 'googleTagsTab') ? 'active' : '' }}"
                         id="tab-9">
                        <div class="p-a-md"><h5>{!!  trans('backLang.googleTags') !!}</h5></div>


                        <div class="p-a-md col-md-12">
                            <div class="form-group">
                                <label>{{ trans('backLang.googleTagsStatus') }} : </label>
                                <div class="radio">
                                    <div>
                                        <label class="ui-check ui-check-md">
                                            {!! Form::radio('google_tags_status','0',$WebmasterSetting->google_tags_status ? false : true , array('id' => 'google_tags_status2','class'=>'has-value')) !!}
                                            <i class="dark-white"></i>
                                            {{ trans('backLang.notActive') }}
                                        </label>
                                    </div>
                                    <div style="margin-top: 5px;">
                                        <label class="ui-check ui-check-md">
                                            {!! Form::radio('google_tags_status','1',$WebmasterSetting->google_tags_status ? true : false , array('id' => 'google_tags_status1','class'=>'has-value')) !!}
                                            <i class="dark-white"></i>
                                            {{ trans('backLang.active') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div id="google_tags_div" {!!  ( !$WebmasterSetting->google_tags_status) ? "style='display:none'":"" !!}>

                                <div class="form-group">
                                    <label>{!!  trans('backLang.googleTagsContainerId') !!}</label>
                                    {!! Form::text('google_tags_id',$WebmasterSetting->google_tags_id, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                                </div>

                            </div>


                            <div class="form-group">
                                <label>{!!  trans('backLang.googleTagsCode') !!}</label>
                                {!! Form::textarea('google_analytics_code',$WebmasterSetting->google_analytics_code, array('placeholder' => '','class' => 'form-control', 'dir'=>trans('backLang.ltr'),'rows'=>'7')) !!}
                            </div>
                            <small><a href="https://www.google.com/analytics/tag-manager/"
                                      style="text-decoration: underline" target="_blank"><i
                                            class="material-icons">&#xe8fd;</i> Google Tag Manager</a> &nbsp; <a
                                        href="https://analytics.google.com/"
                                        style="text-decoration: underline" target="_blank"><i
                                            class="material-icons">&#xe8fd;</i> Google Analytics</a></small>

                        </div>
                    </div>

                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>

@endsection
@section('footerInclude')
    <script type="text/javascript">
        $("input:radio[name=api_status]").click(function () {
            if ($(this).val() == 1) {
                $("#api_key_div").css("display", "block");
            } else {
                $("#api_key_div").css("display", "none");
            }
        });

        function generate_key() {
            if (!confirm('{!!  trans('backLang.APIKeyConfirm') !!}')) {
                return false;
            } else {
                $("#api_key").val(Math.floor(Math.random() * 1000000000000000));
            }
        }


        $(document).ready(function () {
            $("#nocaptcha_status2").click(function () {
                $("#nocaptcha_div").css("display", "none");
            });
            $("#nocaptcha_status1").click(function () {
                $("#nocaptcha_div").css("display", "block");
            });

            $("#google_tags_status2").click(function () {
                $("#google_tags_div").css("display", "none");
            });
            $("#google_tags_status1").click(function () {
                $("#google_tags_div").css("display", "block");
            });

            $("#login_facebook_status2").click(function () {
                $("#facebook_ids_div").css("display", "none");
            });
            $("#login_facebook_status1").click(function () {
                $("#facebook_ids_div").css("display", "block");
            });

            $("#login_twitter_status2").click(function () {
                $("#twitter_ids_div").css("display", "none");
            });
            $("#login_twitter_status1").click(function () {
                $("#twitter_ids_div").css("display", "block");
            });

            $("#login_google_status2").click(function () {
                $("#google_ids_div").css("display", "none");
            });
            $("#login_google_status1").click(function () {
                $("#google_ids_div").css("display", "block");
            });

            $("#login_linkedin_status2").click(function () {
                $("#linkedin_ids_div").css("display", "none");
            });
            $("#login_linkedin_status1").click(function () {
                $("#linkedin_ids_div").css("display", "block");
            });

            $("#login_github_status2").click(function () {
                $("#github_ids_div").css("display", "none");
            });
            $("#login_github_status1").click(function () {
                $("#github_ids_div").css("display", "block");
            });

            $("#login_bitbucket_status2").click(function () {
                $("#bitbucket_ids_div").css("display", "none");
            });
            $("#login_bitbucket_status1").click(function () {
                $("#bitbucket_ids_div").css("display", "block");
            });

            document.getElementById('timezone').value='{!! $WebmasterSetting->timezone !!}';
        });


    </script>
@endsection
