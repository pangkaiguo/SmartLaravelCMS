<div class="col-lg-4">
    <aside class="right-sidebar">
        <div class="widget">
            {{Form::open(['route'=>['searchTopics'],'method'=>'POST','class'=>'form-search'])}}
            <div class="input-group input-group-sm">
                {!! Form::text('search_word',@$search_word, array('placeholder' => trans('frontLang.search'),'class' => 'form-control','id'=>'search_word','required'=>'')) !!}
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-theme"><i class="fa fa-search"></i></button>
                </span>
            </div>

            {{Form::close()}}
        </div>

        @if(count($Categories)>0)
            <?php
            $category_title_var = "title_" . trans('backLang.boxCode');
            $slug_var = "seo_url_slug_" . trans('backLang.boxCode');
            $slug_var2 = "seo_url_slug_" . trans('backLang.boxCodeOther');
            ?>
            <div class="widget">
                <h5 class="widgetheading">{{ trans('frontLang.categories') }}</h5>
                <ul class="cat">
                    @foreach($Categories as $Category)
                        <?php $active_cat = ""; ?>
                        @if($CurrentCategory!="none")
                            @if(!empty($CurrentCategory))
                                @if($Category->id == $CurrentCategory->id)
                                    <?php $active_cat = "class=active"; ?>
                                @endif
                            @endif
                        @endif
                        <?php
                        $ccount = $category_and_topics_count[$Category->id];
                        if ($Category->$slug_var != "" && Helper::GeneralWebmasterSettings("links_status")) {
                            if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                $Category_link_url = url(trans('backLang.code') . "/" . $Category->$slug_var);
                            } else {
                                $Category_link_url = url($Category->$slug_var);
                            }
                        } else {
                            if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                $Category_link_url = route('FrontendTopicsByCatWithLang', ["lang" => trans('backLang.code'), "section" => $Category->webmasterSection->name, "cat" => $Category->id]);
                            } else {
                                $Category_link_url = route('FrontendTopicsByCat', ["section" => $Category->webmasterSection->name, "cat" => $Category->id]);
                            }
                        }
                        ?>
                        <li>
                            @if($Category->icon !="")
                                <i class="fa {{$Category->icon}}"></i> &nbsp;
                            @endif
                            <a {{ $active_cat }} href="{{ $Category_link_url }}">{{$Category->$category_title_var}}</a><span
                                    class="pull-right">({{ $ccount }})</span></li>
                        @foreach($Category->fatherSections as $MnuCategory)
                            <?php $active_cat = ""; ?>
                            @if($CurrentCategory!="none")
                                @if(!empty($CurrentCategory))
                                    @if($MnuCategory->id == $CurrentCategory->id)
                                        <?php $active_cat = "class=active"; ?>
                                    @endif
                                @endif
                            @endif
                            <?php
                            $ccount = $category_and_topics_count[$MnuCategory->id];
                            if ($MnuCategory->$slug_var != "" && Helper::GeneralWebmasterSettings("links_status")) {
                                if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                    $SubCategory_link_url = url(trans('backLang.code') . "/" . $MnuCategory->$slug_var);
                                } else {
                                    $SubCategory_link_url = url($MnuCategory->$slug_var);
                                }
                            } else {
                                if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                    $SubCategory_link_url = route('FrontendTopicsByCatWithLang', ["lang" => trans('backLang.code'), "section" => $MnuCategory->webmasterSection->name, "cat" => $MnuCategory->id]);
                                } else {
                                    $SubCategory_link_url = route('FrontendTopicsByCat', ["section" => $MnuCategory->webmasterSection->name, "cat" => $MnuCategory->id]);
                                }
                            }
                            ?>
                            <li> &nbsp; &nbsp; &nbsp;
                                @if($MnuCategory->icon !="")
                                    <i class="fa {{$MnuCategory->icon}}"></i> &nbsp;
                                @endif
                                <a {{ $active_cat }}  href="{{ $SubCategory_link_url }}">{{$MnuCategory->$category_title_var}}</a><span
                                        class="pull-right">({{ $ccount }})</span></li>
                        @endforeach

                    @endforeach
                </ul>
            </div>

        @endif
        @if(count($TopicsMostViewed)>0)
            <?php
            $side_title_var = "title_" . trans('backLang.boxCode');
            $side_title_var2 = "title_" . trans('backLang.boxCodeOther');
            $slug_var = "seo_url_slug_" . trans('backLang.boxCode');
            $slug_var2 = "seo_url_slug_" . trans('backLang.boxCodeOther');
            ?>
            <div class="widget">
                <h5 class="widgetheading">{{ trans('frontLang.mostViewed') }}</h5>
                <ul class="recent">
                    @foreach($TopicsMostViewed as $TopicMostViewed)
                        <?php
                        if ($TopicMostViewed->$side_title_var != "") {
                            $side_title = $TopicMostViewed->$side_title_var;
                        } else {
                            $side_title = $TopicMostViewed->$side_title_var2;
                        }
                        if ($TopicMostViewed->$slug_var != "" && Helper::GeneralWebmasterSettings("links_status")) {
                            if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                $topic_link_url = url(trans('backLang.code') . "/" . $TopicMostViewed->$slug_var);
                            } else {
                                $topic_link_url = url($TopicMostViewed->$slug_var);
                            }
                        } else {
                            if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                $topic_link_url = route('FrontendTopicByLang', ["lang" => trans('backLang.code'), "section" => $TopicMostViewed->webmasterSection->name, "id" => $TopicMostViewed->id]);
                            } else {
                                $topic_link_url = route('FrontendTopic', ["section" => $TopicMostViewed->webmasterSection->name, "id" => $TopicMostViewed->id]);
                            }
                        }
                        ?>
                        <li>
                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="{{ $topic_link_url }}">
                                        @if($TopicMostViewed->photo_file !="")
                                            <img src="{{ URL::to('uploads/topics/'.$TopicMostViewed->photo_file) }}"
                                                 class="pull-left" alt="{{ $side_title }}"/>
                                        @elseif($TopicMostViewed->webmasterSection->type==2 && $TopicMostViewed->video_file!="")
                                            @if($Topic->video_type ==1)
                                                <?php
                                                $Youtube_id = Helper::Get_youtube_video_id($Topic->video_file);
                                                ?>
                                                @if($Youtube_id !="")
                                                    <img src="http://img.youtube.com/vi/{{$Youtube_id}}/0.jpg"
                                                         class="pull-left" alt="{{ $side_title }}"/>
                                                @endif
                                            @elseif($Topic->video_type ==2)
                                                <?php
                                                $Vimeo_id = Helper::Get_vimeo_video_id($Topic->video_file);
                                                ?>
                                                @if($Vimeo_id !="")
                                                    <?php
                                                    $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$Vimeo_id.php"));
                                                    ?>

                                                    <img src="{{ $hash[0]['thumbnail_large'] }}"
                                                         class="pull-left" alt="{{ $side_title }}"/>
                                                @endif
                                            @endif
                                        @endif
                                    </a>
                                    <h6>
                                        <a href="{{ $topic_link_url }}">{{ $side_title }}</a>
                                    </h6>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <?php
        // View side banners
        $BannersSettingsId = Helper::GeneralWebmasterSettings("side_banners_section_id"); // You can get settings ID from Webmaster >> Banners settings
        ?>
        @include('frontEnd.includes.banners')

    </aside>
</div>